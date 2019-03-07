<?php

/* reporting/verificacionef.html.twig */
class __TwigTemplate_28307d1099266289e5403b9bb19c72068eefead26475c09d51bbba6592b88239 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "reporting/verificacionef.html.twig"));

        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "
";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 134
        echo "
";
        // line 135
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
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <style>
        .borderless td, .borderless th, .borderless tr {
            border: none;
        }
        #tb-ef tr, #tb-ef td, .frm-efc{
            height: 14px !important;
        }
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 15
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src=\"resources/images/image_rep.png\" width=\"47\" height=\"50\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-07</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\"><u>Verificación eficacia de la Acción Correctiva</u></h6>
                <h6 class=\"font-weight-bold text-center\">Sistema Integrado de Gestión de ELFEC S.A.</h6>
            </div>
        </div>
    </div>

    ";
        // line 34
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 34, $this->source); })())) {
            // line 35
            echo "    <div class=\"container\">
        <div class=\"mt-3\">
            </br>          
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <th>No. Auditoría:</th>
                    <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 41, $this->source); })()), 0, array(), "array"), "cb_auditoria_id", array()), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <th>No. de Hallazgo:</th>
                    <td>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 45, $this->source); })()), 0, array(), "array"), "cb_hallazgo_id", array()), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <th>Identificador de la Acción:</th>
                    <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 49, $this->source); })()), 0, array(), "array"), "cb_accion_id", array()), "html", null, true);
            echo "</td>
                </tr>
            </table>

            <h7><b>Resultado de la verificación de la eficacia de la Acción tomada:</b></h7>
            <table id=\"tb-ef\" class=\"table table-bordered table-sm\">
                <tr>
                    <td>
                        <label class=\"\">EFICAZ:</label>
                    </td>
                    <td>
                        ";
            // line 60
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 60, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_eficaz", array()) == "Si")) {
                echo " <i class=\"fa fa-check\"></i> ";
            }
            // line 61
            echo "                    </td>
                </tr>
                <tr>
                    <td>
                        <label class=\"\">NO EFICAZ:</label>
                    </td>
                    <td>
                        ";
            // line 68
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 68, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_eficaz", array()) == "No")) {
                echo " <i class=\"fa fa-check\"></i> ";
            }
            // line 69
            echo "                    </td>
                </tr>
            </table>

            <h7><b>Observaciones:</b></h7>
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <td></td>
                    <td><textarea id=\"textarea\" rows=\"2\" style=\"height: 20px; border:none\" value=\"\"></textarea></td>
                </tr>
            </table>     

            <table class=\"table borderless table-sm\">
                <tr>
                    <th>Fecha verificación: </th>
                    <td>";
            // line 84
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 84, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_fecha", array()), "d-m-Y"), "html", null, true);
            echo " </td>
                </tr>
                <tr>
                    <th>Verificado por: </th>
                    <td>";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 88, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_nombreverificador", array()), "html", null, true);
            echo " </td>
                </tr>
            </table>    
            
                      
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <th>Responsable del proceso verificado:</th>
                    <td>";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 96, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_responsable", array()), "html", null, true);
            echo " </td>
                </tr>
                <tr>
                    <th>Cargo del Responsable:</th>
                    <td>";
            // line 100
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 100, $this->source); })()), 0, array(), "array"), "cb_accion_eficacia_cargoverificador", array()), "html", null, true);
            echo "</td>
                </tr>
            </table>

            <table class=\"table borderless table-sm\">
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th style=\"text-decoration: overline\">Firma Responsable del proceso verificado</th>
                    <th style=\"text-decoration: overline\">Firma Verificador</th>
                    <td></td>
                    <th style=\"text-decoration: overline\">
                        Firma Coord. GCDO / Resp. Med. Amb. / Resp. SySO
                    </th>
                </tr>
            </table>
        </div>

    </div>
    ";
        } else {
            // line 126
            echo "        <div class=\"container\">
            <div class=\"mt-3\">
                <p>No se encontraron registros.</p>
            </div>
        </div>
    ";
        }
        // line 132
        echo "    
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 135
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 136
        echo "    <script>
        function check_data(val){
            //\$('#opyes').attr('checked', false);
            //\$('#opno').attr('checked', false);
            if(val == 'Si') \$('#opyes').attr('checked', true);
            else \$('#opno').attr('checked', true);
        }
    </script>
    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "reporting/verificacionef.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  244 => 136,  238 => 135,  230 => 132,  222 => 126,  193 => 100,  186 => 96,  175 => 88,  168 => 84,  151 => 69,  147 => 68,  138 => 61,  134 => 60,  120 => 49,  113 => 45,  106 => 41,  98 => 35,  96 => 34,  75 => 15,  69 => 14,  52 => 2,  46 => 1,  39 => 135,  36 => 134,  34 => 14,  31 => 13,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"resources/bootstrap4/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <style>
        .borderless td, .borderless th, .borderless tr {
            border: none;
        }
        #tb-ef tr, #tb-ef td, .frm-efc{
            height: 14px !important;
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
                <h6 class=\"font-weight-bold float-right\">GCDO-0802-07</h6>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h6 class=\"font-weight-bold text-center\"><u>Verificación eficacia de la Acción Correctiva</u></h6>
                <h6 class=\"font-weight-bold text-center\">Sistema Integrado de Gestión de ELFEC S.A.</h6>
            </div>
        </div>
    </div>

    {% if objects %}
    <div class=\"container\">
        <div class=\"mt-3\">
            </br>          
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <th>No. Auditoría:</th>
                    <td>{{objects[0].cb_auditoria_id}}</td>
                </tr>
                <tr>
                    <th>No. de Hallazgo:</th>
                    <td>{{objects[0].cb_hallazgo_id}}</td>
                </tr>
                <tr>
                    <th>Identificador de la Acción:</th>
                    <td>{{objects[0].cb_accion_id}}</td>
                </tr>
            </table>

            <h7><b>Resultado de la verificación de la eficacia de la Acción tomada:</b></h7>
            <table id=\"tb-ef\" class=\"table table-bordered table-sm\">
                <tr>
                    <td>
                        <label class=\"\">EFICAZ:</label>
                    </td>
                    <td>
                        {% if objects[0].cb_accion_eficacia_eficaz == 'Si' %} <i class=\"fa fa-check\"></i> {% endif %}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class=\"\">NO EFICAZ:</label>
                    </td>
                    <td>
                        {% if objects[0].cb_accion_eficacia_eficaz == 'No' %} <i class=\"fa fa-check\"></i> {% endif %}
                    </td>
                </tr>
            </table>

            <h7><b>Observaciones:</b></h7>
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <td></td>
                    <td><textarea id=\"textarea\" rows=\"2\" style=\"height: 20px; border:none\" value=\"\"></textarea></td>
                </tr>
            </table>     

            <table class=\"table borderless table-sm\">
                <tr>
                    <th>Fecha verificación: </th>
                    <td>{{ objects[0].cb_accion_eficacia_fecha|date('d-m-Y') }} </td>
                </tr>
                <tr>
                    <th>Verificado por: </th>
                    <td>{{ objects[0].cb_accion_eficacia_nombreverificador }} </td>
                </tr>
            </table>    
            
                      
            <table class=\"table table-bordered table-sm\">
                <tr>
                    <th>Responsable del proceso verificado:</th>
                    <td>{{ objects[0].cb_accion_eficacia_responsable }} </td>
                </tr>
                <tr>
                    <th>Cargo del Responsable:</th>
                    <td>{{ objects[0].cb_accion_eficacia_cargoverificador }}</td>
                </tr>
            </table>

            <table class=\"table borderless table-sm\">
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr class=\"spacer\"> <td></td></tr>
                <tr>
                    <th style=\"text-decoration: overline\">Firma Responsable del proceso verificado</th>
                    <th style=\"text-decoration: overline\">Firma Verificador</th>
                    <td></td>
                    <th style=\"text-decoration: overline\">
                        Firma Coord. GCDO / Resp. Med. Amb. / Resp. SySO
                    </th>
                </tr>
            </table>
        </div>

    </div>
    {% else %}
        <div class=\"container\">
            <div class=\"mt-3\">
                <p>No se encontraron registros.</p>
            </div>
        </div>
    {% endif %}
    
{% endblock %}

{% block javascripts %}
    <script>
        function check_data(val){
            //\$('#opyes').attr('checked', false);
            //\$('#opno').attr('checked', false);
            if(val == 'Si') \$('#opyes').attr('checked', true);
            else \$('#opno').attr('checked', true);
        }
    </script>
    <script src=\"resources/bootstrap4/js/bootstrap.min.js\"></script>
{% endblock %}", "reporting/verificacionef.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\reporting\\verificacionef.html.twig");
    }
}
