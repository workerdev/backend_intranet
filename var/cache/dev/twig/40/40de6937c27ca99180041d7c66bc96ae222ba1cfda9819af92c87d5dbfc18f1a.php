<?php

/* documento/index.html.twig */
class __TwigTemplate_803d62439efb888cf7fc6ac37ea62821cda30ec9d872851561ae3ca6cc4c9d7a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "documento/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documento/index.html.twig"));

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
        main_route = '/documento'

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
        echo twig_include($this->env, $context, "documento/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>DOCUMENTO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("documento_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
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
        if ((twig_in_filter("home_documento", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"names\">Título </th>
                            <th class=\"d-none\" data-name=\"phone\">Versión vigente </th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo archivo digital</th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo diagrama flujo</th>
                            <th class=\"d-none\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de publicación </th>
                            <th class=\"order_by_th\" data-name=\"names\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Apobador </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 65
            echo twig_include($this->env, $context, "documento/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 71
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 73
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 75
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 76
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    // attach_validators()
    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    })
     \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de documento.',
        title: 'Seleccione un tipo de documento.'
    })
     \$('#fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de aprobador.',
        title: 'Seleccione un tipo de aprobador.'
    })
     \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })
    
    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#titulo').val('')
        \$('#versionvigente').val('')
        \$('#vinculoarchivodig').val('')
        \$('#vinculodiagflujo').val('')
        \$('#carpetaOperativa').val('')
        \$('#fechaPublicacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'titulo': \$('#titulo').val(),
            'versionvigente': \$('#versionvigente').val(),
            'vinculoarchivodig': \$('#vinculoarchivodig').val(),
            'vinculodiagflujo': \$('#vinculodiagflujo').val(),
            'fkficha': \$('#fkficha').val(),
            'fktipo': \$('#fktipo').val(),
            'fkaprobador': \$('#fkaprobador').val(),
            'carpetaOperativa': \$('#carpetaOperativa').val(),
            'fechaPublicacion': \$('#fechaPublicacion').val()
        }) 

        ajax_call_validation(\"/documento_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/documento_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/documento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                \$('#titulo').val(self.titulo)
                \$('#versionvigente').val(self.versionVigente)
                \$('#vinculoarchivodig').val(self.vinculoarchivodig)
                \$('#vinculodiagflujo').val(self.vinculodiagflujo)
                \$('#carpetaOperativa').val(self.carpetaOperativa)
                \$('#fechaPublicacion').val(self.fechaPublicacion)

                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')

                 \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                 \$('#fkaprobador').val(self.fkaprobador.id)
                \$('#fkaprobador').selectpicker('render')
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
            'titulo': \$('#titulo').val(),
            'versionvigente': \$('#versionvigente').val(),
            'vinculoarchivodig': \$('#vinculoarchivodig').val(),
            'vinculodiagflujo': \$('#vinculodiagflujo').val(),
            'fkficha': \$('#fkficha').val(),
            'fktipo': \$('#fktipo').val(),
            'fkaprobador': \$('#fkaprobador').val(),
            'carpetaOperativa': \$('#carpetaOperativa').val(),
            'fechaPublicacion': \$('#fechaPublicacion').val()
        }) 
        ajax_call_validation(\"/documento_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/documento_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')0
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function documento_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/documento_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }


        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            documento_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el documento??\" 
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
                    ajax_call(\"/documento_eliminar\", { 
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
    <script>
        function format (d) {
            return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Versión vigente:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Vínculo archivo digital:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Carpeta operativa:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de publicación:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'd'+row.data()[1];
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
        return "documento/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 76,  153 => 75,  145 => 73,  141 => 71,  132 => 65,  109 => 44,  107 => 43,  103 => 41,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/documento'

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

    {{ include('documento/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>DOCUMENTO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'documento_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_documento' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"names\">Título </th>
                            <th class=\"d-none\" data-name=\"phone\">Versión vigente </th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo archivo digital</th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo diagrama flujo</th>
                            <th class=\"d-none\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de publicación </th>
                            <th class=\"order_by_th\" data-name=\"names\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Apobador </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('documento/table.html.twig') }}
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
    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    })
     \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de documento.',
        title: 'Seleccione un tipo de documento.'
    })
     \$('#fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de aprobador.',
        title: 'Seleccione un tipo de aprobador.'
    })
     \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })
    
    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#titulo').val('')
        \$('#versionvigente').val('')
        \$('#vinculoarchivodig').val('')
        \$('#vinculodiagflujo').val('')
        \$('#carpetaOperativa').val('')
        \$('#fechaPublicacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'titulo': \$('#titulo').val(),
            'versionvigente': \$('#versionvigente').val(),
            'vinculoarchivodig': \$('#vinculoarchivodig').val(),
            'vinculodiagflujo': \$('#vinculodiagflujo').val(),
            'fkficha': \$('#fkficha').val(),
            'fktipo': \$('#fktipo').val(),
            'fkaprobador': \$('#fkaprobador').val(),
            'carpetaOperativa': \$('#carpetaOperativa').val(),
            'fechaPublicacion': \$('#fechaPublicacion').val()
        }) 

        ajax_call_validation(\"/documento_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/documento_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/documento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                \$('#titulo').val(self.titulo)
                \$('#versionvigente').val(self.versionVigente)
                \$('#vinculoarchivodig').val(self.vinculoarchivodig)
                \$('#vinculodiagflujo').val(self.vinculodiagflujo)
                \$('#carpetaOperativa').val(self.carpetaOperativa)
                \$('#fechaPublicacion').val(self.fechaPublicacion)

                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')

                 \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                 \$('#fkaprobador').val(self.fkaprobador.id)
                \$('#fkaprobador').selectpicker('render')
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
            'titulo': \$('#titulo').val(),
            'versionvigente': \$('#versionvigente').val(),
            'vinculoarchivodig': \$('#vinculoarchivodig').val(),
            'vinculodiagflujo': \$('#vinculodiagflujo').val(),
            'fkficha': \$('#fkficha').val(),
            'fktipo': \$('#fktipo').val(),
            'fkaprobador': \$('#fkaprobador').val(),
            'carpetaOperativa': \$('#carpetaOperativa').val(),
            'fechaPublicacion': \$('#fechaPublicacion').val()
        }) 
        ajax_call_validation(\"/documento_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/documento_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')0
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function documento_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/documento_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }


        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            documento_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el documento??\" 
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
                    ajax_call(\"/documento_eliminar\", { 
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
    <script>
        function format (d) {
            return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Versión vigente:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Vínculo archivo digital:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Carpeta operativa:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de publicación:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'd'+row.data()[1];
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

{% endblock %}", "documento/index.html.twig", "H:\\Elfec\\back_end\\1st_version\\elfec_intranet_backend\\templates\\documento\\index.html.twig");
    }
}
