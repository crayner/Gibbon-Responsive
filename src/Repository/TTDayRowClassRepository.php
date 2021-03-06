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
 * Date: 5/12/2018
 * Time: 17:00
 */
namespace App\Repository;

use App\Entity\TTDay;
use App\Entity\TTDayRowClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class TTDayRowClassRepository
 * @package App\Repository
 */
class TTDayRowClassRepository extends ServiceEntityRepository
{
    /**
     * TTDayRowClassRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TTDayRowClass::class);
    }

    /**
     * findByTTDay
     * @param TTDay $day
     * @return mixed
     */
    public function findByTTDay(TTDay $day)
    {
        return $this->createQueryBuilder('tdrc')
            ->where('tdrc.TTDay = :day')
            ->setParameter('day', $day)
            ->getQuery()
            ->getResult();
    }
}
