<?php

/* base.html.twig */
class __TwigTemplate_ca7c25129ea23c355b6af195f339d244c148aca8d0c5f2116cfe567c0cc03cd8 extends Twig_Template
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
        // line 33
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
            ";
        // line 59
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 60
            echo "                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"salir()\">
                            <i class=\"material-icons\">power_settings_new</i>
                        </a>
                    </li>
                </ul>  
            ";
        } else {
            // line 67
            echo "    
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"iniciar()\">
                            <i class=\"material-icons\">person</i>
                        </a>
                    </li>
                </ul> 
            ";
        }
        // line 75
        echo "  
            </div>
    </nav>
    
    <section>
        <aside id=\"leftsidebar\" class=\"sidebar\">
            <div class=\"menu\">
                <ul class=\"list\">
                ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parents"]) || array_key_exists("parents", $context) ? $context["parents"] : (function () { throw new Twig_Error_Runtime('Variable "parents" does not exist.', 83, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mods"]) {
            echo " 
                    ";
            // line 84
            if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                echo "    
                    <li>
                        ";
                // line 86
                if ((twig_get_attribute($this->env, $this->source, $context["mods"], "ruta", array()) == null)) {
                    // line 87
                    echo "                        <a href=\"#\" class=\"menu-toggle waves-effect waves-block\">
                        ";
                } else {
                    // line 89
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "ruta", array()), "html", null, true);
                    echo "\" class=\"menu-toggle waves-effect waves-block\">
                        ";
                }
                // line 91
                echo "                            <i class=\"material-icons\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "icono", array()), "html", null, true);
                echo "</i>
                            <span>";
                // line 92
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array()), "html", null, true);
                echo "</span>
                        </a>
                        <ul class=\"ml-menu\">
                        ";
                // line 95
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["children"]) || array_key_exists("children", $context) ? $context["children"] : (function () { throw new Twig_Error_Runtime('Variable "children" does not exist.', 95, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 96
                    echo "                            ";
                    if (((twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()), "id", array())))) {
                        // line 97
                        echo "                                <li>
                                    <a href=\"";
                        // line 98
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "ruta", array()), "html", null, true);
                        echo "\" class=\"\">
                                        <i class=\"material-icons\">";
                        // line 99
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "icono", array()), "html", null, true);
                        echo "</i>
                                        <span>";
                        // line 100
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "titulo", array()), "html", null, true);
                        echo "</span>
                                    </a>
                                </li>
                            ";
                    }
                    // line 103
                    echo " 
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "                        </ul>
                    </li>
                    ";
            }
            // line 108
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                </ul>
            </div>
        </aside>
    </section>
    
    <section id=\"content\" class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"block-header\">
                <div class=\"card\" id=\"render_content\">
                    ";
        // line 118
        $this->displayBlock('body', $context, $blocks);
        // line 119
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
            function  salir() {
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
        // line 186
        $this->displayBlock('javascripts', $context, $blocks);
        // line 187
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

    // line 118
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 186
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
        return array (  334 => 186,  323 => 118,  308 => 24,  302 => 23,  290 => 5,  281 => 187,  279 => 186,  210 => 119,  208 => 118,  197 => 109,  191 => 108,  186 => 105,  179 => 103,  172 => 100,  168 => 99,  164 => 98,  161 => 97,  158 => 96,  154 => 95,  148 => 92,  143 => 91,  137 => 89,  133 => 87,  131 => 86,  126 => 84,  120 => 83,  110 => 75,  99 => 67,  89 => 60,  87 => 59,  59 => 33,  57 => 23,  36 => 5,  30 => 1,);
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
            {% if is_granted('ROLE_USER') %}
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"salir()\">
                            <i class=\"material-icons\">power_settings_new</i>
                        </a>
                    </li>
                </ul>  
            {% else %}    
                <ul class=\"header-dropdown m-r--5\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\" onclick=\"iniciar()\">
                            <i class=\"material-icons\">person</i>
                        </a>
                    </li>
                </ul> 
            {% endif %}  
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
                            {% if child.fkmodulo != null and mods.id == child.fkmodulo.id %}
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
            function  salir() {
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
", "base.html.twig", "H:\\Elfec\\new_backend\\elfec_intranet_backend\\templates\\base.html.twig");
    }
}
