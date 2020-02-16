<?php

namespace App\Repository;

use App\Entity\Accion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accion[]    findAll()
 * @method Accion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accion::class);
    }

    
    public function findActionsBefore($fecha): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT cb_accion_id AS id, cb_accion_fkhallazgo AS hallazgo, cb_accion_ordinal AS ordinal, cb_accion_descripcion AS descripcion, 
                    cb_accion_fechaimplementacion AS fechaimplementacion, cb_accion_responsableimplementacion AS responsableimplementacion, 
                    cb_accion_estadoaccion AS estadoaccion, cb_accion_responsableregistro AS responsableregistro, cb_accion_fecharegistro AS fecharegistro, 
                    cb_accion_estado AS estado, cb_accion_fktipo AS fktipo, (cb_accion_fechaimplementacion - INTERVAL \'7 day\')::timestamp::date AS date_b7d
                FROM cb_aud_accion
                WHERE cb_accion_estado=1 AND cb_accion_estadoaccion=\'Pendiente\' AND (cb_accion_fechaimplementacion - INTERVAL \'7 day\')::timestamp::date=:fecha
                ORDER BY 8, 5, 1';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['fecha' => $fecha]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
    
    public function findActionsAfter($fecha): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT cb_accion_id AS id, cb_accion_fkhallazgo AS hallazgo, cb_accion_ordinal AS ordinal, cb_accion_descripcion AS descripcion, 
                    cb_accion_fechaimplementacion AS fechaimplementacion, cb_accion_responsableimplementacion AS responsableimplementacion, 
                    cb_accion_estadoaccion AS estadoaccion, cb_accion_responsableregistro AS responsableregistro, cb_accion_fecharegistro AS fecharegistro, 
                    cb_accion_estado AS estado, cb_accion_fktipo AS fktipo, (cb_accion_fechaimplementacion + INTERVAL \'1 day\')::timestamp::date AS date_out
                FROM cb_aud_accion
                WHERE cb_accion_estado=1 AND cb_accion_estadoaccion=\'Pendiente\' AND (cb_accion_fechaimplementacion + INTERVAL \'1 day\')::timestamp::date=:fecha
                ORDER BY 8, 5, 1';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['fecha' => $fecha]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }


//    /**
//     * @return Accion[] Returns an array of Accion objects
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
    public function findOneBySomeField($value): ?Accion
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
