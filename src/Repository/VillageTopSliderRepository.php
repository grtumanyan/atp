<?php

namespace App\Repository;

use App\Entity\VillageTopSlider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VillageTopSlider|null find($id, $lockMode = null, $lockVersion = null)
 * @method VillageTopSlider|null findOneBy(array $criteria, array $orderBy = null)
 * @method VillageTopSlider[]    findAll()
 * @method VillageTopSlider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VillageTopSliderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VillageTopSlider::class);
    }

//    /**
//     * @return CommunityContent[] Returns an array of CommunityContent objects
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
    public function findOneBySomeField($value): ?CommunityContent
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
