<?php

namespace App\Repository;

use App\Entity\DocumentoAdicional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentoAdicional|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoAdicional|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoAdicional[]    findAll()
 * @method DocumentoAdicional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoAdicionalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentoAdicional::class);
    }

//    /**
//     * @return DocumentoAdicional[] Returns an array of DocumentoAdicional objects
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
    public function findOneBySomeField($value): ?DocumentoAdicional
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
