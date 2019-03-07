<?php

namespace App\Repository;

use App\Entity\EstadoDocumento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoDocumento|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoDocumento|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoDocumento[]    findAll()
 * @method EstadoDocumento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoDocumentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoDocumento::class);
    }

//    /**
//     * @return EstadoDocumento[] Returns an array of EstadoDocumento objects
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
    public function findOneBySomeField($value): ?EstadoDocumento
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
