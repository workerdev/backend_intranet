<?php

/* reporting/auditoriaint.html.twig */
class __TwigTemplate_f32928bb5db3ec1438ec18e262631d3c4a28e151e8cab1c525b18a491d7589d0 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "reporting/auditoriaint.html.twig"));

        // line 1
        echo "
";
        // line 2
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo " 
";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 292
        echo "
";
        // line 293
        $this->displayBlock('javascripts', $context, $blocks);
        // line 295
        echo "  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
    <style>
        .borderless td, .borderless th, .borderless tr {
            border: none;
        }
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src=\"resources/images/image_rep.png\" width=\"47\" height=\"50\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-04</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\">INFORME DE AUDITORIA INTERNA SIG</h6>
            </div>
        </div>
    </div>
    
    ";
        // line 31
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 31, $this->source); })())) {
            // line 32
            echo "    <div class=\"m-2 p-3\">
    <table class=\"table borderless table-sm\">
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Auditoría Unidad: </th>
                <td class=\"text-normal\">";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 39, $this->source); })()), 0, array(), "array"), "cb_gerencia_nombre", array()), "html", null, true);
            echo "</td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Macro Proceso: </th>
                <td class=\"text-normal\"> </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Proceso: </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 57, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 58
                echo "                    <td class=\"text-normal\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_ficha_procesos_nombre", array()), "html", null, true);
                echo "</td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de la Auditoría: </th>
                <td class=\"text-normal\"> ";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 69, $this->source); })()), 0, array(), "array"), "cb_auditoria_fechahorainicio", array()), "html", null, true);
            echo " </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de entrega de Informe: </th>
                <td class=\"text-normal\"> ";
            // line 74
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y"), "html", null, true);
            echo " </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Tipo de Auditoría: </th>
                <td class=\"text-normal\"> ";
            // line 79
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 79, $this->source); })()), 0, array(), "array"), "cb_tipo_auditoria_nombre", array()), "html", null, true);
            echo " </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Número de Auditoría: </th>
                <td class=\"text-normal\"> ";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 88, $this->source); })()), 0, array(), "array"), "cb_auditoria_id", array()), "html", null, true);
            echo " </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">1. Equipo Auditor que realizó el trabajo </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">AUDITOR </th>
                <th colspan=\"1\" scope=\"colgroup\">FIRMA </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["team"]) || array_key_exists("team", $context) ? $context["team"] : (function () { throw new Twig_Error_Runtime('Variable "team" does not exist.', 105, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["q"]) {
                // line 106
                echo "            <tr>
                <td class=\"text-normal\"> ";
                // line 107
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["q"], "cb_auditor_apellidosnombres", array()), "html", null, true);
                echo "</td>
                <td class=\"text-normal\"> ______________ </td>
                <td class=\"text-normal\">  </td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['q'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">AUDITOR LIDER</th>
                <td class=\"text-normal\"> 
                ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["team"]) || array_key_exists("team", $context) ? $context["team"] : (function () { throw new Twig_Error_Runtime('Variable "team" does not exist.', 118, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["adr"]) {
                // line 119
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["adr"], "cb_tipo_auditor_nombre", array()) == "AUDITOR LIDER")) {
                    // line 120
                    echo "                         ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["adr"], "cb_auditor_apellidosnombres", array()), "html", null, true);
                    echo " 
                    ";
                }
                // line 122
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "                </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">2. Objetivos del trabajo realizado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> ";
            // line 136
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 136, $this->source); })()), 0, array(), "array"), "cb_auditoria_objetivos", array()), "html", null, true);
            echo " </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">3. Alcance del trabajo realizado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> ";
            // line 150
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 150, $this->source); })()), 0, array(), "array"), "cb_auditoria_alcance", array()), "html", null, true);
            echo " </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">4. Documentación base utilizada para el trabajo (Criterios de Auditoría) </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Tipo documento </th>
                <th colspan=\"1\" scope=\"colgroup\">Código doc. </th>
                <th colspan=\"1\" scope=\"colgroup\">Descripción del documento</th>
            </tr>
            ";
            // line 173
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 173, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 174
                echo "            <tr>
                <td class=\"text-normal\"> ";
                // line 175
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["d"], "cb_doc_tipoextra_tipo", array()), "html", null, true);
                echo " </td>
                <td class=\"text-normal\"> ";
                // line 176
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["d"], "cb_documento_extra_codigo", array()), "html", null, true);
                echo " </td>
                <td class=\"text-normal\"> ";
                // line 177
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["d"], "cb_documento_extra_titulo", array()), "html", null, true);
                echo " </td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            echo "            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">5. Descripción general de la auditoría realizada </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> ";
            // line 190
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 190, $this->source); })()), 0, array(), "array"), "cb_auditoria_alcance", array()), "html", null, true);
            echo " </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">6. Fortalezas identificadas en el proceso auditado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            ";
            // line 203
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fort"]) || array_key_exists("fort", $context) ? $context["fort"] : (function () { throw new Twig_Error_Runtime('Variable "fort" does not exist.', 203, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 204
                echo "            <tr>
                <td class=\"text-normal\"> ";
                // line 205
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["f"], "cb_fortaleza_descripcion", array()), "html", null, true);
                echo " </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 210
            echo "
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">7. Situaciones identificadas / hallazgos / Resultados </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Acción </th>
                <th colspan=\"1\" scope=\"colgroup\">Hallazgo </th>
                <th colspan=\"1\" scope=\"colgroup\">Resultados de Eficacia </th>
            </tr>
            ";
            // line 228
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hlzg"]) || array_key_exists("hlzg", $context) ? $context["hlzg"] : (function () { throw new Twig_Error_Runtime('Variable "hlzg" does not exist.', 228, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                // line 229
                echo "            <tr>
                <td class=\"text-normal\"> ";
                // line 230
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["h"], "cb_accion_descripcion", array()), "html", null, true);
                echo " </td>
                <td class=\"text-normal\"> ";
                // line 231
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["h"], "cb_hallazgo_descripcion", array()), "html", null, true);
                echo " </td>
                <td class=\"text-normal\"> ";
                // line 232
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["h"], "cb_accion_eficacia_resultado", array()), "html", null, true);
                echo " </td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 235
            echo "
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">8. CONCLUSIONES </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> ";
            // line 248
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 248, $this->source); })()), 0, array(), "array"), "cb_auditoria_conclusiones", array()), "html", null, true);
            echo " </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de Revisión de Informe:\t</th>
                ";
            // line 258
            if ((twig_length_filter($this->env, (isset($context["hlzg"]) || array_key_exists("hlzg", $context) ? $context["hlzg"] : (function () { throw new Twig_Error_Runtime('Variable "hlzg" does not exist.', 258, $this->source); })())) > 0)) {
                // line 259
                echo "                    <td class=\"text-normal\"> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["hlzg"]) || array_key_exists("hlzg", $context) ? $context["hlzg"] : (function () { throw new Twig_Error_Runtime('Variable "hlzg" does not exist.', 259, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_fecha", array()), "html", null, true);
                echo " </td>
                ";
            } else {
                // line 261
                echo "                    <td class=\"text-normal\"> </td>
                ";
            }
            // line 263
            echo "                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
    </table>
    
    <table class=\"table borderless table-sm\">

        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr> 
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>

        <tr>
            <th>Jefe / Supervisor Unidad Auditada</th>
            <th>Gerente / Coordinador Unidad Auditada</th>
            <th>Coordinador Gestión de Calidad y Desarrollo Organizacional</th>
        </tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
    </table>
    </div>
    ";
        } else {
            // line 287
            echo "        <div class=\"m-2 p-3\">
            <p>No se encontraron registros de esta gestión.</p>
        </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 293
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 294
        echo "    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "reporting/auditoriaint.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  501 => 294,  495 => 293,  484 => 287,  458 => 263,  454 => 261,  448 => 259,  446 => 258,  433 => 248,  418 => 235,  409 => 232,  405 => 231,  401 => 230,  398 => 229,  394 => 228,  374 => 210,  363 => 205,  360 => 204,  356 => 203,  340 => 190,  328 => 180,  319 => 177,  315 => 176,  311 => 175,  308 => 174,  304 => 173,  278 => 150,  261 => 136,  246 => 123,  240 => 122,  234 => 120,  231 => 119,  227 => 118,  219 => 112,  208 => 107,  205 => 106,  201 => 105,  181 => 88,  169 => 79,  161 => 74,  153 => 69,  142 => 60,  133 => 58,  129 => 57,  108 => 39,  99 => 32,  97 => 31,  76 => 12,  70 => 11,  57 => 3,  51 => 2,  44 => 295,  42 => 293,  39 => 292,  37 => 11,  34 => 10,  32 => 2,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% block stylesheets %}
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
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-04</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\">INFORME DE AUDITORIA INTERNA SIG</h6>
            </div>
        </div>
    </div>
    
    {% if objects %}
    <div class=\"m-2 p-3\">
    <table class=\"table borderless table-sm\">
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Auditoría Unidad: </th>
                <td class=\"text-normal\">{{ objects[0].cb_gerencia_nombre }}</td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Macro Proceso: </th>
                <td class=\"text-normal\"> </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Proceso: </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                {% for t in objects %}
                    <td class=\"text-normal\">{{ t.cb_ficha_procesos_nombre }}</td>
                {% endfor %}
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de la Auditoría: </th>
                <td class=\"text-normal\"> {{ objects[0].cb_auditoria_fechahorainicio }} </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de entrega de Informe: </th>
                <td class=\"text-normal\"> {{ \"now\"|date('d-m-Y') }} </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Tipo de Auditoría: </th>
                <td class=\"text-normal\"> {{ objects[0].cb_tipo_auditoria_nombre }} </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Número de Auditoría: </th>
                <td class=\"text-normal\"> {{ objects[0].cb_auditoria_id }} </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">1. Equipo Auditor que realizó el trabajo </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">AUDITOR </th>
                <th colspan=\"1\" scope=\"colgroup\">FIRMA </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            {% for q in team %}
            <tr>
                <td class=\"text-normal\"> {{ q.cb_auditor_apellidosnombres }}</td>
                <td class=\"text-normal\"> ______________ </td>
                <td class=\"text-normal\">  </td>
            </tr>
            {% endfor %}

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">AUDITOR LIDER</th>
                <td class=\"text-normal\"> 
                {% for adr in team %}
                    {% if adr.cb_tipo_auditor_nombre == 'AUDITOR LIDER' %}
                         {{ adr.cb_auditor_apellidosnombres }} 
                    {% endif %}
                {% endfor %}
                </td>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">2. Objetivos del trabajo realizado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> {{ objects[0].cb_auditoria_objetivos }} </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">3. Alcance del trabajo realizado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> {{ objects[0].cb_auditoria_alcance }} </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">4. Documentación base utilizada para el trabajo (Criterios de Auditoría) </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Tipo documento </th>
                <th colspan=\"1\" scope=\"colgroup\">Código doc. </th>
                <th colspan=\"1\" scope=\"colgroup\">Descripción del documento</th>
            </tr>
            {% for d in docs %}
            <tr>
                <td class=\"text-normal\"> {{d.cb_doc_tipoextra_tipo}} </td>
                <td class=\"text-normal\"> {{d.cb_documento_extra_codigo}} </td>
                <td class=\"text-normal\"> {{d.cb_documento_extra_titulo}} </td>
            </tr>
            {% endfor %}
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">5. Descripción general de la auditoría realizada </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> {{objects[0].cb_auditoria_alcance}} </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">6. Fortalezas identificadas en el proceso auditado </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            {% for f in fort %}
            <tr>
                <td class=\"text-normal\"> {{f.cb_fortaleza_descripcion}} </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>
            {% endfor %}

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">7. Situaciones identificadas / hallazgos / Resultados </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>

            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Acción </th>
                <th colspan=\"1\" scope=\"colgroup\">Hallazgo </th>
                <th colspan=\"1\" scope=\"colgroup\">Resultados de Eficacia </th>
            </tr>
            {% for h in hlzg %}
            <tr>
                <td class=\"text-normal\"> {{h.cb_accion_descripcion}} </td>
                <td class=\"text-normal\"> {{h.cb_hallazgo_descripcion}} </td>
                <td class=\"text-normal\"> {{h.cb_accion_eficacia_resultado}} </td>
            </tr>
            {% endfor %}

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">8. CONCLUSIONES </th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
            <tr>
                <td class=\"text-normal\"> {{objects[0].cb_auditoria_conclusiones}} </td>
                <td class=\"text-normal\"></td>
                <td class=\"text-normal\"></td>
            </tr>

            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr class=\"spacer\"> <td> </td></tr>
            <tr>
                <th colspan=\"1\" scope=\"colgroup\">Fecha de Revisión de Informe:\t</th>
                {% if hlzg|length > 0 %}
                    <td class=\"text-normal\"> {{hlzg[0].cb_accion_eficacia_fecha}} </td>
                {% else %}
                    <td class=\"text-normal\"> </td>
                {% endif %}
                <th colspan=\"1\" scope=\"colgroup\"></th>
            </tr>
    </table>
    
    <table class=\"table borderless table-sm\">

        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr> 
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>

        <tr>
            <th>Jefe / Supervisor Unidad Auditada</th>
            <th>Gerente / Coordinador Unidad Auditada</th>
            <th>Coordinador Gestión de Calidad y Desarrollo Organizacional</th>
        </tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
    </table>
    </div>
    {% else %}
        <div class=\"m-2 p-3\">
            <p>No se encontraron registros de esta gestión.</p>
        </div>
    {% endif %}
{% endblock %}

{% block javascripts %}
    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
{% endblock %}  ", "reporting/auditoriaint.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\reporting\\auditoriaint.html.twig");
    }
}
