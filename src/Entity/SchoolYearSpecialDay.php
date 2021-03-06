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

use App\Manager\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class SchoolYearSpecialDay
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SchoolYearSpecialDayRepository")
 * @ORM\Table(name="SchoolYearSpecialDay", uniqueConstraints={@ORM\UniqueConstraint(name="date", columns={"date"})})
 */
class SchoolYearSpecialDay implements EntityInterface
{
    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\Column(type="integer", name="gibbonSchoolYearSpecialDayID", columnDefinition="INT(10) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var SchoolYearTerm|null
     * @ORM\ManyToOne(targetEntity="SchoolYearTerm")
     * @ORM\JoinColumn(name="gibbonSchoolYearTermID", referencedColumnName="gibbonSchoolYearTermID", nullable=false)
     */
    private $schoolYearTerm;

    /**
     * @var string
     * @ORM\Column(length=14, name="type")
     */
    private $type ;

    /**
     * @var array
     */
    private static $typeList = ['School Closure', 'Timing Change'];

    /**
     * @var string|null
     * @ORM\Column(length=20)
     */
    private $name;

    /**
     * @var string|null
     * @ORM\Column()
     */
    private $description;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="date", unique=true)
     */
    private $date;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="time", name="schoolOpen", nullable=true)
     */
    private $schoolOpen;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="time", name="schoolStart", nullable=true)
     */
    private $schoolStart;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="time", name="schoolEnd", nullable=true)
     */
    private $schoolEnd;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="time", name="schoolClose", nullable=true)
     */
    private $schoolClose;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return SchoolYearSpecialDay
     */
    public function setId(?int $id): SchoolYearSpecialDay
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return SchoolYearTerm|null
     */
    public function getSchoolYearTerm(): ?SchoolYearTerm
    {
        return $this->schoolYearTerm;
    }

    /**
     * @param SchoolYearTerm|null $schoolYearTerm
     * @return SchoolYearSpecialDay
     */
    public function setSchoolYearTerm(?SchoolYearTerm $schoolYearTerm): SchoolYearSpecialDay
    {
        $this->schoolYearTerm = $schoolYearTerm;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return SchoolYearSpecialDay
     */
    public function setType(string $type): SchoolYearSpecialDay
    {
        $this->type = $type;
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
     * @return SchoolYearSpecialDay
     */
    public function setName(?string $name): SchoolYearSpecialDay
    {
        $this->name = $name;
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
     * @return SchoolYearSpecialDay
     */
    public function setDescription(?string $description): SchoolYearSpecialDay
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime|null $date
     * @return SchoolYearSpecialDay
     */
    public function setDate(?\DateTime $date): SchoolYearSpecialDay
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSchoolOpen(): ?\DateTime
    {
        return $this->schoolOpen;
    }

    /**
     * @param \DateTime|null $schoolOpen
     * @return SchoolYearSpecialDay
     */
    public function setSchoolOpen(?\DateTime $schoolOpen): SchoolYearSpecialDay
    {
        $this->schoolOpen = $schoolOpen;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSchoolStart(): ?\DateTime
    {
        return $this->schoolStart;
    }

    /**
     * @param \DateTime|null $schoolStart
     * @return SchoolYearSpecialDay
     */
    public function setSchoolStart(?\DateTime $schoolStart): SchoolYearSpecialDay
    {
        $this->schoolStart = $schoolStart;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSchoolEnd(): ?\DateTime
    {
        return $this->schoolEnd;
    }

    /**
     * @param \DateTime|null $schoolEnd
     * @return SchoolYearSpecialDay
     */
    public function setSchoolEnd(?\DateTime $schoolEnd): SchoolYearSpecialDay
    {
        $this->schoolEnd = $schoolEnd;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSchoolClose(): ?\DateTime
    {
        return $this->schoolClose;
    }

    /**
     * @param \DateTime|null $schoolClose
     * @return SchoolYearSpecialDay
     */
    public function setSchoolClose(?\DateTime $schoolClose): SchoolYearSpecialDay
    {
        $this->schoolClose = $schoolClose;
        return $this;
    }
}