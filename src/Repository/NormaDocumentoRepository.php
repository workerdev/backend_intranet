<?php

namespace App\Repository;

use App\Entity\NormaDocumento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NormaDocumento|null find($id, $lockMode = null, $lockVersion = null)
 * @method NormaDocumento|null findOneBy(array $criteria, array $orderBy = null)
 * @method NormaDocumento[]    findAll()
 * @method NormaDocumento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NormaDocumentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NormaDocumento::class);
    }

//    /**
//     * @return NormaDocumento[] Returns an array of NormaDocumento objects
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
    public function findOneBySomeField($value): ?NormaDocumento
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
