<?php

namespace App\Repository;

use App\Entity\NewsImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NewsImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsImages[]    findAll()
 * @method NewsImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NewsImages::class);
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
