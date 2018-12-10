<?php

namespace App\Repository;

use App\Entity\EmpoweringTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmpoweringTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpoweringTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpoweringTop[]    findAll()
 * @method EmpoweringTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpoweringTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmpoweringTop::class);
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
