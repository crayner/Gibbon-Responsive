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
 * Class Messenger
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\MessengerRepository")
 * @ORM\Table(name="Messenger")
 */
class Messenger
{
    use BooleanList;

    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(type="integer", name="gibbonMessengerID", columnDefinition="INT(10) UNSIGNED ZEROFILL")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(length=1)
     */
    private $email = 'N';

    /**
     * @var string|null
     * @ORM\Column(length=1, name="messageWall")
     */
    private $messageWall = 'N';

    /**
     * @var \DateTime|null
     * @ORM\Column(type="date", name="messageWall_date1", nullable=true)
     */
    private $messageWall_date1;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="date", name="messageWall_date2", nullable=true)
     */
    private $messageWall_date2;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="date", name="messageWall_date3", nullable=true)
     */
    private $messageWall_date3;

    /**
     * @var string|null
     * @ORM\Column(length=1)
     */
    private $sms = 'N';

    /**
     * @var string|null
     * @ORM\Column(length=60)
     */
    private $subject;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @var Person|null
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="gibbonPersonID",referencedColumnName="gibbonPersonID")
     */
    private $person;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @var string|null
     * @ORM\Column(type="text", name="emailReport")
     */
    private $emailReport;

    /**
     * @var string|null
     * @ORM\Column(length=1, name="emailReceipt", nullable=true)
     */
    private $emailReceipt = 'N';

    /**
     * @var string|null
     * @ORM\Column(type="text", name="emailReceiptText", nullable=true)
     */
    private $emailReceiptText;

    /**
     * @var string|null
     * @ORM\Column(type="text", name="smsReport")
     */
    private $smsReport;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Messenger
     */
    public function setId(?int $id): Messenger
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Messenger
     */
    public function setEmail(?string $email): Messenger
    {
        $this->email = self::checkBoolean($email, 'N');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessageWall(): ?string
    {
        return $this->messageWall;
    }

    /**
     * @param string|null $messageWall
     * @return Messenger
     */
    public function setMessageWall(?string $messageWall): Messenger
    {
        $this->messageWall = self::checkBoolean($messageWall, 'N');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getMessageWallDate1(): ?\DateTime
    {
        return $this->messageWall_date1;
    }

    /**
     * @param \DateTime|null $messageWall_date1
     * @return Messenger
     */
    public function setMessageWallDate1(?\DateTime $messageWall_date1): Messenger
    {
        $this->messageWall_date1 = $messageWall_date1;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getMessageWallDate2(): ?\DateTime
    {
        return $this->messageWall_date2;
    }

    /**
     * @param \DateTime|null $messageWall_date2
     * @return Messenger
     */
    public function setMessageWallDate2(?\DateTime $messageWall_date2): Messenger
    {
        $this->messageWall_date2 = $messageWall_date2;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getMessageWallDate3(): ?\DateTime
    {
        return $this->messageWall_date3;
    }

    /**
     * @param \DateTime|null $messageWall_date3
     * @return Messenger
     */
    public function setMessageWallDate3(?\DateTime $messageWall_date3): Messenger
    {
        $this->messageWall_date3 = $messageWall_date3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSms(): ?string
    {
        return $this->sms;
    }

    /**
     * @param string|null $sms
     * @return Messenger
     */
    public function setSms(?string $sms): Messenger
    {
        $this->sms = self::checkBoolean($sms, 'N');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string|null $subject
     * @return Messenger
     */
    public function setSubject(?string $subject): Messenger
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $body
     * @return Messenger
     */
    public function setBody(?string $body): Messenger
    {
        $this->body = $body;
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
     * @return Messenger
     */
    public function setPerson(?Person $person): Messenger
    {
        $this->person = $person;
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
     * @param \DateTime|null $timestamp
     * @return Messenger
     */
    public function setTimestamp(?\DateTime $timestamp): Messenger
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailReport(): ?string
    {
        return $this->emailReport;
    }

    /**
     * @param string|null $emailReport
     * @return Messenger
     */
    public function setEmailReport(?string $emailReport): Messenger
    {
        $this->emailReport = $emailReport;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailReceipt(): ?string
    {
        return $this->emailReceipt;
    }

    /**
     * @param string|null $emailReceipt
     * @return Messenger
     */
    public function setEmailReceipt(?string $emailReceipt): Messenger
    {
        $this->emailReceipt = self::checkBoolean($emailReceipt, 'N');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailReceiptText(): ?string
    {
        return $this->emailReceiptText;
    }

    /**
     * @param string|null $emailReceiptText
     * @return Messenger
     */
    public function setEmailReceiptText(?string $emailReceiptText): Messenger
    {
        $this->emailReceiptText = $emailReceiptText;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmsReport(): ?string
    {
        return $this->smsReport;
    }

    /**
     * @param string|null $smsReport
     * @return Messenger
     */
    public function setSmsReport(?string $smsReport): Messenger
    {
        $this->smsReport = $smsReport;
        return $this;
    }
}