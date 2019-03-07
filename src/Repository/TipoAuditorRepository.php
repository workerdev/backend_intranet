<?php

namespace App\Repository;

use App\Entity\TipoAuditor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoAuditor|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoAuditor|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoAuditor[]    findAll()
 * @method TipoAuditor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoAuditorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoAuditor::class);
    }

//    /**
//     * @return TipoAuditor[] Returns an array of TipoAuditor objects
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
    public function findOneBySomeField($value): ?TipoAuditor
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
