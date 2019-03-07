<?php

namespace App\Repository;

use App\Entity\DatoEmpresarial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DatoEmpresarial|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatoEmpresarial|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatoEmpresarial[]    findAll()
 * @method DatoEmpresarial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatoEmpresarialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DatoEmpresarial::class);
    }

//    /**
//     * @return DatoEmpresarial[] Returns an array of DatoEmpresarial objects
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
    public function findOneBySomeField($value): ?DatoEmpresarial
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
