<?php

/* personalcargo/index.html.twig */
class __TwigTemplate_ffe4d4353814ffc28bd66ebffd083cb1027c6e48b1f3e8d17868ff69c853264f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "personalcargo/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "personalcargo/index.html.twig"));

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
        main_route = '/personalcargo'

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
        echo twig_include($this->env, $context, "personalcargo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>CARGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 35
        if (twig_in_filter("personalcargo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 35, $this->source); })()))) {
            // line 36
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 40
        echo "            </div>
        </div>
        ";
        // line 42
        if ((twig_in_filter("home_personalcargo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 42, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 42, $this->source); })()))) {
            // line 43
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Superior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Cargo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 56
            echo twig_include($this->env, $context, "personalcargo/table.html.twig");
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
        \$(document).ready(function() {
            \$('select').material_select();
        });

        attach_validators()

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de procesos cargo.',
        title: 'Seleccione un tipo de procesos cargo.'
    })

    \$('#fksuperior').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar superior.',
        title: 'Seleccione un superior.'
    })
    
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
            'descripcion': \$('#descripcion').val(),
            'superior': \$('#fksuperior').val(),
            'tipocargo': \$('#fktipo').val()
        })
      ajax_call_validation(\"/personalcargo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personalcargo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/personalcargo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

                if(self.fksuperior !== null){
                    \$('#fksuperior').val(self.fksuperior.id)
                    \$('#fksuperior').selectpicker('render')
                    \$('#cont-sup').show()
                }else{
                    \$('#fksuperior').val(self.fksuperior)
                    \$('#cont-sup').hide()
                }
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
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'superior': \$('#fksuperior').val(),
            'tipocargo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/personalcargo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personalcargo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function cargo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/cargo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            cargo_prev(id)

            setTimeout(function(){
                let quest = message
                enabled = false

                if((quest.split(\" \").length) > 8){
                    swal({
                        title: quest,
                        type: \"warning\",
                        showConfirmButton: false,
                        showCancelButton: true,
                        confirmButtonColor: \"#004c99\",
                        cancelButtonColor: \"#F44336\",
                        confirmButtonText: \"Aceptar\",
                        cancelButtonText: \"Cancelar\"
                    }).then(function () {

                    })

                }else{
                    swal({
                        title: quest,
                        type: \"warning\",
                        showCancelButton: true,
                        confirmButtonColor: \"#004c99\",
                        cancelButtonColor: \"#F44336\",
                        confirmButtonText: \"Aceptar\",
                        cancelButtonText: \"Cancelar\"
                    }).then(function () {
                        ajax_call(\"/personalcargo_eliminar\", { 
                            id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                            null, 
                            function () {
                                setTimeout(function(){ window.location=main_route }, 2000);
                        })
                    })
                }

                }, 1500
            )
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "personalcargo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 67,  144 => 66,  136 => 64,  132 => 62,  123 => 56,  108 => 43,  106 => 42,  102 => 40,  96 => 36,  94 => 35,  85 => 29,  82 => 28,  76 => 27,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/personalcargo'

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

    {{ include('personalcargo/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>CARGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'personalcargo_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_personalcargo' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Superior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Cargo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('personalcargo/table.html.twig') }}
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
        \$(document).ready(function() {
            \$('select').material_select();
        });

        attach_validators()

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de procesos cargo.',
        title: 'Seleccione un tipo de procesos cargo.'
    })

    \$('#fksuperior').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar superior.',
        title: 'Seleccione un superior.'
    })
    
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
            'descripcion': \$('#descripcion').val(),
            'superior': \$('#fksuperior').val(),
            'tipocargo': \$('#fktipo').val()
        })
      ajax_call_validation(\"/personalcargo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personalcargo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/personalcargo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

                if(self.fksuperior !== null){
                    \$('#fksuperior').val(self.fksuperior.id)
                    \$('#fksuperior').selectpicker('render')
                    \$('#cont-sup').show()
                }else{
                    \$('#fksuperior').val(self.fksuperior)
                    \$('#cont-sup').hide()
                }
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
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'superior': \$('#fksuperior').val(),
            'tipocargo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/personalcargo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personalcargo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function cargo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/cargo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            cargo_prev(id)

            setTimeout(function(){
                let quest = message
                enabled = false

                if((quest.split(\" \").length) > 8){
                    swal({
                        title: quest,
                        type: \"warning\",
                        showConfirmButton: false,
                        showCancelButton: true,
                        confirmButtonColor: \"#004c99\",
                        cancelButtonColor: \"#F44336\",
                        confirmButtonText: \"Aceptar\",
                        cancelButtonText: \"Cancelar\"
                    }).then(function () {

                    })

                }else{
                    swal({
                        title: quest,
                        type: \"warning\",
                        showCancelButton: true,
                        confirmButtonColor: \"#004c99\",
                        cancelButtonColor: \"#F44336\",
                        confirmButtonText: \"Aceptar\",
                        cancelButtonText: \"Cancelar\"
                    }).then(function () {
                        ajax_call(\"/personalcargo_eliminar\", { 
                            id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                            null, 
                            function () {
                                setTimeout(function(){ window.location=main_route }, 2000);
                        })
                    })
                }

                }, 1500
            )
        })
    </script>

{% endblock %}", "personalcargo/index.html.twig", "H:\\Elfec\\back_end\\1st_version\\elfec_intranet_backend\\templates\\personalcargo\\index.html.twig");
    }
}
