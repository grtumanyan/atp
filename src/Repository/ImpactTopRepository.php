<?php

namespace App\Repository;

use App\Entity\ImpactTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImpactTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImpactTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImpactTop[]    findAll()
 * @method ImpactTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImpactTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImpactTop::class);
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
