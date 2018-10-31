<?php

namespace App\Repository;

use App\Entity\CommunityFocus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommunityFocus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommunityFocus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommunityFocus[]    findAll()
 * @method CommunityFocus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommunityFocusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommunityFocus::class);
    }

//    /**
//     * @return CommunityFocus[] Returns an array of CommunityFocus objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommunityFocus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
