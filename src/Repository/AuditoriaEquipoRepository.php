<?php

namespace App\Repository;

use App\Entity\AuditoriaEquipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AuditoriaEquipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuditoriaEquipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuditoriaEquipo[]    findAll()
 * @method AuditoriaEquipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuditoriaEquipoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AuditoriaEquipo::class);
    }

//    /**
//     * @return AuditoriaEquipo[] Returns an array of AuditoriaEquipo objects
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
    public function findOneBySomeField($value): ?AuditoriaEquipo
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
