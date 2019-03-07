<?php

namespace App\Repository;

use App\Entity\NoticiaCategoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NoticiaCategoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoticiaCategoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoticiaCategoria[]    findAll()
 * @method NoticiaCategoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiaCategoriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NoticiaCategoria::class);
    }

//    /**
//     * @return NoticiaCategoria[] Returns an array of NoticiaCategoria objects
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
    public function findOneBySomeField($value): ?NoticiaCategoria
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
