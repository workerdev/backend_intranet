<?php

namespace App\Repository;

use App\Entity\RegistroMejora;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RegistroMejora|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistroMejora|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistroMejora[]    findAll()
 * @method RegistroMejora[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistroMejoraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RegistroMejora::class);
    }

//    /**
//     * @return RegistroMejora[] Returns an array of RegistroMejora objects
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
    public function findOneBySomeField($value): ?RegistroMejora
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
