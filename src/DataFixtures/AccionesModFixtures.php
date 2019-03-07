<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\DatoEmpresarial;
use App\Entity\TipoDatoEmpresarial;

class AccionesModFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* TODO: inicio de datos y tipo empresarial*/
        $mision = new TipoDatoEmpresarial();
        $mision->setNombre('Misión');
        $mision->setEstado(1);
        $manager->persist($mision);

        $vision = new TipoDatoEmpresarial();
        $vision->setNombre('Visión');
        $vision->setEstado(1);
        $manager->persist($vision);

        $valores = new TipoDatoEmpresarial();
        $valores->setNombre('Valores');
        $valores->setEstado(1);
        $manager->persist($valores);

        $lineamiento = new TipoDatoEmpresarial();
        $lineamiento->setNombre('Lineamiento Estratégico');
        $lineamiento->setEstado(1);
        $manager->persist($lineamiento);


        $dato1 = new DatoEmpresarial();
        $dato1->setFktipodatoempresarial($mision);
        $dato1->setDescripcion('ELFEC aporta al desarrollo del Departamento distribuyendo energía eléctrica con calidad, logrando el acceso universal a este servicio de forma sostenible y con equidad social.');
        $dato1->setEstado(1);
        $manager->persist($dato1);

        $dato2 = new DatoEmpresarial();
        $dato2->setFktipodatoempresarial($vision);
        $dato2->setDescripcion('Empresa comprometida con Cochabamba, que alcanzará una cobertura de 92 por ciento de suministro de energía eléctrica para el 2021, con niveles de calidad superiores a los establecidos por la normativa.');
        $dato2->setEstado(1);
        $manager->persist($dato2);

        $dato3 = new DatoEmpresarial();
        $dato3->setFktipodatoempresarial($valores);
        $dato3->setDescripcion('Ética', 1);
        $dato3->setEstado(1);
        $manager->persist($dato3);

        $dato8 = new DatoEmpresarial();
        $dato8->setFktipodatoempresarial($valores);
        $dato8->setDescripcion('Responsabilidad Social Empresarial (RSE)');
        $dato8->setEstado(1);
        $manager->persist($dato8);

        $dato4 = new DatoEmpresarial();
        $dato4->setFktipodatoempresarial($valores);
        $dato4->setDescripcion('Prevención y Seguridad Industrial');
        $dato4->setEstado(1);
        $manager->persist($dato4);

        $dato10 = new DatoEmpresarial();
        $dato10->setFktipodatoempresarial($valores);
        $dato10->setDescripcion('Honestidad');
        $dato10->setEstado(1);
        $manager->persist($dato10);

        $dato5 = new DatoEmpresarial();
        $dato5->setFktipodatoempresarial($lineamiento);
        $dato5->setDescripcion('Potencionamiento de infraestructura técnica y programas de mantenimiento para mayor seguridad y confiabilidad del servicio.');
        $dato5->setEstado(1);
        $manager->persist($dato5);

        $dato6 = new DatoEmpresarial();
        $dato6->setFktipodatoempresarial($lineamiento);
        $dato6->setDescripcion('Gestión orientada a la satisfacción del cliente.');
        $dato6->setEstado(1);
        $manager->persist($dato6);

        $dato7 = new DatoEmpresarial();
        $dato7->setFktipodatoempresarial($lineamiento);
        $dato7->setDescripcion('Incremento de la cobertura del servicio eléctrico.');
        $dato7->setEstado(1);
        $manager->persist($dato7);

        $dato8 = new DatoEmpresarial();
        $dato8->setFktipodatoempresarial($lineamiento);
        $dato8->setDescripcion('Eficiencia operacional y estabilidad financiera.');
        $dato8->setEstado(1);
        $manager->persist($dato8);

        $dato9 = new DatoEmpresarial();
        $dato9->setFktipodatoempresarial($lineamiento);
        $dato9->setDescripcion('Gestión de calidad, seguridad industrial y comunidad.');
        $dato9->setEstado(1);
        $manager->persist($dato9);

        $manager->flush();
    }
}
