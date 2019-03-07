<?php

namespace App\Repository;

use App\Entity\ControlCorrelativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ControlCorrelativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ControlCorrelativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ControlCorrelativo[]    findAll()
 * @method ControlCorrelativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ControlCorrelativoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ControlCorrelativo::class);
    }

//    /**
//     * @return ControlCorrelativo[] Returns an array of ControlCorrelativo objects
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
    public function findOneBySomeField($value): ?ControlCorrelativo
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
