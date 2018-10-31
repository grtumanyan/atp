<?php

namespace App\Repository;

use App\Entity\Featured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Featured|null find($id, $lockMode = null, $lockVersion = null)
 * @method Featured|null findOneBy(array $criteria, array $orderBy = null)
 * @method Featured[]    findAll()
 * @method Featured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Featured::class);
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
