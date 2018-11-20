<?php

namespace App\Repository;

use App\Entity\WhereFeatured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WhereFeatured|null find($id, $lockMode = null, $lockVersion = null)
 * @method WhereFeatured|null findOneBy(array $criteria, array $orderBy = null)
 * @method WhereFeatured[]    findAll()
 * @method WhereFeatured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhereFeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WhereFeatured::class);
    }

//    /**
//     * @return BackyardBottom[] Returns an array of BackyardBottom objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BackyardBottom
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
