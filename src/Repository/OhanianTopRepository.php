<?php

namespace App\Repository;

use App\Entity\OhanianTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OhanianTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method OhanianTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method OhanianTop[]    findAll()
 * @method OhanianTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OhanianTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OhanianTop::class);
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
