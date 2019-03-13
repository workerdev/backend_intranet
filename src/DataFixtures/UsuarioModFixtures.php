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
        $useradm->setCi(9614523);
        $useradm->setNombre('Admin');
        $useradm->setApellido('Super-user');
        $useradm->setCorreo('admin@gmail.com');
        $useradm->setUsername('admin');
        $useradm->setPassword(
            $this->encoder->encodePassword($useradm, 'admin')
        );
        $useradm->setEstado(1);
        $useradm->setFkrol($roladm);
        $manager->persist($useradm);

        $user = new Usuario();
        $user->setCi(6541892);
        $user->setNombre('Usuario');
        $user->setApellido('rol-user');
        $user->setCorreo('user@gmail.com');
        $user->setUsername('user');
        $user->setPassword(
            $this->encoder->encodePassword($user, '123')
        );
        $user->setEstado(1);
        $user->setFkrol($roluser);
        $manager->persist($user);


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

        $usrmni = new Acceso();
        $usrmni->setFkrol($roluser);
        $usrmni->setFkmodulo($this->getReference(ModuloAccionFixtures::MENU_INSERT)); 
        $manager->persist($usrmni);

        $usrmne = new Acceso();
        $usrmne->setFkrol($roluser);
        $usrmne->setFkmodulo($this->getReference(ModuloAccionFixtures::MENU_EDIT)); 
        $manager->persist($usrmne);

        $usrmnd = new Acceso();
        $usrmnd->setFkrol($roluser);
        $usrmnd->setFkmodulo($this->getReference(ModuloAccionFixtures::MENU_DELETE)); 
        $manager->persist($usrmnd); 

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
