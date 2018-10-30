<?php

namespace App\Repository;

use App\Entity\BackyardTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BackyardTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method BackyardTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method BackyardTop[]    findAll()
 * @method BackyardTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BackyardTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BackyardTop::class);
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
