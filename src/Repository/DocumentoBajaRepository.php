<?php

namespace App\Repository;

use App\Entity\DocumentoBaja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentoBaja|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoBaja|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoBaja[]    findAll()
 * @method DocumentoBaja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoBajaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentoBaja::class);
    }

//    /**
//     * @return DocumentoBaja[] Returns an array of DocumentoBaja objects
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
    public function findOneBySomeField($value): ?DocumentoBaja
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
