<?php

/* reporting/notificacionaud.html.twig */
class __TwigTemplate_f067bd92bd99740c5807612719fb42c4cc46698f7e7dcb0e6d9f5c26cc3501cc extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "reporting/notificacionaud.html.twig"));

        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 192
        echo "
";
        // line 193
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        echo "    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
    <style>
        .borderless td, .borderless th, .borderless tr {
            border: none;
        }
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src=\"resources/images/image_rep.png\" width=\"47\" height=\"50\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-02</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\"><u>NOTIFICACION DE INICIO DE AUDITORIA</u></h6>
                <h6 class=\"font-weight-bold text-center\"><u>AUDITORIA DEL SISTEMA INTEGRADO DE GESTION</u></h6>
            </div>
        </div>
    </div>

    ";
        // line 30
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 30, $this->source); })())) {
            // line 31
            echo "    <div class=\"container mt-3\">
        <div class=\"\">
            </br>          
            <table class=\"table borderless table-sm\">
                <tr>
                    <th>Fecha de Notificación:</th>
                    <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y"), "html", null, true);
            echo " </td>
                    <td></td>
                    <td></td>
                </tr>
                ";
            // line 41
            if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 41, $this->source); })())) {
                // line 42
                echo "                <tr>
                    <th>Gerencia o Unidad a ser auditada:</th>
                    <td>";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 44, $this->source); })()), 0, array(), "array"), "cb_gerencia_nombre", array()), "html", null, true);
                echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Gerente Coordinador</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Jefe o supervisor de Area:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Proceso a ser auditado:</th>
                    <td>";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 66, $this->source); })()), 0, array(), "array"), "cb_ficha_procesos_nombre", array()), "html", null, true);
                echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Número de Auditoría:</th>
                    <td>";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 72, $this->source); })()), 0, array(), "array"), "cb_auditoria_equipo_fkauditoria", array()), "html", null, true);
                echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Equipo Auditor:</th>
                    <td>";
                // line 78
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 78, $this->source); })()), 0, array(), "array"), "cb_auditoria_equipo_id", array()), "html", null, true);
                echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th>AUDITOR SIG</th>
                    <td>
                    ";
                // line 88
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 88, $this->source); })()), 0, array(), "array"), "cb_tipo_auditor_nombre", array()) == "AUDITOR")) {
                    // line 89
                    echo "                         ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 89, $this->source); })()), 0, array(), "array"), "cb_auditor_apellidosnombres", array()), "html", null, true);
                    echo "
                    ";
                }
                // line 91
                echo "                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th>AUDITOR LIDER</th>
                    <td>
                    ";
                // line 98
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 98, $this->source); })()), 0, array(), "array"), "cb_tipo_auditor_nombre", array()) == "AUDITOR LIDER")) {
                    // line 99
                    echo "                         ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 99, $this->source); })()), 0, array(), "array"), "cb_auditor_apellidosnombres", array()), "html", null, true);
                    echo " 
                    ";
                }
                // line 101
                echo "                    </td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Fecha y hora estimada de inicio:</th>
                    <td>";
                // line 107
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 107, $this->source); })()), 0, array(), "array"), "cb_auditoria_fechahorainicio", array()), "html", null, true);
                echo "</td>
                    <th>Duración:</th>
                    <th>";
                // line 109
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 109, $this->source); })()), 0, array(), "array"), "cb_auditoria_duracionestimada", array()), "html", null, true);
                echo " Hrs.</th>
                </tr>
                <tr>
                    <th>Fecha y hora estimada de término:</th>
                    <td>";
                // line 113
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 113, $this->source); })()), 0, array(), "array"), "cb_auditoria_fechahorafin", array()), "html", null, true);
                echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                ";
            }
            // line 118
            echo "                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Objetivos:</th>
                    <td>";
            // line 122
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 122, $this->source); })()), 0, array(), "array"), "cb_auditoria_objetivos", array()), "html", null, true);
            echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Documentos base para realizar la auditoría:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                ";
            // line 138
            if ((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 138, $this->source); })())) {
                echo " 
                <tr>
                    <th><u>CODIGO</u></th>
                    <th><u>DESCRIPCION</u></th>
                </tr>
                ";
                // line 143
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 143, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                    // line 144
                    echo "                    ";
                    if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 144, $this->source); })()), 0, array(), "array"), "cb_auditoria_equipo_fkauditoria", array()) == twig_get_attribute($this->env, $this->source, $context["m"], "cb_auditoria_id", array())) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 144, $this->source); })()), 0, array(), "array"), "cb_auditoria_fkarea", array()) == twig_get_attribute($this->env, $this->source, $context["m"], "cb_auditoria_fkarea", array())))) {
                        // line 145
                        echo "                    <tr>
                        <td>";
                        // line 146
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "cb_documento_extra_codigo", array()), "html", null, true);
                        echo "</td>
                        <td>";
                        // line 147
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "cb_documento_extra_titulo", array()), "html", null, true);
                        echo "</td>
                    </tr>
                    ";
                    }
                    // line 150
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 151
                echo "                ";
            }
            // line 152
            echo "                    
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Alcance:</th>
                    <td>";
            // line 161
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 161, $this->source); })()), 0, array(), "array"), "cb_auditoria_alcance", array()), "html", null, true);
            echo "</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Personal Requerido:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <td>Auditor Líder</td>
                    <td></td>
                    <td></td>
                    <td>Coordinador UGCDO</td>
                </tr>
            </table>
        </div>

    </div>
    ";
        } else {
            // line 186
            echo "        <div class=\"container mt-3\">
            <p>No se encontraron registros.</p>
        </div>
    ";
        }
        // line 190
        echo "    
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 193
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 194
        echo "    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "reporting/notificacionaud.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  345 => 194,  339 => 193,  331 => 190,  325 => 186,  297 => 161,  286 => 152,  283 => 151,  277 => 150,  271 => 147,  267 => 146,  264 => 145,  261 => 144,  257 => 143,  249 => 138,  230 => 122,  224 => 118,  216 => 113,  209 => 109,  204 => 107,  196 => 101,  190 => 99,  188 => 98,  179 => 91,  173 => 89,  171 => 88,  158 => 78,  149 => 72,  140 => 66,  115 => 44,  111 => 42,  109 => 41,  102 => 37,  94 => 31,  92 => 30,  71 => 11,  65 => 10,  52 => 2,  46 => 1,  39 => 193,  36 => 192,  34 => 10,  31 => 9,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
    <style>
        .borderless td, .borderless th, .borderless tr {
            border: none;
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src=\"resources/images/image_rep.png\" width=\"47\" height=\"50\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-02</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\"><u>NOTIFICACION DE INICIO DE AUDITORIA</u></h6>
                <h6 class=\"font-weight-bold text-center\"><u>AUDITORIA DEL SISTEMA INTEGRADO DE GESTION</u></h6>
            </div>
        </div>
    </div>

    {% if objects %}
    <div class=\"container mt-3\">
        <div class=\"\">
            </br>          
            <table class=\"table borderless table-sm\">
                <tr>
                    <th>Fecha de Notificación:</th>
                    <td>{{ \"now\"|date('d-m-Y') }} </td>
                    <td></td>
                    <td></td>
                </tr>
                {% if objects %}
                <tr>
                    <th>Gerencia o Unidad a ser auditada:</th>
                    <td>{{ objects[0].cb_gerencia_nombre }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Gerente Coordinador</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Jefe o supervisor de Area:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Proceso a ser auditado:</th>
                    <td>{{ objects[0].cb_ficha_procesos_nombre }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Número de Auditoría:</th>
                    <td>{{ objects[0].cb_auditoria_equipo_fkauditoria }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Equipo Auditor:</th>
                    <td>{{ objects[0].cb_auditoria_equipo_id }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th>AUDITOR SIG</th>
                    <td>
                    {% if objects[0].cb_tipo_auditor_nombre == 'AUDITOR' %}
                         {{ objects[0].cb_auditor_apellidosnombres }}
                    {% endif %}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th>AUDITOR LIDER</th>
                    <td>
                    {% if objects[0].cb_tipo_auditor_nombre == 'AUDITOR LIDER' %}
                         {{ objects[0].cb_auditor_apellidosnombres }} 
                    {% endif %}
                    </td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Fecha y hora estimada de inicio:</th>
                    <td>{{ objects[0].cb_auditoria_fechahorainicio }}</td>
                    <th>Duración:</th>
                    <th>{{ objects[0].cb_auditoria_duracionestimada }} Hrs.</th>
                </tr>
                <tr>
                    <th>Fecha y hora estimada de término:</th>
                    <td>{{ objects[0].cb_auditoria_fechahorafin }}</td>
                    <td></td>
                    <td></td>
                </tr>
                {% endif %}
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Objetivos:</th>
                    <td>{{objects[0].cb_auditoria_objetivos}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Documentos base para realizar la auditoría:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                {% if docs %} 
                <tr>
                    <th><u>CODIGO</u></th>
                    <th><u>DESCRIPCION</u></th>
                </tr>
                {% for m in docs %}
                    {% if objects[0].cb_auditoria_equipo_fkauditoria == m.cb_auditoria_id and objects[0].cb_auditoria_fkarea == m.cb_auditoria_fkarea %}
                    <tr>
                        <td>{{m.cb_documento_extra_codigo}}</td>
                        <td>{{m.cb_documento_extra_titulo}}</td>
                    </tr>
                    {% endif %}
                {% endfor %}
                {% endif %}
                    
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th>Alcance:</th>
                    <td>{{objects[0].cb_auditoria_alcance}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Personal Requerido:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <td>Auditor Líder</td>
                    <td></td>
                    <td></td>
                    <td>Coordinador UGCDO</td>
                </tr>
            </table>
        </div>

    </div>
    {% else %}
        <div class=\"container mt-3\">
            <p>No se encontraron registros.</p>
        </div>
    {% endif %}
    
{% endblock %}

{% block javascripts %}
    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
{% endblock %}", "reporting/notificacionaud.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\reporting\\notificacionaud.html.twig");
    }
}
