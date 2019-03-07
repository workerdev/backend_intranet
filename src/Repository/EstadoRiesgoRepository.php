<?php

namespace App\Repository;

use App\Entity\EstadoRiesgo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoRiesgo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoRiesgo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoRiesgo[]    findAll()
 * @method EstadoRiesgo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoRiesgoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoRiesgo::class);
    }

//    /**
//     * @return EstadoRiesgo[] Returns an array of EstadoRiesgo objects
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
    public function findOneBySomeField($value): ?EstadoRiesgo
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
