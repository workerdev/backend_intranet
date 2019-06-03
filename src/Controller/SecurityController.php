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

use App\Entity\Gerencia;
use App\Entity\Permiso;
use App\Entity\Unidad;
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
        
        $user ='ctcloudbit'; 
        $password ='Elfec2019';

        $usuario = $sx['user'];
        $pass = $sx['password'];

        $dn="CN=".$user.",OU=Personal Regular,OU=UTI,OU=ELFEC,DC=elfec,DC=com";
       
        $ldap = Ldap::create('ext_ldap', array(
            'host' => '192.168.30.10',
            'encryption' => 'none',
            'port' => '389',
        ));
       // $attributes = ['givenName'/*Nombres*/, 'sn'/*appellidos*/, 'mail'/*email*/,'name'/*primernombre*/, 'physicalDeliveryOfficeName'/* cargo */,'sAMAccountName'/*login*/,'userPrincipalName'/*loginparaloguear@elfec.com*/];
  
        $ldap->bind($dn, $password);
        
        /* 
    CARGANDO GERENCIAS
    **/
    $attributes2 = ['department'];
    $query2 =  $ldap->query('DC=elfec,DC=com', '(&(objectCategory=person)(objectClass=user)(department=*))', ['filter' => $attributes2]);
    $results2 = $query2->execute();
    foreach ($results2 as $entry2) {

        $entry2;  // Do something with the results
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

       $serializer = new Serializer($normalizers, $encoders);
       $data2 = $serializer->normalize($entry2, null);
       $Gerencia= $data2['attributes']['department'][0];
       $gerenciabd = $this->getDoctrine()->getRepository(Gerencia::class)->findBy(array('estado' => '1','nombre' => $Gerencia));
       if(empty($gerenciabd))

       {     
            $cx = $this->getDoctrine()->getManager();
           $newgerencia= new Gerencia();
           $newgerencia->setNombre($Gerencia);
           $newgerencia->setDescripcion('Contenido del AD: '.$Gerencia);
           $newgerencia->setEstado(1);
            $cx->persist($newgerencia);
            $cx->flush();    
       }
       
    }

/* 
CARGANDO UNIDADES
**/
    $attributes3 = ['physicalDeliveryOfficeName'];
    $query3 =  $ldap->query('DC=elfec,DC=com', '(&(objectCategory=person)(objectClass=user)(physicalDeliveryOfficeName=*))', ['filter' => $attributes3]);
    $results3 = $query3->execute();
    foreach ($results3 as $entry3) {

        $entry3;  // Do something with the results
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

       $serializer = new Serializer($normalizers, $encoders);
       $data3 = $serializer->normalize($entry3, null);
       $Unidad= $data3['attributes']['physicalDeliveryOfficeName'][0];
       $unidadbd = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('estado' => '1','nombre' => $Unidad));
       if(empty($unidadbd))

       {     
            $cx = $this->getDoctrine()->getManager();
           $newunidad= new Unidad();
           $newunidad->setNombre($Unidad);
           $newunidad->setFkcorrelativo(null);
           $newunidad->setFksuperior(null);
           $newunidad->setEstado(1);
            $cx->persist($newunidad);
            $cx->flush();    
       }
       
    }
   
   /* 
  VALIDANDO USUARIO 
  **/
