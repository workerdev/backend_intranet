<?php

namespace App\Repository;

use App\Entity\DocTipoExtra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocTipoExtra|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocTipoExtra|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocTipoExtra[]    findAll()
 * @method DocTipoExtra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocTipoExtraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocTipoExtra::class);
    }

//    /**
//     * @return DocTipoExtra[] Returns an array of DocTipoExtra objects
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
    public function findOneBySomeField($value): ?DocTipoExtra
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
