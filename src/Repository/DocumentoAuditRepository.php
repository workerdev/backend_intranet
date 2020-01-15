<?php

namespace App\Repository;

use App\Entity\DocumentoAudit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DocumentoAudit|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoAudit|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoAudit[]    findAll()
 * @method DocumentoAudit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoAuditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentoAudit::class);
    }

    // /**
    //  * @return DocumentoAudit[] Returns an array of DocumentoAudit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentoAudit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}