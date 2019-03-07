<?php

namespace App\Repository;

use App\Entity\Hallazgo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hallazgo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hallazgo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hallazgo[]    findAll()
 * @method Hallazgo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HallazgoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hallazgo::class);
    }

//    /**
//     * @return Hallazgo[] Returns an array of Hallazgo objects
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
    public function findOneBySomeField($value): ?Hallazgo
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
