<?php

namespace App\Repository;

use App\Entity\FruitFeatured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FruitFeatured|null find($id, $lockMode = null, $lockVersion = null)
 * @method FruitFeatured|null findOneBy(array $criteria, array $orderBy = null)
 * @method FruitFeatured[]    findAll()
 * @method FruitFeatured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FruitFeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FruitFeatured::class);
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
