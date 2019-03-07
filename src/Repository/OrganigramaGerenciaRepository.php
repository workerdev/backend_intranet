<?php

namespace App\Repository;

use App\Entity\OrganigramaGerencia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrganigramaGerencia|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganigramaGerencia|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganigramaGerencia[]    findAll()
 * @method OrganigramaGerencia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganigramaGerenciaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrganigramaGerencia::class);
    }

//    /**
//     * @return OrganigramaGerencia[] Returns an array of OrganigramaGerencia objects
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
    public function findOneBySomeField($value): ?OrganigramaGerencia
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
