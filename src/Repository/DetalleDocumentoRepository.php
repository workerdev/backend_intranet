<?php

namespace App\Repository;

use App\Entity\DetalleDocumento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetalleDocumento|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleDocumento|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleDocumento[]    findAll()
 * @method DetalleDocumento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleDocumentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetalleDocumento::class);
    }

//    /**
//     * @return DetalleDocumento[] Returns an array of DetalleDocumento objects
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
    public function findOneBySomeField($value): ?DetalleDocumento
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
