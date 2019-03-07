<?php

namespace App\Repository;

use App\Entity\DocumentosAso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentosAso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentosAso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentosAso[]    findAll()
 * @method DocumentosAso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentosAsoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentosAso::class);
    }

//    /**
//     * @return DocumentosAso[] Returns an array of DocumentosAso objects
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
    public function findOneBySomeField($value): ?DocumentosAso
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
