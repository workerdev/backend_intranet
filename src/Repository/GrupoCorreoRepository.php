<?php

namespace App\Repository;

use App\Entity\GrupoCorreo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GrupoCorreo|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrupoCorreo|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrupoCorreo[]    findAll()
 * @method GrupoCorreo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrupoCorreoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GrupoCorreo::class);
    }

//    /**
//     * @return GrupoCorreo[] Returns an array of GrupoCorreo objects
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
    public function findOneBySomeField($value): ?GrupoCorreo
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