$attributes = ['givenName'/*Nombres*/, 'sn'/*appellidos*/, 'mail'/*email*/,'name'/*primernombre*/, 'physicalDeliveryOfficeName'/* cargo */,'sAMAccountName'/*login*/,'userPrincipalName'/*loginparaloguear@elfec.com*/];
$query =  $ldap->query('DC=elfec,DC=com', 'sAMAccountName='.$usuario, ['filter' => $attributes]);
$results = $query->execute();
    try{
         foreach ($results as $entry) {
            $entry;  // Do something with the results
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);
            $data = $serializer->normalize($entry, null);
            
            if($ayudanombre= array_key_exists("sAMAccountName",$data['attributes'])) { 
                if($usuario==$data['attributes']['sAMAccountName'][0]) {
                    $dn=$data['dn'];
                    $ldap->bind($dn, $pass);
                    




                    $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username'=>$usuario));
                    $cx = $this->getDoctrine()->getManager();

                    $encoders = [new XmlEncoder(), new JsonEncoder()];
                    $normalizers = [new ObjectNormalizer()];
                    $serializer = new Serializer($normalizers, $encoders);
                    

                    if(empty($usuariob)) {
                        $usuariob = new Usuario();
                        if(isset($data['attributes']['givenName'][0])) {
                            $usuariob->setNombre($data['attributes']['givenName'][0]);
                        }else {
                            $usuariob->setNombre('S/N');
                        }
                        if(isset($data['attributes']['sn'][0])) {
                            $usuariob->setApellido($data['attributes']['sn'][0]);
                        }else{
                            $usuariob->setApellido('S/A');
                        }
                        if(isset($data['attributes']['mail'][0])) {
                            $usuariob->setCorreo($data['attributes']['mail'][0]);
                        }else{
                            $usuariob->setCorreo('S/Correo');
                        }
                        if($data['attributes']['sAMAccountName'][0]) {
                            $usuariob->setUsername($data['attributes']['sAMAccountName'][0]);
                        }else {
                            $usuariob->setUsername('Sin login');
                        }
                        
                        if( $ayudanombre= array_key_exists("cn",$data['attributes'] ))  {   
                            if($data['attributes']['cn'][0]== 'Administrador') {
                                $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Administrador'));
                            }else{
                                $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Usuario')); 
                            }
                        }else {
                            $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Usuario'));
                        }
                        $usuariob->setEstado(1); 
                    
                        $usuariob->setFkrol($rol[0]);
                        $cx->persist($usuariob);
                        $cx->flush();
                        
                        if(isset($data['attributes']['physicalDeliveryOfficeName'][0])){ 
                            $unidad=$data['attributes']['physicalDeliveryOfficeName'][0]; 
                            $unidadEntidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('nombre' => $unidad, 'estado' => '1'));
                           
                           
                            $usuario=$usuariob->getId();
                            $unidadid=$unidadEntidad[0]->getId();
                            $tipo='Completo';                        

                           
                            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkusuario' => $usuario, 'estado' => '1'));
                            if(empty($permiso))
                            {
                                $cx = $this->getDoctrine()->getManager();
                                $newpermiso= new Permiso();
                                $newpermiso->setFkunidad($unidadEntidad[0]);
                                $newpermiso->setFkusuario($usuariob);
                                $newpermiso->setTipo($tipo);
                                $newpermiso->setEstado(1);
                                 $cx->persist($newpermiso);
                                 $cx->flush();    
                            }

                        }
                        

                        $duser = $serializer->normalize($usuariob, null);
                    }else {
                        if(isset($data['attributes']['givenName'][0])){
                            $usuariob[0]->setNombre($data['attributes']['givenName'][0]);
                        }else {
                            $usuariob[0]->setNombre('S/N');
                        }
                        if(isset($data['attributes']['sn'][0])){
                            $usuariob[0]->setApellido($data['attributes']['sn'][0]);
                        }else {
                            $usuariob[0]->setApellido('S/Apellido');
                        }
                        if(isset($data['attributes']['mail'][0])){
                            $usuariob[0]->setCorreo($data['attributes']['mail'][0]);
                        }else {
                            $usuariob[0]->setCorreo('S/Correo');
                        }
                        if(isset($data['attributes']['sAMAccountName'][0])){ 
                            $usuariob[0]->setUsername($data['attributes']['sAMAccountName'][0]);
                        }else{ 
                            $usuariob[0]->setUsername('S/Login');
                        }
                        if(isset($data['attributes']['physicalDeliveryOfficeName'][0])){ 
                            $unidad=$data['attributes']['physicalDeliveryOfficeName'][0]; 
                            $unidadEntidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('nombre' => $unidad, 'estado' => '1'));
                           
                           
                            $usuario=$usuariob[0]->getId();
                            $unidadid=$unidadEntidad[0]->getId();
                            $tipo='Completo';                        

                           
                            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkusuario' => $usuario, 'estado' => '1'));
                            if(empty($permiso))
                            {
                                $cx = $this->getDoctrine()->getManager();
                                $newpermiso= new Permiso();
                                $newpermiso->setFkunidad($unidadEntidad[0]);
                                $newpermiso->setFkusuario($usuariob[0]);
                                $newpermiso->setTipo($tipo);
                                $newpermiso->setEstado(1);
                                 $cx->persist($newpermiso);
                                 $cx->flush();    
                            }

                        }
                        
                        $usuariob[0]->setEstado(1);  
                        $cx->persist($usuariob[0]);
                        $cx->flush();                        
                            $duser = $serializer->normalize($usuariob[0], null);
                        }
                        $session = new Session();
                        $session->set('s_user', $duser);
                        
                        $s_user = $session->get('s_user');

                        $mensaje = "exitoso";
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                        $resultado = array('response'=>$mensaje,'success' => true,
                            'message' => 'sesion exitosa.');
                        $resultado = json_encode($resultado);
                        return new Response($resultado);
                    }
                }
            } 
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => false,
                'message' => 'error', 'info'=>$aux);
            $resultado = json_encode($resultado);
            
            return new Response($resultado);       

        }catch(ConnectionException $ce){
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => false,
                'message' => 'error');
            $resultado = json_encode($resultado);
            
            return new Response($resultado);       
        }  
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {
        $this->get('session')->invalidate();
        return $this->render('security/login.html.twig');
    }
    

    
    
    
    /**
     * @Route("/valid_action", methods={"POST"}, name="valid_action")
     */
    public function action()
    {   
        $sx = json_decode($_POST['object'], true);

        $user ='ctcloudbit'; 
        $password ='Elfec2019';
        
        $s_user = $this->get('session')->get('s_user');
        $usuario = $s_user['username'];
        $pass = $sx['password'];

        $dn="CN=".$user.",OU=Personal Regular,OU=UTI,OU=ELFEC,DC=elfec,DC=com";
       
        $ldap = Ldap::create('ext_ldap', array(
            'host' => '192.168.30.10',
            //'host' => '172.17.1.150',
            'encryption' => 'none',
            'port' => '389',
        ));

        try {
            if(empty($usuario) || empty($pass)) {
                $mensaje = "vacio";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response'=>$mensaje,'success' => true,
                    'message' => 'Ingrese los datos requeridos.');
                $resultado = json_encode($resultado);
                return new Response($mensaje);
            }
            $ldap->bind($dn, $password);

            $attributes = ['dn','sAMAccountName'];
            $query =  $ldap->query('DC=elfec,DC=com', 'sAMAccountName='.$usuario, ['filter' => $attributes]);
            $results = $query->execute();

            foreach ($results as $entry) {
                $entry;  // Do something with the results
                $encoders = [new XmlEncoder(), new JsonEncoder()];
                $normalizers = [new ObjectNormalizer()];

                $serializer = new Serializer($normalizers, $encoders);
                $data = $serializer->normalize($entry, null);
                
                if($ayudanombre= array_key_exists("sAMAccountName",$data['attributes'])) { 
                    if($usuario==$data['attributes']['sAMAccountName'][0]) {
                        $dn=$data['dn'];
                        $ldap->bind($dn, $pass);
                        $mensaje = "exitoso";
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                        $resultado = array('response'=>$mensaje,'success' => true,
                            'message' => 'sesion exitosa.');
                        $resultado = json_encode($resultado);
                        return new Response($mensaje);
                    }
                }
            }            
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
            
         
        }
        catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
    }
}