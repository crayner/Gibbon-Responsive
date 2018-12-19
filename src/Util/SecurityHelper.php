<?php
/**
 * Created by PhpStorm.
 *
 * Gibbon, Flexible & Open School System
 * Copyright (C) 2010, Ross Parker
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program in the LICENCE file.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * Gibbon-Mobile
 *
 * (c) 2018 Craig Rayner <craig@craigrayner.com>
 *
 * User: craig
 * Date: 19/12/2018
 * Time: 12:17
 */

namespace App\Util;


use App\Entity\Module;
use App\Provider\ActionProvider;
use App\Provider\ModuleProvider;
use Doctrine\DBAL\Driver\PDOException;
use Symfony\Component\Security\Core\User\UserInterface;

class SecurityHelper
{
    /**
     * @var ActionProvider
     */
    private static $actionProvider;

    /**
     * @var ModuleProvider
     */
    private static $moduleProvider;

    /**
     * SecurityHelper constructor.
     * @param ActionProvider $actionProvider
     * @param ModuleProvider $moduleProvider
     */
    public function __construct(ActionProvider $actionProvider, ModuleProvider $moduleProvider)
    {
        self::$actionProvider = $actionProvider;
        self::$moduleProvider = $moduleProvider;
    }

    /**
     * @return ActionProvider
     */
    public static function getActionProvider(): ActionProvider
    {
        return self::$actionProvider;
    }

    /**
     * @return ModuleProvider
     */
    public static function getModuleProvider(): ModuleProvider
    {
        return self::$moduleProvider;
    }

    /**
     * getHighestGroupedAction
     * @param string $address
     * @return bool|string
     * @throws \Exception
     */
    public static function getHighestGroupedAction(string $address)
    {
        $module = self::checkModuleReady($address);
        try {
            $result =  self::getActionProvider()->getRepository()->createQueryBuilder('a')
                ->select('a.name')
                ->join('a.permissions', 'p')
                ->where('a.URLList LIKE :actionName')
                ->setParameter('actionName', '%'.self::getActionName($address).'%')
                ->andWhere('a.module = :module')
                ->setParameter('module', $module)
                ->andWhere('p.role = :currentRole')
                ->setParameter('currentRole', UserHelper::getCurrentUser()->getPrimaryRole())
                ->orderBy('a.precedence', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
            return empty($result['name']) ? false :  $result['name'];
        } catch (PDOException $e) {
        } catch (\PDOException $e) {
        }
        return false;
    }

    /**
     * checkModuleReady
     * @param string $address
     * @return bool|Module
     */
    public static function checkModuleReady(string $address)
    {
        try {
            return self::getModuleProvider()->findOneBy(['name' => self::getModuleName($address), 'active' => 'Y']);
        } catch (PDOException $e) {
        } catch (\PDOException $e) {
        }

        return false;
    }

    /**
     * getModuleName
     * @param string $address
     * @return bool|string
     */
    public static function getModuleName(string $address)
    {
        return substr(substr($address, 9), 0, strpos(substr($address, 9), '/'));
    }

    /**
     * getActionName
     * @param $address
     * @return bool|string
     */
    public static function getActionName($address)
    {
        return substr($address, (10 + strlen(self::getModuleName($address))));
    }

    /**
     * isActionAccessible
     * @param string $address
     * @param string $sub
     * @return bool
     * @throws \Exception
     */
    public static function isActionAccessible(string $address, string $sub = '%'): bool
    {
        //Check user is logged in
        if (UserHelper::getCurrentUser() instanceof UserInterface) {
            //Check user has a current role set
            if (! empty(UserHelper::getCurrentUser()->getPrimaryRole())) {
                //Check module ready
                $module = self::checkModuleReady($address);
                if ($module instanceof Module) {
                    //Check current role has access rights to the current action.
                    try {
                        if (count(self::getActionProvider()->findByURLListModuleRole(
                            [
                                'name' => "%".$address."%",
                                "module" => $module,
                                'role' => UserHelper::getCurrentUser()->getPrimaryRole(),
                                'sub' => $sub,
                            ]
                            )) > 0)
                                return true;
                    } catch (PDOException $e) {
                    }
                }
            }
        }

        return false;
    }
}