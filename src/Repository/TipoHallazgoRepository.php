<?php

namespace App\Repository;

use App\Entity\TipoHallazgo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoHallazgo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoHallazgo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoHallazgo[]    findAll()
 * @method TipoHallazgo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoHallazgoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoHallazgo::class);
    }

//    /**
//     * @return TipoHallazgo[] Returns an array of TipoHallazgo objects
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
    public function findOneBySomeField($value): ?TipoHallazgo
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
