<?php

/* cobertura/index.html.twig */
class __TwigTemplate_298c6958befd407394819ea834a7ab4855907ecfae5f52a57a4941f2c03fde92 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "cobertura/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "cobertura/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>
<style>
    .swal2-title{
        font-size: 16px !important;
    }
</style>
<script>
    main_route = '/cobertura'

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
        echo twig_include($this->env, $context, "cobertura/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>COBERTURA</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 31
        if (twig_in_filter("cobertura_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 31, $this->source); })()))) {
            echo " 
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 35
        echo "  
        </div>
    </div>
    ";
        // line 38
        if ((twig_in_filter("home_cobertura", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 38, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 38, $this->source); })()))) {
            // line 39
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Tipo de cobertura </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Unidad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Año </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Mes </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Valor </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 53
            echo twig_include($this->env, $context, "cobertura/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 59
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 61
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 64
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    \$('#mes').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar mes.',
        title: 'Seleccione un mes.'
    })

    \$('#new').click(function () {
        \$('#unida').val('')
        \$('#anio').val('')
        \$('#valor').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'unidad': \$('#unidad').val(),
            'anio': \$('#anio').val(),
            'valor': \$('#valor').val(),
            
            'mes': \$('#mes').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation( \"/cobertura_insertar\" , {object: objeto}, null, main_route)
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/cobertura_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#unidad').val(self.unidad)
                \$('#anio').val(self.anio)
                \$('#valor').val(self.valor)
                
                \$('#mes').val(self.mes)
                \$('#mes').selectpicker('render')
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')
                
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
            'unidad': \$('#unidad').val(),
            'anio': \$('#anio').val(),
            'valor': \$('#valor').val(),
            
            'mes': \$('#mes').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/cobertura_actualizar\" , {object: objeto}, null, main_route)
    })
    reload_form()
</script>
<script>
    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        swal({
            title: \"¿Desea dar de baja los datos de la cobertura?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/cobertura_eliminar\", { 
                id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                null, 
                function () {
                    setTimeout(function(){ window.location=main_route }, 2000);
            })
        })
    })

</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "cobertura/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 64,  142 => 63,  134 => 61,  130 => 59,  121 => 53,  105 => 39,  103 => 38,  98 => 35,  90 => 31,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>
<style>
    .swal2-title{
        font-size: 16px !important;
    }
</style>
<script>
    main_route = '/cobertura'

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

{{ include('cobertura/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>COBERTURA</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'cobertura_insertar' in permisos %} 
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}  
        </div>
    </div>
    {% if 'home_cobertura' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Tipo de cobertura </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Unidad </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Año </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Mes </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Valor </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('cobertura/table.html.twig') }}
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
    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    \$('#mes').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar mes.',
        title: 'Seleccione un mes.'
    })

    \$('#new').click(function () {
        \$('#unida').val('')
        \$('#anio').val('')
        \$('#valor').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'unidad': \$('#unidad').val(),
            'anio': \$('#anio').val(),
            'valor': \$('#valor').val(),
            
            'mes': \$('#mes').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation( \"/cobertura_insertar\" , {object: objeto}, null, main_route)
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/cobertura_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#unidad').val(self.unidad)
                \$('#anio').val(self.anio)
                \$('#valor').val(self.valor)
                
                \$('#mes').val(self.mes)
                \$('#mes').selectpicker('render')
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')
                
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
            'unidad': \$('#unidad').val(),
            'anio': \$('#anio').val(),
            'valor': \$('#valor').val(),
            
            'mes': \$('#mes').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/cobertura_actualizar\" , {object: objeto}, null, main_route)
    })
    reload_form()
</script>
<script>
    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        swal({
            title: \"¿Desea dar de baja los datos de la cobertura?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/cobertura_eliminar\", { 
                id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                null, 
                function () {
                    setTimeout(function(){ window.location=main_route }, 2000);
            })
        })
    })

</script>
{% endblock %}", "cobertura/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec Backend\\Intranet-Backend\\templates\\cobertura\\index.html.twig");
    }
}