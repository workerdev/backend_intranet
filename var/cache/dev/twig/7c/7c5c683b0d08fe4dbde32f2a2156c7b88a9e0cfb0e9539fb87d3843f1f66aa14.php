<?php

/* gciarsector/index.html.twig */
class __TwigTemplate_cc3b4aec7100eb13d205572a8fc699736867baa1a929987bfb3c9da971b01825 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "gciarsector/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "gciarsector/index.html.twig"));

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
    main_route = '/gciarsector'

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
        echo twig_include($this->env, $context, "gciarsector/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>GERENCIA, ÁREA Y SECTOR</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        
        ";
        // line 30
        if (twig_in_filter("gciarsector_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 34
        echo "   
        </div>
    </div>
    ";
        // line 37
        if ((twig_in_filter("home_gciarsector", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                
                    <th class=\"order_by_th\" data-name=\"names\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Gerencia </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Área </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Sector </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 54
            echo twig_include($this->env, $context, "gciarsector/table.html.twig");
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
    attach_validators()

    \$('#fkgerencia').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerencia.',
        title: 'Seleccione una gerencia.'
    })

    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar area.',
        title: 'Seleccione una area.'
    })

    \$('#fksector').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar sector.',
        title: 'Seleccione un sector.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Responsable.',
        title: 'Seleccione un Responsable.'
    })

    \$('#vigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#vigente').val('')

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
            'codigo': \$('#codigo').val(),
            'vigente': \$('#vigente').val(),

            'gerencia': \$('#fkgerencia').val(),
            'area': \$('#fkarea').val(),
            'sector': \$('#fksector').val()
        })
        ajax_call_validation(\"/gciarsector_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/gciarsector_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/gciarsector_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)

                \$('#vigente').val(self.vigente)
                \$('#vigente').selectpicker('render')
                \$('#fkgerencia').val(self.fkgerencia.id)
                \$('#fkgerencia').selectpicker('render')
                \$('#fkarea').val(self.fkarea.id)
                \$('#fkarea').selectpicker('render')
                \$('#fksector').val(self.fksector.id)
                \$('#fksector').selectpicker('render')
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
          
            'codigo': \$('#codigo').val(),
            'vigente': \$('#vigente').val(),

            'gerencia': \$('#fkgerencia').val(),
            'area': \$('#fkarea').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'sector': \$('#fksector').val()
        })
        ajax_call_validation(\"/gciarsector_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/gciarsector_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja los datos de la gerencia, área y sector?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/gciarsector_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "gciarsector/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 65,  143 => 64,  135 => 62,  131 => 60,  122 => 54,  104 => 38,  102 => 37,  97 => 34,  89 => 30,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/gciarsector'

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

{{ include('gciarsector/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>GERENCIA, ÁREA Y SECTOR</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        
        {% if 'gciarsector_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}   
        </div>
    </div>
    {% if 'home_gciarsector' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                
                    <th class=\"order_by_th\" data-name=\"names\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Gerencia </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Área </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Sector </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('gciarsector/table.html.twig') }}
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
    attach_validators()

    \$('#fkgerencia').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerencia.',
        title: 'Seleccione una gerencia.'
    })

    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar area.',
        title: 'Seleccione una area.'
    })

    \$('#fksector').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar sector.',
        title: 'Seleccione un sector.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Responsable.',
        title: 'Seleccione un Responsable.'
    })

    \$('#vigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#vigente').val('')

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
            'codigo': \$('#codigo').val(),
            'vigente': \$('#vigente').val(),

            'gerencia': \$('#fkgerencia').val(),
            'area': \$('#fkarea').val(),
            'sector': \$('#fksector').val()
        })
        ajax_call_validation(\"/gciarsector_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/gciarsector_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/gciarsector_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)

                \$('#vigente').val(self.vigente)
                \$('#vigente').selectpicker('render')
                \$('#fkgerencia').val(self.fkgerencia.id)
                \$('#fkgerencia').selectpicker('render')
                \$('#fkarea').val(self.fkarea.id)
                \$('#fkarea').selectpicker('render')
                \$('#fksector').val(self.fksector.id)
                \$('#fksector').selectpicker('render')
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
          
            'codigo': \$('#codigo').val(),
            'vigente': \$('#vigente').val(),

            'gerencia': \$('#fkgerencia').val(),
            'area': \$('#fkarea').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'sector': \$('#fksector').val()
        })
        ajax_call_validation(\"/gciarsector_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/gciarsector_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja los datos de la gerencia, área y sector?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/gciarsector_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "gciarsector/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\gciarsector\\index.html.twig");
    }
}
