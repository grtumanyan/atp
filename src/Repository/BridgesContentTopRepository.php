<?php

namespace App\Repository;

use App\Entity\BridgesContentTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BridgesContentTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method BridgesContentTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method BridgesContentTop[]    findAll()
 * @method BridgesContentTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BridgesContentTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BridgesContentTop::class);
    }

//    /**
//     * @return CommunityTop[] Returns an array of CommunityTop objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommunityTop
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
