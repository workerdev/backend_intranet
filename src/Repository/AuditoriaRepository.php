<?php

namespace App\Repository;

use App\Entity\Auditoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Auditoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auditoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auditoria[]    findAll()
 * @method Auditoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuditoriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Auditoria::class);
    }

    public function findManagement(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT DISTINCT(date_part('YEAR', cb_auditoria_fecharegistro)) AS gestion 
                FROM cb_aud_auditoria
                ORDER BY 1 ASC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

//  /**
//   * @return Auditoria[] Returns an array of Auditoria objects
//   */
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
    public function findOneBySomeField($value): ?Auditoria
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
