<?php

namespace App\Repository;

use App\Entity\EstadoNovedad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoNovedad|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoNovedad|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoNovedad[]    findAll()
 * @method EstadoNovedad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoNovedadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoNovedad::class);
    }

//    /**
//     * @return EstadoNovedad[] Returns an array of EstadoNovedad objects
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
    public function findOneBySomeField($value): ?EstadoNovedad
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
