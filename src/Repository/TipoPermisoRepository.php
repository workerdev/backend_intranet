<?php

namespace App\Repository;

use App\Entity\TipoPermiso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoPermiso|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoPermiso|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoPermiso[]    findAll()
 * @method TipoPermiso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoPermisoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoPermiso::class);
    }

//    /**
//     * @return TipoPermiso[] Returns an array of TipoPermiso objects
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
    public function findOneBySomeField($value): ?TipoPermiso
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
