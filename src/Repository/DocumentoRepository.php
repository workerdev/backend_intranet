<?php

namespace App\Repository;

use App\Entity\Documento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Documento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Documento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Documento[]    findAll()
 * @method Documento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Documento::class);
    }

    public function findDocByProc($idproc): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT cb_documento_codigo AS codigo, cb_documento_titulo AS titulo, cb_documento_fktipo AS fktipo, cb_tipo_documento_nombre AS tipo, cb_documento_fkficha AS fkficha
                FROM cb_gestion_documento, cb_gestion_tipo_documento
                WHERE cb_documento_fkficha=:idf AND cb_documento_estado=1 AND cb_documento_fktipo=cb_tipo_documento_id AND cb_tipo_documento_nombre='Procedimiento'
                ORDER BY 1 ASC";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['idf'=> $idproc]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function filterDocByProc($idproc): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT d.cb_documento_id AS id, d.cb_documento_codigo AS codigo, d.cb_documento_titulo AS titulo, d.cb_documento_fktipo
                FROM cb_gestion_documento d, cb_gestion_tipo_documento t
                WHERE d.cb_documento_estado=1 AND d.cb_documento_fktipo=t.cb_tipo_documento_id AND t.cb_tipo_documento_nombre='Procedimiento' AND
                    d.cb_documento_id NOT IN 
                        (SELECT cb_documento_id
                        FROM cb_gestion_documento, cb_gestion_tipo_documento
                        WHERE cb_documento_fkficha=:idf AND cb_documento_estado=1 AND cb_documento_fktipo=cb_tipo_documento_id AND cb_tipo_documento_nombre='Procedimiento')
                ORDER BY 1 ASC";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['idf'=> $idproc]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

//    /**
//     * @return Documento[] Returns an array of Documento objects
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
    public function findOneBySomeField($value): ?Documento
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllDoc(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT tb.*
        FROM(SELECT cb_documento_id AS id, cb_tipo_documento_nombre AS tipo, cb_area_nombre AS area, cb_documento_codigo AS codigo, cb_documento_titulo AS titulo, cb_documento_versionvigente AS version, cb_documento_vinculoarchivodig AS vinculo, cb_documento_fechapublicacion AS fecha
            FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area
            WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND 
            cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_documento_estado=1
            UNION
            SELECT cb_documento_formulario_id AS id, \'Formulario\' AS tipo, cb_area_nombre AS area, cb_documento_formulario_codigo AS codigo, 
            cb_documento_formulario_titulo AS titulo, cb_documento_formulario_versionvigente AS version, 
            cb_documento_formulario_vinculofiledig AS vinculo, cb_documento_formulario_fechapublicacion AS fecha
            FROM cb_gest_doc_formulario, cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area
            WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND 
            cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1
            UNION
            SELECT cb_bajadocumento_id AS id, \'Baja\' AS tipo, cb_area_nombre AS area, cb_bajadocumento_codigo AS codigo, 
            cb_bajadocumento_titulo AS titulo, cb_bajadocumento_versionvigente AS version, 
            cb_bajadocumento_vinculoarchivo AS vinculo, cb_bajadocumento_fechapublicacion AS fecha
            FROM cb_gest_bajadocumento, cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area
            WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND 
            cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_bajadocumento_estado=1)as tb
        ORDER BY 8 DESC;
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    /*public function findAllDoc(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT tb.*
        FROM(SELECT cb_documento_id AS id, cb_tipo_documento_nombre AS tipo, cb_area_nombre AS area, cb_documento_codigo AS codigo, cb_documento_titulo AS titulo, 
            cb_documento_versionvigente AS version, cb_documento_vinculoarchivodig AS vinculo, cb_documento_fechapublicacion AS fecha
        FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area
        WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND 
            cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_documento_estado=1
        UNION
        SELECT cb_documento_formulario_id AS id, \'Formulario\' AS tipo, cb_area_nombre AS area, cb_documento_formulario_codigo AS codigo, 
            cb_documento_formulario_titulo AS titulo, cb_documento_formulario_versionvigente AS version, 
            cb_documento_formulario_vinculofiledig AS vinculo, cb_documento_formulario_fechapublicacion AS fecha
        FROM cb_gest_doc_formulario, cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area
        WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND 
            cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1)as tb
        ORDER BY 8 DESC
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }*/
}
