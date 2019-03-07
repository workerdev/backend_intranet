<?php

namespace App\Repository;

use App\Entity\Enlaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Enlaces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enlaces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enlaces[]    findAll()
 * @method Enlaces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnlacesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Enlaces::class);
    }

//    /**
//     * @return Enlaces[] Returns an array of Enlaces objects
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
    public function findOneBySomeField($value): ?Enlaces
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
