<?php

/* organigramagerencia/index.html.twig */
class __TwigTemplate_2c7dc4ec17d0cee5cc034736e842408a2c1704025b61417f1c38ac2332f8dcdd extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "organigramagerencia/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "organigramagerencia/index.html.twig"));

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
        main_route = '/organigramagerencia'

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

    // line 23
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 24
        echo "
    ";
        // line 25
        echo twig_include($this->env, $context, "organigramagerencia/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>ORGANIGRAMA POR GERENCIA</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 31
        if (twig_in_filter("organigramagerencia_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 31, $this->source); })()))) {
            // line 32
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 36
        echo "            </div>
        </div>
        ";
        // line 38
        if ((twig_in_filter("home_organigramagerencia", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 38, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 38, $this->source); })()))) {
            // line 39
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Ruta </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 50
            echo twig_include($this->env, $context, "organigramagerencia/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 56
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 58
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 60
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 61
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#organigrama_gerencia_id').hide()
        \$(\"#organigrama_gerencia_id\" ).siblings().hide()
        \$('#organigrama_gerencia_id').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()

        document.getElementById(\"organigrama_gerencia_submit\").innerHTML= \"Guardar\"
        \$('#organigrama_gerencia_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#organigrama_gerencia_ruta\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {

            \$('#organigrama_gerencia_id').val('')
            \$('#organigrama_gerencia_id').show()
            \$( \"#organigrama_gerencia_id\" ).siblings().show()
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/organigramagerencia_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                \$('#organigrama_gerencia_id').val(self.id)
                document.getElementById('organigrama_gerencia_nombre').value = self.nombre

                if(self.ruta != 'N/A') {
                    \$('#lnkva').remove();

                    let urlfile = self.ruta;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#organigrama_gerencia_ruta\");
                }
                else \$('#lnkva').hide();
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"organigrama_gerencia_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ruta': \$('#ruta').val(),
            'nombre': \$('#nombre').val()
        })
        ajax_call(\"/organigramagerencia_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el organigrama?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/organigramagerencia_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 500);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "organigramagerencia/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 61,  138 => 60,  130 => 58,  126 => 56,  117 => 50,  104 => 39,  102 => 38,  98 => 36,  92 => 32,  90 => 31,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/organigramagerencia'

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

    {{ include('organigramagerencia/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>ORGANIGRAMA POR GERENCIA</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'organigramagerencia_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_organigramagerencia' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Ruta </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('organigramagerencia/table.html.twig') }}
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

    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#organigrama_gerencia_id').hide()
        \$(\"#organigrama_gerencia_id\" ).siblings().hide()
        \$('#organigrama_gerencia_id').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()

        document.getElementById(\"organigrama_gerencia_submit\").innerHTML= \"Guardar\"
        \$('#organigrama_gerencia_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#organigrama_gerencia_ruta\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {

            \$('#organigrama_gerencia_id').val('')
            \$('#organigrama_gerencia_id').show()
            \$( \"#organigrama_gerencia_id\" ).siblings().show()
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/organigramagerencia_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)
                \$('#organigrama_gerencia_id').val(self.id)
                document.getElementById('organigrama_gerencia_nombre').value = self.nombre

                if(self.ruta != 'N/A') {
                    \$('#lnkva').remove();

                    let urlfile = self.ruta;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#organigrama_gerencia_ruta\");
                }
                else \$('#lnkva').hide();
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"organigrama_gerencia_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ruta': \$('#ruta').val(),
            'nombre': \$('#nombre').val()
        })
        ajax_call(\"/organigramagerencia_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el organigrama?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/organigramagerencia_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 500);S})
            })
        })
    </script>

{% endblock %}", "organigramagerencia/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\organigramagerencia\\index.html.twig");
    }
}
