<?php

namespace App\Repository;

use App\Entity\DocumentoExtra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentoExtra|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoExtra|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoExtra[]    findAll()
 * @method DocumentoExtra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoExtraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentoExtra::class);
    }

//    /**
//     * @return DocumentoExtra[] Returns an array of DocumentoExtra objects
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
    public function findOneBySomeField($value): ?DocumentoExtra
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
