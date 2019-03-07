<?php

namespace App\Repository;

use App\Entity\Auditor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Auditor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auditor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auditor[]    findAll()
 * @method Auditor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuditorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Auditor::class);
    }

//    /**
//     * @return Auditor[] Returns an array of Auditor objects
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
    public function findOneBySomeField($value): ?Auditor
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
