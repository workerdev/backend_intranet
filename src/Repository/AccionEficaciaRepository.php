<?php

namespace App\Repository;

use App\Entity\AccionEficacia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccionEficacia|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccionEficacia|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccionEficacia[]    findAll()
 * @method AccionEficacia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccionEficaciaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccionEficacia::class);
    }

//    /**
//     * @return AccionEficacia[] Returns an array of AccionEficacia objects
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
    public function findOneBySomeField($value): ?AccionEficacia
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
