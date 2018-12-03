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
 * Class Group
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 * @ORM\Table(name="Group")
 * @ORM\HasLifecycleCallbacks()
 */
class Group
{
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(type="integer", name="gibbonGroupID", columnDefinition="INT(8) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var Person|null
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="gibbonPersonIDOwner", referencedColumnName="gibbonPersonID")
     */
    private $owner;

    /**
     * @var SchoolYear|null
     * @ORM\ManyToOne(targetEntity="SchoolYear")
     * @ORM\JoinColumn(name="gibbonSchoolYearID", referencedColumnName="gibbonSchoolYearID")
     */
    private $schoolYear;

    /**
     * @var string|null
     * @ORM\Column(length=30)
     */
    private $name;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", name="timestampCreated", nullable=true)
     */
    private $timestampCreated;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", name="timestampUpdated", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $timestampUpdated;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Group
     */
    public function setId(?int $id): Group
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getOwner(): ?Person
    {
        return $this->owner;
    }

    /**
     * @param Person|null $owner
     * @return Group
     */
    public function setOwner(?Person $owner): Group
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return SchoolYear|null
     */
    public function getSchoolYear(): ?SchoolYear
    {
        return $this->schoolYear;
    }

    /**
     * @param SchoolYear|null $schoolYear
     * @return Group
     */
    public function setSchoolYear(?SchoolYear $schoolYear): Group
    {
        $this->schoolYear = $schoolYear;
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
     * @return Group
     */
    public function setName(?string $name): Group
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestampCreated(): ?\DateTime
    {
        return $this->timestampCreated;
    }

    /**
     * @param \DateTime|null $timestampCreated
     * @return Group
     */
    public function setTimestampCreated(?\DateTime $timestampCreated): Group
    {
        $this->timestampCreated = $timestampCreated;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestampUpdated(): ?\DateTime
    {
        return $this->timestampUpdated;
    }

    /**
     * setTimestampUpdated
     * @param \DateTime|null $timestampUpdated
     * @return Group
     * @throws \Exception
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setTimestampUpdated(?\DateTime $timestampUpdated = null): Group
    {
        $this->timestampUpdated = new \DateTime('now');
        return $this;
    }
}