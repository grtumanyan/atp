<?php

namespace App\Repository;

use App\Entity\ForestationContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ForestationContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForestationContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForestationContent[]    findAll()
 * @method ForestationContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForestationContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ForestationContent::class);
    }

//    /**
//     * @return BackyardContent[] Returns an array of BackyardContent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BackyardContent
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}