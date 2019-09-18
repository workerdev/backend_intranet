<?php

namespace App\Repository;

use App\Entity\DelegacionAutoridad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DelegacionAutoridad|null find($id, $lockMode = null, $lockVersion = null)
 * @method DelegacionAutoridad|null findOneBy(array $criteria, array $orderBy = null)
 * @method DelegacionAutoridad[]    findAll()
 * @method DelegacionAutoridad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DelegacionAutoridadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DelegacionAutoridad::class);
    }

//    /**
//     * @return DelegacionAutoridad[] Returns an array of DelegacionAutoridad objects
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
    public function findOneBySomeField($value): ?DelegacionAutoridad
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
