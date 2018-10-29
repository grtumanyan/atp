<?php

namespace App\Repository;

use App\Entity\LandingBottom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LandingBottom|null find($id, $lockMode = null, $lockVersion = null)
 * @method LandingBottom|null findOneBy(array $criteria, array $orderBy = null)
 * @method LandingBottom[]    findAll()
 * @method LandingBottom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LandingBottomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LandingBottom::class);
    }

//    /**
//     * @return LandingBottom[] Returns an array of LandingBottom objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LandingBottom
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
