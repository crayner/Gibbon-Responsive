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
namespace App\Repository;

use App\Entity\AttendanceCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class AttendanceCodeRepository
 * @package App\Repository
 */
class AttendanceCodeRepository extends ServiceEntityRepository
{
    /**
     * AttendanceCodeRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttendanceCode::class);
    }

    /**
     * findActive
     * @return array
     */
    public function findActive(bool $asArray = false): array
    {
        $query = $this->createQueryBuilder('a', 'a.id')
            ->where('a.active = :yes')
            ->setParameter('yes', 'Y')
            ->orderBy('a.sequenceNumber', 'ASC')
            ->getQuery();
        if ($asArray)
            return $query->getArrayResult();
        return $query->getResult();
    }

    /**
     * findDefaultAttendanceCode
     * @return AttendanceCode|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findDefaultAttendanceCode(): ?AttendanceCode
    {
        return $this->createQueryBuilder('ac')
            ->orderBy('ac.sequenceNumber', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
