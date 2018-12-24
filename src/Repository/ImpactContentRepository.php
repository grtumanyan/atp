<?php

namespace App\Repository;

use App\Entity\ImpactContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImpactContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImpactContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImpactContent[]    findAll()
 * @method ImpactContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImpactContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImpactContent::class);
    }

//    /**
//     * @return ImpactTop[] Returns an array of ImpactTop objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImpactTop
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
