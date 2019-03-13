<?php

/* files/index.html.twig */
class __TwigTemplate_145d0d8bc2a5849b06cfc60fe21efbbcb680bbfa76a0c6cba29b9e6a85281599 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "files/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "files/index.html.twig"));

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
        main_route = '/files'

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
        echo twig_include($this->env, $context, "files/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>File</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 31
        if (twig_in_filter("file_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 31, $this->source); })()))) {
            // line 32
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 36
        echo "            </div>
        </div>
        ";
        // line 38
        if ((twig_in_filter("home_file", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 38, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 38, $this->source); })()))) {
            // line 39
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Ruta </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Galería </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 51
            echo twig_include($this->env, $context, "files/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 57
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 59
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 61
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 62
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    function init(){
        var rutas = document.getElementsByClassName('ruta');
        //console.log(rutas.length)
        for (let i = 0; i < rutas.length; i++) {
            var ruta = rutas[i];
            var src = ruta.getAttribute('src');
            //console.log(src+\"\")
            var rutaCortada = src.split('public')
            //console.log(rutaCortada[1])
            rutas[i].setAttribute('src',rutaCortada[1]+\"\");
        }
    };

    \$('#files_galeria').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de galería.',
        title: 'Seleccione un tipo de galería.'
    })

    \$('#files_tipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#new').click(function () {
        \$('#files_id').hide()
        \$( \"#files_id\" ).siblings().hide()
        \$('#files_id').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
        document.getElementById(\"files_submit\").innerHTML= \"Guardar\"
        \$('#files_id').val(0)
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'ruta': \$('#ruta').val(),
            'tipo': \$('#tipo').val(),
            'galeria': \$('#galeria').val()
        })
        ajax_call(\"/file\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {

            \$('#files_id').val('')
            \$('#files_id').show()
            \$( \"#files_id\" ).siblings().show()
            //\$('#files_id').attr('disabled', 'disabled')
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/files_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)  
                console.log(self)
                
                \$('#files_id').val(self.id)
                //\$('#files_ruta').val(self.ruta)
                document.getElementById('files_ruta').filename = self.ruta
                document.getElementById('files_tipo').value = self.tipo
                //\$('#files_tipo').val(self.tipo)
                \$('#files_tipo').selectpicker('render')
                
                //\$('#files_galeria').val(self.fkgaleria.id)
                document.getElementById('files_fkgaleria').value = self.fkgaleria.id
                \$('#files_fkgaleria').selectpicker('render')
            })
            clean_form()
            verif_inputs()
            \$('#id_div').hide()
            \$('#insert').show()
            \$('#update').hide()
            \$('#form').modal('show')
            setTimeout(function(){\$('#form').modal('show')}, 1000);
            document.getElementById(\"files_submit\").innerHTML = \"Modificar\"
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ruta': \$('#ruta').val(),
            'tipo': \$('#files_tipo').val(),
            'galeria': \$('#files_fkgaleria').val()
        })
        ajax_call(\"/files_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el file?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/files_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "files/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 62,  139 => 61,  131 => 59,  127 => 57,  118 => 51,  104 => 39,  102 => 38,  98 => 36,  92 => 32,  90 => 31,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
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
        main_route = '/files'

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

    {{ include('files/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>File</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'file_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}
            </div>
        </div>
        {% if 'home_file' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"names\">Ruta </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Galería </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('files/table.html.twig') }}
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

    function init(){
        var rutas = document.getElementsByClassName('ruta');
        //console.log(rutas.length)
        for (let i = 0; i < rutas.length; i++) {
            var ruta = rutas[i];
            var src = ruta.getAttribute('src');
            //console.log(src+\"\")
            var rutaCortada = src.split('public')
            //console.log(rutaCortada[1])
            rutas[i].setAttribute('src',rutaCortada[1]+\"\");
        }
    };

    \$('#files_galeria').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de galería.',
        title: 'Seleccione un tipo de galería.'
    })

    \$('#files_tipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#new').click(function () {
        \$('#files_id').hide()
        \$( \"#files_id\" ).siblings().hide()
        \$('#files_id').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
        document.getElementById(\"files_submit\").innerHTML= \"Guardar\"
        \$('#files_id').val(0)
    })

    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'ruta': \$('#ruta').val(),
            'tipo': \$('#tipo').val(),
            'galeria': \$('#galeria').val()
        })
        ajax_call(\"/file\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {

            \$('#files_id').val('')
            \$('#files_id').show()
            \$( \"#files_id\" ).siblings().show()
            //\$('#files_id').attr('disabled', 'disabled')
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/files_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)  
                console.log(self)
                
                \$('#files_id').val(self.id)
                //\$('#files_ruta').val(self.ruta)
                document.getElementById('files_ruta').filename = self.ruta
                document.getElementById('files_tipo').value = self.tipo
                //\$('#files_tipo').val(self.tipo)
                \$('#files_tipo').selectpicker('render')
                
                //\$('#files_galeria').val(self.fkgaleria.id)
                document.getElementById('files_fkgaleria').value = self.fkgaleria.id
                \$('#files_fkgaleria').selectpicker('render')
            })
            clean_form()
            verif_inputs()
            \$('#id_div').hide()
            \$('#insert').show()
            \$('#update').hide()
            \$('#form').modal('show')
            setTimeout(function(){\$('#form').modal('show')}, 1000);
            document.getElementById(\"files_submit\").innerHTML = \"Modificar\"
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'ruta': \$('#ruta').val(),
            'tipo': \$('#files_tipo').val(),
            'galeria': \$('#files_fkgaleria').val()
        })
        ajax_call(\"/files_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        
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
                title: \"¿Desea dar de baja el file?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/files_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "files/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\files\\index.html.twig");
    }
}
