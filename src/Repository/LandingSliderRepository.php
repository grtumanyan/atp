<?php

namespace App\Repository;

use App\Entity\LandingSlider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LandingSlider|null find($id, $lockMode = null, $lockVersion = null)
 * @method LandingSlider|null findOneBy(array $criteria, array $orderBy = null)
 * @method LandingSlider[]    findAll()
 * @method LandingSlider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LandingSliderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LandingSlider::class);
    }

//    /**
//     * @return LandingSlider[] Returns an array of LandingSlider objects
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
    public function findOneBySomeField($value): ?LandingSlider
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
