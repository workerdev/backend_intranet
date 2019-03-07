<?php

namespace App\Repository;

use App\Entity\Probabilidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Probabilidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Probabilidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Probabilidad[]    findAll()
 * @method Probabilidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProbabilidadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Probabilidad::class);
    }

//    /**
//     * @return Probabilidad[] Returns an array of Probabilidad objects
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
    public function findOneBySomeField($value): ?Probabilidad
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
