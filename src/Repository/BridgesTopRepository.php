<?php

namespace App\Repository;

use App\Entity\BridgesTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BridgesTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method BridgesTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method BridgesTop[]    findAll()
 * @method BridgesTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BridgesTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BridgesTop::class);
    }

//    /**
//     * @return EconomicTop[] Returns an array of EconomicTop objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EconomicTop
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
