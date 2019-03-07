<?php

namespace App\Repository;

use App\Entity\EstadoCorrelativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoCorrelativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoCorrelativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoCorrelativo[]    findAll()
 * @method EstadoCorrelativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoCorrelativoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoCorrelativo::class);
    }

//    /**
//     * @return EstadoCorrelativo[] Returns an array of EstadoCorrelativo objects
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
    public function findOneBySomeField($value): ?EstadoCorrelativo
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
