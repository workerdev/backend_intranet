<?php

namespace App\Repository;

use App\Entity\DocProcRevision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocProcRevision|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocProcRevision|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocProcRevision[]    findAll()
 * @method DocProcRevision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocProcRevisionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocProcRevision::class);
    }

//    /**
//     * @return DocProcRevision[] Returns an array of DocProcRevision objects
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
    public function findOneBySomeField($value): ?DocProcRevision
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
