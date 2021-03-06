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

use App\Entity\AttendanceLogPerson;
use App\Entity\CourseClass;
use App\Entity\RollGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class AttendanceLogPersonRepository
 * @package App\Repository
 */
class AttendanceLogPersonRepository extends ServiceEntityRepository
{
    /**
     * AttendanceLogPersonRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttendanceLogPerson::class);
    }

    /**
     * findClassStudents
     * @param CourseClass $class
     * @param \DateTime $date
     * @return array
     */
    public function findClassStudents(CourseClass $class, \DateTime $date): array
    {
        $result = $this->createQueryBuilder('alp')
            ->select('alp, p')
            ->join('alp.person', 'p')
            ->where('alp.courseClass = :class')
            ->setParameter('class', $class)
            ->andWhere('alp.date = :currentDate')
            ->setParameter('currentDate', $date)
            ->andWhere('alp.context = :context')
            ->setParameter('context', 'Class')
            ->getQuery()
            ->getResult() ?: [];
        return $this->defineStudentListKeys($result);

    }

    /**
     * findRollStudents
     * @param \DateTime $date
     * @return array
     */
    public function findRollStudents(\DateTime $date): array
    {
        $result = $this->createQueryBuilder('alp')
            ->select('alp, p')
            ->join('alp.person', 'p')
            ->where('alp.date = :currentDate')
            ->setParameter('currentDate', $date)
            ->andWhere('alp.context = :context')
            ->setParameter('context', 'Roll Group')
            ->getQuery()
            ->getResult() ?: [];
        return $this->defineStudentListKeys($result);
    }

    /**
     * defineStudentListKeys
     * @param array $result
     * @return array
     */
    private function defineStudentListKeys(array $result): array
    {
        $students = [];
        foreach($result as $q=>$w)
        {
            $students[$w->getPerson()->getId()] = $w;
        }
        return $students;
    }
}
