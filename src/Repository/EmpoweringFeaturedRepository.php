<?php

namespace App\Repository;

use App\Entity\EmpoweringFeatured;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmpoweringFeatured|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpoweringFeatured|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpoweringFeatured[]    findAll()
 * @method EmpoweringFeatured[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpoweringFeaturedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmpoweringFeatured::class);
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
