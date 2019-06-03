<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Menu;
use App\Entity\Enlaces;
use App\Entity\Catalogo;

class ConfiguracionModFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* TODO: Cambios Liz */
        /* TODO: inicio de menu */
        $menu1 = new Menu();
        $menu1->setNombre('Empresa');
        $menu1->setIcono('/images/Elfec03.png'); $menu1->getEstado( 1);
        $menu1->setEstado(1);
        $manager->persist($menu1);

        $menu2 = new Menu();
        $menu2->setNombre('Personal');
        $menu2->setIcono('/images/Elfec04.png'); $menu2->getEstado( 1);
        $menu2->setEstado(1);
        $manager->persist($menu2);

        $menu3 = new Menu();
        $menu3->setNombre('Indicadores');
        $menu3->setIcono('/images/Elfec10.png'); $menu3->getEstado( 1);
        $menu3->setEstado(1);
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setNombre('Sistema Integrado de Gestión');
        $menu4->setIcono('/images/Elfec06.png'); $menu4->getEstado( 1);
        $menu4->setEstado(1);
        $manager->persist($menu4);

        $menu5 = new Menu();
        $menu5->setNombre('Informacion SIG');
        $menu5->setIcono('/images/Elfec07.png'); $menu5->getEstado( 1);
        $menu5->setEstado(1);
        $manager->persist($menu5);

        $menu6 = new Menu();
        $menu6->setNombre('Comunicación');
        $menu6->setIcono('/images/Elfec08.png'); $menu6->getEstado( 1);
        $menu6->setEstado(1);
        $manager->persist($menu6);

        $menu7 = new Menu();
        $menu7->setNombre('Mis Links');
        $menu7->setIcono('/images/Elfec09.png'); $menu7->getEstado( 1);
        $menu7->setEstado(1);
        $manager->persist($menu7);

        $menu8 = new Menu();
        $menu8->setNombre('Correlativo');
        $menu8->setIcono('/images/Elfec11.png'); $menu8->getEstado( 1);
        $menu8->setEstado(1);
        $manager->persist($menu8);


        /* TODO: inicio enlaces Externos*/
        $enlaceLaPaz = new Enlaces();
        $enlaceLaPaz->setNombre('Ende La Paz');
        $enlaceLaPaz->setDescripcion('Empresa Nacional de Electrificacion de La Paz');
        $enlaceLaPaz->setRuta('D:\Elfec\Elfec_backend\elfec_intranet_backend\public\files/LogoDELAPAZ.png');
        $enlaceLaPaz->setLink('https://www.ende.bo/empresas/corporacion/delapaz');
        $enlaceLaPaz->setEstado(1);
        $manager->persist($enlaceLaPaz);

        $enlaceOruro = new Enlaces();
        $enlaceOruro->setNombre('Ende Oruro');
        $enlaceOruro->setDescripcion('Ende en la ciudad de Oruro');
        $enlaceOruro->setRuta('D:\Elfec\Elfec_backend\elfec_intranet_backend\public\files/logoendeoruro.png');
        $enlaceOruro->setLink('https://www.deoruro.bo/');
        $enlaceOruro->setEstado(1);
        $manager->persist($enlaceOruro);


        /* TODO: inicio catalogo */
        $catalogo1 = new Catalogo();
        $catalogo1->setSistema('ACCIONISTAS');
        $catalogo1->setDescripcion('Administración de títulos de accionistas');
        $catalogo1->setUrldueno('Mauricio Vallejo');
        $catalogo1->setEstado(1);
        $manager->persist($catalogo1);

        $catalogo2 = new Catalogo();
        $catalogo2->setSistema('Sistema de Correspondencia Externa (SIGDO)');
        $catalogo2->setDescripcion('Gestión de correspondencia Externa');
        $catalogo2->setUrldueno('http://sigdo');
        $catalogo2->setEstado(1);
        $manager->persist($catalogo2);

        $catalogo3 = new Catalogo();
        $catalogo3->setSistema('ACTIVOS FIJOS');
        $catalogo3->setDescripcion('Registro y control de activos fijos que comprenden bienes de propiedad general y líneas de redes de distribución');
        $catalogo3->setUrldueno('Mauricio Vallejo');
        $catalogo3->setEstado(1);
        $manager->persist($catalogo3);

        $catalogo4 = new Catalogo();
        $catalogo4->setSistema('Aplicación Móvil de Busqueda Off - Line');
        $catalogo4->setDescripcion('Aplicación que tiene por objetivo buscar elementos de la red eléctrica, utilizando los mapas y los puntos georeferenciados.');
        $catalogo4->setUrldueno('Ramiro Iriarte');
        $catalogo4->setEstado(1);
        $manager->persist($catalogo4);

        $catalogo5 = new Catalogo();
        $catalogo5->setSistema('Aplicación Móvil Registro de Vegetación');
        $catalogo5->setDescripcion('Aplicación que tiene por objetivo buscar elementos de la red eléctrica, utilizando los mapas y puntos georeferenciados, y registrar la vegetación con sus datos parametrizados.');
        $catalogo5->setUrldueno('David Atahuichi');
        $catalogo5->setEstado(1);
        $manager->persist($catalogo5);

        $catalogo6 = new Catalogo();
        $catalogo6->setSistema('Aplicación Móvil Reporte Trabajo Diario y Pendientes (REPOCOD)');
        $catalogo6->setDescripcion('Aplicación que tiene por objetivo reportar los trabajos diarios y los pendientes en Operaciones de trabajos que se realizan en el terreno.');
        $catalogo6->setUrldueno('David Atahuichi');
        $catalogo6->setEstado(1);
        $manager->persist($catalogo6);

        $catalogo7 = new Catalogo();
        $catalogo7->setSistema('ASISTENCIA y Sobretiempos');
        $catalogo7->setDescripcion('Elaboración de datos de asistencia para alimentar a RRHH y tiene la nueva opción de llenar datos de horas extras de los empleados.');
        $catalogo7->setUrldueno('Carlos Quiroga');
        $catalogo7->setEstado(1);
        $manager->persist($catalogo7);

        $catalogo8 = new Catalogo();
        $catalogo8->setSistema('MESA DE AYUDA');
        $catalogo8->setDescripcion('Registro, control y seguimiento de Requerimientos e Incidentes informáticos');
        $catalogo8->setUrldueno('http://intranet/mesaayuda/ma_principal.html');
        $catalogo8->setEstado(1);
        $manager->persist($catalogo8);

        $catalogo9 = new Catalogo();
        $catalogo9->setSistema('Sistema de Correspondencia Externa (SIGDO)');
        $catalogo9->setDescripcion('Gestión de correspondencia Externa');
        $catalogo9->setUrldueno('http://sigdo');
        $catalogo9->setEstado(1);
        $manager->persist($catalogo9);

        $catalogo10 = new Catalogo();
        $catalogo10->setSistema('HIGIENE Y SEGURIDAD');
        $catalogo10->setDescripcion('Registro y Control de Incidentes laborales');
        $catalogo10->setUrldueno('http://intranet/hysweb/login/');
        $catalogo10->setEstado(1);
        $manager->persist($catalogo10);

        $catalogo11 = new Catalogo();
        $catalogo11->setSistema('Sistema de Alcoholemia');
        $catalogo11->setDescripcion('El sistema de Alcoholemia permite seleccionar de forma aleatoria a los funcionarios o empleado del Elfec que pertenecen a una Zona la cual debe ser seleccionada previamente. Dicha selección esta configurada para definir la cantidad de empleados por zona considerando además parametros de choferes y personal administrativo de acuerdo al algoritmo establecido en los procedimientos de la Empresa. El sistema también permite generar el reporte previo y final del control realizado. ');
        $catalogo11->setUrldueno('alcoholemia.elfec.com');
        $catalogo11->setEstado(1);
        $manager->persist($catalogo11);

        $catalogo12 = new Catalogo();
        $catalogo12->setSistema('Sistema Rastreo Vehicular');
        $catalogo12->setDescripcion('"El sistema de rastreo Vehicular es una herramienta informática de apoyo al seguimiento y control de vehículos mediante GPS y que tiene como principales funciones:
- Gestión de Vehículos y GPSs
- Seguimiento online de vehículos con GPSs.
- Posibilidad de supervisión de distancias y velocidades
- Reporte por fechas sobre recorridos realizados sobre un mapa geo referenciado
- Detección de desconexiones.
- Reportes varios en rangos de fechas y horas."');
        $catalogo12->setUrldueno('rastreo.elfec.com');
        $catalogo12->setEstado(1);
        $manager->persist($catalogo12);

        $catalogo13 = new Catalogo();
        $catalogo13->setSistema('Sistema de Gestión Comercial');
        $catalogo13->setDescripcion('"Módulos: Clientes, Solicitudes, Facturación, Anulación, Castigo, Contraseñas
rámites No Regulados (Consultas),  Digitalización de documentos
Trámite de Cambio de Nombre -Consulta General de Cuentas -Trámite de Cambio de Ubicación"');
        $catalogo13->setUrldueno('webserver/SGC/');
        $catalogo13->setEstado(1);
        $manager->persist($catalogo13);

        $catalogo14 = new Catalogo();
        $catalogo14->setSistema('SGT');
        $catalogo14->setDescripcion('Sistema de Gestión Técnica  - Registro y control de elementos de red');
        $catalogo14->setUrldueno('http://serverweb/SGT/');
        $catalogo14->setEstado(1);
        $manager->persist($catalogo14);

        $catalogo15 = new Catalogo();
        $catalogo15->setSistema('SISMAN');
        $catalogo15->setDescripcion('Administracion de Solicitudes de Mantenimiento (SM) Órdenes de Trabajo (OT). Recepción de SM de otros sectores (Integracion HIYSI, BILLING, SGT). Generacion de Planillas de Inspección/Relevamiento. Generacion de Presupuestos para trabajos de mantenimiento. Emisión de documentos formales para la ejecución de trabajos (materiales y mano de obra). Emision de documentos de liquidación por trabajos de terceros (Integracion ERP). Generacion de Proyectos para casos de mantenimiento mayor (integracion Módulo de Obras). Generacion de informes de Termografia');
        $catalogo15->setUrldueno('http://sisman.elfec.com/');
        $catalogo15->setEstado(1);
        $manager->persist($catalogo15);

        $catalogo16 = new Catalogo();
        $catalogo16->setSistema('Cortes web');
        $catalogo16->setDescripcion('"Permite realizar el registro de todos los cortes y reconexiones en línea o en el momento exacto en que se  esté realizando el trabajo a través de dispositivos móviles utilizando conexiones 3G. 
El registro de cortes en línea permite realizar el trabajo en terreno y evitar posibles cortes a clientes que realizan el pago de sus facturas adeudadas en el mismo día. 
El registro de reconexiones en línea permite informar al reconector de manera eficiente y el momento exacto cuando un cliente debe ser reconectado. 
En ambos casos se está evitando el trabajo de transcripción a destiempo y de esta manera obtener información con mayor calidad y en el momento adecuado.
Permite  georeferenciar el suministro seleccionado y desplegarlo en el mapa de GoogleMaps de manera que facilite su ubicación al cortador que tenga algún problema en encontrar al cliente."');
        $catalogo16->setUrldueno('https://cortes.elfec.com/');
        $catalogo16->setEstado(1);
        $manager->persist($catalogo16);

        $catalogo17 = new Catalogo();
        $catalogo17->setSistema('Sistema de Gestion Para la Calidad de Servicio Técnico');
        $catalogo17->setDescripcion('"1. ADMINISTRACION: Módulo que permite la gestión de parámetros utilizados por el sistema. Estos pueden ser; Planificador, Periodos, Indicadores, Tarifas, Libreta de Direcciones
2. PROCESOS: Módulo compuesto por las siguientes opciones: Índices Globales, Índices Individuales, Reducciones, Restituciones, Entregas SSDE, Tablas Personalizadas, Edición de Tablas
3. REPORTES: Módulo integrado por las opciones: Indicadores, Interrupciones, Internos
4. FUERZA MAYOR: Subsistema orientado a la generación de casos de Fuerza Mayor. Compuesto por las opciones: Casos Fuerza Mayor y Generación Tabla CC01
5. HERRAMIENTAS: Módulo compuesto por las opciones: Calendario: Muestra la calendarización de los diferentes tipos de tareas y el estado en el que se encuentran."');
        $catalogo17->setUrldueno('http://elflwb01/sgcst/');
        $catalogo17->setEstado(1);
        $manager->persist($catalogo17);

        $catalogo18 = new Catalogo();
        $catalogo18->setSistema('SGLabmed');
        $catalogo18->setDescripcion('"Administración: Módulo que permite el ingreso de información utilizada en la parametrización funcional del sistema.
Administración: Módulo que permite el ingreso de información utilizada en la parametrizacion funcional del sistema.
Solicitudes Labmed: Registro de solicitudes de servicios.
Estaciones de Trabajo: Muestra las solicitudes asignadas a cada estación de trabajo para su respectiva ejecución
Gestión Supervisor: Permite la valoración (Aceptar/Rechazar) de trabajos ejecutados y la reimpresión de certificados
Consultas: Genera consultas sobre Datos de la Solicitud, Datos del Objeto de Ensayo, Datos de la Estacion de Trabajo, Fecha Transicion Estados
Reportes: Reimpresion de certificados generados por el CERMED (sistema anterior)"');
        $catalogo18->setUrldueno('http://elflwb01/sglabmed/');
        $catalogo18->setEstado(1);
        $manager->persist($catalogo18);

        $manager->flush();
    }
}
