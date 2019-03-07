<?php

namespace App\Repository;

use App\Entity\DocumentoFormulario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentoFormulario|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentoFormulario|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentoFormulario[]    findAll()
 * @method DocumentoFormulario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoFormularioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentoFormulario::class);
    }

//    /**
//     * @return DocumentoFormulario[] Returns an array of DocumentoFormulario objects
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
    public function findOneBySomeField($value): ?DocumentoFormulario
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
