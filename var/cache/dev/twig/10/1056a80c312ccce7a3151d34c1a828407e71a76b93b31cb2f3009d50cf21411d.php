<?php

/* riesgosoportunidades/index.html.twig */
class __TwigTemplate_7340d702aba8710788b41c6913cd9ff1af63b1407e3a1d34ddbeb5a8d78be43f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "riesgosoportunidades/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "riesgosoportunidades/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <style>
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/riesgosoportunidades'

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

    // line 22
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 23
        echo "
    ";
        // line 24
        echo twig_include($this->env, $context, "riesgosoportunidades/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>RIEGOSOPORTUNIDADES</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
        </div>
        ";
        // line 35
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 35, $this->source); })())) {
            // line 36
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripcion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Consecuencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Accion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">fichaprocesos </th>
                            <th class=\"order_by_th\" data-name=\"phone\">gruporiesgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">impacto </th>
                            <th class=\"order_by_th\" data-name=\"phone\">estadoriesgo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 55
            echo twig_include($this->env, $context, "riesgosoportunidades/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 61
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 63
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 65
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 66
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#fichaprocesos').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de fichaprocesos.',
        title: 'Seleccione un tipo de fichaprocesos.'
    })
      \$('#gruporiesgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de gruporiesgo.',
        title: 'Seleccione un tipo de gruporiesgo.'
    })
      \$('#probabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de probabilidad.',
        title: 'Seleccione un tipo de probabilidad.'
    })
      \$('#impacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de impacto.',
        title: 'Seleccione un tipo de gerencia.'
    })
      \$('#estadoriesgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estadoriesgo.',
        title: 'Seleccione un tipo de estadoriesgo.'
    })
    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#tipo').val('')
        \$('#descripcion').val('')
        \$('#consecuencia').val('')
        \$('#accion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        if(!validate_fields(['codigo', 'tipo', 'descripcion', 'consecuencia', 'accion'])){
            return
        }
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'tipo': \$('#tipo').val(),
            'descripcion': \$('#descripcion').val(),            
            'consecuencia': \$('#consecuencia').val(),
            'accion': \$('#accion').val(),


            'fichaprocesos': \$('#fichaprocesos').val(),
            'gruporiesgo': \$('#gruporiesgo').val(),
            'probabilidad': \$('#probabilidad').val(),
            'impacto': \$('#impacto').val(),
            'estadoriesgo': \$('#estadoriesgo').val()
        })
        ajax_call(\"/riesgosoportunidades_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/riesgosoportunidades_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                \$('#tipo').val(self.tipo)
                \$('#descripcion').val(self.descripcion)
                \$('#consecuencia').val(self.consecuencia)
                \$('#accion').val(self.accion)

                \$('#fichaprocesos').val(self.fkficha.id)
                \$('#fichaprocesos').selectpicker('render')
                
                \$('#gruporiesgo').val(self.fkgruporiesgo.id)
                \$('#gruporiesgo').selectpicker('render')
                
                \$('#probabilidad').val(self.fkprobabilidad.id)
                \$('#probabilidad').selectpicker('render')
                
                \$('#impacto').val(self.fkimpacto.id)
                \$('#impacto').selectpicker('render')
                
                \$('#estadoriesgo').val(self.fkestado.id)
                \$('#estadoriesgo').selectpicker('render')

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
            'tipo': \$('#tipo').val(),
            'descripcion': \$('#descripcion').val(),            
            'consecuencia': \$('#consecuencia').val(),
            'accion': \$('#accion').val(),


            'fichaprocesos': \$('#fichaprocesos').val(),
            'gruporiesgo': \$('#gruporiesgo').val(),
            'probabilidad': \$('#probabilidad').val(),
            'impacto': \$('#impacto').val(),
            'estadoriesgo': \$('#estadoriesgo').val()
        })
        ajax_call(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el riesgosoportunidades?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/riesgosoportunidades_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })


    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "riesgosoportunidades/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 66,  138 => 65,  130 => 63,  126 => 61,  117 => 55,  96 => 36,  94 => 35,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <style>
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/riesgosoportunidades'

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

    {{ include('riesgosoportunidades/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>RIEGOSOPORTUNIDADES</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
        </div>
        {% if objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripcion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Consecuencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Accion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">fichaprocesos </th>
                            <th class=\"order_by_th\" data-name=\"phone\">gruporiesgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">impacto </th>
                            <th class=\"order_by_th\" data-name=\"phone\">estadoriesgo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('riesgosoportunidades/table.html.twig') }}
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

    \$('#fichaprocesos').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de fichaprocesos.',
        title: 'Seleccione un tipo de fichaprocesos.'
    })
      \$('#gruporiesgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de gruporiesgo.',
        title: 'Seleccione un tipo de gruporiesgo.'
    })
      \$('#probabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de probabilidad.',
        title: 'Seleccione un tipo de probabilidad.'
    })
      \$('#impacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de impacto.',
        title: 'Seleccione un tipo de gerencia.'
    })
      \$('#estadoriesgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estadoriesgo.',
        title: 'Seleccione un tipo de estadoriesgo.'
    })
    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#tipo').val('')
        \$('#descripcion').val('')
        \$('#consecuencia').val('')
        \$('#accion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        if(!validate_fields(['codigo', 'tipo', 'descripcion', 'consecuencia', 'accion'])){
            return
        }
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'tipo': \$('#tipo').val(),
            'descripcion': \$('#descripcion').val(),            
            'consecuencia': \$('#consecuencia').val(),
            'accion': \$('#accion').val(),


            'fichaprocesos': \$('#fichaprocesos').val(),
            'gruporiesgo': \$('#gruporiesgo').val(),
            'probabilidad': \$('#probabilidad').val(),
            'impacto': \$('#impacto').val(),
            'estadoriesgo': \$('#estadoriesgo').val()
        })
        ajax_call(\"/riesgosoportunidades_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/riesgosoportunidades_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                \$('#tipo').val(self.tipo)
                \$('#descripcion').val(self.descripcion)
                \$('#consecuencia').val(self.consecuencia)
                \$('#accion').val(self.accion)

                \$('#fichaprocesos').val(self.fkficha.id)
                \$('#fichaprocesos').selectpicker('render')
                
                \$('#gruporiesgo').val(self.fkgruporiesgo.id)
                \$('#gruporiesgo').selectpicker('render')
                
                \$('#probabilidad').val(self.fkprobabilidad.id)
                \$('#probabilidad').selectpicker('render')
                
                \$('#impacto').val(self.fkimpacto.id)
                \$('#impacto').selectpicker('render')
                
                \$('#estadoriesgo').val(self.fkestado.id)
                \$('#estadoriesgo').selectpicker('render')

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
            'tipo': \$('#tipo').val(),
            'descripcion': \$('#descripcion').val(),            
            'consecuencia': \$('#consecuencia').val(),
            'accion': \$('#accion').val(),


            'fichaprocesos': \$('#fichaprocesos').val(),
            'gruporiesgo': \$('#gruporiesgo').val(),
            'probabilidad': \$('#probabilidad').val(),
            'impacto': \$('#impacto').val(),
            'estadoriesgo': \$('#estadoriesgo').val()
        })
        ajax_call(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el riesgosoportunidades?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/riesgosoportunidades_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })


    </script>

{% endblock %}", "riesgosoportunidades/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\riesgosoportunidades\\index.html.twig");
    }
}
