<?php

/* seguimientoindicador/index.html.twig */
class __TwigTemplate_d99d3d6b12ce0a94fd5c25248d001bf7f917d34f97dbd1cbf070cc92ab7cf175 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "seguimientoindicador/index.html.twig", 1);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientoindicador/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientoindicador/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <style>
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/seguimientoindicador'

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

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 23
        echo "
    ";
        // line 24
        echo twig_include($this->env, $context, "seguimientoindicador/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>Seguimiento Indicador</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("seguimientoindicador_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            // line 31
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 35
        echo "            </div>
        </div>
        ";
        // line 37
        if ((twig_in_filter("home_seguimientoindicador", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Año </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Mes </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Valor </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Observacion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Indicador </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 52
            echo twig_include($this->env, $context, "seguimientoindicador/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 58
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 60
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 62
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 63
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#indicador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de indicador.',
        title: 'Seleccione un tipo de indicador.'
    })
    
    \$('#new').click(function () {
        \$('#ano').val('')
        \$('#mes').val('')
        \$('#valor').val('')
        \$('#observacion').val('')
        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        if(!validate_fields(['ano', 'mes', 'valor', 'observacion'])){
            return
        }
        objeto = JSON.stringify({
            'ano': \$('#ano').val(),
            'mes': \$('#mes').val(),
            'valor': \$('#valor').val(),
            'observacion': \$('#observacion').val(),
            'indicador': \$('#indicador').val()
        })
        ajax_call(\"/seguimientoindicador_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/seguimientoindicador_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#ano').val(self.ano)
                \$('#mes').val(self.mes)
                \$('#valor').val(self.valor)
                \$('#observacion').val(self.observacion)

                \$('#indicador').val(self.fkindicador.id)
                \$('#indicador').selectpicker('render')

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
            'ano': \$('#ano').val(),
            'mes': \$('#mes').val(),
            'valor': \$('#valor').val(),
            'observacion': \$('#observacion').val(),
            'indicador': \$('#indicador').val()
        })
        ajax_call(\"/seguimientoindicador_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el seguimientoindicador?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/seguimientoindicador_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "seguimientoindicador/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 63,  158 => 62,  147 => 60,  143 => 58,  134 => 52,  118 => 38,  116 => 37,  112 => 35,  106 => 31,  104 => 30,  95 => 24,  92 => 23,  83 => 22,  55 => 3,  46 => 2,  15 => 1,);
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
        main_route = '/seguimientoindicador'

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

    {{ include('seguimientoindicador/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>Seguimiento Indicador</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'seguimientoindicador_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_seguimientoindicador' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Año </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Mes </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Valor </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Observacion </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Indicador </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('seguimientoindicador/table.html.twig') }}
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

    \$('#indicador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de indicador.',
        title: 'Seleccione un tipo de indicador.'
    })
    
    \$('#new').click(function () {
        \$('#ano').val('')
        \$('#mes').val('')
        \$('#valor').val('')
        \$('#observacion').val('')
        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        if(!validate_fields(['ano', 'mes', 'valor', 'observacion'])){
            return
        }
        objeto = JSON.stringify({
            'ano': \$('#ano').val(),
            'mes': \$('#mes').val(),
            'valor': \$('#valor').val(),
            'observacion': \$('#observacion').val(),
            'indicador': \$('#indicador').val()
        })
        ajax_call(\"/seguimientoindicador_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/seguimientoindicador_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#ano').val(self.ano)
                \$('#mes').val(self.mes)
                \$('#valor').val(self.valor)
                \$('#observacion').val(self.observacion)

                \$('#indicador').val(self.fkindicador.id)
                \$('#indicador').selectpicker('render')

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
            'ano': \$('#ano').val(),
            'mes': \$('#mes').val(),
            'valor': \$('#valor').val(),
            'observacion': \$('#observacion').val(),
            'indicador': \$('#indicador').val()
        })
        ajax_call(\"/seguimientoindicador_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el seguimientoindicador?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/seguimientoindicador_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "seguimientoindicador/index.html.twig", "C:\\symfony\\elfec_intranet_backend\\templates\\seguimientoindicador\\index.html.twig");
    }
}