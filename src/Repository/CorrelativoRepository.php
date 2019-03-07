<?php

namespace App\Repository;

use App\Entity\Correlativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Correlativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Correlativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Correlativo[]    findAll()
 * @method Correlativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrelativoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Correlativo::class);
    }

//    /**
//     * @return Correlativo[] Returns an array of Correlativo objects
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
    public function findOneBySomeField($value): ?Correlativo
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
