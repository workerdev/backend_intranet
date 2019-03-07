<?php

namespace App\Repository;

use App\Entity\FichaProcesos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FichaProcesos|null find($id, $lockMode = null, $lockVersion = null)
 * @method FichaProcesos|null findOneBy(array $criteria, array $orderBy = null)
 * @method FichaProcesos[]    findAll()
 * @method FichaProcesos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichaProcesosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FichaProcesos::class);
    }

//    /**
//     * @return FichaProcesos[] Returns an array of FichaProcesos objects
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
    public function findOneBySomeField($value): ?FichaProcesos
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
