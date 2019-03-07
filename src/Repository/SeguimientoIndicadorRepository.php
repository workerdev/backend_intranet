<?php

namespace App\Repository;

use App\Entity\SeguimientoIndicador;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeguimientoIndicador|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeguimientoIndicador|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeguimientoIndicador[]    findAll()
 * @method SeguimientoIndicador[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeguimientoIndicadorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeguimientoIndicador::class);
    }

//    /**
//     * @return SeguimientoIndicador[] Returns an array of SeguimientoIndicador objects
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
    public function findOneBySomeField($value): ?SeguimientoIndicador
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
