<?php

namespace App\Repository;

use App\Entity\VolunteerContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VolunteerContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method VolunteerContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method VolunteerContent[]    findAll()
 * @method VolunteerContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolunteerContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VolunteerContent::class);
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
