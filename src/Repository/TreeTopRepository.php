<?php

namespace App\Repository;

use App\Entity\TreeTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TreeTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method TreeTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method TreeTop[]    findAll()
 * @method TreeTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreeTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TreeTop::class);
    }

//    /**
//     * @return BackyardTop[] Returns an array of BackyardTop objects
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
    public function findOneBySomeField($value): ?BackyardTop
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