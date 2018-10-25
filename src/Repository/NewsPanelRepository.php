<?php

namespace App\Repository;

use App\Entity\NewsPanel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NewsPanel|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsPanel|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsPanel[]    findAll()
 * @method NewsPanel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsPanelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NewsPanel::class);
    }

//    /**
//     * @return NewsPanel[] Returns an array of NewsPanel objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewsPanel
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
