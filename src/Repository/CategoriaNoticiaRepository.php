<?php

namespace App\Repository;

use App\Entity\CategoriaNoticia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoriaNoticia|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriaNoticia|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriaNoticia[]    findAll()
 * @method CategoriaNoticia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriaNoticiaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoriaNoticia::class);
    }
    
//    /**
//     * @return CategoriaNoticia[] Returns an array of CategoriaNoticia objects
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
    public function findOneBySomeField($value): ?CategoriaNoticia
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
