<?php

namespace App\Repository;

use App\Entity\Treevia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Treevia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Treevia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Treevia[]    findAll()
 * @method Treevia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreeviaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Treevia::class);
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
