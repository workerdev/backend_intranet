<?php

namespace App\Repository;

use App\Entity\SeguimientoMejora;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeguimientoMejora|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeguimientoMejora|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeguimientoMejora[]    findAll()
 * @method SeguimientoMejora[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeguimientoMejoraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeguimientoMejora::class);
    }

//    /**
//     * @return SeguimientoMejora[] Returns an array of SeguimientoMejora objects
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
    public function findOneBySomeField($value): ?SeguimientoMejora
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
