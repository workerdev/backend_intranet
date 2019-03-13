<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Ldap\Adapter\ExtLdap\Adapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Rol;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Ldap\Exception\ConnectionException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", methods={"GET"})
     */
    public function index()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/sesion", methods={"POST"}, name="sesion")
     */
    public function login()
    {   
        $sx = json_decode($_POST['object'], true);
        
        $user = $sx['user'];
        $password = $sx['password'];
        $dn="cn=".$user.",CN=Users,DC=elfec,DC=com";
       
        $ldap = Ldap::create('ext_ldap', array(
            'host' => '172.17.2.10',
            'encryption' => 'none',
            'port' => '389',
        ));

        try {
            if(empty($user) || empty($password)) {
                $mensaje = "vacio";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response'=>$mensaje,'success' => true,
                    'message' => 'sesion exitosa.');
                $resultado = json_encode($resultado);
                return new Response($mensaje);
            }
            $attributes = ['givenName', 'sn', 'mail','name', 'physicalDeliveryOfficeName'];
            $ldap->bind($dn, $password);
            $query =  $ldap->query($dn,'objectClass=*',['filter' => $attributes]);
           
            $results = $query->execute()->toArray();
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);
            $data = $serializer->normalize($results, null);

            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username'=>$user));
            $cx = $this->getDoctrine()->getManager();

            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            if(empty($usuario)){
                $usuario = new Usuario();
                $usuario->setNombre($data[0]['attributes']['givenName'][0]);
                $usuario->setApellido($data[0]['attributes']['sn'][0]);
                $usuario->setCi(452136);
                $usuario->setCorreo($data[0]['attributes']['mail'][0]);
                $usuario->setUsername($data[0]['attributes']['name'][0]);
                
                //  $encoder = base64_encode($password);
                // $usuario->setPassword($encoder);
                $usuario->setEstado(1); 

                $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Administrador'));
                $usuario->setFkrol($rol[0]);
                $cx->persist($usuario);
                $cx->flush(); 
                
                $duser = $serializer->normalize($usuario, null);
            }else{
                $usuario[0]->setNombre($data[0]['attributes']['givenName'][0]);
                $usuario[0]->setApellido($data[0]['attributes']['sn'][0]);
                $usuario[0]->setCi(452136);
                $usuario[0]->setCorreo($data[0]['attributes']['mail'][0]);
                $usuario[0]->setUsername($data[0]['attributes']['name'][0]);

                //$encoder = base64_encode($password);
                //$usuario[0]->setPassword($encoder);
                $usuario[0]->setEstado(1);  

                //$rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>$data[0]['attributes']['physicalDeliveryOfficeName'][0]));
                //$usuario[0]->setFkrol($rol[0]);
                $cx->persist($usuario[0]);
                $cx->flush(); 
                
                $duser = $serializer->normalize($usuario[0], null);
            }
        
            $session = new Session();
            //  $session->invalidate();
            //  $session->start();
            $session->set('s_user', $duser);
            
            $s_user = $session->get('s_user');

            $mensaje = "exitoso";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'sesion exitosa.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
        catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'sesion exitosa.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {
        $this->get('session')->invalidate();
        return $this->render('security/login.html.twig');
    }
}