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
 * Date: 23/11/2018
 * Time: 15:27
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Hook
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\HookRepository")
 * @ORM\Table(name="Hook", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name", "type"})})
 */
class Hook
{
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(type="smallint", name="gibbonHookID", columnDefinition="INT(4) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(length=50)
     */
    private $name;

    /**
     * @var string|null
     * @ORM\Column(length=20, nullable=true)
     */
    private $type;

    /**
     * @var array 
     */
    private static $typeList = ['Public Home Page','Student Profile','Unit','Parental Dashboard','Staff Dashboard','Student Dashboard'];

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private $options;

    /**
     * @var Module|null
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumn(name="gibbonModuleID", referencedColumnName="gibbonModuleID", nullable=false)
     */
    private $module;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Hook
     */
    public function setId(?int $id): Hook
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Hook
     */
    public function setName(?string $name): Hook
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Hook
     */
    public function setType(?string $type): Hook
    {
        $this->type = in_array($type, self::getTypeList()) ? $type : null ;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOptions(): ?string
    {
        return $this->options;
    }

    /**
     * @param string|null $options
     * @return Hook
     */
    public function setOptions(?string $options): Hook
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return Module|null
     */
    public function getModule(): ?Module
    {
        return $this->module;
    }

    /**
     * @param Module|null $module
     * @return Hook
     */
    public function setModule(?Module $module): Hook
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @return array
     */
    public static function getTypeList(): array
    {
        return self::$typeList;
    }
}