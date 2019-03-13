<?php

/* hallazgo/index.html.twig */
class __TwigTemplate_b7a08bd52fb6f8b6268e1424a73f6b14153fb2d8dce6605913426be03b1fb59f extends Twig_Template
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
       #fkprobabilidadaccion{ cursor:pointer }
    </style>
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

    // line 22
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 23
        echo "
    ";
        // line 24
        echo twig_include($this->env, $context, "hallazgo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>HALLAZGO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"#fkprobabilidadxs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 30
        if (twig_in_filter("hallazgo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 30, $this->source); })()))) {
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
        if ((twig_in_filter("home_hallazgo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 37, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 37, $this->source); })()))) {
            // line 38
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Auditoría </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Hallazgo</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"order_by_th\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Evidencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Punto ISO </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nivel de Impacto </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Análisis Causa Raíz </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Recomendaciones </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Cargo del Auditado </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre del Auditado </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Registro </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 63
            echo twig_include($this->env, $context, "hallazgo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
#fkprobabilidad#fkprobabilidad
        ";
        } else {
            // line 69
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 71
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 73
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 74
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

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el hallazgo?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/hallazgo_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
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
        return array (  157 => 74,  151 => 73,  143 => 71,  139 => 69,  130 => 63,  103 => 38,  101 => 37,  97 => 35,  91 => 31,  89 => 30,  80 => 24,  77 => 23,  71 => 22,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <style>
       #fkprobabilidadaccion{ cursor:pointer }
    </style>
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
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
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
                            <th class=\"order_by_th\" data-name=\"phone\">Auditoría </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo de Hallazgo</th>
                            <th class=\"order_by_th\" data-name=\"phone\">Ordinal </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"order_by_th\" data-name=\"names\">Descripción </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Evidencia </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Punto ISO </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nivel de Impacto </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Probabilidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Análisis Causa Raíz </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Recomendaciones </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Cargo del Auditado </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre del Auditado </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha de Registro </th>
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

        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja el hallazgo?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/hallazgo_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })
    </script>

{% endblock %}", "hallazgo/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\hallazgo\\index.html.twig");
    }
}
