<?php

/* fichacargo/index.html.twig */
class __TwigTemplate_46e9021d3287a934aaead0900ca301fddba5da9f043dfcc3ea7275b39ae77573 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "fichacargo/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "fichacargo/index.html.twig"));

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
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/fichacargo'

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

    // line 28
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "fichacargo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>FICHA DE CARGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("fichacargo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 41
        echo "            </div>
        </div>
        ";
        // line 43
        if ((twig_in_filter("home_fichacargo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"names\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Área, Gerencia y Sector </th>
                            <th class=\"d-none\" data-name=\"phone\">Objetivo </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsabilidades </th>
                            <th class=\"d-none\" data-name=\"phone\">Experiencia </th>
                            <th class=\"d-none\" data-name=\"phone\">Conocimientos </th>
                            <th class=\"d-none\" data-name=\"phone\">Formación </th>
                            <th class=\"d-none\" data-name=\"phone\">Características </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de aprobación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Jefe Aprobador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma del Jefe </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerente Aprobador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma de Gerente </th>
                            <th class=\"d-none\" data-name=\"phone\">Hipervínculo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 69
            echo twig_include($this->env, $context, "fichacargo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 75
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 77
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 79
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 80
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    // attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#responsabilidades').val('')
        \$('#experiencia').val('')
        \$('#conocimientos').val('')
        \$('#formacion').val('')
        \$('#caracteristicas').val('')
        \$('#aprobadojefe').val('')
        \$('#firmajefe').val('')
        \$('#aprobadogerente').val('')
        \$('#firmagerente').val('')
        \$('#hipervinculo').val('')

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
            'area': \$('#fkarea').val(),
            'objetivo': \$('#objetivo').val(),
            'responsabilidades': \$('#responsabilidades').val(),
            'experiencia': \$('#experiencia').val(),
            'conocimientos': \$('#conocimientos').val(),
            'formacion': \$('#formacion').val(),
            'caracteristicas': \$('#caracteristicas').val(),
            'fechaaprobacion': \$('#fechaaprobacion').val(),
            'aprobadojefe': \$('#aprobadojefe').val(),
            'firmajefe': \$('#firmajefe').val(),
            'aprobadogerente': \$('#aprobadogerente').val(),
            'firmagerente': \$('#firmagerente').val(),
            'hipervinculo': \$('#hipervinculo').val()
        })
        ajax_call_validation(\"/fichacargo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/fichacargo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/fichacargo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#fkarea').val(self.fkarea.id)
                \$('#objetivo').val(self.objetivo)
                \$('#responsabilidades').val(self.responsabilidades)
                \$('#experiencia').val(self.experiencia)
                \$('#conocimientos').val(self.conocimientos)
                \$('#formacion').val(self.formacion)
                \$('#caracteristicas').val(self.caracteristicas)
                \$('#fechaaprobacion').val(self.fechaaprobacion)
                \$('#aprobadojefe').val(self.aprobadojefe)
                \$('#firmajefe').val(self.firmajefe)
                \$('#aprobadogerente').val(self.aprobadogerente)
                \$('#firmagerente').val(self.firmagerente)
                \$('#hipervinculo').val(self.hipervinculo)

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
            'fkarea': \$('#fkarea').val(),
            'objetivo': \$('#objetivo').val(),
            'responsabilidades': \$('#responsabilidades').val(),
            'experiencia': \$('#experiencia').val(),
            'conocimientos': \$('#conocimientos').val(),
            'formacion': \$('#formacion').val(),
            'caracteristicas': \$('#caracteristicas').val(),
            'fechaaprobacion': \$('#fechaaprobacion').val(),
            'aprobadojefe': \$('#aprobadojefe').val(),
            'firmajefe': \$('#firmajefe').val(),
            'aprobadogerente': \$('#aprobadogerente').val(),
            'firmagerente': \$('#firmagerente').val(),
            'hipervinculo': \$('#hipervinculo').val()
        })
        ajax_call_validation(\"/fichacargo_actualizar\", {object: objeto}, null,  main_route)
        // ajax_call(\"/fichacargo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function ficha_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/ficha_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            ficha_prev(id)

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
                        ajax_call(\"/fichacargo_eliminar\", { 
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
    <script>
        function format (d) {
            return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Objetivo:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Responsabilidades:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Experiencia:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Conocimientos:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Formación:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Características:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de aprobación:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Hipervínculo:</td>'+
                    '<td>'+d[15]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'fc'+row.data()[1];
                if ( row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                    \$(\"#\"+idet).attr('class', 'fa fa-plus-square cl-teal');
                    \$(\"#\"+idet).attr('title', 'Mostrar más');
                }
                else {
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                    \$(\"#\"+idet).attr('class', 'fa fa-minus-square cl-red');
                    \$(\"#\"+idet).attr('title', 'Ver menos');
                }
            });
        });
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "fichacargo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 80,  157 => 79,  149 => 77,  145 => 75,  136 => 69,  109 => 44,  107 => 43,  103 => 41,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
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
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/fichacargo'

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

    {{ include('fichacargo/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>FICHA DE CARGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'fichacargo_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_fichacargo' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"names\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Área, Gerencia y Sector </th>
                            <th class=\"d-none\" data-name=\"phone\">Objetivo </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsabilidades </th>
                            <th class=\"d-none\" data-name=\"phone\">Experiencia </th>
                            <th class=\"d-none\" data-name=\"phone\">Conocimientos </th>
                            <th class=\"d-none\" data-name=\"phone\">Formación </th>
                            <th class=\"d-none\" data-name=\"phone\">Características </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de aprobación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Jefe Aprobador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma del Jefe </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerente Aprobador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma de Gerente </th>
                            <th class=\"d-none\" data-name=\"phone\">Hipervínculo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('fichacargo/table.html.twig') }}
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
    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    // attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#responsabilidades').val('')
        \$('#experiencia').val('')
        \$('#conocimientos').val('')
        \$('#formacion').val('')
        \$('#caracteristicas').val('')
        \$('#aprobadojefe').val('')
        \$('#firmajefe').val('')
        \$('#aprobadogerente').val('')
        \$('#firmagerente').val('')
        \$('#hipervinculo').val('')

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
            'area': \$('#fkarea').val(),
            'objetivo': \$('#objetivo').val(),
            'responsabilidades': \$('#responsabilidades').val(),
            'experiencia': \$('#experiencia').val(),
            'conocimientos': \$('#conocimientos').val(),
            'formacion': \$('#formacion').val(),
            'caracteristicas': \$('#caracteristicas').val(),
            'fechaaprobacion': \$('#fechaaprobacion').val(),
            'aprobadojefe': \$('#aprobadojefe').val(),
            'firmajefe': \$('#firmajefe').val(),
            'aprobadogerente': \$('#aprobadogerente').val(),
            'firmagerente': \$('#firmagerente').val(),
            'hipervinculo': \$('#hipervinculo').val()
        })
        ajax_call_validation(\"/fichacargo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/fichacargo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/fichacargo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#fkarea').val(self.fkarea.id)
                \$('#objetivo').val(self.objetivo)
                \$('#responsabilidades').val(self.responsabilidades)
                \$('#experiencia').val(self.experiencia)
                \$('#conocimientos').val(self.conocimientos)
                \$('#formacion').val(self.formacion)
                \$('#caracteristicas').val(self.caracteristicas)
                \$('#fechaaprobacion').val(self.fechaaprobacion)
                \$('#aprobadojefe').val(self.aprobadojefe)
                \$('#firmajefe').val(self.firmajefe)
                \$('#aprobadogerente').val(self.aprobadogerente)
                \$('#firmagerente').val(self.firmagerente)
                \$('#hipervinculo').val(self.hipervinculo)

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
            'fkarea': \$('#fkarea').val(),
            'objetivo': \$('#objetivo').val(),
            'responsabilidades': \$('#responsabilidades').val(),
            'experiencia': \$('#experiencia').val(),
            'conocimientos': \$('#conocimientos').val(),
            'formacion': \$('#formacion').val(),
            'caracteristicas': \$('#caracteristicas').val(),
            'fechaaprobacion': \$('#fechaaprobacion').val(),
            'aprobadojefe': \$('#aprobadojefe').val(),
            'firmajefe': \$('#firmajefe').val(),
            'aprobadogerente': \$('#aprobadogerente').val(),
            'firmagerente': \$('#firmagerente').val(),
            'hipervinculo': \$('#hipervinculo').val()
        })
        ajax_call_validation(\"/fichacargo_actualizar\", {object: objeto}, null,  main_route)
        // ajax_call(\"/fichacargo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function ficha_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/ficha_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            ficha_prev(id)

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
                        ajax_call(\"/fichacargo_eliminar\", { 
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
    <script>
        function format (d) {
            return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Objetivo:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Responsabilidades:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Experiencia:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Conocimientos:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Formación:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Características:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de aprobación:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Hipervínculo:</td>'+
                    '<td>'+d[15]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'fc'+row.data()[1];
                if ( row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                    \$(\"#\"+idet).attr('class', 'fa fa-plus-square cl-teal');
                    \$(\"#\"+idet).attr('title', 'Mostrar más');
                }
                else {
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                    \$(\"#\"+idet).attr('class', 'fa fa-minus-square cl-red');
                    \$(\"#\"+idet).attr('title', 'Ver menos');
                }
            });
        });
    </script>

{% endblock %}", "fichacargo/index.html.twig", "H:\\Elfec\\back_end\\1st_version\\elfec_intranet_backend\\templates\\fichacargo\\index.html.twig");
    }
}
