<?php

/* indicadorproceso/index.html.twig */
class __TwigTemplate_a0a7400724ad0cd8edb079f03f7fc03e1ffc6505b0a0dd971735baefa65178de extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "indicadorproceso/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "indicadorproceso/index.html.twig"));

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
        main_route = '/indicadorproceso'

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
        echo twig_include($this->env, $context, "indicadorproceso/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>INDICADOR DE PROCESO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("indicadorproceso_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
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
        if ((twig_in_filter("home_indicadorproceso", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fórmula </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Unidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Meta anual </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Meta Mensual </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Codigo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Objetivo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable</th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 57
            echo twig_include($this->env, $context, "indicadorproceso/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 63
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 65
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 67
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 68
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    })
      \$('#fkunidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de unidad.',
        title: 'Seleccione un tipo de unidad.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de responsable.',
        title: 'Seleccione un tipo de responsable.'
    })
    
    \$('#new').click(function () {
        \$('#descripcion').val('')
        \$('#formula').val('')
        \$('#metaanual').val('')
        \$('#metamensual').val('')
        \$('#codigo').val('')
        \$('#objetivo').val('')
        \$('#vigente').val('')

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
            'formula': \$('#formula').val(),
            'metaanual': \$('#metaanual').val(),
            'metamensual': \$('#metamensual').val(),
            'codigo': \$('#codigo').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'ficha': \$('#fkficha').val(),
            'unidad': \$('#fkunidad').val(),
            'responsable': \$('#fkresponsable').val()
        })
        ajax_call_validation(\"/indicadorproceso_insertar\", {object: objeto}, null,  main_route)
        // ajax_call(\"/indicadorproceso_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/indicadorproceso_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#descripcion').val(self.descripcion)
                \$('#formula').val(self.formula)
                \$('#metaanual').val(self.metaanual)
                \$('#metamensual').val(self.metamensual)
                \$('#codigo').val(self.codigo)
                \$('#objetivo').val(self.objetivo)
                \$('#vigente').val(self.vigente)


                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')

                \$('#fkunidad').val(self.fkunidad.id)
                \$('#fkunidad').selectpicker('render')

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
             'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'formula': \$('#formula').val(),
            'metaanual': \$('#metaanual').val(),
            'metamensual': \$('#metamensual').val(),
            'codigo': \$('#codigo').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),


            'ficha': \$('#fkficha').val(),
            'unidad': \$('#fkunidad').val(),
            'responsable': \$('#fkresponsable').val()
        })
        ajax_call_validation(\"/indicadorproceso_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/indicadorproceso_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
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
                title: \"¿Desea dar de baja el indicador de proceso?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/indicadorproceso_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "indicadorproceso/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 68,  145 => 67,  137 => 65,  133 => 63,  124 => 57,  103 => 38,  101 => 37,  97 => 35,  91 => 31,  89 => 30,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/indicadorproceso'

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

    {{ include('indicadorproceso/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>INDICADOR DE PROCESO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'indicadorproceso_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_indicadorproceso' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fórmula </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Unidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Meta anual </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Meta Mensual </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Codigo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Objetivo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vigente </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable</th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('indicadorproceso/table.html.twig') }}
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

    \$('#fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de ficha.',
        title: 'Seleccione un tipo de ficha.'
    })
      \$('#fkunidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de unidad.',
        title: 'Seleccione un tipo de unidad.'
    })
      \$('#fkresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de responsable.',
        title: 'Seleccione un tipo de responsable.'
    })
    
    \$('#new').click(function () {
        \$('#descripcion').val('')
        \$('#formula').val('')
        \$('#metaanual').val('')
        \$('#metamensual').val('')
        \$('#codigo').val('')
        \$('#objetivo').val('')
        \$('#vigente').val('')

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
            'formula': \$('#formula').val(),
            'metaanual': \$('#metaanual').val(),
            'metamensual': \$('#metamensual').val(),
            'codigo': \$('#codigo').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),
            'ficha': \$('#fkficha').val(),
            'unidad': \$('#fkunidad').val(),
            'responsable': \$('#fkresponsable').val()
        })
        ajax_call_validation(\"/indicadorproceso_insertar\", {object: objeto}, null,  main_route)
        // ajax_call(\"/indicadorproceso_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/indicadorproceso_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#id').val(self.id)
                \$('#descripcion').val(self.descripcion)
                \$('#formula').val(self.formula)
                \$('#metaanual').val(self.metaanual)
                \$('#metamensual').val(self.metamensual)
                \$('#codigo').val(self.codigo)
                \$('#objetivo').val(self.objetivo)
                \$('#vigente').val(self.vigente)


                \$('#fkficha').val(self.fkficha.id)
                \$('#fkficha').selectpicker('render')

                \$('#fkunidad').val(self.fkunidad.id)
                \$('#fkunidad').selectpicker('render')

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
             'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'formula': \$('#formula').val(),
            'metaanual': \$('#metaanual').val(),
            'metamensual': \$('#metamensual').val(),
            'codigo': \$('#codigo').val(),
            'objetivo': \$('#objetivo').val(),
            'vigente': \$('#vigente').val(),


            'ficha': \$('#fkficha').val(),
            'unidad': \$('#fkunidad').val(),
            'responsable': \$('#fkresponsable').val()
        })
        ajax_call_validation(\"/indicadorproceso_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/indicadorproceso_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        //
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
                title: \"¿Desea dar de baja el indicador de proceso?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/indicadorproceso_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "indicadorproceso/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\indicadorproceso\\index.html.twig");
    }
}