<?php

/* base.html.twig */
class __TwigTemplate_f2119bcbbda1005012eb2d381a425a31a55c4739738cb493e73e2a5b9db189ef extends Twig_Template
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
               
                    <li><a href=\"/menu\" class=\"\"><i class=\"material-icons\">business</i><span>MENU</span></a></li>       
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Usuarios</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/usuario\" class=\"\"><i class=\"material-icons\">business</i><span>USUARIOS</span></a></li>
                        </ul>
                    </li>
                       <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Configuracion</span></a>
                        <ul class=\"ml-menu\">
                            <li><a href=\"/constitucionales\" class=\"\"><i class=\"material-icons\">business</i><span> CFG CONSTITUCIONALES</span></a></li>   
                            <li><a href=\"/enlaces\" class=\"\"><i class=\"material-icons\">business</i><span>CFG ENLACES EXTERNO</span></a></li>
                            <li><a href=\"/tipo_constitucional\" class=\"\"><i class=\"material-icons\">business</i><span>CFG TIPO CONSTITUCIONAL</span></a></li>                    
                        
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Gestion</span></a>
                        <ul class=\"ml-menu\">    
                          <li><a href=\"/tipodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION TIPO DOCUMENTO</span></a></li>
                      <li><a href=\"/estadodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION  ESTADO DOCUMENTO</span></a></li>
                           <li><a href=\"/tiponorma\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION TIPO NORMA</span></a></li>
                           <li><a href=\"/estadoseguimiento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION ESTADO SEGUIMIENTO</span></a></li>
                           <li><a href=\"/documentacionadicional\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION DOCUMENTACION ADICIONAL</span></a></li>
                           <li><a href=\"/informaciondocumentada\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION INFORMACION DOCUMENTADA</span></a></li>
                           <li><a href=\"/normadocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION NORMA DOCUMENTO</span></a></li>
                           <li><a href=\"/seguimientoelaboracion\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION SEGUIMIENTO ELAB.</span></a></li>
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Procesos</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/tipocargo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO TIPO CARGO</span></a></li>
                        <li><a href=\"/tiponota\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO TIPO NOTA</span></a></li>
                        <li><a href=\"/estadocorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO CORRELATIVO</span></a></li>
                         <li><a href=\"/procesoscargo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS CARGOS</span></a></li> 
                             <li><a href=\"/gerencia\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS GERENCIA</span></a></li> 
                        <li><a href=\"/sector\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS SECTOR</span></a></li> 
                         <li><a href=\"/area\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS AREA</span></a></li> 
                           <li><a href=\"/fichaprocesos\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO FICHA DE PROCESO</span></a></li>
                            <li><a href=\"/gruporiesgo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO GRUPO RIESGO</span></a></li>
                       <li><a href=\"/estadoriesgo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO RIESGO</span></a></li>
                       <li><a href=\"/probabilidad\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO PROBABILIDAD</span></a></li>
                       <li><a href=\"/impacto\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO IMPACTO</span></a></li>
                       <li><a href=\"/estadopersonal\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO PERSONAL</span></a></li>
                       
                         <li><a href=\"/recurso\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS TIPO RECURSO</span></a></li>  
                         <li><a href=\"/recursonecesario\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS RECURSO NECESARIO</span></a></li>
                         <li><a href=\"/personal\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS PERSONAL</span></a></li>
                         <li><a href=\"/riesgosoportunidades\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS RIESGOS Y OPORTUNIDADES</span></a></li>   
                         <li><a href=\"/controlcorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>CONTROL CORRELATIVO</span></a></li>      
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Auditoria</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/planaccion\" class=\"\"><i class=\"material-icons\">business</i><span>PLAN DE ACCION</span></a></
                        <li><a href=\"/estadoplan\" class=\"\"><i class=\"material-icons\">business</i><span>ESTADO DE PLAN</span></a></li> 
                        <li><a href=\"/auditoria\" class=\"\"><i class=\"material-icons\">business</i><span>AUDITORIA</span></a></li> 
                        <a href=\"/auditor\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION DE AUDITOR</span></a></li>
                        <a href=\"/documentoadicional\" class=\"\"><i class=\"material-icons\">business</i><span>DOCUMENTO ADICIONAL</span></a>
                           <li><a href=\"/tipohallazgo\" class=\"\"><i class=\"material-icons\">business</i><span>TIPO HALLAZGO</span></a></li> 
                           <li><a href=\"/detalleauditor\" class=\"\"><i class=\"material-icons\">business</i><span>DETALLE AUDITOR</span></a></li> 
                           <li><a href=\"/detalledocumento\" class=\"\"><i class=\"material-icons\">business</i><span>DETALLE DOCUMENTO</span></a></li> 
                           <li><a href=\"/seguimientoplan\" class=\"\"><i class=\"material-icons\">business</i><span>SEGUIMIENTO DE PLAN</span></a></li> 
                           <li><a href=\"/hallazgoauditoria\" class=\"\"><i class=\"material-icons\">business</i><span>HALLAZGO AUDITORIA</span></a></li>  
                        </ul>
                    </li>                 
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>INDICADORES</span></a>
                        <ul class=\"ml-menu\">
                         <li><a href=\"/unidadmedida\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES UNIDAD MEDIDA</span></a></li>
                           <li><a href=\"/indicadorproceso\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES INDICADOR PROCESOS</span></a></li>
                             <li><a href=\"/seguimientoindicador\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES SEGUIMIENTO INDICADOR</span></a></li>
                        </ul>
                    </li>

                      
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Acciones</span></a>
                        <ul class=\"ml-menu\">
                           <li><a href=\"/estadonovedad\" class=\"\"><i class=\"material-icons\">business</i><span> ESTADO NOVEDAD</span></a></li>              
                           <li><a href=\"/registromejora\" class=\"\"><i class=\"material-icons\">business</i><span> REGISTRO MEJORA.</span></a></li>  
                             <li><a href=\"/seguimientomejora\" class=\"\"><i class=\"material-icons\">business</i><span> SEGUIMIENTO MEJORA.</span></a></li>  
                             <li><a href=\"/tipodatoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span> TIPO DATO EMPRESARIAL.</span></a></li>
                             
                             <li><a href=\"/datoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span>  DATO EMPRESARIAL.</span></a></li>              
                        
                        </ul>
                    </li>
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>CONSULTA</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/organigrama\" class=\"\"><i class=\"material-icons\">business</i><span>  ORGANIGRAMA.</span></a></li>              
                        
                        </ul>
                    </li>
                       
                 <li><a href=\"/mision\" class=\"\"><i class=\"material-icons\">label</i><span>MISION</span></a></li>

                 </ul>
            </div>
        </aside>
    </section>
    <section id=\"content\" class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"block-header\">
                <div class=\"card\" id=\"render_content\">
                    ";
        // line 159
        $this->displayBlock('body', $context, $blocks);
        // line 160
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
        // line 203
        $this->displayBlock('javascripts', $context, $blocks);
        // line 204
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

    // line 159
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 203
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
        return array (  288 => 203,  277 => 159,  266 => 22,  254 => 5,  245 => 204,  243 => 203,  198 => 160,  196 => 159,  58 => 23,  56 => 22,  36 => 5,  30 => 1,);
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
               
                    <li><a href=\"/menu\" class=\"\"><i class=\"material-icons\">business</i><span>MENU</span></a></li>       
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Usuarios</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/usuario\" class=\"\"><i class=\"material-icons\">business</i><span>USUARIOS</span></a></li>
                        </ul>
                    </li>
                       <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Configuracion</span></a>
                        <ul class=\"ml-menu\">
                            <li><a href=\"/constitucionales\" class=\"\"><i class=\"material-icons\">business</i><span> CFG CONSTITUCIONALES</span></a></li>   
                            <li><a href=\"/enlaces\" class=\"\"><i class=\"material-icons\">business</i><span>CFG ENLACES EXTERNO</span></a></li>
                            <li><a href=\"/tipo_constitucional\" class=\"\"><i class=\"material-icons\">business</i><span>CFG TIPO CONSTITUCIONAL</span></a></li>                    
                        
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Gestion</span></a>
                        <ul class=\"ml-menu\">    
                          <li><a href=\"/tipodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION TIPO DOCUMENTO</span></a></li>
                      <li><a href=\"/estadodocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION  ESTADO DOCUMENTO</span></a></li>
                           <li><a href=\"/tiponorma\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION TIPO NORMA</span></a></li>
                           <li><a href=\"/estadoseguimiento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION ESTADO SEGUIMIENTO</span></a></li>
                           <li><a href=\"/documentacionadicional\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION DOCUMENTACION ADICIONAL</span></a></li>
                           <li><a href=\"/informaciondocumentada\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION INFORMACION DOCUMENTADA</span></a></li>
                           <li><a href=\"/normadocumento\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION NORMA DOCUMENTO</span></a></li>
                           <li><a href=\"/seguimientoelaboracion\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION SEGUIMIENTO ELAB.</span></a></li>
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Procesos</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/tipocargo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO TIPO CARGO</span></a></li>
                        <li><a href=\"/tiponota\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO TIPO NOTA</span></a></li>
                        <li><a href=\"/estadocorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO CORRELATIVO</span></a></li>
                         <li><a href=\"/procesoscargo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS CARGOS</span></a></li> 
                             <li><a href=\"/gerencia\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS GERENCIA</span></a></li> 
                        <li><a href=\"/sector\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS SECTOR</span></a></li> 
                         <li><a href=\"/area\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS AREA</span></a></li> 
                           <li><a href=\"/fichaprocesos\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO FICHA DE PROCESO</span></a></li>
                            <li><a href=\"/gruporiesgo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO GRUPO RIESGO</span></a></li>
                       <li><a href=\"/estadoriesgo\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO RIESGO</span></a></li>
                       <li><a href=\"/probabilidad\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO PROBABILIDAD</span></a></li>
                       <li><a href=\"/impacto\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO IMPACTO</span></a></li>
                       <li><a href=\"/estadopersonal\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESO ESTADO PERSONAL</span></a></li>
                       
                         <li><a href=\"/recurso\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS TIPO RECURSO</span></a></li>  
                         <li><a href=\"/recursonecesario\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS RECURSO NECESARIO</span></a></li>
                         <li><a href=\"/personal\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS PERSONAL</span></a></li>
                         <li><a href=\"/riesgosoportunidades\" class=\"\"><i class=\"material-icons\">business</i><span>PROCESOS RIESGOS Y OPORTUNIDADES</span></a></li>   
                         <li><a href=\"/controlcorrelativo\" class=\"\"><i class=\"material-icons\">business</i><span>CONTROL CORRELATIVO</span></a></li>      
                        </ul>
                    </li>
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Modulo de Auditoria</span></a>
                        <ul class=\"ml-menu\">
                        <li><a href=\"/planaccion\" class=\"\"><i class=\"material-icons\">business</i><span>PLAN DE ACCION</span></a></
                        <li><a href=\"/estadoplan\" class=\"\"><i class=\"material-icons\">business</i><span>ESTADO DE PLAN</span></a></li> 
                        <li><a href=\"/auditoria\" class=\"\"><i class=\"material-icons\">business</i><span>AUDITORIA</span></a></li> 
                        <a href=\"/auditor\" class=\"\"><i class=\"material-icons\">business</i><span>GESTION DE AUDITOR</span></a></li>
                        <a href=\"/documentoadicional\" class=\"\"><i class=\"material-icons\">business</i><span>DOCUMENTO ADICIONAL</span></a>
                           <li><a href=\"/tipohallazgo\" class=\"\"><i class=\"material-icons\">business</i><span>TIPO HALLAZGO</span></a></li> 
                           <li><a href=\"/detalleauditor\" class=\"\"><i class=\"material-icons\">business</i><span>DETALLE AUDITOR</span></a></li> 
                           <li><a href=\"/detalledocumento\" class=\"\"><i class=\"material-icons\">business</i><span>DETALLE DOCUMENTO</span></a></li> 
                           <li><a href=\"/seguimientoplan\" class=\"\"><i class=\"material-icons\">business</i><span>SEGUIMIENTO DE PLAN</span></a></li> 
                           <li><a href=\"/hallazgoauditoria\" class=\"\"><i class=\"material-icons\">business</i><span>HALLAZGO AUDITORIA</span></a></li>  
                        </ul>
                    </li>                 
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>INDICADORES</span></a>
                        <ul class=\"ml-menu\">
                         <li><a href=\"/unidadmedida\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES UNIDAD MEDIDA</span></a></li>
                           <li><a href=\"/indicadorproceso\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES INDICADOR PROCESOS</span></a></li>
                             <li><a href=\"/seguimientoindicador\" class=\"\"><i class=\"material-icons\">business</i><span>INDICADORES SEGUIMIENTO INDICADOR</span></a></li>
                        </ul>
                    </li>

                      
                     <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>Acciones</span></a>
                        <ul class=\"ml-menu\">
                           <li><a href=\"/estadonovedad\" class=\"\"><i class=\"material-icons\">business</i><span> ESTADO NOVEDAD</span></a></li>              
                           <li><a href=\"/registromejora\" class=\"\"><i class=\"material-icons\">business</i><span> REGISTRO MEJORA.</span></a></li>  
                             <li><a href=\"/seguimientomejora\" class=\"\"><i class=\"material-icons\">business</i><span> SEGUIMIENTO MEJORA.</span></a></li>  
                             <li><a href=\"/tipodatoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span> TIPO DATO EMPRESARIAL.</span></a></li>
                             
                             <li><a href=\"/datoempresarial\" class=\"\"><i class=\"material-icons\">business</i><span>  DATO EMPRESARIAL.</span></a></li>              
                        
                        </ul>
                    </li>
                    <li><a href=\"#\" class=\"menu-toggle waves-effect waves-block\"><i class=\"material-icons\">person</i><span>CONSULTA</span></a>
                        <ul class=\"ml-menu\">
                             <li><a href=\"/organigrama\" class=\"\"><i class=\"material-icons\">business</i><span>  ORGANIGRAMA.</span></a></li>              
                        
                        </ul>
                    </li>
                       
                 <li><a href=\"/mision\" class=\"\"><i class=\"material-icons\">label</i><span>MISION</span></a></li>

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
