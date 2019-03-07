<?php

/* accion/index.html.twig */
class __TwigTemplate_575ce8620f987ddf6e746ef28a4822226f9229f6c9b6f454fc5bd9f289f5875d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "accion/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accion/index.html.twig"));

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
        main_route = '/accion'

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
        echo twig_include($this->env, $context, "accion/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>ACCIÓN</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("accion_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 41
        echo "            </div>
        </div>
        <div style=\"text-align:center; margin:auto; width:100%; height:60px;\" id=\"spn-adrp\">
            <div class=\"plan-icon-load progress\" style='margin:auto; display:none; height:60px;'>
                <img src='resources/images/loaders.gif' style='height:100%; width:auto;'/>
            </div>
        </div>
        ";
        // line 48
        if ((twig_in_filter("home_accion", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 48, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 48, $this->source); })()))) {
            // line 49
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Hallazgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable de Implementación </th>
                            <th class=\"d-none\" data-name=\"phone\">Estado </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable de Registro </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 68
            echo twig_include($this->env, $context, "accion/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 74
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 76
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 78
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 79
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#fkhallazgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar auditoría.',
        title: 'Seleccione una auditoría.'
    })

    \$('#estadoaccion ').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#descripcion').val('')
        \$('#fechaimplementacion').val('')
        \$('#responsableimplementacion').val('')
        \$('#responsableregistro').val('')
        \$('#fecharegistro').val('')

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
            'descripcion': \$('#descripcion').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'hallazgo': \$('#fkhallazgo').val(),
            'estadoaccion': \$('#estadoaccion ').val()
        })
        ajax_call_validation(\"/accion_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accion_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accion_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#descripcion').val(self.descripcion)
                \$('#fechaimplementacion').val(self.fechaimplementacion)
                \$('#responsableimplementacion').val(self.responsableimplementacion)
                \$('#responsableregistro').val(self.responsableregistro)
                \$('#fecharegistro').val(self.fecharegistro)

                \$('#estadoaccion ').val(self.estadoaccion)
                \$('#estadoaccion ').selectpicker('render')

                \$('#fkhallazgo').val(self.fkhallazgo.id)
                \$('#fkhallazgo').selectpicker('render')

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    function verifacc_rep() {
        \$('.eficrep').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_rep(\"/accion_verif\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(response);
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ordinal': \$('#ordinal').val(),
            'descripcion': \$('#descripcion').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'hallazgo': \$('#fkhallazgo').val(),
            'estadoaccion': \$('#estadoaccion ').val()
        })
      ajax_call_validation(\"/accion_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accion_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()
        verifacc_rep()

        let message= ''
        function accion_previous(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/accion_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            accion_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Desea dar de baja los datos de la acción?\" 
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
                    ajax_call(\"/accion_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1500
            )
        })
    </script>
    <script>
    function format (d) {
        return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Responsable de Implementación:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Estado:</td>'+
                '<td>'+d[7]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable de Registro:</td>'+
                '<td>'+d[8]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de Registro:</td>'+
                '<td>'+d[9]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        table = \$('#data_tabletr').DataTable();
        \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'a'+row.data()[1];
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
        return "accion/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 79,  156 => 78,  148 => 76,  144 => 74,  135 => 68,  114 => 49,  112 => 48,  103 => 41,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/accion'

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

    {{ include('accion/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>ACCIÓN</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'accion_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        <div style=\"text-align:center; margin:auto; width:100%; height:60px;\" id=\"spn-adrp\">
            <div class=\"plan-icon-load progress\" style='margin:auto; display:none; height:60px;'>
                <img src='resources/images/loaders.gif' style='height:100%; width:auto;'/>
            </div>
        </div>
        {% if 'home_accion' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Hallazgo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable de Implementación </th>
                            <th class=\"d-none\" data-name=\"phone\">Estado </th>
                            <th class=\"d-none\" data-name=\"phone\">Responsable de Registro </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('accion/table.html.twig') }}
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

    \$('#fkhallazgo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar auditoría.',
        title: 'Seleccione una auditoría.'
    })

    \$('#estadoaccion ').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#descripcion').val('')
        \$('#fechaimplementacion').val('')
        \$('#responsableimplementacion').val('')
        \$('#responsableregistro').val('')
        \$('#fecharegistro').val('')

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
            'descripcion': \$('#descripcion').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'hallazgo': \$('#fkhallazgo').val(),
            'estadoaccion': \$('#estadoaccion ').val()
        })
        ajax_call_validation(\"/accion_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accion_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accion_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#descripcion').val(self.descripcion)
                \$('#fechaimplementacion').val(self.fechaimplementacion)
                \$('#responsableimplementacion').val(self.responsableimplementacion)
                \$('#responsableregistro').val(self.responsableregistro)
                \$('#fecharegistro').val(self.fecharegistro)

                \$('#estadoaccion ').val(self.estadoaccion)
                \$('#estadoaccion ').selectpicker('render')

                \$('#fkhallazgo').val(self.fkhallazgo.id)
                \$('#fkhallazgo').selectpicker('render')

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    function verifacc_rep() {
        \$('.eficrep').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_rep(\"/accion_verif\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(response);
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ordinal': \$('#ordinal').val(),
            'descripcion': \$('#descripcion').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'responsableimplementacion': \$('#responsableimplementacion').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'hallazgo': \$('#fkhallazgo').val(),
            'estadoaccion': \$('#estadoaccion ').val()
        })
      ajax_call_validation(\"/accion_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accion_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()
        verifacc_rep()

        let message= ''
        function accion_previous(id) {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/accion_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            accion_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Desea dar de baja los datos de la acción?\" 
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
                    ajax_call(\"/accion_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1500
            )
        })
    </script>
    <script>
    function format (d) {
        return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Responsable de Implementación:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Estado:</td>'+
                '<td>'+d[7]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable de Registro:</td>'+
                '<td>'+d[8]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de Registro:</td>'+
                '<td>'+d[9]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        table = \$('#data_tabletr').DataTable();
        \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'a'+row.data()[1];
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

{% endblock %}", "accion/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\accion\\index.html.twig");
    }
}
