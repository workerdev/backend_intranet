<?php

namespace App\Repository;

use App\Entity\TipoAuditoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoAuditoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoAuditoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoAuditoria[]    findAll()
 * @method TipoAuditoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoAuditoriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoAuditoria::class);
    }

//    /**
//     * @return TipoAuditoria[] Returns an array of TipoAuditoria objects
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
    public function findOneBySomeField($value): ?TipoAuditoria
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
