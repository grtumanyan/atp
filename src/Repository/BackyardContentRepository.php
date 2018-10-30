<?php

namespace App\Repository;

use App\Entity\BackyardContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BackyardContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method BackyardContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method BackyardContent[]    findAll()
 * @method BackyardContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BackyardContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BackyardContent::class);
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
