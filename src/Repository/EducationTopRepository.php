<?php

namespace App\Repository;

use App\Entity\EducationTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EducationTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationTop[]    findAll()
 * @method EducationTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EducationTop::class);
    }

//    /**
//     * @return EconomicTop[] Returns an array of EconomicTop objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EconomicTop
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
