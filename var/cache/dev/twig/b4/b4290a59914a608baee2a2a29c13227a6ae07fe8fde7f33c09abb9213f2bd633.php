<?php

/* accionseguimiento/index.html.twig */
class __TwigTemplate_7b10ec43b7888cc4aee0f6b144bd7fcc2d4af60585cea492026c0c078585e72b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "accionseguimiento/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accionseguimiento/index.html.twig"));

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
        main_route = '/accionseguimiento'

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
        echo twig_include($this->env, $context, "accionseguimiento/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>Seguimiento de Acción</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("accionseguimiento_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            // line 31
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 35
        echo "            </div>
        </div>
        ";
        // line 37
        if ((twig_in_filter("home_accionseguimiento", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Observaciones </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 53
            echo twig_include($this->env, $context, "accionseguimiento/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 59
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 61
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 64
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#accion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar acción.',
        title: 'Seleccione una acción.'
    })

    \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#fecha').val('')
        \$('#responsable').val('')
        \$('#observaciones').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        /*if(!validate_fields(['titulo', 'descripcion', 'nivelimpacto', 'probabilidad'])){
            return
        }*/
        objeto = JSON.stringify({
            'ordinal': \$('#ordinal').val(),
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'observaciones': \$('#observaciones').val(),

            'accion': \$('#accion').val(),
            'estadoseguimiento': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/accionseguimiento_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accionseguimiento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#fecha').val(self.fecha)
                \$('#responsable').val(self.responsable)
                \$('#observaciones').val(self.observaciones)

                \$('#estado').val(self.estadoseguimiento)
                \$('#estado').selectpicker('render')

                \$('#accion').val(self.fkaccion.id)
                \$('#accion').selectpicker('render')

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
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'observaciones': \$('#observaciones').val(),

            'accion': \$('#accion').val(),
            'estadoseguimiento': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/accionseguimiento_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
        \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el seguimiento de la acción?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/accionseguimiento_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accionseguimiento/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 64,  141 => 63,  133 => 61,  129 => 59,  120 => 53,  103 => 38,  101 => 37,  97 => 35,  91 => 31,  89 => 30,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/accionseguimiento'

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

    {{ include('accionseguimiento/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>Seguimiento de Acción</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'accionseguimiento_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_accionseguimiento' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Acción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Observaciones </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('accionseguimiento/table.html.twig') }}
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

    \$('#accion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar acción.',
        title: 'Seleccione una acción.'
    })

    \$('#estado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })

    \$('#new').click(function () {
        \$('#ordinal').val('')
        \$('#fecha').val('')
        \$('#responsable').val('')
        \$('#observaciones').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        /*if(!validate_fields(['titulo', 'descripcion', 'nivelimpacto', 'probabilidad'])){
            return
        }*/
        objeto = JSON.stringify({
            'ordinal': \$('#ordinal').val(),
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'observaciones': \$('#observaciones').val(),

            'accion': \$('#accion').val(),
            'estadoseguimiento': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/accionseguimiento_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accionseguimiento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#ordinal').val(self.ordinal)
                \$('#fecha').val(self.fecha)
                \$('#responsable').val(self.responsable)
                \$('#observaciones').val(self.observaciones)

                \$('#estado').val(self.estadoseguimiento)
                \$('#estado').selectpicker('render')

                \$('#accion').val(self.fkaccion.id)
                \$('#accion').selectpicker('render')

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
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'observaciones': \$('#observaciones').val(),

            'accion': \$('#accion').val(),
            'estadoseguimiento': \$('#estado').val()
        })
        console.log(objeto)
        ajax_call(\"/accionseguimiento_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
        \$('#form').modal('hide')
    })
    reload_form()
    </script>
    <script>
        attach_edit()

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el seguimiento de la acción?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/accionseguimiento_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "accionseguimiento/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\accionseguimiento\\index.html.twig");
    }
}