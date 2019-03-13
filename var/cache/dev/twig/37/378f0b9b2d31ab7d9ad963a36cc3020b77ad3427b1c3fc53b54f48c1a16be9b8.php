<?php

/* reporting/auditoriasig.html.twig */
class __TwigTemplate_d2aae74ea98f8116a696f6ed81a586c1f15f11227acc7a97a2114424c02e20ca extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "reporting/auditoriasig.html.twig"));

        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 6
        echo "   
";
        // line 7
        $this->displayBlock('body', $context, $blocks);
        // line 177
        echo "
";
        // line 178
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        echo "    <meta charset=\"UTF-8\">
    <meta name=\"Report\" content=\"Aud-Anual\">
    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "   
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src=\"resources/images/image_rep.png\" width=\"47\" height=\"50\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-01</h6>
            
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\">PROGRAMA ANUAL DE AUDITORÍAS AL SISTEMA INTEGRADO DE GESTIÓN</h6>
                <h6 class=\"font-weight-bold text-center\"> GESTIÓN: 
                ";
        // line 24
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 24, $this->source); })())) {
            // line 25
            echo "                    ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 25, $this->source); })()), 0, array(), "array"), "cb_auditoria_fechahorainicio", array()), "Y"), "html", null, true);
            echo "
                ";
        }
        // line 27
        echo "                </h6>
            </div>
        </div>
    </div>
    
    ";
        // line 32
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 32, $this->source); })())) {
            // line 33
            echo "    <table class=\"table table-bordered table-sm\" id=\"aud_year\">
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        ";
            // line 38
            if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 38, $this->source); })())) {
                // line 39
                echo "            ";
                $context["code"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 39, $this->source); })()), 0, array(), "array"), "cb_auditoria_equipo_id", array());
                // line 40
                echo "            ";
                $context["pass"] = "false";
                // line 41
                echo "            
            ";
                // line 42
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 42, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                    // line 43
                    echo "                ";
                    if (((twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_id", array()) != (isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new Twig_Error_Runtime('Variable "code" does not exist.', 43, $this->source); })())) && ((isset($context["pass"]) || array_key_exists("pass", $context) ? $context["pass"] : (function () { throw new Twig_Error_Runtime('Variable "pass" does not exist.', 43, $this->source); })()) == "true"))) {
                        // line 44
                        echo "                    ";
                        $context["code"] = twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_id", array());
                        // line 45
                        echo "                    ";
                        $context["pass"] = "false";
                        // line 46
                        echo "                ";
                    }
                    // line 47
                    echo "
                ";
                    // line 48
                    if (((twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_id", array()) == (isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new Twig_Error_Runtime('Variable "code" does not exist.', 48, $this->source); })())) && ((isset($context["pass"]) || array_key_exists("pass", $context) ? $context["pass"] : (function () { throw new Twig_Error_Runtime('Variable "pass" does not exist.', 48, $this->source); })()) == "false"))) {
                        // line 49
                        echo "                    <tr>
                        <th colspan=\"1\" scope=\"colgroup\">Equipo  ";
                        // line 50
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_id", array()), "html", null, true);
                        echo "</th>
                        <th colspan=\"1\" scope=\"colgroup\">
                            Auditor líder:
                            ";
                        // line 53
                        if ((twig_get_attribute($this->env, $this->source, $context["t"], "cb_tipo_auditor_nombre", array()) == "AUDITOR LIDER")) {
                            // line 54
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditor_apellidosnombres", array()), "html", null, true);
                            echo " 
                            ";
                        }
                        // line 56
                        echo "                        </th>
                        <th colspan=\"1\" scope=\"colgroup\">
                            Auditor: 
                            ";
                        // line 59
                        if ((twig_get_attribute($this->env, $this->source, $context["t"], "cb_tipo_auditor_nombre", array()) == "OBSERVADOR")) {
                            // line 60
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditor_apellidosnombres", array()), "html", null, true);
                            echo "
                            ";
                        }
                        // line 62
                        echo "                            Observador: 
                            ";
                        // line 63
                        if ((twig_get_attribute($this->env, $this->source, $context["t"], "cb_tipo_auditor_nombre", array()) == "AUDITOR")) {
                            // line 64
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditor_apellidosnombres", array()), "html", null, true);
                            echo "
                            ";
                        }
                        // line 66
                        echo "                        </th>
                        <th colspan=\"1\" scope=\"colgroup\">Experto técnico:</th>
                        <td rowspan=\"1\"></td>
                        <th colspan=\"1\" scope=\"colgroup\">Fecha y hora</th>
                        <th colspan=\"1\" scope=\"colgroup\">Fecha y hora</th>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                    </tr>
                    <tr>
                        <th scope=\"col\">No. Auditoría</th>
                        <th scope=\"col\">Proceso a auditar</th>
                        <th scope=\"col\">Gerencia o área</th>
                        <th scope=\"col\">Lugar</th>
                        <th scope=\"col\">Persona auditar</th>
                        <th scope=\"col\">INICIO</th>
                        <th scope=\"col\">FIN</th>
                        <th scope=\"col\">Duración (hrs.)</th>
                        <th scope=\"col\">Tipo documento</th>
                        <th scope=\"col\">Código doc.</th>
                        <th scope=\"col\">Descripción del documento</th>
                        <th scope=\"col\">Resultados de auditorías previas</th>
                        <th scope=\"col\">Verificación de la eficacia Aud. Previa</th>
                        <th scope=\"col\">Propósitos comerciales y de negocio</th>
                        <th scope=\"col\">Prioridades de la Dirección</th>
                    </tr>
                    ";
                        // line 97
                        $context["pass"] = "true";
                        // line 98
                        echo "                ";
                    }
                    // line 99
                    echo "                <tr>
                    <td>";
                    // line 100
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_fkauditoria", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 101
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_ficha_procesos_nombre", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 102
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_gerencia_nombre", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 103
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_lugar", array()), "html", null, true);
                    echo " </td>
                    <td>";
                    // line 104
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_responsable", array()), "html", null, true);
                    echo " </td>
                    <td>";
                    // line 105
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_fechahorainicio", array()), "html", null, true);
                    echo " </td>
                    <td>";
                    // line 106
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_fechahorafin", array()), "html", null, true);
                    echo " </td>
                    <td>";
                    // line 107
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_duracionestimada", array()), "html", null, true);
                    echo " </td>
                    
                    ";
                    // line 109
                    if ((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 109, $this->source); })())) {
                        echo " 
                        ";
                        // line 110
                        $context["i"] = 0;
                        // line 111
                        echo "                        ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 111, $this->source); })()));
                        $context['loop'] = array(
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        );
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
                            echo " 
                            ";
                            // line 112
                            if (((((isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new Twig_Error_Runtime('Variable "i" does not exist.', 112, $this->source); })()) == 0) && (twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_fkauditoria", array()) == twig_get_attribute($this->env, $this->source, $context["o"], "cb_auditoria_id", array()))) && (twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_fkarea", array()) == twig_get_attribute($this->env, $this->source, $context["o"], "cb_auditoria_fkarea", array())))) {
                                echo "  
                            <td> ";
                                // line 113
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o"], "cb_doc_tipoextra_tipo", array()), "html", null, true);
                                echo " </td>
                            <td> ";
                                // line 114
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o"], "cb_documento_extra_codigo", array()), "html", null, true);
                                echo "  </td>
                            <td> ";
                                // line 115
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o"], "cb_documento_extra_titulo", array()), "html", null, true);
                                echo " </td>
                            ";
                                // line 116
                                $context["i"] = twig_get_attribute($this->env, $this->source, $context["loop"], "index", array());
                                // line 117
                                echo "                            ";
                            }
                            echo " 
                        ";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 118
                        echo "    
                    ";
                    }
                    // line 119
                    echo "   
                    
                    <td> ";
                    // line 121
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_accion_descripcion", array()), "html", null, true);
                    echo " </td>
                    <td> ";
                    // line 122
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "cb_accion_eficacia_resultado", array()), "html", null, true);
                    echo "  </td>
                    <td> </td>
                    <td> </td> 
                </tr>
                ";
                    // line 126
                    if ((isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 126, $this->source); })())) {
                        // line 127
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["docs"]) || array_key_exists("docs", $context) ? $context["docs"] : (function () { throw new Twig_Error_Runtime('Variable "docs" does not exist.', 127, $this->source); })()), (isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new Twig_Error_Runtime('Variable "i" does not exist.', 127, $this->source); })())));
                        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                            // line 128
                            echo "                        ";
                            if (((twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_equipo_fkauditoria", array()) == twig_get_attribute($this->env, $this->source, $context["m"], "cb_auditoria_id", array())) && (twig_get_attribute($this->env, $this->source, $context["t"], "cb_auditoria_fkarea", array()) == twig_get_attribute($this->env, $this->source, $context["m"], "cb_auditoria_fkarea", array())))) {
                                // line 129
                                echo "                        <tr>
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> ";
                                // line 138
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "cb_doc_tipoextra_tipo", array()), "html", null, true);
                                echo "  </td> 
                            <td> ";
                                // line 139
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "cb_documento_extra_codigo", array()), "html", null, true);
                                echo " </td>
                            <td> ";
                                // line 140
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "cb_documento_extra_titulo", array()), "html", null, true);
                                echo " </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                        </tr>
                        ";
                            }
                            // line 147
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 148
                        echo "                ";
                    }
                    // line 149
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 150
                echo "        ";
            }
            echo " 
    </table>
    
    <table class=\"table borderless table-sm\">
        <tr>
            <td> </td>
            <th>Fecha</th>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr>
            <th>COORDINADOR GCDO</th>
            <th>RESPONSABLE MEDIO AMBIENTE</th>
            <th>RESPONSABLE SySO</th>
            <th>DIRECTOR SIG</th>
            <th>GERENTE GENERAL</th>
        </tr>
    </table>
    ";
        } else {
            // line 172
            echo "        <div class=\"m-2 p-3\">
            <p>No se encontraron registros.</p>
        </div>
    ";
        }
        // line 176
        echo " ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 178
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 179
        echo "<script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "reporting/auditoriasig.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  436 => 179,  430 => 178,  423 => 176,  417 => 172,  391 => 150,  385 => 149,  382 => 148,  376 => 147,  366 => 140,  362 => 139,  358 => 138,  347 => 129,  344 => 128,  339 => 127,  337 => 126,  330 => 122,  326 => 121,  322 => 119,  318 => 118,  301 => 117,  299 => 116,  295 => 115,  291 => 114,  287 => 113,  283 => 112,  263 => 111,  261 => 110,  257 => 109,  252 => 107,  248 => 106,  244 => 105,  240 => 104,  236 => 103,  232 => 102,  228 => 101,  224 => 100,  221 => 99,  218 => 98,  216 => 97,  183 => 66,  177 => 64,  175 => 63,  172 => 62,  166 => 60,  164 => 59,  159 => 56,  153 => 54,  151 => 53,  145 => 50,  142 => 49,  140 => 48,  137 => 47,  134 => 46,  131 => 45,  128 => 44,  125 => 43,  121 => 42,  118 => 41,  115 => 40,  112 => 39,  110 => 38,  103 => 33,  101 => 32,  94 => 27,  88 => 25,  86 => 24,  62 => 7,  52 => 2,  46 => 1,  39 => 178,  36 => 177,  34 => 7,  31 => 6,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block stylesheets %}
    <meta charset=\"UTF-8\">
    <meta name=\"Report\" content=\"Aud-Anual\">
    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
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
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-01</h6>
            
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\">PROGRAMA ANUAL DE AUDITORÍAS AL SISTEMA INTEGRADO DE GESTIÓN</h6>
                <h6 class=\"font-weight-bold text-center\"> GESTIÓN: 
                {% if objects %}
                    {{objects[0].cb_auditoria_fechahorainicio|date('Y')}}
                {% endif %}
                </h6>
            </div>
        </div>
    </div>
    
    {% if objects %}
    <table class=\"table table-bordered table-sm\" id=\"aud_year\">
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        <colgroup span=\"2\"></colgroup>
        {% if objects %}
            {% set code = objects[0].cb_auditoria_equipo_id %}
            {% set pass = 'false' %}
            
            {% for t in objects %}
                {% if t.cb_auditoria_equipo_id != code and pass == 'true' %}
                    {% set code = t.cb_auditoria_equipo_id %}
                    {% set pass = 'false' %}
                {% endif %}

                {% if t.cb_auditoria_equipo_id == code and pass == 'false' %}
                    <tr>
                        <th colspan=\"1\" scope=\"colgroup\">Equipo  {{ t.cb_auditoria_equipo_id }}</th>
                        <th colspan=\"1\" scope=\"colgroup\">
                            Auditor líder:
                            {% if t.cb_tipo_auditor_nombre == 'AUDITOR LIDER' %}
                                {{ t.cb_auditor_apellidosnombres }} 
                            {% endif %}
                        </th>
                        <th colspan=\"1\" scope=\"colgroup\">
                            Auditor: 
                            {% if t.cb_tipo_auditor_nombre == 'OBSERVADOR' %}
                                {{ t.cb_auditor_apellidosnombres }}
                            {% endif %}
                            Observador: 
                            {% if t.cb_tipo_auditor_nombre == 'AUDITOR' %}
                                {{ t.cb_auditor_apellidosnombres }}
                            {% endif %}
                        </th>
                        <th colspan=\"1\" scope=\"colgroup\">Experto técnico:</th>
                        <td rowspan=\"1\"></td>
                        <th colspan=\"1\" scope=\"colgroup\">Fecha y hora</th>
                        <th colspan=\"1\" scope=\"colgroup\">Fecha y hora</th>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                        <td rowspan=\"1\"> </td>
                    </tr>
                    <tr>
                        <th scope=\"col\">No. Auditoría</th>
                        <th scope=\"col\">Proceso a auditar</th>
                        <th scope=\"col\">Gerencia o área</th>
                        <th scope=\"col\">Lugar</th>
                        <th scope=\"col\">Persona auditar</th>
                        <th scope=\"col\">INICIO</th>
                        <th scope=\"col\">FIN</th>
                        <th scope=\"col\">Duración (hrs.)</th>
                        <th scope=\"col\">Tipo documento</th>
                        <th scope=\"col\">Código doc.</th>
                        <th scope=\"col\">Descripción del documento</th>
                        <th scope=\"col\">Resultados de auditorías previas</th>
                        <th scope=\"col\">Verificación de la eficacia Aud. Previa</th>
                        <th scope=\"col\">Propósitos comerciales y de negocio</th>
                        <th scope=\"col\">Prioridades de la Dirección</th>
                    </tr>
                    {% set pass = 'true' %}
                {% endif %}
                <tr>
                    <td>{{ t.cb_auditoria_equipo_fkauditoria }}</td>
                    <td>{{ t.cb_ficha_procesos_nombre }}</td>
                    <td>{{ t.cb_gerencia_nombre }}</td>
                    <td>{{ t.cb_auditoria_lugar }} </td>
                    <td>{{ t.cb_auditoria_responsable }} </td>
                    <td>{{ t.cb_auditoria_fechahorainicio }} </td>
                    <td>{{ t.cb_auditoria_fechahorafin }} </td>
                    <td>{{ t.cb_auditoria_duracionestimada }} </td>
                    
                    {% if docs %} 
                        {% set i = 0 %}
                        {% for o in docs %} 
                            {% if i == 0 and t.cb_auditoria_equipo_fkauditoria == o.cb_auditoria_id and t.cb_auditoria_fkarea == o.cb_auditoria_fkarea %}  
                            <td> {{o.cb_doc_tipoextra_tipo}} </td>
                            <td> {{o.cb_documento_extra_codigo}}  </td>
                            <td> {{o.cb_documento_extra_titulo}} </td>
                            {% set i = loop.index %}
                            {% endif %} 
                        {% endfor %}    
                    {% endif %}   
                    
                    <td> {{ t.cb_accion_descripcion }} </td>
                    <td> {{ t.cb_accion_eficacia_resultado }}  </td>
                    <td> </td>
                    <td> </td> 
                </tr>
                {% if docs %}
                    {% for m in docs|slice(i) %}
                        {% if t.cb_auditoria_equipo_fkauditoria == m.cb_auditoria_id and t.cb_auditoria_fkarea == m.cb_auditoria_fkarea %}
                        <tr>
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                            <td> {{m.cb_doc_tipoextra_tipo}}  </td> 
                            <td> {{m.cb_documento_extra_codigo}} </td>
                            <td> {{m.cb_documento_extra_titulo}} </td> 
                            <td> </td>
                            <td> </td> 
                            <td> </td>
                            <td> </td> 
                        </tr>
                        {% endif %}
                    {% endfor %}
                {% endif %}
            {% endfor %}
        {% endif %} 
    </table>
    
    <table class=\"table borderless table-sm\">
        <tr>
            <td> </td>
            <th>Fecha</th>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr class=\"spacer\"> <td> </td></tr>
        <tr>
            <th>COORDINADOR GCDO</th>
            <th>RESPONSABLE MEDIO AMBIENTE</th>
            <th>RESPONSABLE SySO</th>
            <th>DIRECTOR SIG</th>
            <th>GERENTE GENERAL</th>
        </tr>
    </table>
    {% else %}
        <div class=\"m-2 p-3\">
            <p>No se encontraron registros.</p>
        </div>
    {% endif %}
 {% endblock %}

{% block javascripts %}
<script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
{% endblock %}
", "reporting/auditoriasig.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\reporting\\auditoriasig.html.twig");
    }
}
