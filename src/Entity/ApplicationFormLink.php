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
 * Class ApplicationFormLink
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationFormLinkRepository")
 * @ORM\Table(name="ApplicationFormLink", uniqueConstraints={@ORM\UniqueConstraint(name="link",columns={"gibbonApplicationFormID1","gibbonApplicationFormID2"})})
 * @ORM\HasLifecycleCallbacks
 */
class ApplicationFormLink
{
    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\Column(type="integer", name="gibbonApplicationFormLinkID", columnDefinition="INT(12) UNSIGNED")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var ApplicationForm|null
     * @ORM\ManyToOne(targetEntity="ApplicationForm")
     * @ORM\JoinColumn(name="gibbonApplicationFormID1", referencedColumnName="gibbonApplicationFormID", nullable=false)
     */
    private $applicationForm1;

    /**
     * @var ApplicationForm|null
     * @ORM\ManyToOne(targetEntity="ApplicationForm")
     * @ORM\JoinColumn(name="gibbonApplicationFormID2", referencedColumnName="gibbonApplicationFormID", nullable=false)
     */
    private $applicationForm2;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $timestamp;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ApplicationFormLink
     */
    public function setId(?int $id): ApplicationFormLink
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ApplicationForm|null
     */
    public function getApplicationForm1(): ?ApplicationForm
    {
        return $this->applicationForm1;
    }

    /**
     * @param ApplicationForm|null $applicationForm1
     * @return ApplicationFormLink
     */
    public function setApplicationForm1(?ApplicationForm $applicationForm1): ApplicationFormLink
    {
        $this->applicationForm1 = $applicationForm1;
        return $this;
    }

    /**
     * @return ApplicationForm|null
     */
    public function getApplicationForm2(): ?ApplicationForm
    {
        return $this->applicationForm2;
    }

    /**
     * @param ApplicationForm|null $applicationForm2
     * @return ApplicationFormLink
     */
    public function setApplicationForm2(?ApplicationForm $applicationForm2): ApplicationFormLink
    {
        $this->applicationForm2 = $applicationForm2;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    /**
     * setTimestamp
     * @param \DateTime|null $timestamp
     * @return ApplicationFormLink
     * @throws \Exception
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setTimestamp(?\DateTime $timestamp = null): ApplicationFormLink
    {
        $this->timestamp = $timestamp ?: new \DateTime('now');
        return $this;
    }
}