<?php

namespace App\Repository;

use App\Entity\GerenciaAreaSector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GerenciaAreaSector|null find($id, $lockMode = null, $lockVersion = null)
 * @method GerenciaAreaSector|null findOneBy(array $criteria, array $orderBy = null)
 * @method GerenciaAreaSector[]    findAll()
 * @method GerenciaAreaSector[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GerenciaAreaSectorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GerenciaAreaSector::class);
    }

//    /**
//     * @return GerenciaAreaSector[] Returns an array of GerenciaAreaSector objects
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
    public function findOneBySomeField($value): ?GerenciaAreaSector
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
