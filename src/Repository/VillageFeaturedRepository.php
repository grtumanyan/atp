<?php

namespace App\Repository;

use App\Entity\VillageFeatured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VillageFeatured|null find($id, $lockMode = null, $lockVersion = null)
 * @method VillageFeatured|null findOneBy(array $criteria, array $orderBy = null)
 * @method VillageFeatured[]    findAll()
 * @method VillageFeatured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VillageFeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VillageFeatured::class);
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
