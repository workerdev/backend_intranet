<?php

namespace App\Repository;

use App\Entity\IndicadorProceso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IndicadorProceso|null find($id, $lockMode = null, $lockVersion = null)
 * @method IndicadorProceso|null findOneBy(array $criteria, array $orderBy = null)
 * @method IndicadorProceso[]    findAll()
 * @method IndicadorProceso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndicadorProcesoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IndicadorProceso::class);
    }

//    /**
//     * @return IndicadorProceso[] Returns an array of IndicadorProceso objects
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
    public function findOneBySomeField($value): ?IndicadorProceso
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
