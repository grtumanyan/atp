<?php

namespace App\Repository;

use App\Entity\OhanianTopContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OhanianTopContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method OhanianTopContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method OhanianTopContent[]    findAll()
 * @method OhanianTopContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OhanianTopContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OhanianTopContent::class);
    }

//    /**
//     * @return EconomicContent[] Returns an array of EconomicContent objects
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
    public function findOneBySomeField($value): ?EconomicContent
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
