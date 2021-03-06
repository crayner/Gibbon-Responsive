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

use App\Manager\Traits\BooleanList;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class PersonField
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PersonFieldRepository")
 * @ORM\Table(name="PersonField")
 */
class PersonField
{
    use BooleanList;

    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(type="smallint", name="gibbonPersonFieldID", columnDefinition="INT(3) UNSIGNED ZEROFILL")
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
     * @ORM\Column(length=1, options={"default": "Y"})
     */
    private $active;

    /**
     * @var string|null
     * @ORM\Column()
     */
    private $description;

    /**
     * @var string|null
     * @ORM\Column(length=10, name="type")
     */
    private $type;

    /**
     * @var array
     */
    private static $typeList = ['varchar','text','date','url','select','checkboxes'];

    /**
     * @var string|null
     * @ORM\Column(type="text", options={"comment": "Field length for varchar, rows for text, comma-separate list for select/checkbox."})
     */
    private $options;

    /**
     * @var string|null
     * @ORM\Column(length=1, options={"default": "N"})
     */
    private $required;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activePersonStudent", options={"default": "0"})
     */
    private $activePersonStudent = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activePersonStaff", options={"default": "0"})
     */
    private $activePersonStaff = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activePersonParent", options={"default": "0"})
     */
    private $activePersonParent = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activePersonOther", options={"default": "0"})
     */
    private $activePersonOther = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activeApplicationForm", options={"default": "0"})
     */
    private $activeApplicationForm = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activeDataUpdater", options={"default": "0"})
     */
    private $activeDataUpdater = 0;

    /**
     * @var boolean|null
     * @ORM\Column(type="boolean", name="activePublicRegistration", options={"default": "0"})
     */
    private $activePublicRegistration = 0;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return PersonField
     */
    public function setId(?int $id): PersonField
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
     * @return PersonField
     */
    public function setName(?string $name): PersonField
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getActive(): ?string
    {
        return $this->active;
    }

    /**
     * @param string|null $active
     * @return PersonField
     */
    public function setActive(?string $active): PersonField
    {
        $this->active = self::checkBoolean($active);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return PersonField
     */
    public function setDescription(?string $description): PersonField
    {
        $this->description = $description;
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
     * @return PersonField
     */
    public function setType(?string $type): PersonField
    {
        $this->type = in_array($type, self::getTypeList()) ? $type : null;
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
     * @return PersonField
     */
    public function setOptions(?string $options): PersonField
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequired(): ?string
    {
        return $this->required;
    }

    /**
     * @param string|null $required
     * @return PersonField
     */
    public function setRequired(?string $required): PersonField
    {
        $this->required = self::checkBoolean($required, 'N');
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActivePersonStudent(): ?bool
    {
        return $this->activePersonStudent;
    }

    /**
     * @param bool|null $activePersonStudent
     * @return PersonField
     */
    public function setActivePersonStudent(?bool $activePersonStudent): PersonField
    {
        $this->activePersonStudent = $activePersonStudent;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActivePersonStaff(): ?bool
    {
        return $this->activePersonStaff;
    }

    /**
     * @param bool|null $activePersonStaff
     * @return PersonField
     */
    public function setActivePersonStaff(?bool $activePersonStaff): PersonField
    {
        $this->activePersonStaff = $activePersonStaff;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActivePersonParent(): ?bool
    {
        return $this->activePersonParent;
    }

    /**
     * @param bool|null $activePersonParent
     * @return PersonField
     */
    public function setActivePersonParent(?bool $activePersonParent): PersonField
    {
        $this->activePersonParent = $activePersonParent;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActivePersonOther(): ?bool
    {
        return $this->activePersonOther;
    }

    /**
     * @param bool|null $activePersonOther
     * @return PersonField
     */
    public function setActivePersonOther(?bool $activePersonOther): PersonField
    {
        $this->activePersonOther = $activePersonOther;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActiveApplicationForm(): ?bool
    {
        return $this->activeApplicationForm;
    }

    /**
     * @param bool|null $activeApplicationForm
     * @return PersonField
     */
    public function setActiveApplicationForm(?bool $activeApplicationForm): PersonField
    {
        $this->activeApplicationForm = $activeApplicationForm;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActiveDataUpdater(): ?bool
    {
        return $this->activeDataUpdater;
    }

    /**
     * @param bool|null $activeDataUpdater
     * @return PersonField
     */
    public function setActiveDataUpdater(?bool $activeDataUpdater): PersonField
    {
        $this->activeDataUpdater = $activeDataUpdater;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActivePublicRegistration(): ?bool
    {
        return $this->activePublicRegistration;
    }

    /**
     * @param bool|null $activePublicRegistration
     * @return PersonField
     */
    public function setActivePublicRegistration(?bool $activePublicRegistration): PersonField
    {
        $this->activePublicRegistration = $activePublicRegistration;
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