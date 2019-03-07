<?php

namespace App\Repository;

use App\Entity\EstadoPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoPlan[]    findAll()
 * @method EstadoPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoPlanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoPlan::class);
    }

//    /**
//     * @return EstadoPlan[] Returns an array of EstadoPlan objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstadoPlan
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
