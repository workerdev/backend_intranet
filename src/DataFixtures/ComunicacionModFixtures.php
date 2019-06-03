<?php

namespace App\DataFixtures;

use App\Entity\NoticiaCategoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Files;
use App\Entity\Galeria;
use App\Entity\Noticia;
use App\Entity\CategoriaNoticia;

class ComunicacionModFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* TODO: inicio Galeria y files */
        $imagenesGaleria = new Galeria();
        $imagenesGaleria->setNombre('Imagenes');
        $imagenesGaleria->setDescripcion('Imagenes de Portada');
        $imagenesGaleria->setRuta('');
        $imagenesGaleria->setEstado(1);
        $manager->persist($imagenesGaleria);

        $videosGaleria = new Galeria();
        $videosGaleria->setNombre('Videos');
        $videosGaleria->setDescripcion('Videos de Portada');
        $videosGaleria->setRuta('');
        $videosGaleria->setEstado(1);
        $manager->persist($videosGaleria);


        $imagen1 = new Files();
        $imagen1->setRuta('elfec_intranet_backend\public\files\AGENDA.jpg');
        $imagen1->setTipo('imagen');
        $imagen1->setFkgaleria($imagenesGaleria);
        $imagen1->setEstado(1);
        $manager->persist($imagen1);

        $imagen2 = new Files();
        $imagen2->setRuta('elfec_intranet_backend\public\files\Operarios-trabajan-conexion-energia_LRZIMA20180408_0011_12.jpg');
        $imagen2->setTipo('imagen');
        $imagen2->setFkgaleria($imagenesGaleria);
        $imagen2->setEstado(1);
        $manager->persist($imagen2);

        $video1 = new Files();
        $video1->setRuta('elfec_intranet_backend\public\files\energiaSolar.mp4');
        $video1->setTipo('video');
        $video1->setFkgaleria($videosGaleria);
        $video1->setEstado(1);
        $manager->persist($video1);


        /* TODO: inicio CategoriaNoticia */

        $categorianoticia = new CategoriaNoticia();
        $categorianoticia->setNombre('Social') ;
        $categorianoticia->setDescripcion('Noticias de carácter social');
        $categorianoticia->setEstado(1);
        $manager->persist($categorianoticia);

        $categorianoticia1 = new CategoriaNoticia();
        $categorianoticia1->setNombre('Educación') ;
        $categorianoticia1->setDescripcion('Información sobre educación');
        $categorianoticia1->setEstado(1);
        $manager->persist($categorianoticia1);

        $categorianoticia2 = new CategoriaNoticia();
        $categorianoticia2->setNombre('Ambiental') ;
        $categorianoticia2->setDescripcion('Medio Ambiente Informando');
        $categorianoticia2->setEstado(1);
        $manager->persist($categorianoticia2);

        $categorianoticia4 = new CategoriaNoticia();
        $categorianoticia4->setNombre('Internacional') ;
        $categorianoticia4->setDescripcion('Noticias que ocurren fuera de nuestras fronteras');
        $categorianoticia4->setEstado(1);
        $manager->persist($categorianoticia4);

        $categorianoticia5 = new CategoriaNoticia();
        $categorianoticia5->setNombre('Urgentes') ;
        $categorianoticia5->setDescripcion('Noticias relevantes');
        $categorianoticia5->setEstado(1);
        $manager->persist($categorianoticia5);

        $categorianoticia6 = new CategoriaNoticia();
        $categorianoticia6->setNombre('Deportivo') ;
        $categorianoticia6->setDescripcion('Noticias deportivas');
        $categorianoticia6->setEstado(1);
        $manager->persist($categorianoticia6);

        $categorianoticia7 = new CategoriaNoticia();
        $categorianoticia7->setNombre('ENDE') ;
        $categorianoticia7->setDescripcion('Movimiento de ENDE');
        $categorianoticia7->setEstado(1);
        $manager->persist($categorianoticia7);

        $categorianoticia8 = new CategoriaNoticia();
        $categorianoticia8->setNombre('Nacional') ;
        $categorianoticia8->setDescripcion('Noticia del Pais');
        $categorianoticia8->setEstado(1);
        $manager->persist($categorianoticia8);

        $categorianoticia9 = new CategoriaNoticia();
        $categorianoticia9->setNombre('ELFEC') ;
        $categorianoticia9->setDescripcion('Dentro de la empresa');
        $categorianoticia9->setEstado(1);
        $manager->persist($categorianoticia9);


        /*TODO: Inicio Noticia */

        $noticia1 = new Noticia();
        $noticia1->setTitulo('ENDE PRESENTA A GOBERNADOR DE SALTA AVANCES EN LA CONSTRUCCIÓN DE LA LÍNEA DE TRANSMISIÓN QUE PERMITIRÁ LA EXPORTACIÓN DE ELECTRICIDAD A LA ARGENTINA');
        $noticia1->setSubtitulo('El presidente ejecutivo de ENDE Corporación, Ing. Joaquin Rodriguez Gutierrez, se reunió ayer con el gobernador de la Provincia de Salta, Juan Manuel Urtubey, para informar sobre los avances en la construcción de la “Línea de Transmisión Juana Azurduy de Padilla” que interconectará Bolivia y Argentina, para permitir la exportación de electricidad al vecino país.');
        $noticia1->setTipo('Noticia Empresa');
        $noticia1->setFecha(new \DateTime('2018-11-14'));
        $noticia1->setContenido('<div class="field field-name-field-imagen field-type-image field-label-hidden view-mode-full" style="color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">
        <div class="field-items">
        <figure class="clearfix field-item even" style="margin: 0px; zoom: 1;"><img class="image-style-690xauto" style="border: 0px; height: auto; max-width: 100%; box-shadow: #a0a0a0 2px 2px 2px 2px;" src="http://www.elfec.bo/sites/default/files/styles/690xauto/public/noticias/8288f964-13f9-461a-9bc6-58d96edd82c5.jpg?itok=lewr8rL5" alt="" width="690" height="460" /></figure>
        </div>
        </div>
        <div class="field field-name-body field-type-text-with-summary field-label-hidden view-mode-full" style="color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">
        <div class="field-items">
        <div class="field-item even">
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">El presidente ejecutivo de ENDE Corporaci&oacute;n, Ing. Joaquin Rodriguez Gutierrez, se reuni&oacute; ayer con el gobernador de la Provincia de Salta, Juan Manuel Urtubey, para informar sobre los avances en la construcci&oacute;n de la &ldquo;L&iacute;nea de Transmisi&oacute;n Juana Azurduy de Padilla&rdquo; que interconectar&aacute; Bolivia y Argentina, para permitir la exportaci&oacute;n de electricidad al vecino pa&iacute;s.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">Joaquin Rodriguez especific&oacute; que el proyecto comprende la construcci&oacute;n de 110 kil&oacute;metros de una l&iacute;nea de transmisi&oacute;n que comienza en Yaguacua (Bolivia) y que llega hasta Tartagal (Argentina). En la oportunidad se inform&oacute; que 40 km del tramo ubicado en territorio boliviano est&aacute;n pr&aacute;cticamente concluidos, en tanto que para realizar los otros 70 km del lado argentino, el presidente ejecutivo de ENDE indic&oacute; lo siguiente: &ldquo;estamos ultimando los &uacute;ltimos detalles para lograr la licencia ambiental que nos va a permitir iniciar obras. Nuestra expectativa es que a fines de noviembre estemos iniciando la construcci&oacute;n de la l&iacute;nea en territorio argentino&rdquo;.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">Las inversiones que realiza el Estado Plurinacional de Bolivia, previstas en 256 millones de bolivianos, prev&eacute; incrementar de forma gradual la oferta energ&eacute;tica al mercado argentino. Respecto a los avances para la construcci&oacute;n de la l&iacute;nea de interconexi&oacute;n en territorio argentino, Rodr&iacute;guez inform&oacute; que &ldquo;la provisi&oacute;n de materiales est&aacute; pr&aacute;cticamente concluida, hay varias empresas argentinas que est&aacute;n participando tanto en la parte de construcci&oacute;n como en la parte en las provisiones&rdquo;.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">A tiempo de comentar que el gobernador de Salta comprometi&oacute; todo su apoyo y predisposici&oacute;n para que el proyecto pueda concluirse en el tiempo establecido, el presidente ejecutivo de ENDE se&ntilde;al&oacute; que la &ldquo;interconexi&oacute;n nos va a permitir mejorar la calidad servicio especialmente en la zona de Tartagal&rdquo;.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">La comitiva boliviana, adem&aacute;s del presidente de ENDE Corporaci&oacute;n, estaba integrada por el gerente de proyecto de ENDE Transmisi&oacute;n Argentina S.A., Ren&eacute; C&oacute;rdova Salinas; Carlos Rocha Fuentes Asesor Legal del Comit&eacute; Nacional de Despacho de Carga (CNDC) y el c&oacute;nsul de Bolivia en Salta Mauricio Espinoza Linares.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">La exportaci&oacute;n de excedentes de generaci&oacute;n el&eacute;ctrica es parte de la estrategia del Estado Plurinacional de Bolivia que impulsa el Ministerio de Energ&iacute;as para diversificar y fortalecer la econom&iacute;a boliviana gracias a la administraci&oacute;n soberana de las empresas que fueron nacionalizadas.</div>
        </div>
        </div>
        </div>');
        $noticia1->setEstado(1);
        $manager->persist($noticia1);

        $noticia2 = new Noticia();
        $noticia2->setTitulo('ELFEC INICIÓ OBRAS PARA LA CONSTRUCCIÓN DE TORRES DE TELECOMUNICACIONES');
        $noticia2->setSubtitulo('La Empresa de Luz y Fuerza Eléctrica Cochabamba (ELFEC),  filial de ENDE Corporación, dio inicio a las obras para la construcción de 5 torres auto soportadas de telecomunicaciones en el trópico de Cochabamba, ubicadas en las provincias de Villa Tunari, Isinuta, Cesarzama, Ivirgarzama y Entre Rios.');
        $noticia2->setTipo('Noticia Empresa');
        $noticia2->setFecha(new \DateTime('2018-11-15'));
        $noticia2->setContenido('<p><img class="image-style-690xauto" style="border: 0px; height: auto; max-width: 100%; box-shadow: #a0a0a0 2px 2px 2px 2px; color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;" src="http://www.elfec.bo/sites/default/files/styles/690xauto/public/noticias/1234.jpg?itok=gXgpEcTV" alt="" width="690" height="518" /></p>
        <p style="margin: 0px 0px 1.5em; color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">La Empresa de Luz y Fuerza El&eacute;ctrica Cochabamba (ELFEC),&nbsp; filial de ENDE Corporaci&oacute;n, dio inicio a las obras para la construcci&oacute;n de 5 torres auto soportadas de telecomunicaciones en el tr&oacute;pico de Cochabamba, ubicadas en las provincias de Villa Tunari, Isinuta, Cesarzama, Ivirgarzama y Entre Rios.</p>
        <p style="margin: 0px 0px 1.5em; color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">Esta infraestructura base abrir&aacute; las puertas para la implementaci&oacute;n de soluciones tecnol&oacute;gicas actuales tales como una red de comunicaci&oacute;n SCADA, red de radio comunicaci&oacute;n ROIP (Radiocomunicaci&oacute;n sobre protocolo de internet) e implementaci&oacute;n de proyectos de medici&oacute;n inteligente AMI (Medici&oacute;n Remota Inteligente), lo que permitir&aacute; hacer m&aacute;s r&aacute;pida y eficiente &nbsp;la atenci&oacute;n de solicitudes de servicios y emergencias de &nbsp;nuestros clientes en el tr&oacute;pico cochabambino, &nbsp;mejorando as&iacute; los indicadores de calidad en cumplimiento a la misi&oacute;n como empresa que brinda&nbsp; servicio de suministro de energ&iacute;a el&eacute;ctrica.</p>
        <p style="margin: 0px 0px 1.5em; color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">Las inversiones planificadas por ELFEC tienen como objetivo repotenciar los sistemas de comunicaci&oacute;n del tr&oacute;pico cochabambino permitiendo una comunicaci&oacute;n m&aacute;s eficiente y fluida, con todas las oficinas rurales y la central del departamento.</p>');
        $noticia2->setEstado(1);
        $manager->persist($noticia2);

        $noticia3 = new Noticia();
        $noticia3->setTitulo('ELFEC GANÓ EL RODEO NACIONAL DE LINIEROS');
        $noticia3->setSubtitulo('La Empresa de Luz y Fuerza Eléctrica Cochabamba, filial de ENDE Corporación, resultó ganador general del 3er. Rodeo Nacional de Linieros realizado el viernes 7 de septiembre en la Villa Olímpica del Distrito 10 y que contó con la participación de 11 equipos que representaron a empresas de distribución eléctrica de todo el país.');
        $noticia3->setTipo('Noticia Empresa');
        $noticia3->setFecha(new \DateTime('2018-11-15'));
        $noticia3->setContenido('<div class="field field-name-field-imagen field-type-image field-label-hidden view-mode-full" style="color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">
        <div class="field-items">
        <figure class="clearfix field-item even" style="margin: 0px; zoom: 1;">
        <div class="field field-name-field-imagen field-type-image field-label-hidden view-mode-full">
        <div class="field-items">
        <figure class="clearfix field-item even" style="margin: 0px; zoom: 1;"><img class="image-style-690xauto" style="border: 0px; height: auto; max-width: 100%; box-shadow: #a0a0a0 2px 2px 2px 2px;" src="http://www.elfec.bo/sites/default/files/styles/690xauto/public/noticias/mosaico_rodeo.jpg?itok=RUlDGPz0" alt="" width="690" height="268" /></figure>
        </div>
        </div>
        <div class="field field-name-body field-type-text-with-summary field-label-hidden view-mode-full">
        <div class="field-items">
        <div class="field-item even">
        <p style="margin: 0px 0px 1.5em;">La Empresa de Luz y Fuerza El&eacute;ctrica Cochabamba, filial de ENDE Corporaci&oacute;n, result&oacute; ganador general del 3er. Rodeo Nacional de Linieros realizado el viernes 7 de septiembre en la Villa Ol&iacute;mpica del Distrito 10 y que cont&oacute; con la participaci&oacute;n de 11 equipos que representaron a empresas de distribuci&oacute;n el&eacute;ctrica de todo el pa&iacute;s.</p>
        <p style="margin: 0px 0px 1.5em;">La competencia que vela por la seguridad, pericia t&eacute;cnica y dominio del cumplimiento de los procesos que garantizan operaciones seguras en redes de media tensi&oacute;n tuvo los siguientes resultados:</p>
        <p style="margin: 0px 0px 1.5em;"><img style="border: 0px; height: 1200px; max-width: 100%; box-shadow: #a0a0a0 2px 2px 2px 2px; width: 849px;" src="http://www.elfec.bo/sites/default/files/resultados_3er._rodeo_nacional_de_linieros.jpg" alt="" /></p>
        <p style="margin: 0px 0px 1.5em;">Durante la clausura del evento, el gerente general de ELFEC, Ing. Rub&eacute;n Carvajal, destac&oacute; que casi todas las empresas participantes se llevaron alg&uacute;n premio lo que significa que esta edici&oacute;n del Rodeo Nacional present&oacute; un nivel bastante parejo entre los participantes, lo que permite afirmar que el mayor ganador del evento fue la seguridad.</p>
        <p style="margin: 0px 0px 1.5em;">Videos y fotograf&iacute;as disponibles en:&nbsp;<a style="text-decoration-line: none; color: #21337f;" href="https://www.facebook.com/ende.elfec/">https://www.facebook.com/ende.elfec/</a></p>
        </div>
        </div>
        </div>
        </figure>
        </div>
        </div>
        <div class="field field-name-body field-type-text-with-summary field-label-hidden view-mode-full" style="color: #444444; font-family: \'Trebuchet MS\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 14px; background-color: #f8f8f8;">
        <div class="field-items">
        <div class="field-item even">
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">A tiempo de comentar que el gobernador de Salta comprometi&oacute; todo su apoyo y predisposici&oacute;n para que el proyecto pueda concluirse en el tiempo establecido, el presidente ejecutivo de ENDE se&ntilde;al&oacute; que la &ldquo;interconexi&oacute;n nos va a permitir mejorar la calidad servicio especialmente en la zona de Tartagal&rdquo;.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">La comitiva boliviana, adem&aacute;s del presidente de ENDE Corporaci&oacute;n, estaba integrada por el gerente de proyecto de ENDE Transmisi&oacute;n Argentina S.A., Ren&eacute; C&oacute;rdova Salinas; Carlos Rocha Fuentes Asesor Legal del Comit&eacute; Nacional de Despacho de Carga (CNDC) y el c&oacute;nsul de Bolivia en Salta Mauricio Espinoza Linares.</div>
        <div class="_2cuy _3dgx _2vxa" style="white-space: pre-wrap; direction: ltr; box-sizing: border-box; margin: 0px auto 28px; width: 700px; overflow-wrap: break-word; font-family: Georgia, serif; color: #1d2129; font-size: 17px;">La exportaci&oacute;n de excedentes de generaci&oacute;n el&eacute;ctrica es parte de la estrategia del Estado Plurinacional de Bolivia que impulsa el Ministerio de Energ&iacute;as para diversificar y fortalecer la econom&iacute;a boliviana gracias a la administraci&oacute;n soberana de las empresas que fueron nacionalizadas.</div>
        </div>
        </div>
        </div>');
        $noticia3->setEstado(1);
        $manager->persist($noticia3);

        $noticia4 = new Noticia();
        $noticia4->setTitulo('Asesor legal de Elfec dice que esa empresa no le debe nada a Comteco: “Fue el Estado el que nacionalizó”');
        $noticia4->setSubtitulo('El asesor legal de la Empresa de Luz y Fuerza Eléctrica Cochabamba (Elfec), Mauricio Antezana, manifestó hoy que esa empresa no le debe nada a la Cooperativa de Telecomunicaciones de Cochabamba (Comteco). ');
        $noticia4->setTipo('Noticia Empresa');
        $noticia4->setFecha(new \DateTime('2018-04-16'));
        $noticia4->setContenido('<p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;"><img class="image-style-noticia-detalle" style="box-sizing: border-box; border: 0px; max-width: 100%; display: block; margin: 0px auto; color: #222222; font-family: Verdana, Arial, sans-serif; font-size: 15.4px; text-align: left; height: auto !important;" title="El asesor legal de la Empresa de Luz y Fuerza El&eacute;ctrica Cochabamba (Elfec), Mauricio Antezana. |   " src="http://www.lostiempos.com/sites/default/files/styles/noticia_detalle/public/media_imagen/2018/4/16/whatsapp_image_2018-04-16_at_19.08.38_copia_0.jpg?itok=7036Z2cA" /></p>
        <div class="bx-caption" style="box-sizing: border-box; bottom: 0px; left: 0px; background: rgba(30, 30, 30, 0.75); width: 644px; color: #222222; font-family: Verdana, Arial, sans-serif; font-size: 15.4px; position: relative !important;"><span style="box-sizing: border-box; color: #888888; font-family: Arial; display: block; font-size: 0.85em; padding: 10px;">El asesor legal de la Empresa de Luz y Fuerza El&eacute;ctrica Cochabamba (Elfec), Mauricio Antezana. |</span></div>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">&nbsp;</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">El asesor legal de la Empresa de Luz y Fuerza El&eacute;ctrica Cochabamba (Elfec), Mauricio&nbsp;<span style="box-sizing: border-box; font-weight: bold;">Antezana, manifest&oacute; hoy que esa empresa no le debe nada a la Cooperativa de Telecomunicaciones de Cochabamba (Comteco).&nbsp;</span></p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">Dijo que es<span style="box-sizing: border-box; font-weight: bold;">&nbsp;el Estado, a trav&eacute;s de la Empresa Nacional de Electricidad (ENDE), es quien mantuvo reuniones con los ejecutivos de Comteco</span>&nbsp;y realiz&oacute; la valoraci&oacute;n respectiva sobre el monto de la indemnizaci&oacute;n, el cual se puso en conocimiento de la Cooperativa.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">"(El senador de UD Arturo Murillo) se refiere a que no se habr&iacute;a pagado el monto de la nacionalizaci&oacute;n, sin embargo hemos tomado conocimiento que&nbsp;<span style="box-sizing: border-box; font-weight: bold;">en 2011, dando cumplimiento al Decreto Supremo N&ordm; 494 ENDE sostuvo reuniones con ejecutivos de Comteco y puso en su conociendo el resultado que realiz&oacute; una firma de consultora independiente, el cual no habr&iacute;a sido aceptado por Comteco</span>", explic&oacute; en una conferencia de prensa.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">Las declaraciones se dan&nbsp;<span style="box-sizing: border-box; font-weight: bold;">luego de que Murillo present&oacute; hoy una denuncia formal ante la Fiscal&iacute;a contra dos altos funcionarios de la ENDE por presunto da&ntilde;o econ&oacute;mico e incumplimiento de deberes</span>&nbsp;en el marco de la nacionalizaci&oacute;n de la Elfec.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">"<span style="box-sizing: border-box; font-weight: bold;">Elfec le cost&oacute; a Cochabamba y a Comteco, alrededor de 120 millones de bolivianos y esos recursos no han sido devueltos a Cochabamba</span>. Elfec, desde su nacionalizaci&oacute;n, ha producido en utilidades alrededor de 300 millones de bolivianos. Son datos de la Autoridad de Supervisi&oacute;n del Sistema Financiero (ASFI)", explic&oacute; Murillo.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">Al respecto,&nbsp;<span style="box-sizing: border-box; font-weight: bold;">Antezana dijo que ENDE es el accionista mayoritario y tiene el control de la empresa, por lo tanto "las utilidades pasan a los bolivianos no a los cochabambinos".</span></p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">"<span style="box-sizing: border-box; font-weight: bold;">Vamos a establecer nuestra inocencia</span>&nbsp;y que todo lo que se hizo esta en el marco de la ley", concluy&oacute; el asesor legal de la Elfec.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">La empresa cochabambina fue nacionaliza el 1 de mayo de 2010 y el 2 de abril de 2012&nbsp;<span style="box-sizing: border-box; font-weight: bold;">ENDE, en representaci&oacute;n del Estado, asumi&oacute; la propiedad del 92.12 por ciento de las acciones de Elfec.</span></p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">La promulgaci&oacute;n del Decreto Supremo 1178 acredit&oacute; su titularidad accionaria. Estas acciones pertenec&iacute;an a la empresa Luz del Valle conformada por el 56 por ciento de las acciones de Comteco y por el 40 por ciento de los trabajadores de Elfec.</p>
        <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; color: #333333; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 18px;">Un estudio realizado por Comteco se&ntilde;ala que&nbsp;<span style="box-sizing: border-box; font-weight: bold;">el valor del 92.12 por ciento de las acciones, que pasaron al Estado, equivale a 82 millones de d&oacute;lares.</span></p>');
        $noticia4->setEstado(1);
        $manager->persist($noticia4);

        $noticia5 = new Noticia();
        $noticia5->setTitulo('Ven afán de tomar el municipio como un “botín”');
        $noticia5->setSubtitulo('Ante la emisión de un paquete de decretos ediles y ejecutivos que vulneran la normativa que rige la vida institucional del municipio, publicados horas antes de la detención del alcalde José María Leyes y otros con posterioridad, el concejal Edwin Jiménez alertó sobre la comisión de posibles ilícitos de funcionarios.');
        $noticia5->setTipo('Noticia Prensa');
        $noticia5->setFecha(new \DateTime('2018-12-05'));
        $noticia5->setContenido('<div class="panels-flexible-region panels-flexible-region-noticia_layout-noticia_content panels-flexible-region-first noticia-content" style="box-sizing: border-box; float: left; width: 840px; border-top: 1px solid #b2b2b2; color: #333333; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; margin-left: 15px !important; padding: 0px 0px 0px 0px !important;">
            <div class="inside panels-flexible-region-inside panels-flexible-region-noticia_layout-noticia_content-inside panels-flexible-region-inside-first" style="box-sizing: border-box; padding: 0px;">
            <div class="panel-pane pane-entity-view pane-node no-title block" style="box-sizing: border-box; margin-bottom: 10px;">
            <div class="block-inner clearfix" style="box-sizing: border-box; zoom: 1; margin-left: 0px; margin-right: 0px;">
            <div class="block-content" style="box-sizing: border-box;">
            <article id="node-441712" class="node node-noticia article odd node-full clearfix" style="box-sizing: border-box; zoom: 1; margin-bottom: 20px; position: relative;">
            <div class="node-content" style="box-sizing: border-box; clear: both;">
            <div class="multimedia" style="box-sizing: border-box;">
            <div id="tabs-multimedia-content" class="ui-tabs ui-widget ui-widget-content ui-corner-all" style="box-sizing: border-box; font-family: Verdana, Arial, sans-serif; font-size: 1.1em; border: none; background-image: url(\'images/ui-bg_flat_75_ffffff_40x100.png\'); background-position: 50% 50%; background-size: initial; background-repeat: repeat-x; background-attachment: initial; background-origin: initial; background-clip: initial; color: #222222; border-radius: 4px; position: relative; padding: 0px;">
            <div id="mult-portada" class="mult-panel portada" style="box-sizing: border-box; position: relative; clear: both; padding: 0px;">
            <div id="field_noticia_fotos" class="bxslider-field_noticia_fotos-processed" style="box-sizing: border-box;">
            <div class="bx-wrapper" style="box-sizing: border-box; position: relative; margin: 0px auto; padding: 0px; max-width: 100%;">
            <div class="bx-viewport" style="box-sizing: border-box; height: 466px; box-shadow: none; border: none; left: 0px; background: transparent; transform: translateZ(0px); width: 770px; overflow: hidden; position: relative;">
            <ul class="bxslider" style="box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 15px; width: 2425.5px; position: relative; transition-duration: 0s; transform: translate3d(-15px, 0px, 0px);">
            <li style="box-sizing: border-box; margin: 0px; padding: 0px; width: 770px; float: left; list-style: none; position: relative;"><img class="image-style-noticia-detalle" style="box-sizing: border-box; border: 0px; height: auto !important; max-width: 100%; display: block; margin: 0px auto;" title="Una copia de uno de los decretos municipales. | LOS TIEMPOS" src="http://www.lostiempos.com/sites/default/files/styles/noticia_detalle/public/media_imagen/2018/12/5/12_me_5_tiempossssssss.jpg?itok=pH8hZZOy" />
            <div class="bx-caption" style="box-sizing: border-box; position: relative !important; bottom: 0px; left: 0px; background: rgba(30, 30, 30, 0.75); width: 770px;"><span style="box-sizing: border-box; color: #ffffff; font-family: Arial; display: block; font-size: 0.85em; padding: 10px;">Una copia de uno de los decretos municipales. | LOS TIEMPOS</span></div>
            </li>
            </ul>
            </div>
            <div class="bx-controls bx-has-controls-direction" style="box-sizing: border-box;">&nbsp;</div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div class="autor" style="box-sizing: border-box; overflow: hidden; margin-top: 15px; clear: both;">
            <div class="field field-name-field-autor field-type-entityreference field-label-hidden view-mode-full" style="box-sizing: border-box; color: #434343; float: left; font-size: 1.5rem;">
            <div class="field-items" style="box-sizing: border-box;">
            <div class="field-item even" style="box-sizing: border-box;"><br />Ante la emisi&oacute;n de un paquete de decretos ediles y ejecutivos que vulneran la normativa que rige la vida institucional del municipio, publicados horas antes de la detenci&oacute;n del alcalde Jos&eacute; Mar&iacute;a Leyes y otros con posterioridad, el concejal Edwin Jim&eacute;nez alert&oacute; sobre la comisi&oacute;n de posibles il&iacute;citos de funcionarios.</div>
            </div>
            </div>
            </div>
            <div class="body" style="box-sizing: border-box; font-family: \'Source Serif Pro\', \'Times New Roman\', Times, serif; font-size: 1.8rem; line-height: 1.6; margin-top: 20px; margin-bottom: 20px;">
            <div class="field field-name-body field-type-text-with-summary field-label-hidden view-mode-full" style="box-sizing: border-box;">
            <div class="field-items" style="box-sizing: border-box;">
            <div class="field-item even" style="box-sizing: border-box;">
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">El que m&aacute;s alarma es el Decreto 056, de 28 de noviembre, que &ldquo;delega al secretario general la competencia de la M&aacute;xima Autoridad Ejecutiva para temas administrativos&rdquo;.</p>
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">Aunque la disposici&oacute;n se refer&iacute;a s&oacute;lo a los casos de los involucrados en los casos de corrupci&oacute;n que se investigan en el municipio, se ha comenzado a aplicar para destituir funcionarios y colocar a personal af&iacute;n a la gesti&oacute;n.</p>
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">Jim&eacute;nez manifest&oacute;: &ldquo;Si nos vamos al art&iacute;culo 26 de la Ley 482 de Gobierno Aut&oacute;nomos Municipales, dice que es facultad de la M&aacute;xima Autoridad Ejecutiva dictar decretos y designar a los secretarios&rdquo;.</p>
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">Sigui&oacute;: &ldquo;El &uacute;nico que puede firmar decreto edil es el Alcalde y la &uacute;nica forma de designar a estas&nbsp;autoridades es mediante decreto edil, por tanto, un secretario no puede designar a otro secretario mediante decreto edil. Concordante con esta ley, tenemos la Ley Municipal 026, que en su art&iacute;culo 26 dice: el decreto edil es el documento normativo de la MAE dicta conforme su competencia&rdquo;.</p>
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">Los afectados lamentan que se intente tomar nuevamente el municipio como un &ldquo;bot&iacute;n&rdquo;. A&ntilde;adieron que otra muestra de esto es el retorno de exfuncionarios cuestionados y procesados.</p>
            <p class="rtejustify" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify;">Entre los decretos publicados 29 de noviembre y 1 de diciembre est&aacute;n el 095, 096, 097,098 y 099. Adem&aacute;s de cuatro de car&aacute;cter ejecutivo 097, 056, 057 y 058.</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </article>
            </div>
            </div>
            </div>
            </div>
            </div>');
        $noticia5->setEstado(1);
        $manager->persist($noticia5);

        $noticia6 = new Noticia();
        $noticia6->setTitulo('Paro del día Miercoles');
        $noticia6->setSubtitulo('Paro del día Miercoles');
        $noticia6->setTipo('Urgente');
        $noticia6->setContenido('');
        $noticia6->setFecha(new \DateTime('2018-12-05'));
        $noticia6->setEstado(1);
        $manager->persist($noticia6);

        $noticia7 = new Noticia();
        $noticia7->setTitulo('Partidos dentro de la Empresa');
        $noticia7->setSubtitulo('PLa final se jugará en la cancha de siempre, deseamos suerte al equipo de Mantenimiento y Desarrollo.');
        $noticia7->setTipo('Destacados');
        $noticia7->setFecha(new \DateTime('2018-12-05'));
        $noticia7->setContenido('');
        $noticia7->setEstado(1);
        $manager->persist($noticia7);


        /* TODO: insert categoria noticias */

        $notiCategoria1 = new NoticiaCategoria();
        $notiCategoria1->setFknoticia($noticia1);
        $notiCategoria1->setFkcategoria($categorianoticia7);
        $manager->persist($notiCategoria1);

        $notiCategoria2 = new NoticiaCategoria();
        $notiCategoria2->setFknoticia($noticia1);
        $notiCategoria2->setFkcategoria($categorianoticia4);
        $manager->persist($notiCategoria2);

        $notiCategoria3 = new NoticiaCategoria();
        $notiCategoria3->setFknoticia($noticia2);
        $notiCategoria3->setFkcategoria($categorianoticia7);
        $manager->persist($notiCategoria3);

        $notiCategoria4 = new NoticiaCategoria();
        $notiCategoria4->setFknoticia($noticia3);
        $notiCategoria4->setFkcategoria($categorianoticia7);
        $manager->persist($notiCategoria4);

        $notiCategoria5 = new NoticiaCategoria();
        $notiCategoria5->setFknoticia($noticia3);
        $notiCategoria5->setFkcategoria($categorianoticia);
        $manager->persist($notiCategoria5);

        $notiCategoria6 = new NoticiaCategoria();
        $notiCategoria6->setFknoticia($noticia4);
        $notiCategoria6->setFkcategoria($categorianoticia7);
        $manager->persist($notiCategoria6);

        $notiCategoria7 = new NoticiaCategoria();
        $notiCategoria7->setFknoticia($noticia5);
        $notiCategoria7->setFkcategoria($categorianoticia);
        $manager->persist($notiCategoria7);

        $notiCategoria8 = new NoticiaCategoria();
        $notiCategoria8->setFknoticia($noticia5);
        $notiCategoria8->setFkcategoria($categorianoticia8);
        $manager->persist($notiCategoria8);

        $notiCategoria9 = new NoticiaCategoria();
        $notiCategoria9->setFknoticia($noticia6);
        $notiCategoria9->setFkcategoria($categorianoticia9);
        $manager->persist($notiCategoria9);

        $notiCategoria10 = new NoticiaCategoria();
        $notiCategoria10->setFknoticia($noticia6);
        $notiCategoria10->setFkcategoria($categorianoticia5);
        $manager->persist($notiCategoria10);

        $notiCategoria11 = new NoticiaCategoria();
        $notiCategoria11->setFknoticia($noticia7);
        $notiCategoria11->setFkcategoria($categorianoticia6);
        $manager->persist($notiCategoria11);

        $notiCategoria12 = new NoticiaCategoria();
        $notiCategoria12->setFknoticia($noticia7);
        $notiCategoria12->setFkcategoria($categorianoticia9);
        $manager->persist($notiCategoria12);


        $manager->flush();
    }
}
