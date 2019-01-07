<?php

namespace App\Repository;

use App\Entity\EducationContentBottom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EducationContentBottom|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationContentBottom|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationContentBottom[]    findAll()
 * @method EducationContentBottom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationContentBottomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EducationContentBottom::class);
    }

//    /**
//     * @return EconomicContent[] Returns an array of EconomicContent objects
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
    public function findOneBySomeField($value): ?EconomicContent
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
