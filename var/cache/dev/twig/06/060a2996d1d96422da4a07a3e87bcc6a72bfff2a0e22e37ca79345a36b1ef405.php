<?php

/* fichaprocesos/index.html.twig */
class __TwigTemplate_bdfd7a8b7571c14f6c94d66acfdf65486989b56d1d3bc68315235393a54ae36a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "fichaprocesos/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "fichaprocesos/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
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
        var main_route = '/fichaprocesos';

        function default_values() {
            page_nr = 1
            max_entries = 10darede
            like_search = \"\"
            order_by = \"\"
            ascendant = true
        }
        default_values()
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 30
        echo "
    ";
        // line 31
        echo twig_include($this->env, $context, "fichaprocesos/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>FICHA DE PROCESOS</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 37
        if (twig_in_filter("fichaprocesos_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 42
        echo "            </div>
        </div>
        ";
        // line 44
        if ((twig_in_filter("home_fichaprocesos", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 44, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 44, $this->source); })()))) {
            // line 45
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Área, Gerencia y Sector </th>
                            <th class=\"order_by_th\" data-name=\"names\">Cod. Proceso </th>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"d-none\" data-name=\"phone\">Objetivo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>
                            <th class=\"d-none\" data-name=\"phone\">Versión </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Emisión </th>
                            <th class=\"d-none\" data-name=\"phone\">Recursos Necesarios </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 64
            echo twig_include($this->env, $context, "fichaprocesos/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 70
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 72
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 74
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 75
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    //attach_validators()

    /*document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, options);
    });*/

    \$('#fkareagerenciasector').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    \$('#vigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar una opción.',
        title: 'Seleccione una opción.'
    })
    
    \$('#new').click(function () {
        \$('#codproceso').val('')
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#version').val('')
        \$('#recursosnecesarios').val('')
        \$('#entradasrequeridas').val('')
        \$('#salidasesperadas').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codproceso': \$('#codproceso').val(),
            'nombre': \$('#nombre').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'version': \$('#version').val(),
            'fechaemision': \$('#fechaemision').val(),
            'recursosnecesarios': \$('#recursosnecesarios').val(),
            'areagerenciasector': \$('#fkareagerenciasector').val(),
            'entradasrequeridas': \$('#entradasrequeridas').val(),
            'salidasesperadas': \$('#salidasesperadas').val()
        });
        console.log(objeto);
        // ajax_call(\"/fichaprocesos_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
        ajax_call_validation(\"/fichaprocesos_insertar\", {object: objeto}, null, '/fichaprocesos')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/fichaprocesos_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                console.log(self);
                \$('#id').val(self.id)
                \$('#codproceso').val(self.codproceso)
                \$('#nombre').val(self.nombre)
                \$('#objetivo').val(self.objetivo)
                \$('#vigente').val(self.vigente)
                \$('#version').val(self.version)
                \$('#fechaemision').val(self.fechaemision)
                \$('#recursosnecesarios').val(self.recursosnecesarios)
                \$('#entradasrequeridas').val(self.entradasrequeridas)
                \$('#salidasesperadas').val(self.salidasesperadas)
                \$('#fkareagerenciasector').val(self.fkareagerenciasector.id)
                \$('#fkareagerenciasector').selectpicker('render')

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
            'fkareagerenciasector': \$('#fkareagerenciasector').val(),
            'codproceso': \$('#codproceso').val(),
            'nombre': \$('#nombre').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'version': \$('#version').val(),
            'fechaemision': \$('#fechaemision').val(),
            'recursosnecesarios': \$('#recursosnecesarios').val(),
            'entradasrequeridas': \$('#entradasrequeridas').val(),
            'salidasesperadas': \$('#salidasesperadas').val()
        });
        ajax_call_validation(\"/fichaprocesos_actualizar\", {object: objeto}, null, '/fichaprocesos')
        // ajax_call(\"/fichaprocesos_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function fichaproc_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/fichaproc_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')));
            fichaproc_previous(id);
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja los datos de la ficha de procesos?\" 
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
                    ajax_call(\"/fichaprocesos_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location='/fichaprocesos' }, 2000);
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
                    '<td class=\"bold\">Objetivo:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Versión:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de Emisión:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Recursos Necesarios:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
 
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'fp'+row.data()[1];
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
        return "fichaprocesos/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 75,  152 => 74,  144 => 72,  140 => 70,  131 => 64,  110 => 45,  108 => 44,  104 => 42,  98 => 38,  96 => 37,  87 => 31,  84 => 30,  78 => 29,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
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
        var main_route = '/fichaprocesos';

        function default_values() {
            page_nr = 1
            max_entries = 10darede
            like_search = \"\"
            order_by = \"\"
            ascendant = true
        }
        default_values()
    </script>

{% endblock %}
{% block body %}

    {{ include('fichaprocesos/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>FICHA DE PROCESOS</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'fichaprocesos_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_fichaprocesos' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"names\">Área, Gerencia y Sector </th>
                            <th class=\"order_by_th\" data-name=\"names\">Cod. Proceso </th>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"d-none\" data-name=\"phone\">Objetivo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>
                            <th class=\"d-none\" data-name=\"phone\">Versión </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Emisión </th>
                            <th class=\"d-none\" data-name=\"phone\">Recursos Necesarios </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('fichaprocesos/table.html.twig') }}
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
    //attach_validators()

    /*document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, options);
    });*/

    \$('#fkareagerenciasector').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    \$('#vigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar una opción.',
        title: 'Seleccione una opción.'
    })
    
    \$('#new').click(function () {
        \$('#codproceso').val('')
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#version').val('')
        \$('#recursosnecesarios').val('')
        \$('#entradasrequeridas').val('')
        \$('#salidasesperadas').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codproceso': \$('#codproceso').val(),
            'nombre': \$('#nombre').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'version': \$('#version').val(),
            'fechaemision': \$('#fechaemision').val(),
            'recursosnecesarios': \$('#recursosnecesarios').val(),
            'areagerenciasector': \$('#fkareagerenciasector').val(),
            'entradasrequeridas': \$('#entradasrequeridas').val(),
            'salidasesperadas': \$('#salidasesperadas').val()
        });
        console.log(objeto);
        // ajax_call(\"/fichaprocesos_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
        ajax_call_validation(\"/fichaprocesos_insertar\", {object: objeto}, null, '/fichaprocesos')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/fichaprocesos_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                console.log(self);
                \$('#id').val(self.id)
                \$('#codproceso').val(self.codproceso)
                \$('#nombre').val(self.nombre)
                \$('#objetivo').val(self.objetivo)
                \$('#vigente').val(self.vigente)
                \$('#version').val(self.version)
                \$('#fechaemision').val(self.fechaemision)
                \$('#recursosnecesarios').val(self.recursosnecesarios)
                \$('#entradasrequeridas').val(self.entradasrequeridas)
                \$('#salidasesperadas').val(self.salidasesperadas)
                \$('#fkareagerenciasector').val(self.fkareagerenciasector.id)
                \$('#fkareagerenciasector').selectpicker('render')

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
            'fkareagerenciasector': \$('#fkareagerenciasector').val(),
            'codproceso': \$('#codproceso').val(),
            'nombre': \$('#nombre').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'version': \$('#version').val(),
            'fechaemision': \$('#fechaemision').val(),
            'recursosnecesarios': \$('#recursosnecesarios').val(),
            'entradasrequeridas': \$('#entradasrequeridas').val(),
            'salidasesperadas': \$('#salidasesperadas').val()
        });
        ajax_call_validation(\"/fichaprocesos_actualizar\", {object: objeto}, null, '/fichaprocesos')
        // ajax_call(\"/fichaprocesos_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function fichaproc_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/fichaproc_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')));
            fichaproc_previous(id);
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja los datos de la ficha de procesos?\" 
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
                    ajax_call(\"/fichaprocesos_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location='/fichaprocesos' }, 2000);
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
                    '<td class=\"bold\">Objetivo:</td>'+
                    '<td>'+d[5]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Versión:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de Emisión:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Recursos Necesarios:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
 
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'fp'+row.data()[1];
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

{% endblock %}", "fichaprocesos/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\fichaprocesos\\index.html.twig");
    }
}
