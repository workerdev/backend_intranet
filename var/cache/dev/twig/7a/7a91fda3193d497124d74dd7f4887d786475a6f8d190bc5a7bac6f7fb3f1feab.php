<?php

/* controlcorrelativo/index.html.twig */
class __TwigTemplate_db15a62354ab5d7e044b56bf46fbe83f2dc3cc151db28e7d85e48356f8f8988b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "controlcorrelativo/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlcorrelativo/index.html.twig"));

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
        .accion{ 
            cursor:pointer 
        }
        .swal2-title{
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/controlcorrelativo'

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

    // line 27
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 28
        echo "
    ";
        // line 29
        echo twig_include($this->env, $context, "controlcorrelativo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>CENTRO DE CONTROL CORRELATIVO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 35
        if (twig_in_filter("controlcorrelativo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 35, $this->source); })()))) {
            echo "    
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 39
        echo "   
            </div>
        </div>
        ";
        // line 42
        if ((twig_in_filter("home_controlcorrelativo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 42, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 42, $this->source); })()))) {
            // line 43
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 56
            echo twig_include($this->env, $context, "controlcorrelativo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 62
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 64
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 67
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    // attach_validators()

    \$('#fkgerencia').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerencia.',
        title: 'Seleccione una gerencia.'
    })
    
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#codigo').val('')
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
            'codigo': \$('#codigo').val(),
            'descripcion': \$('#descripcion').val(),

            'gerencia': \$('#fkgerencia').val()
        })
        ajax_call_validation(\"/controlcorrelativo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/controlcorrelativo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/controlcorrelativo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#codigo').val(self.codigo)
                \$('#descripcion').val(self.descripcion)

                \$('#fkgerencia').val(self.fkgerencia.id)
                \$('#fkgerencia').selectpicker('render')

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
            'codigo': \$('#codigo').val(),
            'descripcion': \$('#descripcion').val(),

            'gerencia': \$('#fkgerencia').val()
        })
        ajax_call_validation(\"/controlcorrelativo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/controlcorrelativo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function ctrlcorrelativo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/ctrlcorrelativo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            ctrlcorrelativo_prev(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja los datos del control correlativo?\" 
                enabled = false
                swal({
                    title: quest,
                    type: \"warning\",
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    ajax_call(\"/controlcorrelativo_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1000
            )
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "controlcorrelativo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 67,  145 => 66,  137 => 64,  133 => 62,  124 => 56,  109 => 43,  107 => 42,  102 => 39,  94 => 35,  85 => 29,  82 => 28,  76 => 27,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <style>
        .accion{ 
            cursor:pointer 
        }
        .swal2-title{
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/controlcorrelativo'

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

    {{ include('controlcorrelativo/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>CENTRO DE CONTROL CORRELATIVO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'controlcorrelativo_insertar' in permisos %}    
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}   
            </div>
        </div>
        {% if 'home_controlcorrelativo' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('controlcorrelativo/table.html.twig') }}
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

    \$('#fkgerencia').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerencia.',
        title: 'Seleccione una gerencia.'
    })
    
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#codigo').val('')
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
            'codigo': \$('#codigo').val(),
            'descripcion': \$('#descripcion').val(),

            'gerencia': \$('#fkgerencia').val()
        })
        ajax_call_validation(\"/controlcorrelativo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/controlcorrelativo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/controlcorrelativo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#codigo').val(self.codigo)
                \$('#descripcion').val(self.descripcion)

                \$('#fkgerencia').val(self.fkgerencia.id)
                \$('#fkgerencia').selectpicker('render')

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
            'codigo': \$('#codigo').val(),
            'descripcion': \$('#descripcion').val(),

            'gerencia': \$('#fkgerencia').val()
        })
        ajax_call_validation(\"/controlcorrelativo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/controlcorrelativo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function ctrlcorrelativo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/ctrlcorrelativo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            ctrlcorrelativo_prev(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja los datos del control correlativo?\" 
                enabled = false
                swal({
                    title: quest,
                    type: \"warning\",
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    ajax_call(\"/controlcorrelativo_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1000
            )
        })
    </script>

{% endblock %}", "controlcorrelativo/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\controlcorrelativo\\index.html.twig");
    }
}
