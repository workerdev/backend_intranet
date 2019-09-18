<?php

namespace App\Repository;

use App\Entity\TipoTurno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoTurno|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoTurno|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoTurno[]    findAll()
 * @method TipoTurno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoTurnoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoTurno::class);
    }

//    /**
//     * @return TipoTurno[] Returns an array of TipoTurno objects
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
    public function findOneBySomeField($value): ?TipoTurno
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
