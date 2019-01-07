<?php

namespace App\Repository;

use App\Entity\StewardshipSliderImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StewardshipSliderImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method StewardshipSliderImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method StewardshipSliderImages[]    findAll()
 * @method StewardshipSliderImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StewardshipSliderImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StewardshipSliderImages::class);
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
