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
            WHERE c.fkunidad IN
            (SELECT DISTINCT(p.fkunidad)
            FROM App\Entity\Permiso p, App\Entity\Usuario u, App\Entity\Unidad n
            WHERE p.fkunidad=n.id AND p.fkusuario=u.id
            AND u.id=:idu AND p.tipo IN (\'Visualizar\', \'Completo\'))
            ORDER BY c.id DESC'
        )->setParameter('idu', $idu);
        
        return $query->execute(); // returns an array of Correltivo objects
    }
    
    public function findPermissionByUser($user): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c FROM App\Entity\Correlativo c
            WHERE c.fkunidad IN
            (SELECT DISTINCT(p.fkunidad)
            FROM App\Entity\Permiso p, App\Entity\Usuario u, App\Entity\Unidad n
            WHERE p.fkunidad=n.id AND p.fkusuario=u.id
            AND u.username=:username AND p.estado=1 and p.tipo IN (\'Visualizar\', \'Completo\'))
            and c.estado=1
            ORDER BY c.id DESC'
        )->setParameter('username', $user);
        
        return $query->execute(); // returns an array of Correltivo objects
    }
    public function findPermissionByUser3($user,$gestion): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c FROM App\Entity\Correlativo c
            WHERE c.fkunidad IN
            (SELECT DISTINCT(p.fkunidad)
            FROM App\Entity\Permiso p, App\Entity\Usuario u, App\Entity\Unidad n
            WHERE p.fkunidad=n.id AND p.fkusuario=u.id
            AND u.username=:username and p.estado=1 and p.tipo IN (\'Visualizar\', \'Completo\'))
            and c.estado=1
            ORDER BY c.id DESC'
        )->setParameter('username', $user,'gestion', $gestion );
        
        return $query->execute(); // returns an array of Correltivo objects
    }

    public function findPermissionByUser2($user,$gestion): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT c.* FROM cb_correlativo_correlativo c
        WHERE c.cb_correlativo_fkunidad IN
        (SELECT DISTINCT(p.cb_permiso_fkunidad)
        FROM cb_correlativo_permiso p, cb_usuario_usuario u, cb_correlativo_unidad n
        WHERE p.cb_permiso_fkunidad=n.cb_unidad_id AND p.cb_permiso_fkusuario=u.cb_usuario_id
        AND u.cb_usuario_username=:username AND p.cb_permiso_estado=1 and p.cb_permiso_tipo IN (\'Visualizar\', \'Completo\'))
        and c.cb_correlativo_estado=1
        and date_part(\'Year\', cb_correlativo_fechareg) =:gestion
        ORDER BY c.cb_correlativo_id DESC

        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $user,'gestion' => $gestion]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findPermissionByUserjccg($idu): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT c.*
        FROM cb_correlativo_correlativo c
        WHERE c.cb_correlativo_fkunidad IN
        ( SELECT cb_correlativo_unidad.cb_unidad_id
        FROM cb_correlativo_permiso, cb_usuario_usuario, cb_correlativo_unidad
        WHERE cb_permiso_fkunidad=cb_unidad_id AND cb_permiso_fkusuario=cb_usuario_id
        AND cb_unidad_estado=1 
        AND cb_usuario_username=:username 
        AND cb_permiso_estado=1 AND cb_permiso_tipo IN (\'Crear\', \'Completo\'))
            and c.cb_correlativo_estado=1
            ORDER BY c.cb_correlativo_id DESC

        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $idu]);

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
