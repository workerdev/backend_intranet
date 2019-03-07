<?php

namespace App\Repository;

use App\Entity\TipoCargo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoCargo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCargo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCargo[]    findAll()
 * @method TipoCargo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoCargoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoCargo::class);
    }

//    /**
//     * @return TipoCargo[] Returns an array of TipoCargo objects
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
    public function findOneBySomeField($value): ?TipoCargo
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
