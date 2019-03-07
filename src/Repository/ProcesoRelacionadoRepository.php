<?php

namespace App\Repository;

use App\Entity\ProcesoRelacionado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProcesoRelacionado|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProcesoRelacionado|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProcesoRelacionado[]    findAll()
 * @method ProcesoRelacionado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcesoRelacionadoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProcesoRelacionado::class);
    }

//    /**
//     * @return ProcesoRelacionado[] Returns an array of ProcesoRelacionado objects
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
    public function findOneBySomeField($value): ?ProcesoRelacionado
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
