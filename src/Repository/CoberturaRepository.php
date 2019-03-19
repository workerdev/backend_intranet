<?php

namespace App\Repository;

use App\Entity\Cobertura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cobertura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cobertura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cobertura[]    findAll()
 * @method Cobertura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoberturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cobertura::class);
    }

//    /**
//     * @return Cobertura[] Returns an array of Cobertura objects
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
    public function findOneBySomeField($value): ?Cobertura
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
