<?php

/* riesgosoportunidades/index.html.twig */
class __TwigTemplate_973c86694c5a1fda10b679aaf4ac0e3dcc34cfb0ae7103f6dc87b9cb54cb4cdf extends Twig_Template
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

    // line 28
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "riesgosoportunidades/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>RIESGOS Y OPORTUNIDADES</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("riesgosoportunidades_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
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
        if ((twig_in_filter("home_riesgosoportunidades", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"d-none\" data-name=\"phone\">Descripción </th>
                            <th class=\"d-none\" data-name=\"phone\">Origen </th>
                            <th class=\"d-none\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado</th>
                            <th class=\"d-none\" data-name=\"phone\">Analisis Causa Raiz</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha de Procesos </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Riesgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Impacto </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 66
            echo twig_include($this->env, $context, "riesgosoportunidades/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 72
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 74
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 76
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 77
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    // attach_validators()

    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar ficha de proceso.',
        title: 'Seleccione una ficha de proceso.'
    })
      \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de riesgo y oportunidades.',
        title: 'Buscar un tipo de riesgo y oportunidades.'
    })
      \$('#fkprobabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de probabilidad.',
        title: 'Seleccione un tipo de probabilidad.'
    })
      \$('#fkimpacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de impacto.',
        title: 'Seleccione un tipo de impacto.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un responsable.',
        title: 'Seleccione un responsable.'
    })
    \$('#estadocro').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })
    
    \$('#new').click(function () {
        \$('#descripcion').val('')
        \$('#origen').val('')
        \$('#accion').val('')
        \$('#fecha').val('')
        \$('#analisiscausaraiz').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'descripcion': \$('#descripcion').val(),            
            'origen': \$('#origen').val(),
            'accion': \$('#accion').val(),
            'fecha': \$('#fecha').val(),
            'estadocro': \$('#estadocro').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),

            'fichaprocesos': \$('#fkficha').val(),
            'tipocro': \$('#fktipo').val(),
            'probabilidad': \$('#fkprobabilidad').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'impacto': \$('#fkimpacto').val()
        })
        console.log(objeto)
        ajax_call_validation(\"/riesgosoportunidades_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/riesgosoportunidades_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
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
                \$('#descripcion').val(self.descripcion)
                \$('#origen').val(self.origen)
                \$('#accion').val(self.accion)
                \$('#fecha').val(self.fecha)

                \$('#estadocro').val(self.estadocro)
                \$('#estadocro').selectpicker('render')

                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')
                
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')
                
                \$('#fkprobabilidad').val(self.fkprobabilidad.id)
                \$('#fkprobabilidad').selectpicker('render')
                
                \$('#fkimpacto').val(self.fkimpacto.id)
                \$('#fkimpacto').selectpicker('render')
                    
                
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
            'descripcion': \$('#descripcion').val(),            
            'origen': \$('#origen').val(),
            'accion': \$('#accion').val(),
            'fecha': \$('#fecha').val(),
            'estadocro': \$('#estadocro').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),

            'fichaprocesos': \$('#fkficha').val(),
            'tipocro': \$('#fktipo').val(),
            'probabilidad': \$('#fkprobabilidad').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'impacto': \$('#fkimpacto').val()
        })
        ajax_call_validation(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function crocm_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/crocm_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            crocm_previous(id)

            setTimeout(function(){
                let quest = message
                enabled = false

                if((quest.split(\" \").length) > 10){
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
                        ajax_call(\"/riesgosoportunidades_eliminar\", { 
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
                    '<td class=\"bold\">Descripción:</td>'+
                    '<td>'+d[2]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Origen:</td>'+
                    '<td>'+d[3]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Acción:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Analisis Causa Raiz:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Responsable:</td>'+
                    '<td>'+d[12]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_table').DataTable();
            \$('#data_table tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'cro'+row.data()[1];
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
        return "riesgosoportunidades/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 77,  154 => 76,  146 => 74,  142 => 72,  133 => 66,  109 => 44,  107 => 43,  103 => 41,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
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

    <div class=\"header bg-indigo\"><h2>RIESGOS Y OPORTUNIDADES</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'riesgosoportunidades_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_riesgosoportunidades' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"d-none\" data-name=\"phone\">Descripción </th>
                            <th class=\"d-none\" data-name=\"phone\">Origen </th>
                            <th class=\"d-none\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado</th>
                            <th class=\"d-none\" data-name=\"phone\">Analisis Causa Raiz</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha de Procesos </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Riesgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Impacto </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable </th>
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
{% endblock %}
{% block javascripts %}
    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    // attach_validators()

    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar ficha de proceso.',
        title: 'Seleccione una ficha de proceso.'
    })
      \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de riesgo y oportunidades.',
        title: 'Buscar un tipo de riesgo y oportunidades.'
    })
      \$('#fkprobabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de probabilidad.',
        title: 'Seleccione un tipo de probabilidad.'
    })
      \$('#fkimpacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de impacto.',
        title: 'Seleccione un tipo de impacto.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar un responsable.',
        title: 'Seleccione un responsable.'
    })
    \$('#estadocro').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })
    
    \$('#new').click(function () {
        \$('#descripcion').val('')
        \$('#origen').val('')
        \$('#accion').val('')
        \$('#fecha').val('')
        \$('#analisiscausaraiz').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'descripcion': \$('#descripcion').val(),            
            'origen': \$('#origen').val(),
            'accion': \$('#accion').val(),
            'fecha': \$('#fecha').val(),
            'estadocro': \$('#estadocro').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),

            'fichaprocesos': \$('#fkficha').val(),
            'tipocro': \$('#fktipo').val(),
            'probabilidad': \$('#fkprobabilidad').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'impacto': \$('#fkimpacto').val()
        })
        console.log(objeto)
        ajax_call_validation(\"/riesgosoportunidades_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/riesgosoportunidades_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
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
                \$('#descripcion').val(self.descripcion)
                \$('#origen').val(self.origen)
                \$('#accion').val(self.accion)
                \$('#fecha').val(self.fecha)

                \$('#estadocro').val(self.estadocro)
                \$('#estadocro').selectpicker('render')

                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')
                
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')
                
                \$('#fkprobabilidad').val(self.fkprobabilidad.id)
                \$('#fkprobabilidad').selectpicker('render')
                
                \$('#fkimpacto').val(self.fkimpacto.id)
                \$('#fkimpacto').selectpicker('render')
                    
                
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
            'descripcion': \$('#descripcion').val(),            
            'origen': \$('#origen').val(),
            'accion': \$('#accion').val(),
            'fecha': \$('#fecha').val(),
            'estadocro': \$('#estadocro').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),

            'fichaprocesos': \$('#fkficha').val(),
            'tipocro': \$('#fktipo').val(),
            'probabilidad': \$('#fkprobabilidad').val(),
            'fkresponsable': \$('#fkresponsable').val(),
            'impacto': \$('#fkimpacto').val()
        })
        ajax_call_validation(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/riesgosoportunidades_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function crocm_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/crocm_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            crocm_previous(id)

            setTimeout(function(){
                let quest = message
                enabled = false

                if((quest.split(\" \").length) > 10){
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
                        ajax_call(\"/riesgosoportunidades_eliminar\", { 
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
                    '<td class=\"bold\">Descripción:</td>'+
                    '<td>'+d[2]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Origen:</td>'+
                    '<td>'+d[3]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Acción:</td>'+
                    '<td>'+d[4]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Analisis Causa Raiz:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Responsable:</td>'+
                    '<td>'+d[12]+'</td>'+
                '</tr>'+
            '</table></div>';
        }
    
        \$(document).ready(function() {
            table = \$('#data_table').DataTable();
            \$('#data_table tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'cro'+row.data()[1];
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

{% endblock %}", "riesgosoportunidades/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\riesgosoportunidades\\index.html.twig");
    }
}
