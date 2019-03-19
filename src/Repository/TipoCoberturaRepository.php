<?php

namespace App\Repository;

use App\Entity\TipoCobertura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoCobertura|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCobertura|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCobertura[]    findAll()
 * @method TipoCobertura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoCoberturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoCobertura::class);
    }

//    /**
//     * @return TipoCobertura[] Returns an array of TipoCobertura objects
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
    public function findOneBySomeField($value): ?TipoCobertura
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