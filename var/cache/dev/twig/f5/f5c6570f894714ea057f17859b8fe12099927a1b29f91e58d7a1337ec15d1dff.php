<?php

/* documentobaja/index.html.twig */
class __TwigTemplate_baeb67d4dc61f87c56b6126174b2635e64b512ead57538626009be8a43fd5005 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "documentobaja/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentobaja/index.html.twig"));

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
        main_route = '/bajadocumento'

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
        echo twig_include($this->env, $context, "documentobaja/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>DOCUMENTO DE BAJA</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("bajadocumento_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
            // line 31
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
            ";
        }
        // line 36
        echo "        </div>
        ";
        // line 37
        if ((twig_in_filter("home_bajadocumento", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Titulo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha publicación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Aprobado por </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vínculo del archivo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 56
            echo twig_include($this->env, $context, "documentobaja/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 62
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 64
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 67
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    \$('#documento_baja_fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar proceso.',
        title: 'Seleccione un proceso.'
    })
    
    \$('#documento_baja_fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo de tipo.'
    })
    
    \$('#documento_baja_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })
    
    \$('#documento_baja_versionvigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })
    
    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#documento_baja_id').hide()
        \$(\"#documento_baja_id\").siblings().hide()
        
        \$('#documento_baja_codigo').val('')
        \$('#documento_baja_titulo').val('')
        \$('#documento_baja_versionvigente').val('')
        \$('#documento_baja_fechapublicacion').val('')
        \$('#documento_baja_carpetaoperativa').val('')
        \$('#documento_baja_vinculoarchivo').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()

        document.getElementById(\"documento_baja_submit\").innerHTML= \"Guardar\"
        \$('#documento_baja_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_baja_vinculoarchivo\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/bajadocumento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)   
                            
                \$('#documento_baja_id').val(self.id)
                \$('#documento_baja_codigo').val(self.codigo)
                \$('#documento_baja_titulo').val(self.titulo)
                \$('#documento_baja_versionvigente').val(self.versionvigente)
                \$('#documento_baja_fechapublicacion').val(self.fechapublicacion)
                \$('#documento_baja_carpetaoperativa').val(self.carpetaoperativa)

                \$('#documento_baja_fkproceso').val(self.fkproceso.id)
                \$('#documento_baja_fkproceso').selectpicker('render')

                \$('#documento_baja_fktipo').val(self.fktipo.id)
                \$('#documento_baja_fktipo').selectpicker('render')

                \$('#documento_baja_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_baja_fkaprobador').selectpicker('render')

                \$('#documento_baja_versionvigente').val(self.versionvigente)
                \$('#documento_baja_versionvigente').selectpicker('render')

                if(self.vinculoarchivo != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoarchivo;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_baja_vinculoarchivo\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"documento_baja_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    reload_form()
    </script>
    <script>
        attach_edit()
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el documento?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/bajadocumento_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "documentobaja/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 67,  144 => 66,  136 => 64,  132 => 62,  123 => 56,  103 => 38,  101 => 37,  98 => 36,  91 => 31,  89 => 30,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/bajadocumento'

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

    {{ include('documentobaja/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>DOCUMENTO DE BAJA</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'bajadocumento_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
            {% endif %}
        </div>
        {% if 'home_bajadocumento' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Código </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ficha </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Titulo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha publicación </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Aprobado por </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Vínculo del archivo </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('documentobaja/table.html.twig') }}
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
    \$('#documento_baja_fkficha').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar proceso.',
        title: 'Seleccione un proceso.'
    })
    
    \$('#documento_baja_fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo de tipo.'
    })
    
    \$('#documento_baja_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })
    
    \$('#documento_baja_versionvigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })
    
    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#documento_baja_id').hide()
        \$(\"#documento_baja_id\").siblings().hide()
        
        \$('#documento_baja_codigo').val('')
        \$('#documento_baja_titulo').val('')
        \$('#documento_baja_versionvigente').val('')
        \$('#documento_baja_fechapublicacion').val('')
        \$('#documento_baja_carpetaoperativa').val('')
        \$('#documento_baja_vinculoarchivo').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()

        document.getElementById(\"documento_baja_submit\").innerHTML= \"Guardar\"
        \$('#documento_baja_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_baja_vinculoarchivo\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/bajadocumento_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)   
                            
                \$('#documento_baja_id').val(self.id)
                \$('#documento_baja_codigo').val(self.codigo)
                \$('#documento_baja_titulo').val(self.titulo)
                \$('#documento_baja_versionvigente').val(self.versionvigente)
                \$('#documento_baja_fechapublicacion').val(self.fechapublicacion)
                \$('#documento_baja_carpetaoperativa').val(self.carpetaoperativa)

                \$('#documento_baja_fkproceso').val(self.fkproceso.id)
                \$('#documento_baja_fkproceso').selectpicker('render')

                \$('#documento_baja_fktipo').val(self.fktipo.id)
                \$('#documento_baja_fktipo').selectpicker('render')

                \$('#documento_baja_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_baja_fkaprobador').selectpicker('render')

                \$('#documento_baja_versionvigente').val(self.versionvigente)
                \$('#documento_baja_versionvigente').selectpicker('render')

                if(self.vinculoarchivo != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoarchivo;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_baja_vinculoarchivo\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"documento_baja_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    reload_form()
    </script>
    <script>
        attach_edit()
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el documento?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/bajadocumento_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "documentobaja/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\documentobaja\\index.html.twig");
    }
}
