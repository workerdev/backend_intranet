<?php

namespace App\Repository;

use App\Entity\SeguimientoPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeguimientoPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeguimientoPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeguimientoPlan[]    findAll()
 * @method SeguimientoPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeguimientoPlanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeguimientoPlan::class);
    }

//    /**
//     * @return SeguimientoPlan[] Returns an array of SeguimientoPlan objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SeguimientoPlan
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
