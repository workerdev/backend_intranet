<?php

/* hallazgo/index.html.twig */
class __TwigTemplate_95cafa459a2c9fecfd96e7134f96428067e719a611f2899f19eeba591148f2de extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "hallazgo/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "hallazgo/index.html.twig"));

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
       #fkprobabilidadaccion{ 
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
        main_route = '/hallazgo'

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
        echo twig_include($this->env, $context, "hallazgo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>HALLAZGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"#fkprobabilidadxs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("hallazgo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
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
        if ((twig_in_filter("home_hallazgo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Auditoría </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Hallazgo</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"d-none\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Evidencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Punto ISO </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nivel de Impacto </th>
                            <th class=\"d-none\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"d-none\" data-name=\"phone\">Análisis Causa Raíz </th>
                            <th class=\"d-none\" data-name=\"phone\">Recomendaciones </th>
                            <th class=\"d-none\" data-name=\"phone\">Cargo del Auditado </th>
                            <th class=\"d-none\" data-name=\"phone\">Nombre del Auditado </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 71
            echo twig_include($this->env, $context, "hallazgo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
#fkprobabilidad#fkprobabilidad
        ";
        } else {
            // line 77
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 79
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 82
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#fkauditoria').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar auditoría.',
        title: 'Seleccione una auditoría.'
    })

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#fkimpacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar nivel de impacto.',
        title: 'Seleccione un nivel de impacto.'
    })

    \$('#fkprobabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar probabilidad.',
        title: 'Seleccione una probabilidad.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#titulo').val('')
        \$('#descripcion').val('')
        \$('#evidencia').val('')
        \$('#documento').val('')
        \$('#puntoiso').val('')
        \$('#analisiscausaraiz').val('')
        \$('#recomendaciones').val('')
        \$('#cargoauditado').val('')
        \$('#nombreauditado').val('')
        \$('#responsable').val('')
        \$('#fecharegistro').val('')
        \$('#fkimpacto').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'ordinal': \$('#ordinal').val(),
            'titulo': \$('#titulo').val(),
            'descripcion': \$('#descripcion').val(),
            'evidencia': \$('#evidencia').val(),
            'documento': \$('#documento').val(),
            'puntoiso': \$('#puntoiso').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),
            'recomendaciones': \$('#recomendaciones').val(),
            'cargoauditado': \$('#cargoauditado').val(),
            'nombreauditado': \$('#nombreauditado').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'auditoria': \$('#fkauditoria').val(),
            'tipo': \$('#fktipo').val(),
            'impacto': \$('#fkimpacto').val(),
            'probabilidad': \$('#fkprobabilidad').val()
        })
        ajax_call_validation(\"/hallazgo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/hallazgo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/hallazgo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#titulo').val(self.titulo)
                \$('#descripcion').val(self.descripcion)
                \$('#evidencia').val(self.evidencia)
                \$('#documento').val(self.documento)
                \$('#puntoiso').val(self.puntoiso)
                \$('#analisiscausaraiz').val(self.analisiscausaraiz)
                \$('#recomendaciones').val(self.recomendaciones)
                \$('#cargoauditado').val(self.cargoauditado)
                \$('#nombreauditado').val(self.nombreauditado)
                \$('#responsable').val(self.responsable)
                \$('#fecharegistro').val(self.fecharegistro)

                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                \$('#fkauditoria').val(self.fkauditoria.id)
                \$('#fkauditoria').selectpicker('render')

                \$('#fkimpacto').val(self.fkimpacto.id)
                \$('#fkimpacto').selectpicker('render')

                \$('#fkprobabilidad').val(self.fkprobabilidad.id)
                \$('#fkprobabilidad').selectpicker('render')

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
            'ordinal': \$('#ordinal').val(),
            'titulo': \$('#titulo').val(),
            'descripcion': \$('#descripcion').val(),
            'evidencia': \$('#evidencia').val(),
            'documento': \$('#documento').val(),
            'puntoiso': \$('#puntoiso').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),
            'recomendaciones': \$('#recomendaciones').val(),
            'cargoauditado': \$('#cargoauditado').val(),
            'nombreauditado': \$('#nombreauditado').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'auditoria': \$('#fkauditoria').val(),
            'tipo': \$('#fktipo').val(),
            'impacto': \$('#fkimpacto').val(),
            'probabilidad': \$('#fkprobabilidad').val()
        })
        ajax_call_validation(\"/hallazgo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/hallazgo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function hallazgo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/hallazgo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            hallazgo_prev(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el hallazgo?\" 
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
                    ajax_call(\"/hallazgo_eliminar\", { 
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
        // `d` is the original data object for the row
        //console.log(d);
        return '<div class=\"card\" style=\"width: 95%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Descripción:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Probabilidad:</td>'+
                '<td>'+d[11]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Análisis Causa Raíz:</td>'+
                '<td>'+d[12]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Recomendaciones:</td>'+
                '<td>'+d[13]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Cargo del Auditado:</td>'+
                '<td>'+d[14]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Nombre del Auditado:</td>'+
                '<td>'+d[15]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable:</td>'+
                '<td>'+d[16]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de Registro:</td>'+
                '<td>'+d[17]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        // Add event listener for opening and closing details
        table = \$('#data_tabletr').DataTable();
        \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);
            console.log(row.data());

            let idet = 'h'+row.data()[1];
            console.log(idet);
            //let s = idet.replace(/[\\/\\] ]+/g, '');
            if ( row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                //console.log(s);
                \$(\"#\"+idet).attr('class', 'fa fa-plus-square cl-teal');
                \$(\"#\"+idet).attr('title', 'Mostrar más');
            }
            else {
                // Open this row
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
        return "hallazgo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 82,  159 => 81,  151 => 79,  147 => 77,  138 => 71,  109 => 44,  107 => 43,  103 => 41,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <style>
       #fkprobabilidadaccion{ 
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
        main_route = '/hallazgo'

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

    {{ include('hallazgo/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>HALLAZGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"#fkprobabilidadxs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'hallazgo_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_hallazgo' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Auditoría </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Hallazgo</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"d-none\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Evidencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Punto ISO </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nivel de Impacto </th>
                            <th class=\"d-none\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"d-none\" data-name=\"phone\">Análisis Causa Raíz </th>
                            <th class=\"d-none\" data-name=\"phone\">Recomendaciones </th>
                            <th class=\"d-none\" data-name=\"phone\">Cargo del Auditado </th>
                            <th class=\"d-none\" data-name=\"phone\">Nombre del Auditado </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('hallazgo/table.html.twig') }}
                        </tbody>
                    </table>
                </div>
#fkprobabilidad#fkprobabilidad
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

    \$('#fkauditoria').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar auditoría.',
        title: 'Seleccione una auditoría.'
    })

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#fkimpacto').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar nivel de impacto.',
        title: 'Seleccione un nivel de impacto.'
    })

    \$('#fkprobabilidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar probabilidad.',
        title: 'Seleccione una probabilidad.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#titulo').val('')
        \$('#descripcion').val('')
        \$('#evidencia').val('')
        \$('#documento').val('')
        \$('#puntoiso').val('')
        \$('#analisiscausaraiz').val('')
        \$('#recomendaciones').val('')
        \$('#cargoauditado').val('')
        \$('#nombreauditado').val('')
        \$('#responsable').val('')
        \$('#fecharegistro').val('')
        \$('#fkimpacto').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'ordinal': \$('#ordinal').val(),
            'titulo': \$('#titulo').val(),
            'descripcion': \$('#descripcion').val(),
            'evidencia': \$('#evidencia').val(),
            'documento': \$('#documento').val(),
            'puntoiso': \$('#puntoiso').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),
            'recomendaciones': \$('#recomendaciones').val(),
            'cargoauditado': \$('#cargoauditado').val(),
            'nombreauditado': \$('#nombreauditado').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'auditoria': \$('#fkauditoria').val(),
            'tipo': \$('#fktipo').val(),
            'impacto': \$('#fkimpacto').val(),
            'probabilidad': \$('#fkprobabilidad').val()
        })
        ajax_call_validation(\"/hallazgo_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/hallazgo_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/hallazgo_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#titulo').val(self.titulo)
                \$('#descripcion').val(self.descripcion)
                \$('#evidencia').val(self.evidencia)
                \$('#documento').val(self.documento)
                \$('#puntoiso').val(self.puntoiso)
                \$('#analisiscausaraiz').val(self.analisiscausaraiz)
                \$('#recomendaciones').val(self.recomendaciones)
                \$('#cargoauditado').val(self.cargoauditado)
                \$('#nombreauditado').val(self.nombreauditado)
                \$('#responsable').val(self.responsable)
                \$('#fecharegistro').val(self.fecharegistro)

                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                \$('#fkauditoria').val(self.fkauditoria.id)
                \$('#fkauditoria').selectpicker('render')

                \$('#fkimpacto').val(self.fkimpacto.id)
                \$('#fkimpacto').selectpicker('render')

                \$('#fkprobabilidad').val(self.fkprobabilidad.id)
                \$('#fkprobabilidad').selectpicker('render')

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
            'ordinal': \$('#ordinal').val(),
            'titulo': \$('#titulo').val(),
            'descripcion': \$('#descripcion').val(),
            'evidencia': \$('#evidencia').val(),
            'documento': \$('#documento').val(),
            'puntoiso': \$('#puntoiso').val(),
            'analisiscausaraiz': \$('#analisiscausaraiz').val(),
            'recomendaciones': \$('#recomendaciones').val(),
            'cargoauditado': \$('#cargoauditado').val(),
            'nombreauditado': \$('#nombreauditado').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'auditoria': \$('#fkauditoria').val(),
            'tipo': \$('#fktipo').val(),
            'impacto': \$('#fkimpacto').val(),
            'probabilidad': \$('#fkprobabilidad').val()
        })
        ajax_call_validation(\"/hallazgo_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/hallazgo_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function hallazgo_prev(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/hallazgo_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            hallazgo_prev(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el hallazgo?\" 
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
                    ajax_call(\"/hallazgo_eliminar\", { 
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
        // `d` is the original data object for the row
        //console.log(d);
        return '<div class=\"card\" style=\"width: 95%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Descripción:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Probabilidad:</td>'+
                '<td>'+d[11]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Análisis Causa Raíz:</td>'+
                '<td>'+d[12]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Recomendaciones:</td>'+
                '<td>'+d[13]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Cargo del Auditado:</td>'+
                '<td>'+d[14]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Nombre del Auditado:</td>'+
                '<td>'+d[15]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable:</td>'+
                '<td>'+d[16]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de Registro:</td>'+
                '<td>'+d[17]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        // Add event listener for opening and closing details
        table = \$('#data_tabletr').DataTable();
        \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);
            console.log(row.data());

            let idet = 'h'+row.data()[1];
            console.log(idet);
            //let s = idet.replace(/[\\/\\] ]+/g, '');
            if ( row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                //console.log(s);
                \$(\"#\"+idet).attr('class', 'fa fa-plus-square cl-teal');
                \$(\"#\"+idet).attr('title', 'Mostrar más');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
                \$(\"#\"+idet).attr('class', 'fa fa-minus-square cl-red');
                \$(\"#\"+idet).attr('title', 'Ver menos');
            }
        });
    });
</script>

{% endblock %}", "hallazgo/index.html.twig", "H:\\Elfec\\back_end\\1st_version\\elfec_intranet_backend\\templates\\hallazgo\\index.html.twig");
    }
}
