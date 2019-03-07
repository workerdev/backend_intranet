<?php

namespace App\Repository;

use App\Entity\Mision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mision|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mision|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mision[]    findAll()
 * @method Mision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MisionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mision::class);
    }

//    /**
//     * @return Mision[] Returns an array of Mision objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mision
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
