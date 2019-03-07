<?php

namespace App\Repository;

use App\Entity\ResponsabilidadSocial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ResponsabilidadSocial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsabilidadSocial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsabilidadSocial[]    findAll()
 * @method ResponsabilidadSocial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsabilidadSocialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResponsabilidadSocial::class);
    }

//    /**
//     * @return ResponsabilidadSocial[] Returns an array of ResponsabilidadSocial objects
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
    public function findOneBySomeField($value): ?ResponsabilidadSocial
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
