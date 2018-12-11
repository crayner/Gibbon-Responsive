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
 * Date: 7/12/2018
 * Time: 13:39
 */
namespace App\Provider;

use App\Entity\Person;
use App\Entity\Role;
use App\Manager\Traits\EntityTrait;

/**
 * Class PersonProvider
 * @package App\Manager\Provider
 */
class PersonProvider extends UserProvider
{
    use EntityTrait;

    /**
     * @var string
     */
    private $entityName = Person::class;

    /**
     * isStaff
     * @return bool
     */
    public function isStaff(): bool
    {
        foreach($this->loadUserRoles() as $role)
            if ($role->getCategory() === 'Staff')
                return true;
        return false;
    }

    /**
     * isStaff
     * @return bool
     */
    public function isParent(): bool
    {
        foreach($this->loadUserRoles() as $role)
            if ($role->getCategory() === 'Parent')
                return true;
        return false;
    }

    /**
     * @var array
     */
    private $userRoles = [];

    /**
     * loadUserRoles
     * @return array
     * @throws \Exception
     */
    public function loadUserRoles(): array
    {
        if (empty($userRole))
            return $this->userRoles = $this->getRepository(Role::class)->loadUserRoles($this->getEntity());
        return $this->userRoles;
    }
}