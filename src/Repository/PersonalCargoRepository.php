<?php

namespace App\Repository;

use App\Entity\PersonalCargo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PersonalCargo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalCargo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalCargo[]    findAll()
 * @method PersonalCargo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalCargoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PersonalCargo::class);
    }

//    /**
//     * @return ProcesosCargo[] Returns an array of ProcesosCargo objects
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
    public function findOneBySomeField($value): ?ProcesosCargo
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
