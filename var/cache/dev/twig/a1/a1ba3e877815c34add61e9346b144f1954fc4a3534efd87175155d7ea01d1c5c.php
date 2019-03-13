<?php

/* base.html.twig */
class __TwigTemplate_b18c0ceaa5714bb92529573223c9641b8bfc2a9e9093d91a12ca2ef60d603d96 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"resources/icono.ico\" type=\"image/x-icon\">
        <link href=\"resources/css/iconfont/material-icons.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/node-waves/waves.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/fileinput/css/fileinput.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/animate-css/animate.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/sweetalert2/sweetalert2.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\">
        <link href=\"resources/css/style.css\" rel=\"stylesheet\">
        <link href=\"resources/css/themes/all-themes.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/nestable/jquery-nestable.css\" rel=\"stylesheet\">
        <link href=\"resources/css/main.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css\" rel=\"stylesheet\">
        ";
        // line 22
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "    </head>
    <body class=\"theme-indigo\" onload=\"init()\">
    <div class=\"page-loader-wrapper\">
        <div class=\"loader\">
            <div class=\"preloader\">
                <div class=\"spinner-layer pl-indigo\">
                    <div class=\"circle-clipper left\"><div class=\"circle\"></div></div>
                    <div class=\"circle-clipper right\"><div class=\"circle\"></div></div>
                </div>
            </div>
            <p>Por favor espere.</p>
        </div>
    </div>
    <div class=\"overlay\"></div>
    <nav class=\"navbar\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <a href=\"javascript:void(0);\" class=\"bars\"></a>
                <a href=\"/\" class=\"navbar-brand\"><center>ELFEC</center></a>
            </div>
            <div id=\"right-options\" class=\"more-options\">
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" alt=\"Cerrar Sesion\" onclick=\"Salir()\">
                            <i class=\"material-icons\">power_settings_new</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <aside id=\"leftsidebar\" class=\"sidebar\">
            <div class=\"menu\">
                <ul class=\"list\">
               
                    <li><a href=\"/menu\" class=\"\"><i class=\"material-icons\">business</i><span>Menu</span></a></li>       
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Usuarios</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/usuario\" class=\"\"><i class=\"material-icons\">business</i><span>Usuarios</span></a></li>
                        </ul>
                    </li>
                       <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Configuracn</span></a>
                        <ul class=\"ml-menu\">
                            <li><a href=\"/constitucionales\" class=\"\"><i class=\"material-icons\">business</i><span> Constitucionales</span></a></li>   
                            <li><a href=\"/enlaces\" class=\"\"><i class=\"material-icons\">business</i><span>Enlaces Externos</span></a></li>
                            <li><a href=\"/tipo_constitucional\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Constitucional</span></a></li>                    
                        
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Gestión</span></a>
                        <ul class=\"ml-menu\">    
                          <li><a href=\"/tipodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Documento</span></a></li>
                      <li><a href=\"/estadodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Documento</span></a></li>
                           <li><a href=\"/tiponorma\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Norma</span></a></li>
                           <li><a href=\"/estadoseguimiento\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Seguimiento</span></a></li>
                           <li><a href=\"/documentacionadicional\" class=\"\"><i class=\"material-icons\">business</i><span>Documentación Adicional</span></a></li>
                           <li><a href=\"/informaciondocumentada\" class=\"\"><i class=\"material-icons\">business</i><span>Información Documentada</span></a></li>
                           <li><a href=\"/normadocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Norma Documento</span></a></li>
                           <li><a href=\"/seguimientoelaboracion\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento Elab.</span></a></li>
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Procesos</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/tipocargo\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Cargo</span></a></li>
                        <li><a href=\"/tiponota\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Nota</span></a></li>
                        <li><a href=\"/estadocorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Correlativo</span></a></li>
                         <li><a href=\"/procesoscargo\" class=\"\"><i class=\"material-icons\">business</i><span>Cargos</span></a></li> 
                             <li><a href=\"/gerencia\" class=\"\"><i class=\"material-icons\">business</i><span>Gerencia</span></a></li> 
                        <li><a href=\"/sector\" class=\"\"><i class=\"material-icons\">business</i><span>Sector</span></a></li> 
                         <li><a href=\"/area\" class=\"\"><i class=\"material-icons\">business</i><span>Area</span></a></li> 
                           <li><a href=\"/fichaprocesos\" class=\"\"><i class=\"material-icons\">business</i><span>Ficha de Proceso</span></a></li>
                            <li><a href=\"/gruporiesgo\" class=\"\"><i class=\"material-icons\">business</i><span>Grupo Riesgo</span></a></li>
                       <li><a href=\"/estadoriesgo\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Riesgo</span></a></li>
                       <li><a href=\"/probabilidad\" class=\"\"><i class=\"material-icons\">business</i><span>Probabilidad</span></a></li>
                       <li><a href=\"/impacto\" class=\"\"><i class=\"material-icons\">business</i><span>Impacto</span></a></li>
                       <li><a href=\"/estadopersonal\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Personal</span></a></li>                       
                         <li><a href=\"/recurso\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Recurso</span></a></li>  
                         <li><a href=\"/recursonecesario\" class=\"\"><i class=\"material-icons\">business</i><span>Recurso Necesario</span></a></li>
                         <li><a href=\"/personal\" class=\"\"><i class=\"material-icons\">business</i><span>Personal</span></a></li>
                         <li><a href=\"/turno\" class=\"\"><i class=\"material-icons\">business</i><span>Turno</span></a></li>
                         <li><a href=\"/riesgosoportunidades\" class=\"\"><i class=\"material-icons\">business</i><span>Riesgos y Oportunidades</span></a></li>
                         <li><a href=\"/controlcorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>Control Correlativo</span></a></li>      
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Auditoría</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/planaccion\" class=\"\"><i class=\"material-icons\">business</i><span>Plan de Accion</span></a></li>
                        <li><a href=\"/estadoplan\" class=\"\"><i class=\"material-icons\">business</i><span>Estado de Plan</span></a></li> 
                        <li><a href=\"/auditoria\" class=\"\"><i class=\"material-icons\">business</i><span>Auditoría</span></a></li> 
                        <a href=\"/auditor\" class=\"\"><i class=\"material-icons\">business</i><span>Gestion de Auditor</span></a></li>
                        <a href=\"/documentoadicional\" class=\"\"><i class=\"material-icons\">business</i><span>Documento Adicional</span></a>
                           <li><a href=\"/tipohallazgo\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo de Hallazgo </span></a></li> 
                           <li><a href=\"/detalleauditor\" class=\"\"><i class=\"material-icons\">business</i><span>Detalle Auditor</span></a></li> 
                           <li><a href=\"/detalledocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Detalle Documento</span></a></li> 
                           <li><a href=\"/seguimientoplan\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento de Plan</span></a></li> 
                           <li><a href=\"/hallazgoauditoria\" class=\"\"><i class=\"material-icons\">business</i><span>Hallazgo Auditoria</span></a></li>  
                        </ul>
                    </li>                 
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo Indicadores</span></a>
                        <ul class=\"ml-menu\">
                         <li><a href=\"/unidadmedida\" class=\"\"><i class=\"material-icons\">business</i><span>Unidad de Medida</span></a></li>
                           <li><a href=\"/indicadorproceso\" class=\"\"><i class=\"material-icons\">business</i><span>Indicador de Procesos</span></a></li>
                             <li><a href=\"/seguimientoindicador\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento Indicador</span></a></li>
                        </ul>
                    </li>

                      
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo Acciones</span></a>
                        <ul class=\"ml-menu\">
                           <li><a href=\"/estadonovedad\" class=\"\"><i class=\"material-icons\">business</i><span> Estado Novedad</span></a></li>              
                           <li><a href=\"/registromejora\" class=\"\"><i class=\"material-icons\">business</i><span> Registro Mejora.</span></a></li>  
                             <li><a href=\"/seguimientomejora\" class=\"\"><i class=\"material-icons\">business</i><span> Seguimiento Mejora.</span></a></li>  
                             <li><a href=\"/tipodatoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span> Tipo Dato Empresarial</span></a></li>
                             
                             <li><a href=\"/datoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span>  Dato Empresarial</span></a></li>              
                        
                        </ul>
                    </li>
                <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Comunicación</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/galeria\" class=\"\"><i class=\"material-icons\">business</i><span> Galeria </span></a></li> 
                             <li><a href=\"/file\" class=\"\"><i class=\"material-icons\">business</i><span> File </span></a></li>        
                             
                             <li><a href=\"/noticia\" class=\"\"><i class=\"material-icons\">business</i><span> Noticia </span></a></li>   
                             <li><a href=\"/categorianoticia\" class=\"\"><i class=\"material-icons\">business</i><span> Categorias </span></a></li>   
                             <li><a href=\"/noticiacategoria\" class=\"\"><i class=\"material-icons\">business</i><span> Nocticias - Categorias </span></a></li>         
                        </ul>
                    </li>

                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Consulta</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/organigrama\" class=\"\"><i class=\"material-icons\">business</i><span>  Organigrama </span></a></li>
                             <li><a href=\"/catalogo\" class=\"\"><i class=\"material-icons\">business</i><span>  Catalogo </span></a></li> 
                             <li><a href=\"/accidentes\" class=\"\"><i class=\"material-icons\">business</i><span>  Accidentes </span></a></li>              
                        
                        </ul>
                    </li>
                       

                 </ul>
            </div>
        </aside>
    </section>
    <section id=\"content\" class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"block-header\">
                <div class=\"card\" id=\"render_content\">
                    ";
        // line 171
        $this->displayBlock('body', $context, $blocks);
        // line 172
        echo "                </div>
            </div>
        </div>
    </section>

        <script src=\"resources/plugins/jquery/jquery.min.js\"></script>
        <script src=\"resources/plugins/jquery-slimscroll/jquery.slimscroll.js\"></script>
        <script src=\"resources/plugins/bootstrap/js/bootstrap.js\"></script>
        <script src=\"resources/plugins/node-waves/waves.js\"></script>
        <script src=\"resources/js/admin.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/bootstrap-notify/bootstrap-notify.js\"></script>
        <script src=\"resources/plugins/fileinput/js/fileinput.min.js\"></script>
        <script src=\"resources/plugins/sweetalert2/sweetalert2.min.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/jquery-validation/jquery.validate.js\"></script>
        <script src=\"resources/plugins/nestable/jquery.nestable.js\"></script>
        <script src=\"resources/js/jquery.toast.js\"></script>
        <!-- Jquery DataTable Plugin Js -->
        <script src=\"resources/plugins/jquery-datatable/jquery.dataTables.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.flash.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/jszip.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.34/pdfmake.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/vfs_fonts.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.html5.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.print.min.js\"></script>
        <script src=\"resources/js/pages/tables/jquery-datatable.js\"></script>
        <script src=\"resources/js/scripts.js\"></script>
        <script src=\"resources/js/validations.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/moment-with-locales.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/jquery.dataTables.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.flash.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/jszip.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/pdfmake.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/vfs_fonts.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.html5.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.print.min.js\"></script>
        ";
        // line 215
        $this->displayBlock('javascripts', $context, $blocks);
        // line 216
        echo "    </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "ELFEC";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 22
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 171
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 215
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  300 => 215,  289 => 171,  278 => 22,  266 => 5,  257 => 216,  255 => 215,  210 => 172,  208 => 171,  58 => 23,  56 => 22,  36 => 5,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}ELFEC{% endblock %}</title>
        <link rel=\"icon\" href=\"resources/icono.ico\" type=\"image/x-icon\">
        <link href=\"resources/css/iconfont/material-icons.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/node-waves/waves.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/fileinput/css/fileinput.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/animate-css/animate.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/sweetalert2/sweetalert2.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\">
        <link href=\"resources/css/style.css\" rel=\"stylesheet\">
        <link href=\"resources/css/themes/all-themes.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/nestable/jquery-nestable.css\" rel=\"stylesheet\">
        <link href=\"resources/css/main.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css\" rel=\"stylesheet\">
        {% block stylesheets %}{% endblock %}
    </head>
    <body class=\"theme-indigo\" onload=\"init()\">
    <div class=\"page-loader-wrapper\">
        <div class=\"loader\">
            <div class=\"preloader\">
                <div class=\"spinner-layer pl-indigo\">
                    <div class=\"circle-clipper left\"><div class=\"circle\"></div></div>
                    <div class=\"circle-clipper right\"><div class=\"circle\"></div></div>
                </div>
            </div>
            <p>Por favor espere.</p>
        </div>
    </div>
    <div class=\"overlay\"></div>
    <nav class=\"navbar\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <a href=\"javascript:void(0);\" class=\"bars\"></a>
                <a href=\"/\" class=\"navbar-brand\"><center>ELFEC</center></a>
            </div>
            <div id=\"right-options\" class=\"more-options\">
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" alt=\"Cerrar Sesion\" onclick=\"Salir()\">
                            <i class=\"material-icons\">power_settings_new</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <aside id=\"leftsidebar\" class=\"sidebar\">
            <div class=\"menu\">
                <ul class=\"list\">
               
                    <li><a href=\"/menu\" class=\"\"><i class=\"material-icons\">business</i><span>Menu</span></a></li>       
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Usuarios</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/usuario\" class=\"\"><i class=\"material-icons\">business</i><span>Usuarios</span></a></li>
                        </ul>
                    </li>
                       <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Configuracn</span></a>
                        <ul class=\"ml-menu\">
                            <li><a href=\"/constitucionales\" class=\"\"><i class=\"material-icons\">business</i><span> Constitucionales</span></a></li>   
                            <li><a href=\"/enlaces\" class=\"\"><i class=\"material-icons\">business</i><span>Enlaces Externos</span></a></li>
                            <li><a href=\"/tipo_constitucional\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Constitucional</span></a></li>                    
                        
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Gestión</span></a>
                        <ul class=\"ml-menu\">    
                          <li><a href=\"/tipodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Documento</span></a></li>
                      <li><a href=\"/estadodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Documento</span></a></li>
                           <li><a href=\"/tiponorma\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Norma</span></a></li>
                           <li><a href=\"/estadoseguimiento\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Seguimiento</span></a></li>
                           <li><a href=\"/documentacionadicional\" class=\"\"><i class=\"material-icons\">business</i><span>Documentación Adicional</span></a></li>
                           <li><a href=\"/informaciondocumentada\" class=\"\"><i class=\"material-icons\">business</i><span>Información Documentada</span></a></li>
                           <li><a href=\"/normadocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Norma Documento</span></a></li>
                           <li><a href=\"/seguimientoelaboracion\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento Elab.</span></a></li>
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Procesos</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/tipocargo\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Cargo</span></a></li>
                        <li><a href=\"/tiponota\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Nota</span></a></li>
                        <li><a href=\"/estadocorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Correlativo</span></a></li>
                         <li><a href=\"/procesoscargo\" class=\"\"><i class=\"material-icons\">business</i><span>Cargos</span></a></li> 
                             <li><a href=\"/gerencia\" class=\"\"><i class=\"material-icons\">business</i><span>Gerencia</span></a></li> 
                        <li><a href=\"/sector\" class=\"\"><i class=\"material-icons\">business</i><span>Sector</span></a></li> 
                         <li><a href=\"/area\" class=\"\"><i class=\"material-icons\">business</i><span>Area</span></a></li> 
                           <li><a href=\"/fichaprocesos\" class=\"\"><i class=\"material-icons\">business</i><span>Ficha de Proceso</span></a></li>
                            <li><a href=\"/gruporiesgo\" class=\"\"><i class=\"material-icons\">business</i><span>Grupo Riesgo</span></a></li>
                       <li><a href=\"/estadoriesgo\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Riesgo</span></a></li>
                       <li><a href=\"/probabilidad\" class=\"\"><i class=\"material-icons\">business</i><span>Probabilidad</span></a></li>
                       <li><a href=\"/impacto\" class=\"\"><i class=\"material-icons\">business</i><span>Impacto</span></a></li>
                       <li><a href=\"/estadopersonal\" class=\"\"><i class=\"material-icons\">business</i><span>Estado Personal</span></a></li>                       
                         <li><a href=\"/recurso\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo Recurso</span></a></li>  
                         <li><a href=\"/recursonecesario\" class=\"\"><i class=\"material-icons\">business</i><span>Recurso Necesario</span></a></li>
                         <li><a href=\"/personal\" class=\"\"><i class=\"material-icons\">business</i><span>Personal</span></a></li>
                         <li><a href=\"/turno\" class=\"\"><i class=\"material-icons\">business</i><span>Turno</span></a></li>
                         <li><a href=\"/riesgosoportunidades\" class=\"\"><i class=\"material-icons\">business</i><span>Riesgos y Oportunidades</span></a></li>
                         <li><a href=\"/controlcorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>Control Correlativo</span></a></li>      
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo de Auditoría</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/planaccion\" class=\"\"><i class=\"material-icons\">business</i><span>Plan de Accion</span></a></li>
                        <li><a href=\"/estadoplan\" class=\"\"><i class=\"material-icons\">business</i><span>Estado de Plan</span></a></li> 
                        <li><a href=\"/auditoria\" class=\"\"><i class=\"material-icons\">business</i><span>Auditoría</span></a></li> 
                        <a href=\"/auditor\" class=\"\"><i class=\"material-icons\">business</i><span>Gestion de Auditor</span></a></li>
                        <a href=\"/documentoadicional\" class=\"\"><i class=\"material-icons\">business</i><span>Documento Adicional</span></a>
                           <li><a href=\"/tipohallazgo\" class=\"\"><i class=\"material-icons\">business</i><span>Tipo de Hallazgo </span></a></li> 
                           <li><a href=\"/detalleauditor\" class=\"\"><i class=\"material-icons\">business</i><span>Detalle Auditor</span></a></li> 
                           <li><a href=\"/detalledocumento\" class=\"\"><i class=\"material-icons\">business</i><span>Detalle Documento</span></a></li> 
                           <li><a href=\"/seguimientoplan\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento de Plan</span></a></li> 
                           <li><a href=\"/hallazgoauditoria\" class=\"\"><i class=\"material-icons\">business</i><span>Hallazgo Auditoria</span></a></li>  
                        </ul>
                    </li>                 
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo Indicadores</span></a>
                        <ul class=\"ml-menu\">
                         <li><a href=\"/unidadmedida\" class=\"\"><i class=\"material-icons\">business</i><span>Unidad de Medida</span></a></li>
                           <li><a href=\"/indicadorproceso\" class=\"\"><i class=\"material-icons\">business</i><span>Indicador de Procesos</span></a></li>
                             <li><a href=\"/seguimientoindicador\" class=\"\"><i class=\"material-icons\">business</i><span>Seguimiento Indicador</span></a></li>
                        </ul>
                    </li>

                      
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Módulo Acciones</span></a>
                        <ul class=\"ml-menu\">
                           <li><a href=\"/estadonovedad\" class=\"\"><i class=\"material-icons\">business</i><span> Estado Novedad</span></a></li>              
                           <li><a href=\"/registromejora\" class=\"\"><i class=\"material-icons\">business</i><span> Registro Mejora.</span></a></li>  
                             <li><a href=\"/seguimientomejora\" class=\"\"><i class=\"material-icons\">business</i><span> Seguimiento Mejora.</span></a></li>  
                             <li><a href=\"/tipodatoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span> Tipo Dato Empresarial</span></a></li>
                             
                             <li><a href=\"/datoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span>  Dato Empresarial</span></a></li>              
                        
                        </ul>
                    </li>
                <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Comunicación</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/galeria\" class=\"\"><i class=\"material-icons\">business</i><span> Galeria </span></a></li> 
                             <li><a href=\"/file\" class=\"\"><i class=\"material-icons\">business</i><span> File </span></a></li>        
                             
                             <li><a href=\"/noticia\" class=\"\"><i class=\"material-icons\">business</i><span> Noticia </span></a></li>   
                             <li><a href=\"/categorianoticia\" class=\"\"><i class=\"material-icons\">business</i><span> Categorias </span></a></li>   
                             <li><a href=\"/noticiacategoria\" class=\"\"><i class=\"material-icons\">business</i><span> Nocticias - Categorias </span></a></li>         
                        </ul>
                    </li>

                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Consulta</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/organigrama\" class=\"\"><i class=\"material-icons\">business</i><span>  Organigrama </span></a></li>
                             <li><a href=\"/catalogo\" class=\"\"><i class=\"material-icons\">business</i><span>  Catalogo </span></a></li> 
                             <li><a href=\"/accidentes\" class=\"\"><i class=\"material-icons\">business</i><span>  Accidentes </span></a></li>              
                        
                        </ul>
                    </li>
                       

                 </ul>
            </div>
        </aside>
    </section>
    <section id=\"content\" class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"block-header\">
                <div class=\"card\" id=\"render_content\">
                    {% block body %}{% endblock %}
                </div>
            </div>
        </div>
    </section>

        <script src=\"resources/plugins/jquery/jquery.min.js\"></script>
        <script src=\"resources/plugins/jquery-slimscroll/jquery.slimscroll.js\"></script>
        <script src=\"resources/plugins/bootstrap/js/bootstrap.js\"></script>
        <script src=\"resources/plugins/node-waves/waves.js\"></script>
        <script src=\"resources/js/admin.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/bootstrap-notify/bootstrap-notify.js\"></script>
        <script src=\"resources/plugins/fileinput/js/fileinput.min.js\"></script>
        <script src=\"resources/plugins/sweetalert2/sweetalert2.min.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/jquery-validation/jquery.validate.js\"></script>
        <script src=\"resources/plugins/nestable/jquery.nestable.js\"></script>
        <script src=\"resources/js/jquery.toast.js\"></script>
        <!-- Jquery DataTable Plugin Js -->
        <script src=\"resources/plugins/jquery-datatable/jquery.dataTables.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.flash.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/jszip.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.34/pdfmake.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/vfs_fonts.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.html5.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.print.min.js\"></script>
        <script src=\"resources/js/pages/tables/jquery-datatable.js\"></script>
        <script src=\"resources/js/scripts.js\"></script>
        <script src=\"resources/js/validations.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/moment-with-locales.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/jquery.dataTables.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.flash.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/jszip.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/pdfmake.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/vfs_fonts.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.html5.min.js\"></script>
        <script src=\"resources/plugins/jquery-datatable/extensions/export/buttons.print.min.js\"></script>
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\base.html.twig");
    }
}
