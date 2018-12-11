<?php

namespace App\Repository;

use App\Entity\MissionContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MissionContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method MissionContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method MissionContent[]    findAll()
 * @method MissionContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissionContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MissionContent::class);
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
