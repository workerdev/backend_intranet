<?php

/* estadonovedad/index.html.twig */
class __TwigTemplate_8d46a78b5b628d97eb96f747665fbf40f8f7759c125eec24cc047c3da345081e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "estadonovedad/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "estadonovedad/index.html.twig"));

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

<script>
    main_route = '/estadonovedad'

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

    // line 21
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 22
        echo "
";
        // line 23
        echo twig_include($this->env, $context, "estadonovedad/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>ESTADO DE LA NOVEDAD</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("estadonovedad_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
            // line 30
            echo "            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 34
        echo "        </div>
    </div>
    ";
        // line 36
        if ((twig_in_filter("home_estadonovedad", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 48
            echo twig_include($this->env, $context, "estadonovedad/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 54
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 56
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 58
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 59
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    // attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#descripcion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/estadonovedad_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/estadonovedad_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/estadonovedad_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/estadonovedad_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/estadonovedad_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el estado de novedad?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/estadonovedad_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "estadonovedad/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 59,  136 => 58,  128 => 56,  124 => 54,  115 => 48,  102 => 37,  100 => 36,  96 => 34,  90 => 30,  88 => 29,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/estadonovedad'

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

{{ include('estadonovedad/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>ESTADO DE LA NOVEDAD</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'estadonovedad_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_estadonovedad' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('estadonovedad/table.html.twig') }}
                </tbody>
            </table>
        </div>
    </div>
    {% else %}
    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    {% endif %}
</div>
{%endblock%}
{% block javascripts %}
<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    // attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#descripcion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/estadonovedad_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/estadonovedad_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/estadonovedad_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/estadonovedad_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/estadonovedad_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el estado de novedad?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/estadonovedad_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "estadonovedad/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\estadonovedad\\index.html.twig");
    }
}
