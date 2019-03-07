<?php

namespace App\Repository;

use App\Entity\EstadoPersonal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoPersonal|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoPersonal|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoPersonal[]    findAll()
 * @method EstadoPersonal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoPersonalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoPersonal::class);
    }

//    /**
//     * @return EstadoPersonal[] Returns an array of EstadoPersonal objects
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
    public function findOneBySomeField($value): ?EstadoPersonal
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
