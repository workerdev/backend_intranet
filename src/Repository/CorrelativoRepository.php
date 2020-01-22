<?php

namespace App\Repository;

use App\Entity\Correlativo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Correlativo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Correlativo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Correlativo[]    findAll()
 * @method Correlativo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrelativoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Correlativo::class);
    }
    
    public function findByPermission($idu): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c FROM App\Entity\Correlativo c
            WHERE c.estado =1 AND c.fkunidad IN
            (SELECT DISTINCT(p.fkunidad)
            FROM App\Entity\Permiso p, App\Entity\Usuario u, App\Entity\Unidad n
            WHERE p.fkunidad=n.id AND p.fkusuario=u.id
            AND u.id=:idu AND p.estado=1 AND n.estado=1 AND p.tipo IN (\'Visualizar\', \'Completo\'))
            ORDER BY c.id DESC'
        )->setParameter('idu', $idu);
        
        return $query->execute(); // returns an array of Correltivo objects
    }
    
    public function findPermissionByUser($user, $anio): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT c.cb_correlativo_id AS id, c.cb_correlativo_fksolicitante AS fksolicitante, c.cb_correlativo_fkcorrelativo AS fkcorrelativo, c.cb_correlativo_fktiponota AS fktiponota, c.cb_correlativo_fkunidad AS fkunidad,
                    c.cb_correlativo_numcorrelativo AS numcorrelativo, c.cb_correlativo_fechareg AS fechareg, c.cb_correlativo_redactor AS redactor, c.cb_correlativo_destinatario AS destinatario, c.cb_correlativo_referencia AS referencia,
                    c.cb_correlativo_ip AS ip, c.cb_correlativo_url AS url, c.cb_correlativo_antecedente AS antecedente,
                    c.cb_correlativo_estadocorrelativo AS estadocorrelativo, c.cb_correlativo_item AS item,
                    c.cb_correlativo_urleditable AS urleditable, c.cb_correlativo_entrega AS entrega, c.cb_correlativo_urlorigen AS urlorigen, c.cb_correlativo_estado AS estado
                FROM cb_correlativo_correlativo c
                WHERE date_part(\'Year\', c.cb_correlativo_fechareg)=:anio AND c.cb_correlativo_fkunidad IN
                    (SELECT DISTINCT(p.cb_permiso_fkunidad)
                    FROM cb_correlativo_permiso p, cb_usuario_usuario u, cb_correlativo_unidad n
                    WHERE p.cb_permiso_fkunidad=n.cb_unidad_id AND p.cb_permiso_fkusuario=u.cb_usuario_id
                    AND u.cb_usuario_username=:username AND p.cb_permiso_estado=1 and p.cb_permiso_tipo IN (\'Visualizar\', \'Completo\'))
                    AND c.cb_correlativo_estado=1
                    ORDER BY c.cb_correlativo_id DESC';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $user, 'anio' => $anio]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
    
    public function findEditors(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT cb_correlativo_redactor AS redactor, COUNT(cb_correlativo_numcorrelativo) AS cant
                FROM cb_correlativo_correlativo
                WHERE cb_correlativo_estado=1 AND cb_correlativo_fechareg>=make_date(date_part(\'year\', NOW())::INTEGER, 1, 1)
                GROUP BY cb_correlativo_redactor
                ORDER BY 1';

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function filterByPermissions($idu): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT (cb_permiso_tipo || cb_unidad_nombre) AS permiso
        FROM cb_correlativo_permiso, cb_usuario_usuario, cb_correlativo_unidad
        WHERE cb_permiso_fkunidad=cb_unidad_id AND cb_permiso_fkusuario=cb_usuario_id
            AND cb_unidad_estado=1 AND cb_permiso_estado=1 AND cb_usuario_username=:username AND cb_permiso_tipo IN (\'Crear\', \'Completo\')
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $idu]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function filterByPermissionsid($idu): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT (cb_permiso_tipo || cb_unidad_nombre) AS permission
        FROM cb_correlativo_permiso, cb_usuario_usuario, cb_correlativo_unidad
        WHERE cb_permiso_fkunidad=cb_unidad_id AND cb_permiso_fkusuario=cb_usuario_id
            AND cb_unidad_estado=1 AND cb_permiso_estado=1 AND cb_usuario_id=:id AND cb_permiso_tipo IN (\'Crear\', \'Completo\')
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $idu]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
    
    public function filterPermissionsByIdu($idu): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT cb_unidad_id AS idund, cb_unidad_nombre AS unidad, cb_permiso_tipo AS permiso
        FROM cb_correlativo_permiso, cb_usuario_usuario, cb_correlativo_unidad
        WHERE cb_permiso_fkunidad=cb_unidad_id AND cb_permiso_fkusuario=cb_usuario_id
            AND cb_unidad_estado=1 AND cb_permiso_estado=1 AND cb_usuario_id=:id AND cb_permiso_tipo IN (\'Visualizar\', \'Completo\')';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $idu]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }


//    /**
//     * @return Correlativo[] Returns an array of Correlativo objects
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
    public function findOneBySomeField($value): ?Correlativo
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
