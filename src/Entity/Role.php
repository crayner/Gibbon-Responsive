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
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * UserProvider: craig
 * Date: 23/11/2018
 * Time: 09:33
 */
namespace App\Entity;

use App\Manager\EntityInterface;
use App\Manager\Traits\BooleanList;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Role
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 * @ORM\Table(name="Role", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"}), @ORM\UniqueConstraint(name="nameShort", columns={"nameShort"})})
 */
class Role implements EntityInterface
{
    use BooleanList;
    
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(type="integer", name="gibbonRoleID", columnDefinition="INT(3) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @return array
     */
    public static function getRestrictionList(): array
    {
        return self::$restrictionList;
    }

    /**
     * @return array
     */
    public static function getTypeList(): array
    {
        return self::$typeList;
    }

    /**
     * @return array
     */
    public static function getCategoryList(): array
    {
        return self::$categoryList;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Role
     */
    public function setId(?int $id): Role
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=8, options={"default": "Staff"})
     */
    private $category = 'Staff';

    /**
     * @var array
     */
    private static $categoryList = ['Staff','Student','Parent','Other'];

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * setCategory
     * @param string $category
     * @return Role
     */
    public function setCategory(string $category): Role
    {
        $this->category = in_array($category, self::getCategoryList()) ? $category : 'Staff';
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=20, unique=true)
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * setName
     * @param string $name
     * @return Role
     */
    public function setName(string $name): Role
    {
        $this->name = mb_substr($name, 0, 20);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=4, name="nameShort", unique=true)
     */
    private $nameShort;

    /**
     * @return string
     */
    public function getNameShort(): string
    {
        return $this->nameShort;
    }

    /**
     * setNameShort
     * @param string $nameShort
     * @return Role
     */
    public function setNameShort(string $nameShort): Role
    {
        $this->nameShort = mb_substr($nameShort, 0, 4);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=60, name="description")
     */
    private $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * setDescription
     * @param string $description
     * @return Role
     */
    public function setDescription(string $description): Role
    {
        $this->description = mb_substr($description, 0, 4);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=4, name="type", options={"default": "Core"})
     */
    private $type = 'Core';

    /**
     * @var array
     */
    private static $typeList = ['Core', 'Additional'];

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * setType
     * @param string $type
     * @return Role
     */
    public function setType(string $type): Role
    {
        $this->type = in_array($type, self::getTypeList()) ? $type : 'Core';
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=1, name="canLoginRole", options={"default": "Y"})
     */
    private $canLoginRole = 'Y';

    /**
     * @return string
     */
    public function getCanLoginRole(): string
    {
        return $this->canLoginRole;
    }

    /**
     * setCanLoginRole
     * @param string $canLoginRole
     * @return Role
     */
    public function setCanLoginRole(string $canLoginRole): Role
    {
        $this->canLoginRole = self::checkBoolean($canLoginRole);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=1, name="futureYearsLogin", options={"default": "Y"})
     */
    private $futureYearsLogin = 'Y';

    /**
     * @return string
     */
    public function getFutureYearsLogin(): string
    {
        return $this->futureYearsLogin;
    }

    /**
     * setFutureYearsLogin
     * @param string $futureYearsLogin
     * @return Role
     */
    public function setFutureYearsLogin(string $futureYearsLogin): Role
    {
        $this->futureYearsLogin = self::checkBoolean($futureYearsLogin);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=1, name="pastYearsLogin", options={"default": "Y"})
     */
    private $pastYearsLogin = 'Y';

    /**
     * @return string
     */
    public function getPastYearsLogin(): string
    {
        return $this->pastYearsLogin;
    }

    /**
     * setPastYearsLogin
     * @param string $pastYearsLogin
     * @return Role
     */
    public function setPastYearsLogin(string $pastYearsLogin): Role
    {
        $this->pastYearsLogin = self::checkBoolean($pastYearsLogin);
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(length=10, name="restriction", options={"default": "None"})
     */
    private $restriction = 'None';

    /**
     * @var array
     */
    private static $restrictionList = ['None', 'Same Role', 'Admin Only'];

    /**
     * @return string
     */
    public function getRestriction(): string
    {
        return $this->restriction;
    }

    /**
     * setRestriction
     * @param string $restriction
     * @return Role
     */
    public function setRestriction(string $restriction): Role
    {
        $this->restriction = in_array($restriction, self::getRestrictionList()) ? $restriction : 'None';
        return $this;
    }
}