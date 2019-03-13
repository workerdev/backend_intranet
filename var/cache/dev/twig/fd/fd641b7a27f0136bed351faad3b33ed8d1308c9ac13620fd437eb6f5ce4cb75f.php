<?php

/* registromejora/index.html.twig */
class __TwigTemplate_632a6aba24ae1415ec7932bf1ce0990333229e7e02f0a1480985d3de0484d46b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "registromejora/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "registromejora/index.html.twig"));

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
    main_route = '/registromejora'

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
        echo twig_include($this->env, $context, "registromejora/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>Registro Mejora</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("registromejora_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
            // line 30
            echo "            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 34
        echo "        </div>
    </div>
    ";
        // line 36
        if ((twig_in_filter("home_registromejora", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Novedad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Analisis </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable de Implementacion </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo Novedad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Norma </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 54
            echo twig_include($this->env, $context, "registromejora/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 60
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 62
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 65
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    \$('#ficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    }) 
     \$('#tiponovedad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de tiponovedad.',
        title: 'Seleccione un tipo de tiponovedad.'
    })  
    \$('#norma').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de norma.',
        title: 'Seleccione un tipo de norma.'
    })  
    \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })

    attach_validators()
    \$('#new').click(function () {
        \$('#responsable').val('')
        \$('#novedad').val('')
        \$('#analisis').val('')
        \$('#responsableimplementacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        /*if(!validate_fields(['nombre', 'descripcion'])){
            return
        }*/
        objeto = JSON.stringify({
            'responsablenovedad': \$('#responsable').val(),
            'novedad': \$('#novedad').val(),
            'analisis': \$('#analisis').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),

            'ficha': \$('#ficha').val(),
            'tiponovedad': \$('#tiponovedad').val(),
            'norma': \$('#norma').val(),
            'estado': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/registromejora_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/registromejora_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#responsable').val(self.responsablenovedad)
                \$('#novedad').val(self.novedad)
                \$('#analisis').val(self.analisis)
                \$('#responsableimplementacion').val(self.responsableimplementacion)

                \$('#ficha').val(self.fkficha.id)
                \$('#ficha').selectpicker('render')
                
                \$('#tiponovedad').val(self.fktiponovedad.id)
                \$('#tiponovedad').selectpicker('render')
                
                \$('#norma').val(self.fknorma.id)
                \$('#norma').selectpicker('render')
                
                \$('#estado').val(self.fkestado.id)
                \$('#estado').selectpicker('render')

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
            'responsablenovedad': \$('#responsable').val(),
            'novedad': \$('#novedad').val(),
            'analisis': \$('#analisis').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'ficha': \$('#ficha').val(),
            'tiponovedad': \$('#tiponovedad').val(),
            'norma': \$('#norma').val(),
            'estado': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/registromejora_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el registro de mejora?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/registromejora_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "registromejora/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 65,  142 => 64,  134 => 62,  130 => 60,  121 => 54,  102 => 37,  100 => 36,  96 => 34,  90 => 30,  88 => 29,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/registromejora'

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

{{ include('registromejora/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>Registro Mejora</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'registromejora_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_registromejora' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Novedad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Analisis </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable de Implementacion </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo Novedad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Norma </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('registromejora/table.html.twig') }}
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
    \$('#ficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    }) 
     \$('#tiponovedad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de tiponovedad.',
        title: 'Seleccione un tipo de tiponovedad.'
    })  
    \$('#norma').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de norma.',
        title: 'Seleccione un tipo de norma.'
    })  
    \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })

    attach_validators()
    \$('#new').click(function () {
        \$('#responsable').val('')
        \$('#novedad').val('')
        \$('#analisis').val('')
        \$('#responsableimplementacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        /*if(!validate_fields(['nombre', 'descripcion'])){
            return
        }*/
        objeto = JSON.stringify({
            'responsablenovedad': \$('#responsable').val(),
            'novedad': \$('#novedad').val(),
            'analisis': \$('#analisis').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),

            'ficha': \$('#ficha').val(),
            'tiponovedad': \$('#tiponovedad').val(),
            'norma': \$('#norma').val(),
            'estado': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/registromejora_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/registromejora_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#responsable').val(self.responsablenovedad)
                \$('#novedad').val(self.novedad)
                \$('#analisis').val(self.analisis)
                \$('#responsableimplementacion').val(self.responsableimplementacion)

                \$('#ficha').val(self.fkficha.id)
                \$('#ficha').selectpicker('render')
                
                \$('#tiponovedad').val(self.fktiponovedad.id)
                \$('#tiponovedad').selectpicker('render')
                
                \$('#norma').val(self.fknorma.id)
                \$('#norma').selectpicker('render')
                
                \$('#estado').val(self.fkestado.id)
                \$('#estado').selectpicker('render')

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
            'responsablenovedad': \$('#responsable').val(),
            'novedad': \$('#novedad').val(),
            'analisis': \$('#analisis').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'ficha': \$('#ficha').val(),
            'tiponovedad': \$('#tiponovedad').val(),
            'norma': \$('#norma').val(),
            'estado': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/registromejora_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el registro de mejora?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/registromejora_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "registromejora/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\registromejora\\index.html.twig");
    }
}
