<?php

namespace App\Repository;

use App\Entity\PlanAccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlanAccion|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanAccion|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanAccion[]    findAll()
 * @method PlanAccion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanAccionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlanAccion::class);
    }

//    /**
//     * @return PlanAccion[] Returns an array of PlanAccion objects
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
    public function findOneBySomeField($value): ?PlanAccion
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
