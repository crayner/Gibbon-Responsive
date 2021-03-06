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
 * Class ExternalAssessmentStudent
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ExternalAssessmentStudentRepository")
 * @ORM\Table(name="ExternalAssessmentStudent", indexes={@ORM\Index(name="gibbonExternalAssessmentID", columns={"gibbonExternalAssessmentID"}),@ORM\Index(name="gibbonPersonID", columns={"gibbonPersonID"})})
 */
class ExternalAssessmentStudent
{
    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\Column(type="bigint", name="gibbonExternalAssessmentStudentID", columnDefinition="INT(12) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var ExternalAssessment|null
     * @ORM\ManyToOne(targetEntity="ExternalAssessment")
     * @ORM\JoinColumn(name="gibbonExternalAssessmentID", referencedColumnName="gibbonExternalAssessmentID", nullable=false)
     */
    private $externalAssessment;

    /**
     * @var Person|null
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="gibbonPersonID", referencedColumnName="gibbonPersonID", nullable=false)
     */
    private $person;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var string|null
     * @ORM\Column()
     */
    private $attachment;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ExternalAssessmentStudent
     */
    public function setId(?int $id): ExternalAssessmentStudent
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ExternalAssessment|null
     */
    public function getExternalAssessment(): ?ExternalAssessment
    {
        return $this->externalAssessment;
    }

    /**
     * @param ExternalAssessment|null $externalAssessment
     * @return ExternalAssessmentStudent
     */
    public function setExternalAssessment(?ExternalAssessment $externalAssessment): ExternalAssessmentStudent
    {
        $this->externalAssessment = $externalAssessment;
        return $this;
    }

    /**
     * @return Person|null
     */
    public function getPerson(): ?Person
    {
        return $this->person;
    }

    /**
     * @param Person|null $person
     * @return ExternalAssessmentStudent
     */
    public function setPerson(?Person $person): ExternalAssessmentStudent
    {
        $this->person = $person;
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
     * @return ExternalAssessmentStudent
     */
    public function setDate(?\DateTime $date): ExternalAssessmentStudent
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    /**
     * @param string|null $attachment
     * @return ExternalAssessmentStudent
     */
    public function setAttachment(?string $attachment): ExternalAssessmentStudent
    {
        $this->attachment = $attachment;
        return $this;
    }
}