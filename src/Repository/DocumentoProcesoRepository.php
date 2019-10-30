<?php

namespace App\Repository;

use App\Entity\DocumentoProceso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentoProceso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoProceso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoProceso[]    findAll()
 * @method DocumentoProceso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoProcesoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentoProceso::class);
    }

    public function findAllRev(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT d
            FROM App\Entity\DocumentoProceso d
            WHERE d.estado = 1 AND d.aprobadorechazado != \'\' AND d.aprobadorechazado IS NOT NULL
            ORDER BY d.fechaaprobacion DESC'
        );

        // returns an array of Product objects
        return $query->getResult();
    }

//    /**
//     * @return DocumentoProceso[] Returns an array of DocumentoProceso objects
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
    public function findOneBySomeField($value): ?DocumentoProceso
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
