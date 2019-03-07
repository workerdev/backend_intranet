<?php

namespace App\Repository;

use App\Entity\FichaCargo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FichaCargo|null find($id, $lockMode = null, $lockVersion = null)
 * @method FichaCargo|null findOneBy(array $criteria, array $orderBy = null)
 * @method FichaCargo[]    findAll()
 * @method FichaCargo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichaCargoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FichaCargo::class);
    }

//    /**
//     * @return FichaCargo[] Returns an array of FichaCargo objects
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
    public function findOneBySomeField($value): ?FichaCargo
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
