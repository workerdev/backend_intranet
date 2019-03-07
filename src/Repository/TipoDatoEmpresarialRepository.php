<?php

namespace App\Repository;

use App\Entity\TipoDatoEmpresarial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoDatoEmpresarial|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoDatoEmpresarial|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoDatoEmpresarial[]    findAll()
 * @method TipoDatoEmpresarial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoDatoEmpresarialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoDatoEmpresarial::class);
    }

//    /**
//     * @return TipoDatoEmpresarial[] Returns an array of TipoDatoEmpresarial objects
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
    public function findOneBySomeField($value): ?TipoDatoEmpresarial
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
