<?php

namespace App\Repository;

use App\Entity\TipoNota;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoNota|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoNota|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoNota[]    findAll()
 * @method TipoNota[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoNotaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoNota::class);
    }

//    /**
//     * @return TipoNota[] Returns an array of TipoNota objects
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
    public function findOneBySomeField($value): ?TipoNota
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
