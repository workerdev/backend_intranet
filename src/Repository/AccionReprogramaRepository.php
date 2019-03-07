<?php

namespace App\Repository;

use App\Entity\AccionReprograma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccionReprograma|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccionReprograma|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccionReprograma[]    findAll()
 * @method AccionReprograma[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccionReprogramaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccionReprograma::class);
    }

//    /**
//     * @return AccionReprograma[] Returns an array of AccionReprograma objects
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
    public function findOneBySomeField($value): ?AccionReprograma
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
