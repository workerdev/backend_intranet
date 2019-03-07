<?php

namespace App\Repository;

use App\Entity\EstadoSeguimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoSeguimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoSeguimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoSeguimiento[]    findAll()
 * @method EstadoSeguimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoSeguimientoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoSeguimiento::class);
    }

//    /**
//     * @return EstadoSeguimiento[] Returns an array of EstadoSeguimiento objects
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
    public function findOneBySomeField($value): ?EstadoSeguimiento
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
