<?php

namespace App\Repository;

use App\Entity\BridgesFeatured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BridgesFeatured|null find($id, $lockMode = null, $lockVersion = null)
 * @method BridgesFeatured|null findOneBy(array $criteria, array $orderBy = null)
 * @method BridgesFeatured[]    findAll()
 * @method BridgesFeatured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BridgesFeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BridgesFeatured::class);
    }

//    /**
//     * @return EconomicFeatured[] Returns an array of EconomicFeatured objects
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
    public function findOneBySomeField($value): ?EconomicFeatured
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
