<?php

namespace App\Repository;

use App\Entity\TipoCRO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoCRO|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCRO|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCRO[]    findAll()
 * @method TipoCRO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoCRORepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoCRO::class);
    }

//    /**
//     * @return TipoCRO[] Returns an array of TipoCRO objects
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
    public function findOneBySomeField($value): ?TipoCRO
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
