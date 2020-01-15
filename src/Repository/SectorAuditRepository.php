<?php

namespace App\Repository;

use App\Entity\SectorAudit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SectorAudit|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectorAudit|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectorAudit[]    findAll()
 * @method SectorAudit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectorAuditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectorAudit::class);
    }

    // /**
    //  * @return SectorAudit[] Returns an array of SectorAudit objects
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
    public function findOneBySomeField($value): ?SectorAudit
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
