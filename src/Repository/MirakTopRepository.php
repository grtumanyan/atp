<?php

namespace App\Repository;

use App\Entity\MirakTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MirakTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method MirakTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method MirakTop[]    findAll()
 * @method MirakTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MirakTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MirakTop::class);
    }

//    /**
//     * @return Amount[] Returns an array of Amount objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Amount
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
