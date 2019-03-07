<?php

namespace App\Repository;

use App\Entity\Turno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Turno|null find($id, $lockMode = null, $lockVersion = null)
 * @method Turno|null findOneBy(array $criteria, array $orderBy = null)
 * @method Turno[]    findAll()
 * @method Turno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TurnoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Turno::class);
    }

//    /**
//     * @return Turno[] Returns an array of Turno objects
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
    public function findOneBySomeField($value): ?Turno
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
