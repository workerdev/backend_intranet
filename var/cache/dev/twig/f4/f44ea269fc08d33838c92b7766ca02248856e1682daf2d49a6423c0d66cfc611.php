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
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-4\">
            ";
        // line 36
        if (twig_in_filter("fichacargo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
                ";
            // line 40
            if ((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 40, $this->source); })())) {
                // line 41
                echo "                    <button id=\"apbjf\" type=\"button\" class=\"btn bg-teal waves-effect\" title=\"Fichas por aprobar - Jefe\">
                        <i class=\"material-icons\">assignment_turned_in</i>
                    </button>
                ";
            }
            // line 45
            echo "                ";
            if ((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 45, $this->source); })())) {
                // line 46
                echo "                    <button id=\"apbgr\" type=\"button\" class=\"btn bg-blue waves-effect\" title=\"Fichas por aprobar - Gerente\">
                        <i class=\"material-icons\">assignment</i>
                    </button>
                ";
            }
            // line 50
            echo "            ";
        }
        // line 51
        echo "            </div>
        </div>
        ";
        // line 53
        if ((twig_in_filter("home_fichacargo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 53, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 53, $this->source); })()))) {
            // line 54
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
                            <th class=\"order_by_th\" data-name=\"phone\">Jefe inmediato superior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma del Jefe </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerente de área </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma de Gerente </th>
                            <th class=\"d-none\" data-name=\"phone\">Hipervínculo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 79
            echo twig_include($this->env, $context, "fichacargo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 85
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 87
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 89
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 90
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    var aprobarjf = false;
    var rechazarjf = false;
    var aprobargr = false;
    var rechazargr = false;
    var idfc = 0;
    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    \$('#aprobadojefe').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar jefe inmediato superior.',
        title: 'Seleccione un jefe inmediato superior.'
    })

    \$('#aprobadogerente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerente de área.',
        title: 'Seleccione un gerente de área.'
    })

    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#responsabilidades').val('')
        \$('#experiencia').val('')
        \$('#conocimientos').val('')
        \$('#formacion').val('')
        \$('#caracteristicas').val('')
        \$('#aprobadojefe').val('')
        \$('#firmajefe').val('Por aprobar')
        \$('#aprobadogerente').val('')
        \$('#firmagerente').val('Por aprobar')
        \$('#hipervinculo').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#apbjf').click(function () {
        \$('#form-fcj').modal('show');
    })

    \$('#apbgr').click(function () {
        \$('#form-fcg').modal('show');
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
        console.log(objeto)
        ajax_call_validation(\"/fichacargo_insertar\", {object: objeto}, null, main_route)
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
                \$('#fkarea').selectpicker('render')

                \$('#objetivo').val(self.objetivo)
                \$('#responsabilidades').val(self.responsabilidades)
                \$('#experiencia').val(self.experiencia)
                \$('#conocimientos').val(self.conocimientos)
                \$('#formacion').val(self.formacion)
                \$('#caracteristicas').val(self.caracteristicas)
                \$('#fechaaprobacion').val(self.fechaaprobacion)
                \$('#firmajefe').val(self.firmajefe)
                \$('#firmagerente').val(self.firmagerente)

                \$('#aprobadojefe').val(self.aprobadojefe)
                \$('#aprobadojefe').selectpicker('render')

                \$('#aprobadogerente').val(self.aprobadogerente)
                \$('#aprobadogerente').selectpicker('render')

                
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
        ajax_call_validation(\"/fichacargo_actualizar\", {object: objeto}, null,  main_route)
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

        \$('#confirmjf').click(function () {
            objeto = JSON.stringify({
                'password': \$('#clavejf').val()
            });
            \$.ajax({
                method: \"POST\",
                url: \"/valid_action\",
                data: {object : objeto},
                async: false,
                beforeSend: function () {
                    \$(\".plan-icon-load\").css('display', 'inline-block');
                },
                success: function (data, textStatus) {
                    \$(\".plan-icon-load\").css('display', 'none');
                    \$('#formjf-valid').hide();
                    \$('#form-fcj').hide();
                    \$('#formjf-valid').modal('hide');
                    \$('#form-fcj').modal('hide');
                }
            }).done(function (response) {
                let message = ''
                if(response == \"vacio\"){ 
                    message = 'Por favor ingrese su password.';
                    document.getElementById('msgfcj').innerHTML = message;
                    \$(\"#msgfcj\").show();
                    setTimeout(function(){ \$(\"#msgfcj\").fadeOut() }, 3000);
                }
                if(response == \"error\"){ 
                    message = 'Datos invalidos, intente de nuevo.';
                    document.getElementById('msgfcj').innerHTML = message;
                    \$(\"#msgfcj\").show();
                    setTimeout(function(){ \$(\"#msgfcj\").fadeOut() }, 3000);
                }
                if(response == \"exitoso\"){
                    if(aprobarjf){ 
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmajefe': 'APROBADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcjefe\", {object: objeto}, null, main_route)
                    }
                    if(rechazarjf){
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmajefe': 'RECHAZADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcjefe\", {object: objeto}, null, main_route)
                    }
                }
            });
        })

        \$('#confirmgr').click(function () {
            objeto = JSON.stringify({
                'password': \$('#clavegr').val()
            });
            \$.ajax({
                method: \"POST\",
                url: \"/valid_action\",
                data: {object : objeto},
                async: false,
                beforeSend: function () {
                    \$(\".plan-icon-load\").css('display', 'inline-block');
                },
                success: function (data, textStatus) {
                    \$(\".plan-icon-load\").css('display', 'none');
                    \$('#formgr-valid').hide();
                    \$('#form-fcg').hide();
                    \$('#formgr-valid').modal('hide');
                    \$('#form-fcg').modal('hide');
                }
            }).done(function (response) {
                let message = ''
                if(response == \"vacio\"){ 
                    message = 'Por favor ingrese su password.';
                    document.getElementById('msgfcg').innerHTML = message;
                    \$(\"#msgfcg\").show();
                    setTimeout(function(){ \$(\"#msgfcg\").fadeOut() }, 3000);
                }
                if(response == \"error\"){ 
                    message = 'Datos invalidos, intente de nuevo.';
                    document.getElementById('msgfcg').innerHTML = message;
                    \$(\"#msgfcg\").show();
                    setTimeout(function(){ \$(\"#msgfcg\").fadeOut() }, 3000);
                }
                if(response == \"exitoso\"){
                    if(aprobargr){ 
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmagerente': 'APROBADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcgerente\", {object: objeto}, null, main_route)
                    }
                    if(rechazargr){
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmagerente': 'RECHAZADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcgerente\", {object: objeto}, null, main_route)
                    }
                }
            });
        })

        function aprobar_fcj() {
            \$('.apfcj').click(function () {
                aprobarjf = true;
                rechazarjf = false;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#msfcj').modal('hide')
                \$('#formjf-valid').modal('show')
            });
        }

        function rechazar_fcj() {
            \$('.rcfcj').click(function () {
                aprobarjf = false;
                rechazarjf = true;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#formjf-valid').modal('show')
            });
        }

        function aprobar_fcg() {
            \$('.apfcg').click(function () {
                aprobargr = true;
                rechazargr = false;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#msfcg').modal('hide')
                \$('#formgr-valid').modal('show')
            });
        }

        function rechazar_fcg() {
            \$('.rcfcg').click(function () {
                aprobargr = false;
                rechazargr = true;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#formgr-valid').modal('show')
            });
        }
    </script>
    <script>
        aprobar_fcj()
        rechazar_fcj()
        aprobar_fcg()
        rechazar_fcg()

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
        return array (  182 => 90,  176 => 89,  168 => 87,  164 => 85,  155 => 79,  128 => 54,  126 => 53,  122 => 51,  119 => 50,  113 => 46,  110 => 45,  104 => 41,  102 => 40,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
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
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-4\">
            {% if 'fichacargo_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
                {% if fcaprobjf %}
                    <button id=\"apbjf\" type=\"button\" class=\"btn bg-teal waves-effect\" title=\"Fichas por aprobar - Jefe\">
                        <i class=\"material-icons\">assignment_turned_in</i>
                    </button>
                {% endif %}
                {% if fcaprobgr %}
                    <button id=\"apbgr\" type=\"button\" class=\"btn bg-blue waves-effect\" title=\"Fichas por aprobar - Gerente\">
                        <i class=\"material-icons\">assignment</i>
                    </button>
                {% endif %}
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
                            <th class=\"order_by_th\" data-name=\"phone\">Jefe inmediato superior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Firma del Jefe </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Gerente de área </th>
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
    var aprobarjf = false;
    var rechazarjf = false;
    var aprobargr = false;
    var rechazargr = false;
    var idfc = 0;
    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un tipo de área, gerencia y sector.',
        title: 'Seleccione un tipo de área, gerencia y sector.'
    })

    \$('#aprobadojefe').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar jefe inmediato superior.',
        title: 'Seleccione un jefe inmediato superior.'
    })

    \$('#aprobadogerente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar gerente de área.',
        title: 'Seleccione un gerente de área.'
    })

    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#objetivo').val('')
        \$('#responsabilidades').val('')
        \$('#experiencia').val('')
        \$('#conocimientos').val('')
        \$('#formacion').val('')
        \$('#caracteristicas').val('')
        \$('#aprobadojefe').val('')
        \$('#firmajefe').val('Por aprobar')
        \$('#aprobadogerente').val('')
        \$('#firmagerente').val('Por aprobar')
        \$('#hipervinculo').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#apbjf').click(function () {
        \$('#form-fcj').modal('show');
    })

    \$('#apbgr').click(function () {
        \$('#form-fcg').modal('show');
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
        console.log(objeto)
        ajax_call_validation(\"/fichacargo_insertar\", {object: objeto}, null, main_route)
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
                \$('#fkarea').selectpicker('render')

                \$('#objetivo').val(self.objetivo)
                \$('#responsabilidades').val(self.responsabilidades)
                \$('#experiencia').val(self.experiencia)
                \$('#conocimientos').val(self.conocimientos)
                \$('#formacion').val(self.formacion)
                \$('#caracteristicas').val(self.caracteristicas)
                \$('#fechaaprobacion').val(self.fechaaprobacion)
                \$('#firmajefe').val(self.firmajefe)
                \$('#firmagerente').val(self.firmagerente)

                \$('#aprobadojefe').val(self.aprobadojefe)
                \$('#aprobadojefe').selectpicker('render')

                \$('#aprobadogerente').val(self.aprobadogerente)
                \$('#aprobadogerente').selectpicker('render')

                
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
        ajax_call_validation(\"/fichacargo_actualizar\", {object: objeto}, null,  main_route)
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

        \$('#confirmjf').click(function () {
            objeto = JSON.stringify({
                'password': \$('#clavejf').val()
            });
            \$.ajax({
                method: \"POST\",
                url: \"/valid_action\",
                data: {object : objeto},
                async: false,
                beforeSend: function () {
                    \$(\".plan-icon-load\").css('display', 'inline-block');
                },
                success: function (data, textStatus) {
                    \$(\".plan-icon-load\").css('display', 'none');
                    \$('#formjf-valid').hide();
                    \$('#form-fcj').hide();
                    \$('#formjf-valid').modal('hide');
                    \$('#form-fcj').modal('hide');
                }
            }).done(function (response) {
                let message = ''
                if(response == \"vacio\"){ 
                    message = 'Por favor ingrese su password.';
                    document.getElementById('msgfcj').innerHTML = message;
                    \$(\"#msgfcj\").show();
                    setTimeout(function(){ \$(\"#msgfcj\").fadeOut() }, 3000);
                }
                if(response == \"error\"){ 
                    message = 'Datos invalidos, intente de nuevo.';
                    document.getElementById('msgfcj').innerHTML = message;
                    \$(\"#msgfcj\").show();
                    setTimeout(function(){ \$(\"#msgfcj\").fadeOut() }, 3000);
                }
                if(response == \"exitoso\"){
                    if(aprobarjf){ 
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmajefe': 'APROBADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcjefe\", {object: objeto}, null, main_route)
                    }
                    if(rechazarjf){
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmajefe': 'RECHAZADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcjefe\", {object: objeto}, null, main_route)
                    }
                }
            });
        })

        \$('#confirmgr').click(function () {
            objeto = JSON.stringify({
                'password': \$('#clavegr').val()
            });
            \$.ajax({
                method: \"POST\",
                url: \"/valid_action\",
                data: {object : objeto},
                async: false,
                beforeSend: function () {
                    \$(\".plan-icon-load\").css('display', 'inline-block');
                },
                success: function (data, textStatus) {
                    \$(\".plan-icon-load\").css('display', 'none');
                    \$('#formgr-valid').hide();
                    \$('#form-fcg').hide();
                    \$('#formgr-valid').modal('hide');
                    \$('#form-fcg').modal('hide');
                }
            }).done(function (response) {
                let message = ''
                if(response == \"vacio\"){ 
                    message = 'Por favor ingrese su password.';
                    document.getElementById('msgfcg').innerHTML = message;
                    \$(\"#msgfcg\").show();
                    setTimeout(function(){ \$(\"#msgfcg\").fadeOut() }, 3000);
                }
                if(response == \"error\"){ 
                    message = 'Datos invalidos, intente de nuevo.';
                    document.getElementById('msgfcg').innerHTML = message;
                    \$(\"#msgfcg\").show();
                    setTimeout(function(){ \$(\"#msgfcg\").fadeOut() }, 3000);
                }
                if(response == \"exitoso\"){
                    if(aprobargr){ 
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmagerente': 'APROBADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcgerente\", {object: objeto}, null, main_route)
                    }
                    if(rechazargr){
                        objeto = JSON.stringify({
                            'id': idfc,
                            'firmagerente': 'RECHAZADO'
                        });
                        ajax_call_validation(\"/fichacargo_aprobarfcgerente\", {object: objeto}, null, main_route)
                    }
                }
            });
        })

        function aprobar_fcj() {
            \$('.apfcj').click(function () {
                aprobarjf = true;
                rechazarjf = false;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#msfcj').modal('hide')
                \$('#formjf-valid').modal('show')
            });
        }

        function rechazar_fcj() {
            \$('.rcfcj').click(function () {
                aprobarjf = false;
                rechazarjf = true;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#formjf-valid').modal('show')
            });
        }

        function aprobar_fcg() {
            \$('.apfcg').click(function () {
                aprobargr = true;
                rechazargr = false;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#msfcg').modal('hide')
                \$('#formgr-valid').modal('show')
            });
        }

        function rechazar_fcg() {
            \$('.rcfcg').click(function () {
                aprobargr = false;
                rechazargr = true;
                idfc = parseInt(JSON.parse(\$(this).attr('data-json')))
                \$('#formgr-valid').modal('show')
            });
        }
    </script>
    <script>
        aprobar_fcj()
        rechazar_fcj()
        aprobar_fcg()
        rechazar_fcg()

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

{% endblock %}", "fichacargo/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\fichacargo\\index.html.twig");
    }
}
