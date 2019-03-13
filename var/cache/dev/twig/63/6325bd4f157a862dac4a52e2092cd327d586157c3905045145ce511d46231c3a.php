<?php

/* accionreprograma/index.html.twig */
class __TwigTemplate_1668b839c322cd99f28417db9e232c43829f378c7683dd3463a1e34bcda438b0 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "accionreprograma/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accionreprograma/index.html.twig"));

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
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/accionreprograma'

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

    // line 22
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 23
        echo "
    ";
        // line 24
        echo twig_include($this->env, $context, "accionreprograma/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>REPROGRAMA DE LA ACCIÓN</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("accionreprograma_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            // line 31
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 35
        echo "            </div>
        </div>
        ";
        // line 37
        if ((twig_in_filter("home_accionreprograma", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha Anterior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Motivo y Justificación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Autorizador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable de Registro </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 54
            echo twig_include($this->env, $context, "accionreprograma/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 60
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 62
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 65
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#fkaccion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar acción.',
        title: 'Seleccione una acción.'
    })

    \$('#new').click(function () {
        \$('#fechaanterior').val('')
        \$('#fechaimplementacion').val('')
        \$('#motivojustificacion').val('')
        \$('#autoriza').val('')
        \$('#responsableregistro').val('')
        \$('#fecharegistro').val('')
        \$('#fkaccion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'fechaanterior': \$('#fechaanterior').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'motivojustificacion': \$('#motivojustificacion').val(),
            'autoriza': \$('#autoriza').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'accion': \$('#fkaccion').val()
        })
        ajax_call_validation(\"/accionreprograma_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accionreprograma_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function addDate(){
        id = \$('#fkaccion').val()

        obj = JSON.stringify({
                'id': id
            });
            ajax_call_get(\"/dateformat\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#fechaanterior').val(self.fechaimplementacion)
            })
    }

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accionreprograma_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fechaanterior').val(self.fechaanterior)
                \$('#fechaimplementacion').val(self.fechaimplementacion)
                \$('#motivojustificacion').val(self.motivojustificacion)
                \$('#autoriza').val(self.autoriza)
                \$('#responsableregistro').val(self.responsableregistro)
                \$('#fecharegistro').val(self.fecharegistro)
                
                \$('#fkaccion').val(self.fkaccion.id)
                \$('#fkaccion').selectpicker('render')

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
            'fechaanterior': \$('#fechaanterior').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'motivojustificacion': \$('#motivojustificacion').val(),
            'autoriza': \$('#autoriza').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'accion': \$('#fkaccion').val()
        })
        ajax_call_validation(\"/accionreprograma_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accionreprograma_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el reprograma?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/accionreprograma_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accionreprograma/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 65,  142 => 64,  134 => 62,  130 => 60,  121 => 54,  103 => 38,  101 => 37,  97 => 35,  91 => 31,  89 => 30,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/accionreprograma'

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

    {{ include('accionreprograma/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>REPROGRAMA DE LA ACCIÓN</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'accionreprograma_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_accionreprograma' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha Anterior </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Implementación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Motivo y Justificación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Autorizador </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable de Registro </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('accionreprograma/table.html.twig') }}
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

    \$('#fkaccion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar acción.',
        title: 'Seleccione una acción.'
    })

    \$('#new').click(function () {
        \$('#fechaanterior').val('')
        \$('#fechaimplementacion').val('')
        \$('#motivojustificacion').val('')
        \$('#autoriza').val('')
        \$('#responsableregistro').val('')
        \$('#fecharegistro').val('')
        \$('#fkaccion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'fechaanterior': \$('#fechaanterior').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'motivojustificacion': \$('#motivojustificacion').val(),
            'autoriza': \$('#autoriza').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'accion': \$('#fkaccion').val()
        })
        ajax_call_validation(\"/accionreprograma_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accionreprograma_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function addDate(){
        id = \$('#fkaccion').val()

        obj = JSON.stringify({
                'id': id
            });
            ajax_call_get(\"/dateformat\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#fechaanterior').val(self.fechaimplementacion)
            })
    }

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accionreprograma_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fechaanterior').val(self.fechaanterior)
                \$('#fechaimplementacion').val(self.fechaimplementacion)
                \$('#motivojustificacion').val(self.motivojustificacion)
                \$('#autoriza').val(self.autoriza)
                \$('#responsableregistro').val(self.responsableregistro)
                \$('#fecharegistro').val(self.fecharegistro)
                
                \$('#fkaccion').val(self.fkaccion.id)
                \$('#fkaccion').selectpicker('render')

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
            'fechaanterior': \$('#fechaanterior').val(),
            'fechaimplementacion': \$('#fechaimplementacion').val(),
            'motivojustificacion': \$('#motivojustificacion').val(),
            'autoriza': \$('#autoriza').val(),
            'responsableregistro': \$('#responsableregistro').val(),
            'fecharegistro': \$('#fecharegistro').val(),

            'accion': \$('#fkaccion').val()
        })
        ajax_call_validation(\"/accionreprograma_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/accionreprograma_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el reprograma?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/accionreprograma_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "accionreprograma/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\accionreprograma\\index.html.twig");
    }
}
