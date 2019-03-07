<?php

namespace App\Repository;

use App\Entity\RiesgosOportunidades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RiesgosOportunidades|null find($id, $lockMode = null, $lockVersion = null)
 * @method RiesgosOportunidades|null findOneBy(array $criteria, array $orderBy = null)
 * @method RiesgosOportunidades[]    findAll()
 * @method RiesgosOportunidades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RiesgosOportunidadesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RiesgosOportunidades::class);
    }

//    /**
//     * @return RiesgosOportunidades[] Returns an array of RiesgosOportunidades objects
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
    public function findOneBySomeField($value): ?RiesgosOportunidades
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
