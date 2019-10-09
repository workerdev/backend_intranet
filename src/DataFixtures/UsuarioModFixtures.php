<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Rol;
use App\Entity\Acceso;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UsuarioModFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $roladm = new Rol();
        $roladm->setNombre('Administrador');
        $roladm->setDescripcion('Acceso total');
        $roladm->setEstado(1);
        $manager->persist($roladm);
        
        $roluser = new Rol();
        $roluser->setNombre('Usuario');
        $roluser->setDescripcion('Acceso parcial');
        $roluser->setEstado(1);
        $manager->persist($roluser);


        $useradm = new Usuario();
        $useradm->setNombre('Admin');
        $useradm->setApellido('Super-user');
        $useradm->setCorreo('admin@gmail.com');
        $useradm->setUsername('admin');
        $useradm->setCargo('Administrador del sistema');
        $useradm->setPassword(
            $this->encoder->encodePassword($useradm, 'admin')
        );
        $useradm->setEstado(1);
        $useradm->setFkrol($roladm);
        $manager->persist($useradm);

        $user = new Usuario();
        $user->setNombre('Usuario');
        $user->setApellido('rol-user');
        $user->setCorreo('user@gmail.com');
        $user->setUsername('user');
        $user->setCargo('Usuario del sistema');
        $user->setPassword(
            $this->encoder->encodePassword($user, '123')
        );
        $user->setEstado(1);
        $user->setFkrol($roluser);
        $manager->persist($user);


        $admumdu = new Acceso();
        $admumdu->setFkrol($roladm);
        $admumdu->setFkmodulo($this->getReference(ModuloFixtures::USUARIO_MOD)); 
        $manager->persist($admumdu);

        $admupr = new Acceso();
        $admupr->setFkrol($roladm);
        $admupr->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD)); 
        $manager->persist($admupr);

        $admurh = new Acceso();
        $admurh->setFkrol($roladm);
        $admurh->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_HOME)); 
        $manager->persist($admurh);

        $admuri = new Acceso();
        $admuri->setFkrol($roladm);
        $admuri->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_INSERT)); 
        $manager->persist($admuri);

        $admure = new Acceso();
        $admure->setFkrol($roladm);
        $admure->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_EDIT)); 
        $manager->persist($admure);

        $admurd = new Acceso();
        $admurd->setFkrol($roladm);
        $admurd->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_DELETE)); 
        $manager->persist($admurd);

        $admprf = new Acceso();
        $admprf->setFkrol($roladm);
        $admprf->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERFIL_CHILD)); 
        $manager->persist($admprf);




        $usrumdu = new Acceso();
        $usrumdu->setFkrol($roluser);
        $usrumdu->setFkmodulo($this->getReference(ModuloFixtures::USUARIO_MOD)); 
        $manager->persist($usrumdu);

        $usrupr = new Acceso();
        $usrupr->setFkrol($roluser);
        $usrupr->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD)); 
        $manager->persist($usrupr);

        $usrurh = new Acceso();
        $usrurh->setFkrol($roluser);
        $usrurh->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_HOME)); 
        $manager->persist($usrurh);

        $usruri = new Acceso();
        $usruri->setFkrol($roluser);
        $usruri->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_INSERT)); 
        $manager->persist($usruri);

        $usrure = new Acceso();
        $usrure->setFkrol($roluser);
        $usrure->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_EDIT)); 
        $manager->persist($usrure);

        $usrurd = new Acceso();
        $usrurd->setFkrol($roluser);
        $usrurd->setFkmodulo($this->getReference(ModuloAccionFixtures::ROL_DELETE)); 
        $manager->persist($usrurd);

        $usrprf = new Acceso();
        $usrprf->setFkrol($roluser);
        $usrprf->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERFIL_CHILD)); 
        $manager->persist($usrprf);

        
        $usrcfgm = new Acceso();
        $usrcfgm->setFkrol($roluser);
        $usrcfgm->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD)); 
        $manager->persist($usrcfgm);

        $usrcfgp = new Acceso();
        $usrcfgp->setFkrol($roluser);
        $usrcfgp->setFkmodulo($this->getReference(ModuloChildrenFixtures::MENU_CHILD)); 
        $manager->persist($usrcfgp);

        $usrmnh = new Acceso();
        $usrmnh->setFkrol($roluser);
        $usrmnh->setFkmodulo($this->getReference(ModuloAccionFixtures::MENU_HOME)); 
        $manager->persist($usrmnh);


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ModuloFixtures::class,
            ModuloChildrenFixtures::class,
            ModuloAccionFixtures::class,
        );
    }
}
