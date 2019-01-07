<?php

namespace App\Repository;

use App\Entity\VillageBottomSliderImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VillageBottomSliderImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method VillageBottomSliderImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method VillageBottomSliderImages[]    findAll()
 * @method VillageBottomSliderImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VillageBottomSliderImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VillageBottomSliderImages::class);
    }

//    /**
//     * @return NewsImage[] Returns an array of NewsImage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewsImage
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
