<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TipoCargo;
use App\Entity\PersonalCargo;
use App\Entity\EstadoPersonal;
use App\Entity\Personal;

class PersonalModFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tipocargo2 = new TipoCargo();
        $tipocargo2->setNombre('Alineamiento directo');
        $tipocargo2->setDescripcion('Dependiente del cargo inmediato');
        $tipocargo2->setEstado(1);
        $manager->persist($tipocargo2);

        $tipocargo1 = new TipoCargo();
        $tipocargo1->setNombre('Staff');
        $tipocargo1->setDescripcion('Miembros no directos');
        $tipocargo1->setEstado(1);
        $manager->persist($tipocargo1);

        /* TODO: inicio cargo */
        $asisadm = new PersonalCargo();
        $asisadm->setNombre('Asistente Administrativa');
        $asisadm->setDescripcion('descripcion cargo');
        $asisadm->setFksuperior(null);
        $asisadm->setFktipo($tipocargo2);
        $asisadm->setEstado(1);
        $manager->persist($asisadm);

        $jefeimp = new PersonalCargo();
        $jefeimp->setNombre('Jefe De Impuestos');
        $jefeimp->setDescripcion('descripcion cargo');
        $jefeimp->setFksuperior($asisadm);
        $jefeimp->setFktipo($tipocargo2);
        $jefeimp->setEstado(1);
        $manager->persist($jefeimp);

        $especialista = new PersonalCargo();
        $especialista->setNombre('Especialista De Atencion Al Usuario');
        $especialista->setDescripcion('descripcion cargo');
        $especialista->setFksuperior($asisadm);
        $especialista->setFktipo($tipocargo2);
        $especialista->setEstado(1);
        $manager->persist($especialista);

        $adm = new PersonalCargo();
        $adm->setNombre('Administrador Aplicaciones Operaciones Y Técnica');
        $adm->setDescripcion('descripcion cargo');
        $adm->setFksuperior($asisadm);
        $adm->setFktipo($tipocargo2);
        $adm->setEstado(1);
        $manager->persist($adm);

        $resp = new PersonalCargo();
        $resp->setNombre('Responsable De Adquisiciones Y Almacenes');
        $resp->setDescripcion('descripcion cargo');
        $resp->setFksuperior($asisadm);
        $resp->setFktipo($tipocargo2);
        $resp->setEstado(1);
        $manager->persist($resp);

        $aux = new PersonalCargo();
        $aux->setNombre('Auxiliar Atencion Al Cliente');
        $aux->setDescripcion('descripcion cargo');
        $aux->setFksuperior($asisadm);
        $aux->setFktipo($tipocargo2);
        $aux->setEstado(1);
        $manager->persist($aux);

        $enc = new PersonalCargo();
        $enc->setNombre('Encargado De Atencion Al Cliente (Urbano)');
        $enc->setDescripcion('descripcion cargo');
        $enc->setFksuperior($asisadm);
        $enc->setFktipo($tipocargo2);
        $enc->setEstado(1);
        $manager->persist($enc);

        $atencion = new PersonalCargo();
        $atencion->setNombre('Encargado Atencion Al Cliente Ii');
        $atencion->setDescripcion('descripcion cargo');
        $atencion->setFksuperior($asisadm);
        $atencion->setFktipo($tipocargo2);
        $atencion->setEstado(1);
        $manager->persist($atencion);

        $elec = new PersonalCargo();
        $elec->setNombre('Electricista Mantenimiento Urbano');
        $elec->setDescripcion('descripcion elec');
        $elec->setFksuperior($asisadm);
        $elec->setFktipo($tipocargo2);
        $elec->setEstado(1);
        $manager->persist($elec);

        $activo = new PersonalCargo();
        $activo->setNombre('Encargado Activo Fijo');
        $activo->setDescripcion('descripcion activo');
        $activo->setFksuperior($asisadm);
        $activo->setFktipo($tipocargo2);
        $activo->setEstado(1);
        $manager->persist($activo);

        $reclamos = new PersonalCargo();
        $reclamos->setNombre('Encargado Administrativo Reclamos');
        $reclamos->setDescripcion('descripcion reclamos');
        $reclamos->setFksuperior($asisadm);
        $reclamos->setFktipo($tipocargo2);
        $reclamos->setEstado(1);
        $manager->persist($reclamos);

        $transformadores = new PersonalCargo();
        $transformadores->setNombre('Encargado De Transformadores');
        $transformadores->setDescripcion('descripcion transformadores');
        $transformadores->setFksuperior($asisadm);
        $transformadores->setFktipo($tipocargo2);
        $transformadores->setEstado(1);
        $manager->persist($transformadores);

        $controlperdidas = new PersonalCargo();
        $controlperdidas->setNombre('Jefe Control Perdidas A.I.');
        $controlperdidas->setDescripcion('descripcion controlperdidas');
        $controlperdidas->setFksuperior($asisadm);
        $controlperdidas->setFktipo($tipocargo2);
        $controlperdidas->setEstado(1);
        $manager->persist($controlperdidas);

        $capataz = new PersonalCargo();
        $capataz->setNombre('Capataz Cuadrilla Mantenimiento Rural');
        $capataz->setDescripcion('descripcion capataz');
        $capataz->setFksuperior($asisadm);
        $capataz->setFktipo($tipocargo2);
        $capataz->setEstado(1);
        $manager->persist($capataz);

        $electrico = new PersonalCargo();
        $electrico->setNombre('Electricista Operaciones Urbano');
        $electrico->setDescripcion('descripcion electrico');
        $electrico->setFksuperior($asisadm);
        $electrico->setFktipo($tipocargo2);
        $electrico->setEstado(1);
        $manager->persist($electrico);

        $revisor = new PersonalCargo();
        $revisor->setNombre('Revisor Validacion Cobranzas');
        $revisor->setDescripcion('descripcion revisor');
        $revisor->setFksuperior($asisadm);
        $revisor->setFktipo($tipocargo2);
        $revisor->setEstado(1);
        $manager->persist($revisor);

        $asistentegerencia = new PersonalCargo();
        $asistentegerencia->setNombre('Asistente De Gerencia');
        $asistentegerencia->setDescripcion('descripcion asistentegerencia');
        $asistentegerencia->setFksuperior($asisadm);
        $asistentegerencia->setFktipo($tipocargo2);
        $asistentegerencia->setEstado(1);
        $manager->persist($asistentegerencia);

        $auxcobranza = new PersonalCargo();
        $auxcobranza->setNombre('Auxiliar Gestion Cobranzas');
        $auxcobranza->setDescripcion('descripcion auxcobranza');
        $auxcobranza->setFksuperior($asisadm);
        $auxcobranza->setFktipo($tipocargo2);
        $auxcobranza->setEstado(1);
        $manager->persist($auxcobranza);

        $sumi = new PersonalCargo();
        $sumi->setNombre('Revisor Suministros');
        $sumi->setDescripcion('descripcion sumi');
        $sumi->setFksuperior($asisadm);
        $sumi->setFktipo($tipocargo2);
        $sumi->setEstado(1);
        $manager->persist($sumi);

        $proyectos = new PersonalCargo();
        $proyectos->setNombre('Gestor Proyectos Reformas Iii');
        $proyectos->setDescripcion('descripcion proyectos');
        $proyectos->setFksuperior($asisadm);
        $proyectos->setFktipo($tipocargo2);
        $proyectos->setEstado(1);
        $manager->persist($proyectos);

        /* TODO: inicio Estado Personal*/

        $estadopersonal1 = new EstadoPersonal();
        $estadopersonal1->setNombre('Habilitado');
        $estadopersonal1->setDescripcion('Personal habilitado');
        $estadopersonal1->setEstado(1);
        $manager->persist($estadopersonal1);

        /* TODO: inicio personal */
        $lenny = new Personal();
        $lenny->setNombre('LENNY');
        $lenny->setApellido('REVOLLO PEREIRA');
        $lenny->setCi('2877941');
        $lenny->setFnac(new \DateTime('1961-05-26'));
        $lenny->setEstado(1);
        $lenny->setFkestadopersonal($estadopersonal1);
        $lenny->setFkPersonalCargo($asisadm);
        $manager->persist($lenny);

        $juan = new Personal();
        $juan->setNombre('JUAN ORLANDO');
        $juan->setApellido('MEDRANO RODRIGUEZ');
        $juan->setCi('2903684');
        $juan->setFnac(new \DateTime('1962-11-06'));
        $juan->setEstado(1);
        $juan->setFkestadopersonal($estadopersonal1);
        $juan->setFkPersonalCargo($jefeimp);
        $manager->persist($juan);

        $rudy = new Personal();
        $rudy->setNombre('RUDY ALFONSO');
        $rudy->setApellido('VILLARROEL MATAMOROS');
        $rudy->setCi('815128');
        $rudy->setFnac(new \DateTime('1968-12-06'));
        $rudy->setEstado(1);
        $rudy->setFkestadopersonal($estadopersonal1);
        $rudy->setFkPersonalCargo($especialista);
        $manager->persist($rudy);

        $victor = new Personal();
        $victor->setNombre('VICTOR');
        $victor->setApellido('BUSTAMANTE TERAN');
        $victor->setCi('2864281');
        $victor->setFnac(new \DateTime('1961-03-11'));
        $victor->setEstado(1);
        $victor->setFkestadopersonal($estadopersonal1);
        $victor->setFkPersonalCargo($adm);
        $manager->persist($victor);

        $jorge = new Personal();
        $jorge->setNombre('JORGE');
        $jorge->setApellido('VIDAL LAZARTE');
        $jorge->setCi('3006907');
        $jorge->setFnac(new \DateTime('1963-12-03'));
        $jorge->setEstado(1);
        $jorge->setFkestadopersonal($estadopersonal1);
        $jorge->setFkPersonalCargo($resp);
        $manager->persist($jorge);

        $esperanza = new Personal();
        $esperanza->setNombre('ESPERANZA');
        $esperanza->setApellido('PIZA AYLLON');
        $esperanza->setCi('2878659');
        $esperanza->setFnac(new \DateTime('1961-12-08'));
        $esperanza->setEstado(1);
        $esperanza->setFkestadopersonal($estadopersonal1);
        $esperanza->setFkPersonalCargo($aux);
        $manager->persist($esperanza);

        $oscar = new Personal();
        $oscar->setNombre('OSCAR');
        $oscar->setApellido('DIAZ MACHICADO');
        $oscar->setCi('948292');
        $oscar->setFnac(new \DateTime('1955-12-05'));
        $oscar->setEstado(1);
        $oscar->setFkestadopersonal($estadopersonal1);
        $oscar->setFkPersonalCargo($enc);
        $manager->persist($oscar);

        $jaime = new Personal();
        $jaime->setNombre('JAIME');
        $jaime->setApellido('BUSTAMANTE  BOLIVAR');
        $jaime->setCi('992019');
        $jaime->setFnac(new \DateTime('1960-12-05'));
        $jaime->setEstado(1);
        $jaime->setFkestadopersonal($estadopersonal1);
        $jaime->setFkPersonalCargo($atencion);
        $manager->persist($jaime);

        $dionicio = new Personal();
        $dionicio->setNombre('DIONICIO');
        $dionicio->setApellido('MALDONADO GUZMAN');
        $dionicio->setCi('879615');
        $dionicio->setFnac(new \DateTime('1958-06-05'));
        $dionicio->setEstado(1);
        $dionicio->setFkestadopersonal($estadopersonal1);
        $dionicio->setFkPersonalCargo($elec);
        $manager->persist($dionicio);

        $jaimevalencia = new Personal();
        $jaimevalencia->setNombre('JAIME');
        $jaimevalencia->setApellido('VALENCIA SALINAS');
        $jaimevalencia->setCi('950093');
        $jaimevalencia->setFnac(new \DateTime('1959-09-18'));
        $jaimevalencia->setEstado(1);
        $jaimevalencia->setFkestadopersonal($estadopersonal1);
        $jaimevalencia->setFkPersonalCargo($activo);
        $manager->persist($jaimevalencia);

        $fanorvel = new Personal();
        $fanorvel->setNombre('FANOR');
        $fanorvel->setApellido('VELASCO SAINZ');
        $fanorvel->setCi('836447');
        $fanorvel->setFnac(new \DateTime('1955-05-26'));
        $fanorvel->setEstado(1);
        $fanorvel->setFkestadopersonal($estadopersonal1);
        $fanorvel->setFkPersonalCargo($reclamos);
        $manager->persist($fanorvel);

        $claudio = new Personal();
        $claudio->setNombre('CLAUDIO');
        $claudio->setApellido('GARCIA FUENTES');
        $claudio->setCi('3744765');
        $claudio->setFnac(new \DateTime('1967-02-11'));
        $claudio->setEstado(1);
        $claudio->setFkestadopersonal($estadopersonal1);
        $claudio->setFkPersonalCargo($transformadores);
        $manager->persist($claudio);

        $manuelclaros = new Personal();
        $manuelclaros->setNombre('MANUEL');
        $manuelclaros->setApellido('CLAROS SANABRIA');
        $manuelclaros->setCi('2286371');
        $manuelclaros->setFnac(new \DateTime('1959-08-05'));
        $manuelclaros->setEstado(1);
        $manuelclaros->setFkestadopersonal($estadopersonal1);
        $manuelclaros->setFkPersonalCargo($controlperdidas);
        $manager->persist($manuelclaros);

        $freddypereyra = new Personal();
        $freddypereyra->setNombre('FREDDY');
        $freddypereyra->setApellido('PEREYRA TORRES');
        $freddypereyra->setCi('2864668');
        $freddypereyra->setFnac(new \DateTime('1959-01-01'));
        $freddypereyra->setEstado(1);
        $freddypereyra->setFkestadopersonal($estadopersonal1);
        $freddypereyra->setFkPersonalCargo($capataz);
        $manager->persist($freddypereyra);

        $laureano = new Personal();
        $laureano->setNombre('LAUREANO');
        $laureano->setApellido('MENESES BASTO');
        $laureano->setCi('2871675');
        $laureano->setFnac(new \DateTime('1959-07-04'));
        $laureano->setEstado(1);
        $laureano->setFkestadopersonal($estadopersonal1);
        $laureano->setFkPersonalCargo($electrico);
        $manager->persist($laureano);

        $natanielvilla = new Personal();
        $natanielvilla->setNombre('NATANIEL');
        $natanielvilla->setApellido('VILLARROEL OLIVERA');
        $natanielvilla->setCi('2881998');
        $natanielvilla->setFnac(new \DateTime('1958-11-13'));
        $natanielvilla->setEstado(1);
        $natanielvilla->setFkestadopersonal($estadopersonal1);
        $natanielvilla->setFkPersonalCargo($revisor);
        $manager->persist($natanielvilla);

        $orlandoarebalo = new Personal();
        $orlandoarebalo->setNombre('ORLANDO');
        $orlandoarebalo->setApellido('AREBALO FLORES');
        $orlandoarebalo->setCi('955491');
        $orlandoarebalo->setFnac(new \DateTime('1958-11-30'));
        $orlandoarebalo->setEstado(1);
        $orlandoarebalo->setFkestadopersonal($estadopersonal1);
        $orlandoarebalo->setFkPersonalCargo($asistentegerencia);
        $manager->persist($orlandoarebalo);

        $jeanettesabag = new Personal();
        $jeanettesabag->setNombre('JEANETTE');
        $jeanettesabag->setApellido('SABAG ASFURA');
        $jeanettesabag->setCi('825225');
        $jeanettesabag->setFnac(new \DateTime('1960-01-06'));
        $jeanettesabag->setEstado(1);
        $jeanettesabag->setFkestadopersonal($estadopersonal1);
        $jeanettesabag->setFkPersonalCargo($auxcobranza);
        $manager->persist($jeanettesabag);

        $galiaramos = new Personal();
        $galiaramos->setNombre('GALIA');
        $galiaramos->setApellido('RAMOS MARTINEZ');
        $galiaramos->setCi('960334');
        $galiaramos->setFnac(new \DateTime('1959-12-02'));
        $galiaramos->setEstado(1);
        $galiaramos->setFkestadopersonal($estadopersonal1);
        $galiaramos->setFkPersonalCargo($sumi);
        $manager->persist($galiaramos);
        
        $manager->flush();
    }
}
