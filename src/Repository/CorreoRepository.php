<?php

namespace App\Repository;

use App\Entity\Correo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Correo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Correo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Correo[]    findAll()
 * @method Correo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorreoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Correo::class);
    }

//    /**
//     * @return Correo[] Returns an array of Correo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Correo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
