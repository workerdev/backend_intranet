<?php

namespace App\Repository;

use App\Entity\Unidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Unidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Unidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Unidad[]    findAll()
 * @method Unidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnidadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Unidad::class);
    }

    public function unidadByPermission($idu): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT DISTINCT(cb_correlativo_unidad.*)
        FROM cb_correlativo_permiso, cb_usuario_usuario, cb_correlativo_unidad
        WHERE cb_permiso_fkunidad=cb_unidad_id AND cb_permiso_fkusuario=cb_usuario_id
        AND cb_unidad_estado=1 AND cb_usuario_username=:id AND cb_permiso_estado=1 AND cb_permiso_tipo IN (\'Crear\', \'Completo\')
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $idu]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
    
    public function unitByPermission($idu): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT n 
            FROM App\Entity\Unidad n, App\Entity\Usuario u, App\Entity\Permiso p
            WHERE p.fkunidad=n.id AND p.fkusuario=u.id AND n.estado=1 AND u.id=:idu AND p.tipo IN (\'Crear\', \'Completo\')
            ORDER BY n.id DESC'
        )->setParameter('idu', $idu);
        
        $unit = $query->execute();
        /*$units = array();
        foreach ($unit as $unt) {
            $aux = $this->find($unt->getId());
            $item = new Unidad();
            $item->setId($aux->getId());
            $item->setNombre($aux->getNombre());
            $units[] = $item;
        }*/
        return $unit; // returns an array of Unidad objects
    }

//    /**
//     * @return Unidad[] Returns an array of Unidad objects
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
    public function findOneBySomeField($value): ?Unidad
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
