<?php

namespace App\Repository;

use App\Entity\Accion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accion[]    findAll()
 * @method Accion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accion::class);
    }

//    /**
//     * @return Accion[] Returns an array of Accion objects
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
    public function findOneBySomeField($value): ?Accion
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
