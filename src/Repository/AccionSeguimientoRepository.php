<?php

namespace App\Repository;

use App\Entity\AccionSeguimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccionSeguimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccionSeguimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccionSeguimiento[]    findAll()
 * @method AccionSeguimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccionSeguimientoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccionSeguimiento::class);
    }

//    /**
//     * @return AccionSeguimiento[] Returns an array of AccionSeguimiento objects
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
    public function findOneBySomeField($value): ?AccionSeguimiento
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
