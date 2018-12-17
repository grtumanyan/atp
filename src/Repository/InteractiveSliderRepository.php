<?php

namespace App\Repository;

use App\Entity\InteractiveSlider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InteractiveSlider|null find($id, $lockMode = null, $lockVersion = null)
 * @method InteractiveSlider|null findOneBy(array $criteria, array $orderBy = null)
 * @method InteractiveSlider[]    findAll()
 * @method InteractiveSlider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteractiveSliderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InteractiveSlider::class);
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
