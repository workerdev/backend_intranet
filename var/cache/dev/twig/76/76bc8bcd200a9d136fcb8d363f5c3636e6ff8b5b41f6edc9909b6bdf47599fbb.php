<?php

/* seguimientocro/index.html.twig */
class __TwigTemplate_8a71a2fb27c710973444360eeac8cc6811a8f697f118c0812312b51f983a9aa4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "seguimientocro/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientocro/index.html.twig"));

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
    main_route = '/seguimientocro'

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
        echo twig_include($this->env, $context, "seguimientocro/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>SEGUIMIENTO DE RIESGO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("seguimientocro_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
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
        if ((twig_in_filter("home_seguimientocro", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Riesgos y oportunidades </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha de seguimiento </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Observaciones </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado de Seguimiento </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 51
            echo twig_include($this->env, $context, "seguimientocro/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 57
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 59
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 61
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 62
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>


    \$('#fkriesgos').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar riesgo.',
        title: 'Seleccione un riesgo.'
    })

    \$('#estadoseg').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar Responsable.',
        title: 'Seleccione un Responsable.'
    })

    \$('#new').click(function () {
       
        \$('#observaciones').val('')
        \$('#estadoseg').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
      
        objeto = JSON.stringify({
            'fkresponsable': \$('#fkresponsable').val(),
            'observaciones': \$('#observaciones').val(),
            'fechaseg': \$('#fechaseg').val(),
            'riesgos': \$('#fkriesgos').val(),
            'estadoseg': \$('#estadoseg').val()

        })

        ajax_call_validation(\"/seguimientocro_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/seguimientocro_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/seguimientocro_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fechaseg').val(self.fechaseg)
                \$('#estadoseg').val(self.estadoseg)
                \$('#observaciones').val(self.observaciones)
                \$('#estadoseg').val(self.estadoseg)
                \$('#estadoseg').selectpicker('render')
                \$('#fkriesgos').val(self.fkriesgos.id)
                \$('#fkriesgos').selectpicker('render')
                 \$('#fkresponsable').val(self.fkresponsable.id)
                \$('#fkresponsable').selectpicker('render')

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
            'fkresponsable': \$('#fkresponsable').val(),
            'observaciones': \$('#observaciones').val(),
            'fechaseg': \$('#fechaseg').val(),
            'estadoseg': \$('#estadoseg').val(),

            'riesgos': \$('#fkriesgos').val()
        })

        ajax_call_validation(\"/seguimientocro_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/seguimientocro_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el seguimiento de riesgo?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/seguimientocro_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "seguimientocro/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 62,  139 => 61,  131 => 59,  127 => 57,  118 => 51,  102 => 37,  100 => 36,  96 => 34,  90 => 30,  88 => 29,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/seguimientocro'

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

{{ include('seguimientocro/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>SEGUIMIENTO DE RIESGO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'seguimientocro_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_seguimientocro' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Riesgos y oportunidades </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha de seguimiento </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Observaciones </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado de Seguimiento </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('seguimientocro/table.html.twig') }}
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


    \$('#fkriesgos').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar riesgo.',
        title: 'Seleccione un riesgo.'
    })

    \$('#estadoseg').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar Responsable.',
        title: 'Seleccione un Responsable.'
    })

    \$('#new').click(function () {
       
        \$('#observaciones').val('')
        \$('#estadoseg').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
      
        objeto = JSON.stringify({
            'fkresponsable': \$('#fkresponsable').val(),
            'observaciones': \$('#observaciones').val(),
            'fechaseg': \$('#fechaseg').val(),
            'riesgos': \$('#fkriesgos').val(),
            'estadoseg': \$('#estadoseg').val()

        })

        ajax_call_validation(\"/seguimientocro_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/seguimientocro_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/seguimientocro_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fechaseg').val(self.fechaseg)
                \$('#estadoseg').val(self.estadoseg)
                \$('#observaciones').val(self.observaciones)
                \$('#estadoseg').val(self.estadoseg)
                \$('#estadoseg').selectpicker('render')
                \$('#fkriesgos').val(self.fkriesgos.id)
                \$('#fkriesgos').selectpicker('render')
                 \$('#fkresponsable').val(self.fkresponsable.id)
                \$('#fkresponsable').selectpicker('render')

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
            'fkresponsable': \$('#fkresponsable').val(),
            'observaciones': \$('#observaciones').val(),
            'fechaseg': \$('#fechaseg').val(),
            'estadoseg': \$('#estadoseg').val(),

            'riesgos': \$('#fkriesgos').val()
        })

        ajax_call_validation(\"/seguimientocro_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/seguimientocro_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el seguimiento de riesgo?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/seguimientocro_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "seguimientocro/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\seguimientocro\\index.html.twig");
    }
}
