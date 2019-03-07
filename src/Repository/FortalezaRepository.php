<?php

namespace App\Repository;

use App\Entity\Fortaleza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fortaleza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fortaleza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fortaleza[]    findAll()
 * @method Fortaleza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FortalezaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fortaleza::class);
    }

//    /**
//     * @return Fortaleza[] Returns an array of Fortaleza objects
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
    public function findOneBySomeField($value): ?Fortaleza
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
