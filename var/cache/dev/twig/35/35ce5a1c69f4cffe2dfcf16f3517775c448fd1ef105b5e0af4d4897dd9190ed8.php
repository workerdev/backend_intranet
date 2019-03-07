<?php

/* personal/index.html.twig */
class __TwigTemplate_509071c59f8c99dd92066921306efd9ae05b6f92dc8d650b0c1065071ebf8ec1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "personal/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "personal/index.html.twig"));

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
            font-size: 20px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/personal'

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

    // line 27
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 28
        echo "
    ";
        // line 29
        echo twig_include($this->env, $context, "personal/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>PERSONAL</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 35
        if (twig_in_filter("personal_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 35, $this->source); })()))) {
            // line 36
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 40
        echo "            </div>
        </div>
        ";
        // line 42
        if ((twig_in_filter("home_personal", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 42, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 42, $this->source); })()))) {
            // line 43
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Apellido </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ci </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Correo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Teléfono </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Nacimiento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Procesos Cargo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado de Personal </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 60
            echo twig_include($this->env, $context, "personal/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 66
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 68
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 70
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 71
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators() 

    \$('#fkprocesoscargo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de cargo.',
        title: 'Seleccione un tipo de cargo.'
    })
     \$('#fkestadopersonal').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })
    
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#apellido').val('')
        \$('#ci').val('')
        \$('#correo').val('')
        \$('#telefono').val('')
        \$('#fnac').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        var objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'telefono': \$('#telefono').val(),
            'fnac': \$('#fnac').val(),
            'personalcargo': \$('#fkprocesoscargo').val(),
            'estadopersonal': \$('#fkestadopersonal').val()
        })
        ajax_call_validation(\"/personal_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personal_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/personal_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                console.log(self);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#apellido').val(self.apellido)
                \$('#ci').val(self.ci)
                \$('#correo').val(self.correo)
                \$('#telefono').val(self.telefono)

                \$('#fnac').val(self.fnac)

                \$('#fkprocesoscargo').val(self.fkprocesoscargo.id)
                \$('#fkestadopersonal').val(self.fkestadopersonal.id)
                \$('#fkprocesoscargo').selectpicker('render')
                \$('#fkestadopersonal').selectpicker('render')

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
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'telefono': \$('#telefono').val(),
            'fnac': \$('#fnac').val(),
            'personalcargo': \$('#fkprocesoscargo').val(),
            'estadopersonal': \$('#fkestadopersonal').val()
        })
       ajax_call_validation(\"/personal_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personal_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
                title: \"¿Desea dar de baja el personal?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/personal_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "personal/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 71,  148 => 70,  140 => 68,  136 => 66,  127 => 60,  108 => 43,  106 => 42,  102 => 40,  96 => 36,  94 => 35,  85 => 29,  82 => 28,  76 => 27,  46 => 3,  40 => 2,  15 => 1,);
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
            font-size: 20px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/personal'

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

    {{ include('personal/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>PERSONAL</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'personal_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if  'home_personal' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Apellido </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ci </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Correo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Teléfono </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Nacimiento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Procesos Cargo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado de Personal </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('personal/table.html.twig') }}
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

    \$('#fkprocesoscargo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de cargo.',
        title: 'Seleccione un tipo de cargo.'
    })
     \$('#fkestadopersonal').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de estado.',
        title: 'Seleccione un tipo de estado.'
    })
    
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#apellido').val('')
        \$('#ci').val('')
        \$('#correo').val('')
        \$('#telefono').val('')
        \$('#fnac').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    \$('#insert').click(function () {
        var objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'telefono': \$('#telefono').val(),
            'fnac': \$('#fnac').val(),
            'personalcargo': \$('#fkprocesoscargo').val(),
            'estadopersonal': \$('#fkestadopersonal').val()
        })
        ajax_call_validation(\"/personal_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personal_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/personal_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                console.log(self);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#apellido').val(self.apellido)
                \$('#ci').val(self.ci)
                \$('#correo').val(self.correo)
                \$('#telefono').val(self.telefono)

                \$('#fnac').val(self.fnac)

                \$('#fkprocesoscargo').val(self.fkprocesoscargo.id)
                \$('#fkestadopersonal').val(self.fkestadopersonal.id)
                \$('#fkprocesoscargo').selectpicker('render')
                \$('#fkestadopersonal').selectpicker('render')

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
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'telefono': \$('#telefono').val(),
            'fnac': \$('#fnac').val(),
            'personalcargo': \$('#fkprocesoscargo').val(),
            'estadopersonal': \$('#fkestadopersonal').val()
        })
       ajax_call_validation(\"/personal_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/personal_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
                title: \"¿Desea dar de baja el personal?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/personal_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "personal/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\personal\\index.html.twig");
    }
}
