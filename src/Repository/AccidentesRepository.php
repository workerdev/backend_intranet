<?php

namespace App\Repository;

use App\Entity\Accidentes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accidentes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accidentes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accidentes[]    findAll()
 * @method Accidentes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccidentesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accidentes::class);
    }

    /**
     * @return Accidentes[]
     */
    public function obtenerAccidentes(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.estado = 1')
            ->orderBy('a.Fechafin', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

//    /**
//     * @return Accidentes[] Returns an array of Accidentes objects
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
    public function findOneBySomeField($value): ?Accidentes
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
