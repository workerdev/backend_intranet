<?php

/* base.html.twig */
class __TwigTemplate_abcbc2e9b939b59c38d295f32c5f03b141213e2dbfae96d489a3f931e644b05e extends Twig_Template
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
        <link rel=\"icon\" href=\"resources/elfec.ico\" type=\"image/x-icon\">
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
        // line 23
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 32
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
                <a href=\"/\" class=\"navbar-brand\">
                    <center>
                        <img class=\"nav-img\" src=\"resources/images/logo.png\">
                        ELFEC
                    </center>
                </a>
            </div>

            <div id=\"right-options\" class=\"more-options\">
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        ";
        // line 64
        if ((isset($context["docderiv"]) || array_key_exists("docderiv", $context) ? $context["docderiv"] : (function () { throw new Twig_Error_Runtime('Variable "docderiv" does not exist.', 64, $this->source); })())) {
            // line 65
            echo "                            <a href=\"/docprocesorev\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Documentos derivados\">folder</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #26a69a;\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["docderiv"]) || array_key_exists("docderiv", $context) ? $context["docderiv"] : (function () { throw new Twig_Error_Runtime('Variable "docderiv" does not exist.', 65, $this->source); })())), "html", null, true);
            echo "</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        ";
        }
        // line 69
        echo "                        ";
        if ((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 69, $this->source); })())) {
            // line 70
            echo "                            <a href=\"/fichacargo\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Fichas por aprobar - Gerente\">assignment</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #00bcd4;\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 70, $this->source); })())), "html", null, true);
            echo "</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        ";
        }
        // line 74
        echo "                        ";
        if ((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 74, $this->source); })())) {
            // line 75
            echo "                            <a href=\"/fichacargo\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Fichas por aprobar - Jefe\">assignment_turned_in</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #00bcd4;\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 75, $this->source); })())), "html", null, true);
            echo "</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        ";
        }
        // line 79
        echo "                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        ";
        // line 87
        if (twig_in_filter("perfil", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 87, $this->source); })()))) {
            // line 88
            echo "                            <a href=\"/perfil\"><i class=\"material-icons\" title=\"Perfil de usuario\">account_circle</i></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        ";
        }
        // line 92
        echo "                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"salir()\" title=\"Cerrar sesión\">
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
                ";
        // line 105
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parents"]) || array_key_exists("parents", $context) ? $context["parents"] : (function () { throw new Twig_Error_Runtime('Variable "parents" does not exist.', 105, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mods"]) {
            echo " 
                    ";
            // line 106
            if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                echo "    
                    <li>
                        ";
                // line 108
                if ((twig_get_attribute($this->env, $this->source, $context["mods"], "ruta", array()) == null)) {
                    // line 109
                    echo "                        <a href=\"#\" class=\"menu-toggle waves-effect waves-block\">
                        ";
                } else {
                    // line 111
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "ruta", array()), "html", null, true);
                    echo "\" class=\"menu-toggle waves-effect waves-block\">
                        ";
                }
                // line 113
                echo "                            <i class=\"material-icons\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "icono", array()), "html", null, true);
                echo "</i>
                            <span>";
                // line 114
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array()), "html", null, true);
                echo "</span>
                        </a>
                        <ul class=\"ml-menu\">
                        ";
                // line 117
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["children"]) || array_key_exists("children", $context) ? $context["children"] : (function () { throw new Twig_Error_Runtime('Variable "children" does not exist.', 117, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 118
                    echo "                            ";
                    if ((((twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()), "id", array()))) && (twig_get_attribute($this->env, $this->source, $context["child"], "nombre", array()) != "perfil"))) {
                        // line 119
                        echo "                                <li>
                                    <a href=\"";
                        // line 120
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "ruta", array()), "html", null, true);
                        echo "\" class=\"\">
                                        <i class=\"material-icons\">";
                        // line 121
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "icono", array()), "html", null, true);
                        echo "</i>
                                        <span>";
                        // line 122
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "titulo", array()), "html", null, true);
                        echo "</span>
                                    </a>
                                </li>
                            ";
                    }
                    // line 125
                    echo " 
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 127
                echo "                        </ul>
                    </li>
                    ";
            }
            // line 130
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                </ul>
            </div>
        </aside>
    </section>
    
    <section id=\"content\" class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"block-header\">
                <div class=\"card\" id=\"render_content\">
                    ";
        // line 140
        $this->displayBlock('body', $context, $blocks);
        // line 141
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
        <script>
            function iniciar(){
                setTimeout(function(){window.location=\"/login\"}, 500)
            }
            function salir(){
                swal({
                    title: \"¿Desea cerrar su sesión?\",
                    imageUrl: 'resources/images/elfec.png',
                    showCancelButton: true,
                    confirmButtonColor: \"#3F51B5\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    reverseButtons: true,
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    swal(
                        'Gracias por tu trabajo.',
                        'Vuelve pronto.',
                        'success'
                        )
                    setTimeout(function(){window.location=\"/logout\"}, 500)
                })
            }
        </script>
        ";
        // line 208
        $this->displayBlock('javascripts', $context, $blocks);
        // line 209
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

    // line 23
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 24
        echo "        <style>
            .nav-img {
                height: 100%;
                padding: 2px;
                width: auto;
            }
        </style>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 208
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

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  371 => 208,  360 => 140,  346 => 24,  340 => 23,  328 => 5,  319 => 209,  317 => 208,  248 => 141,  246 => 140,  235 => 131,  229 => 130,  224 => 127,  217 => 125,  210 => 122,  206 => 121,  202 => 120,  199 => 119,  196 => 118,  192 => 117,  186 => 114,  181 => 113,  175 => 111,  171 => 109,  169 => 108,  164 => 106,  158 => 105,  143 => 92,  137 => 88,  135 => 87,  125 => 79,  117 => 75,  114 => 74,  106 => 70,  103 => 69,  95 => 65,  93 => 64,  59 => 32,  57 => 23,  36 => 5,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}ELFEC{% endblock %}</title>
        <link rel=\"icon\" href=\"resources/elfec.ico\" type=\"image/x-icon\">
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

        {% block stylesheets %}
        <style>
            .nav-img {
                height: 100%;
                padding: 2px;
                width: auto;
            }
        </style>
        {% endblock %}
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
                <a href=\"/\" class=\"navbar-brand\">
                    <center>
                        <img class=\"nav-img\" src=\"resources/images/logo.png\">
                        ELFEC
                    </center>
                </a>
            </div>

            <div id=\"right-options\" class=\"more-options\">
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        {% if docderiv %}
                            <a href=\"/docprocesorev\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Documentos derivados\">folder</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #26a69a;\">{{ docderiv|length }}</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        {% endif %}
                        {% if fcaprobgr %}
                            <a href=\"/fichacargo\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Fichas por aprobar - Gerente\">assignment</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #00bcd4;\">{{ fcaprobgr|length }}</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        {% endif %}
                        {% if fcaprobjf %}
                            <a href=\"/fichacargo\"><i class=\"material-icons\" style=\"font-size: 18px\" title=\"Fichas por aprobar - Jefe\">assignment_turned_in</i> <span class=\"new badge\" style=\"padding: 2px 4px; font-size: 10px; background-color: #00bcd4;\">{{ fcaprobjf|length }}</span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        {% endif %}
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        {% if 'perfil' in permisos %}
                            <a href=\"/perfil\"><i class=\"material-icons\" title=\"Perfil de usuario\">account_circle</i></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                            <a href=\"\"><i class=\"material-icons\"> </i></span></a>
                        {% endif %}
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"salir()\" title=\"Cerrar sesión\">
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
                {% for mods in parents %} 
                    {% if mods.fkmodulo == null %}    
                    <li>
                        {% if mods.ruta == null %}
                        <a href=\"#\" class=\"menu-toggle waves-effect waves-block\">
                        {% else %}
                        <a href=\"{{mods.ruta}}\" class=\"menu-toggle waves-effect waves-block\">
                        {% endif %}
                            <i class=\"material-icons\">{{mods.icono}}</i>
                            <span>{{mods.titulo}}</span>
                        </a>
                        <ul class=\"ml-menu\">
                        {% for child in children %}
                            {% if child.fkmodulo != null and mods.id == child.fkmodulo.id and child.nombre != 'perfil' %}
                                <li>
                                    <a href=\"{{child.ruta}}\" class=\"\">
                                        <i class=\"material-icons\">{{child.icono}}</i>
                                        <span>{{child.titulo}}</span>
                                    </a>
                                </li>
                            {% endif %} 
                        {% endfor %}
                        </ul>
                    </li>
                    {% endif %}
                {% endfor %}
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
        <script>
            function iniciar(){
                setTimeout(function(){window.location=\"/login\"}, 500)
            }
            function salir(){
                swal({
                    title: \"¿Desea cerrar su sesión?\",
                    imageUrl: 'resources/images/elfec.png',
                    showCancelButton: true,
                    confirmButtonColor: \"#3F51B5\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    reverseButtons: true,
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    swal(
                        'Gracias por tu trabajo.',
                        'Vuelve pronto.',
                        'success'
                        )
                    setTimeout(function(){window.location=\"/logout\"}, 500)
                })
            }
        </script>
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\base.html.twig");
    }
}
