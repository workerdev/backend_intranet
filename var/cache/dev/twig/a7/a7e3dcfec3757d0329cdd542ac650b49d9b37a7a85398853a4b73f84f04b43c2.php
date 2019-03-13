<?php

/* accidentes/index.html.twig */
class __TwigTemplate_fa498f33568e00b6d838473b1f5f90d47170cf075122f618d7535db24125132d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "accidentes/index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accidentes/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyD-0Wt6vynQ9q_P23Hj5s0DZv5KvbVTBHc\"></script>
               

<script>
    main_route = '/accidentes'

    function default_values() {
        page_nr = 1
        max_entries = 10
        like_search = \"\"
        order_by = \"\"
        ascendant = true
    }
    default_values()
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 24
        echo "
";
        // line 25
        echo twig_include($this->env, $context, "accidentes/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>ACCIDENTES</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        ";
        // line 30
        if (twig_in_filter("accidentes_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            // line 31
            echo "        ";
            if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 31, $this->source); })())) {
                // line 32
                echo "            <div class=\"col-xs-4 col-sm-3 col-md-3 col-lg-3\">
                <label>Tipo Accidente</label>
                <select id=\"tipo\" class=\"form-control\" onchange=\"habilitar()\">
                    <option value=\"Lesión incapacitante\">
                        Lesión incapacitante
                    </option>
                    <option value=\"Lesión no incapacitante\">
                        Lesión no incapacitante
                    </option>
                    <option value=\"Daño a la propiedad\">
                        Daño a la propiedad
                    </option>
                    <option value=\"Cuasi Accidentes\">
                        Cuasi Accidentes
                    </option>
                    <option value=\"Condición y acto subestándar\">
                        Condición y acto subestándar
                    </option>
                </select>
            </div>
        ";
            }
            // line 53
            echo "        ";
        }
        // line 54
        echo "
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 56
        if (twig_in_filter("accidentes_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 56, $this->source); })()))) {
            // line 57
            echo "                ";
            if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 57, $this->source); })())) {
                // line 58
                echo "                    <button id=\"reset\" type=\"button\" class=\"btn bg-indigo waves-effect\" disabled=\"disabled\">
                        REINICIAR
                    </button>
                ";
            } else {
                // line 62
                echo "                    <button id=\"reset\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                        INICIAR
                    </button>
                ";
            }
            // line 66
            echo "            ";
        }
        // line 67
        echo "        </div>
    </div>
    ";
        // line 69
        if ((twig_in_filter("home_accidentes", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 69, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 69, $this->source); })()))) {
            // line 70
            echo "    <div class=\"row\">

        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Fecha Inicio</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Fin</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Días</th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 83
            echo twig_include($this->env, $context, "accidentes/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 89
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 90
        echo "                 
</div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 94
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 95
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
<script>
    function init(){
        var fini = \$('tr .fecini');
        var ffin = \$('tr .fecfin');
        var dias = \$('tr .dias');

        for (let i = 0; i < fini.length; i++) {
            var ONEDAY = 1000 * 60 * 60 * 24;
            var firstDate = Date.parse(fini[i].innerHTML);
            if(ffin[i].innerHTML != 'Vigente'){
                var secondDate = Date.parse(ffin[i].innerHTML);
                var diffDays = (Math.abs(firstDate - secondDate))/ONEDAY;
                var d = parseInt(diffDays);
                dias[i].innerHTML= d;

            }else {
                var secondDate = new Date();
                var diffDays = (Math.abs(firstDate - secondDate.getTime()))/ONEDAY;
                var d = parseInt(diffDays);
                dias[i].innerHTML= d;
            }
        }
    };
    function habilitar(){
        document.getElementById('reset').removeAttribute('disabled');
    }

    \$('#reset').click(function () {
        var objeto = ";
        // line 126
        echo twig_escape_filter($this->env, json_encode((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 126, $this->source); })())), "html", null, true);
        echo ";
        if( objeto == undefined || objeto == null || objeto.length <= 0 ){
            console.log('first');
            ajax_call(\"/accidentes_reset\", {tipo: ''}, null, function () {})
            setTimeout(function(){window.location=main_route}, 1000);
        }else{
            ajax_call(\"/accidentes_reset\", {tipo: \$('#tipo').val()+\"\"}, null, function () {setTimeout(function(){window.location=main_route}, 1000);})
        }
    });

    \$('.delete').click(function(){
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el tiempo sin accidente?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/accidentes_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })
</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accidentes/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 126,  194 => 95,  188 => 94,  178 => 90,  174 => 89,  165 => 83,  150 => 70,  148 => 69,  144 => 67,  141 => 66,  135 => 62,  129 => 58,  126 => 57,  124 => 56,  120 => 54,  117 => 53,  94 => 32,  91 => 31,  89 => 30,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyD-0Wt6vynQ9q_P23Hj5s0DZv5KvbVTBHc\"></script>
               

<script>
    main_route = '/accidentes'

    function default_values() {
        page_nr = 1
        max_entries = 10
        like_search = \"\"
        order_by = \"\"
        ascendant = true
    }
    default_values()
</script>
{% endblock %}
{% block body %}

{{ include('accidentes/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>ACCIDENTES</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        {% if 'accidentes_insertar' in permisos %}
        {% if objects %}
            <div class=\"col-xs-4 col-sm-3 col-md-3 col-lg-3\">
                <label>Tipo Accidente</label>
                <select id=\"tipo\" class=\"form-control\" onchange=\"habilitar()\">
                    <option value=\"Lesión incapacitante\">
                        Lesión incapacitante
                    </option>
                    <option value=\"Lesión no incapacitante\">
                        Lesión no incapacitante
                    </option>
                    <option value=\"Daño a la propiedad\">
                        Daño a la propiedad
                    </option>
                    <option value=\"Cuasi Accidentes\">
                        Cuasi Accidentes
                    </option>
                    <option value=\"Condición y acto subestándar\">
                        Condición y acto subestándar
                    </option>
                </select>
            </div>
        {% endif %}
        {% endif %}

        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'accidentes_insertar' in permisos %}
                {% if objects %}
                    <button id=\"reset\" type=\"button\" class=\"btn bg-indigo waves-effect\" disabled=\"disabled\">
                        REINICIAR
                    </button>
                {% else %}
                    <button id=\"reset\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                        INICIAR
                    </button>
                {% endif %}
            {% endif %}
        </div>
    </div>
    {% if 'home_accidentes' in permisos and objects %}
    <div class=\"row\">

        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Fecha Inicio</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Fin</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo</th>
                    <th class=\"order_by_th\" data-name=\"phone\">Días</th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('accidentes/table.html.twig') }}
                </tbody>
            </table>
        </div>
    </div>
    {% else %}
    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    {% endif %}                 
</div>
</div>
{%endblock%}
{% block javascripts %}
<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
<script>
    function init(){
        var fini = \$('tr .fecini');
        var ffin = \$('tr .fecfin');
        var dias = \$('tr .dias');

        for (let i = 0; i < fini.length; i++) {
            var ONEDAY = 1000 * 60 * 60 * 24;
            var firstDate = Date.parse(fini[i].innerHTML);
            if(ffin[i].innerHTML != 'Vigente'){
                var secondDate = Date.parse(ffin[i].innerHTML);
                var diffDays = (Math.abs(firstDate - secondDate))/ONEDAY;
                var d = parseInt(diffDays);
                dias[i].innerHTML= d;

            }else {
                var secondDate = new Date();
                var diffDays = (Math.abs(firstDate - secondDate.getTime()))/ONEDAY;
                var d = parseInt(diffDays);
                dias[i].innerHTML= d;
            }
        }
    };
    function habilitar(){
        document.getElementById('reset').removeAttribute('disabled');
    }

    \$('#reset').click(function () {
        var objeto = {{ objects|json_encode }};
        if( objeto == undefined || objeto == null || objeto.length <= 0 ){
            console.log('first');
            ajax_call(\"/accidentes_reset\", {tipo: ''}, null, function () {})
            setTimeout(function(){window.location=main_route}, 1000);
        }else{
            ajax_call(\"/accidentes_reset\", {tipo: \$('#tipo').val()+\"\"}, null, function () {setTimeout(function(){window.location=main_route}, 1000);})
        }
    });

    \$('.delete').click(function(){
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el tiempo sin accidente?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/accidentes_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })
</script>

{% endblock %}", "accidentes/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\accidentes\\index.html.twig");
    }
}
