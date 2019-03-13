<?php

/* docprocesorev/index.html.twig */
class __TwigTemplate_7c80e19018d39643bddf6739230ab61ea11448aea6f11c67c4cb1e1dc700cf45 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "docprocesorev/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "docprocesorev/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<style>
    .accion{ 
        cursor:pointer 
    }
    .swal2-title{
        font-size: 16px !important;
    }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/docprocesorev'

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

    // line 26
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 27
        echo "
";
        // line 28
        echo twig_include($this->env, $context, "docprocesorev/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>DOCUMENTO EN REVISIÓN</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 34
        if (twig_in_filter("docprocesorev_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 34, $this->source); })()))) {
            // line 35
            echo "            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
            ";
            // line 38
            if ((isset($context["docderiv"]) || array_key_exists("docderiv", $context) ? $context["docderiv"] : (function () { throw new Twig_Error_Runtime('Variable "docderiv" does not exist.', 38, $this->source); })())) {
                // line 39
                echo "            <button id=\"apb\" type=\"button\" class=\"btn bg-teal waves-effect\" title=\"Documentos derivados\">
                <i class=\"material-icons\">folder</i>
            </button>
            ";
            }
            // line 43
            echo "        ";
        }
        // line 44
        echo "        </div>
    </div>
    ";
        // line 46
        if ((twig_in_filter("home_docprocesorev", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 46, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 46, $this->source); })()))) {
            // line 47
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Firma </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado documento </th>
                    <th class=\"order_by_th\" data-name=\"names\">Documento en proceso </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 61
            echo twig_include($this->env, $context, "docprocesorev/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 67
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 69
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 71
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 72
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
<script src=\"resources/plugins/tinymce/tinymce.js\"></script>

<script>
    var derivar = false;
    var aprobar = false;
    var rechazar = false;
    var idrev = 0;
    \$('#fkdoc').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo documento.',
        title: 'Seleccione un documento.'
    })
 
    \$('#estadodoc').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#responsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar responsable.',
        title: 'Seleccione un responsable.'
    })

    \$('#dresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar responsable.',
        title: 'Seleccione un responsable.'
    })

    \$('#new').click(function () {
        \$('#firma').val('Por revisar');
        
        clean_form();
        verif_inputs();
        \$('#id_div').hide();
        \$('#insert').show();
        \$('#update').hide();
        \$('#form').modal('show');
    })

    \$('#apb').click(function () {
        \$('#form-rev').modal('show');
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'firma': \$(\"#firma\").val(),
            'estadodoc': \$(\"#estadodoc\").val(),
            'fkdocs': \$(\"#fkdoc\").val()
        });
        ajax_call_validation(\"/docprocesorev_insertar\", {object: objeto}, null, main_route)
    })

    \$('#confirm').click(function () {
        objeto = JSON.stringify({
            'password': \$('#clave').val()
        });
        \$.ajax({
            method: \"POST\",
            url: \"/valid_action\",
            data: {object : objeto},
            async: false,
            beforeSend: function () {
                \$(\".plan-icon-load\").css('display', 'inline-block');
            },
            success: function (data, textStatus) {
                \$(\".plan-icon-load\").css('display', 'none');
            }
        }).done(function (response) {
            let message = \"\";
            if(response == \"vacio\"){
                message = 'Por favor ingrese su password.'; 
                document.getElementById('msgv').innerHTML = message;
                \$(\"#msgv\").show();
                setTimeout(function(){ \$(\"#msgv\").fadeOut() }, 1000);
            }
            if(response == \"error\"){ 
                message = 'Datos invalidos, intente de nuevo.';
                document.getElementById('msgv').innerHTML = message;
                \$(\"#msgv\").show();
                setTimeout(function(){ 
                        \$(\"#msgv\").fadeOut();
                        \$('#clave').val(''); 
                    }
                , 3000);
            }
            if(response == \"exitoso\"){
                if(derivar){ 
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': \$('#dresponsable').val(),
                        'firma': 'DERIVADO',
                        'estadodoc': 'DERIVADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_derivar\", {object: objeto}, null, main_route)
                }
                if(aprobar){
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': null,
                        'firma': 'APROBADO',
                        'estadodoc': 'APROBADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_aprorec\", {object: objeto}, null, main_route)
                }
                if(rechazar){ 
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': null,
                        'firma': 'RECHAZADO',
                        'estadodoc': 'RECHAZADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_aprorec\", {object: objeto}, null, main_route)
                }
                \$('#form-valid').hide();
                \$('#form-rev').hide();
                \$('#form-valid').modal('hide');
                \$('#form-rev').modal('hide');
            }
        });
    })

    function derivar_doc() {
        \$('.drdoc').click(function () {
            derivar = true;
            aprobar = false;
            rechazar = false;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')));
            vrep = \$('#dresponsable').val();
            //console.log(vrep);
            if(vrep == \"\") alert('Por favor, seleccione un responsable.');
            else \$('#form-valid').modal('show');
        });
    }

    function aprobar_doc() {
        \$('.apdoc').click(function () {
            derivar = false;
            aprobar = true;
            rechazar = false;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')))
            \$('#msgv').modal('hide')
            \$('#form-valid').modal('show')
        });
    }

    function rechazar_doc() {
        \$('.rcdoc').click(function () {
            derivar = false;
            aprobar = false;
            rechazar = true;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')))
            \$('#form-valid').modal('show')
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/docprocesorev_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fecha').val(self.fecha)
                \$('#firma').val(self.firma)

                \$('#responsable').val(self.responsable)
                \$('#responsable').selectpicker('render')

                \$('#estadodoc').val(self.estadodoc)
                \$('#estadodoc').selectpicker('render')

                \$('#fkdoc').val(self.fkdoc.id)
                \$('#fkdoc').selectpicker('render')
           
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
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'firma': \$('#firma').val(),
            'estadodoc': \$('#estadodoc').val(),
            'fkdocs': \$('#fkdoc').val()
        })
        ajax_call_validation(\"/docprocesorev_actualizar\", {object: objeto}, null, main_route)
    })
    reload_form()
</script>
<script>
    attach_edit()
    derivar_doc()
    aprobar_doc()
    rechazar_doc()

    let message= ''
    function docrev_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/docrev_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        docrev_prev(id)

        setTimeout(function(){
            let quest = message
            enabled = false

            if((quest.split(\" \").length) > 8){
                swal({
                    title: quest,
                    type: \"warning\",
                    showConfirmButton: false,
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {

                })
            }else{
                swal({
                    title: quest,
                    type: \"warning\",
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    ajax_call(\"/docprocesorev_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
            }

            }, 1500
        )
    })
</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "docprocesorev/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 72,  154 => 71,  146 => 69,  142 => 67,  133 => 61,  117 => 47,  115 => 46,  111 => 44,  108 => 43,  102 => 39,  100 => 38,  95 => 35,  93 => 34,  84 => 28,  81 => 27,  75 => 26,  46 => 3,  40 => 2,  15 => 1,);
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
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/docprocesorev'

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

{{ include('docprocesorev/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>DOCUMENTO EN REVISIÓN</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'docprocesorev_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
            {% if docderiv %}
            <button id=\"apb\" type=\"button\" class=\"btn bg-teal waves-effect\" title=\"Documentos derivados\">
                <i class=\"material-icons\">folder</i>
            </button>
            {% endif %}
        {% endif %}
        </div>
    </div>
    {% if 'home_docprocesorev' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Responsable </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Firma </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Estado documento </th>
                    <th class=\"order_by_th\" data-name=\"names\">Documento en proceso </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('docprocesorev/table.html.twig') }}
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
<script src=\"resources/plugins/tinymce/tinymce.js\"></script>

<script>
    var derivar = false;
    var aprobar = false;
    var rechazar = false;
    var idrev = 0;
    \$('#fkdoc').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo documento.',
        title: 'Seleccione un documento.'
    })
 
    \$('#estadodoc').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#responsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar responsable.',
        title: 'Seleccione un responsable.'
    })

    \$('#dresponsable').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar responsable.',
        title: 'Seleccione un responsable.'
    })

    \$('#new').click(function () {
        \$('#firma').val('Por revisar');
        
        clean_form();
        verif_inputs();
        \$('#id_div').hide();
        \$('#insert').show();
        \$('#update').hide();
        \$('#form').modal('show');
    })

    \$('#apb').click(function () {
        \$('#form-rev').modal('show');
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'firma': \$(\"#firma\").val(),
            'estadodoc': \$(\"#estadodoc\").val(),
            'fkdocs': \$(\"#fkdoc\").val()
        });
        ajax_call_validation(\"/docprocesorev_insertar\", {object: objeto}, null, main_route)
    })

    \$('#confirm').click(function () {
        objeto = JSON.stringify({
            'password': \$('#clave').val()
        });
        \$.ajax({
            method: \"POST\",
            url: \"/valid_action\",
            data: {object : objeto},
            async: false,
            beforeSend: function () {
                \$(\".plan-icon-load\").css('display', 'inline-block');
            },
            success: function (data, textStatus) {
                \$(\".plan-icon-load\").css('display', 'none');
            }
        }).done(function (response) {
            let message = \"\";
            if(response == \"vacio\"){
                message = 'Por favor ingrese su password.'; 
                document.getElementById('msgv').innerHTML = message;
                \$(\"#msgv\").show();
                setTimeout(function(){ \$(\"#msgv\").fadeOut() }, 1000);
            }
            if(response == \"error\"){ 
                message = 'Datos invalidos, intente de nuevo.';
                document.getElementById('msgv').innerHTML = message;
                \$(\"#msgv\").show();
                setTimeout(function(){ 
                        \$(\"#msgv\").fadeOut();
                        \$('#clave').val(''); 
                    }
                , 3000);
            }
            if(response == \"exitoso\"){
                if(derivar){ 
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': \$('#dresponsable').val(),
                        'firma': 'DERIVADO',
                        'estadodoc': 'DERIVADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_derivar\", {object: objeto}, null, main_route)
                }
                if(aprobar){
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': null,
                        'firma': 'APROBADO',
                        'estadodoc': 'APROBADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_aprorec\", {object: objeto}, null, main_route)
                }
                if(rechazar){ 
                    objeto = JSON.stringify({
                        'id': idrev,
                        'fecha': null,
                        'responsable': null,
                        'firma': 'RECHAZADO',
                        'estadodoc': 'RECHAZADO',
                        'fkdocs': null
                    });
                    ajax_call_validation(\"/docprocesorev_aprorec\", {object: objeto}, null, main_route)
                }
                \$('#form-valid').hide();
                \$('#form-rev').hide();
                \$('#form-valid').modal('hide');
                \$('#form-rev').modal('hide');
            }
        });
    })

    function derivar_doc() {
        \$('.drdoc').click(function () {
            derivar = true;
            aprobar = false;
            rechazar = false;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')));
            vrep = \$('#dresponsable').val();
            //console.log(vrep);
            if(vrep == \"\") alert('Por favor, seleccione un responsable.');
            else \$('#form-valid').modal('show');
        });
    }

    function aprobar_doc() {
        \$('.apdoc').click(function () {
            derivar = false;
            aprobar = true;
            rechazar = false;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')))
            \$('#msgv').modal('hide')
            \$('#form-valid').modal('show')
        });
    }

    function rechazar_doc() {
        \$('.rcdoc').click(function () {
            derivar = false;
            aprobar = false;
            rechazar = true;
            idrev = parseInt(JSON.parse(\$(this).attr('data-json')))
            \$('#form-valid').modal('show')
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/docprocesorev_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#fecha').val(self.fecha)
                \$('#firma').val(self.firma)

                \$('#responsable').val(self.responsable)
                \$('#responsable').selectpicker('render')

                \$('#estadodoc').val(self.estadodoc)
                \$('#estadodoc').selectpicker('render')

                \$('#fkdoc').val(self.fkdoc.id)
                \$('#fkdoc').selectpicker('render')
           
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
            'fecha': \$('#fecha').val(),
            'responsable': \$('#responsable').val(),
            'firma': \$('#firma').val(),
            'estadodoc': \$('#estadodoc').val(),
            'fkdocs': \$('#fkdoc').val()
        })
        ajax_call_validation(\"/docprocesorev_actualizar\", {object: objeto}, null, main_route)
    })
    reload_form()
</script>
<script>
    attach_edit()
    derivar_doc()
    aprobar_doc()
    rechazar_doc()

    let message= ''
    function docrev_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/docrev_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        docrev_prev(id)

        setTimeout(function(){
            let quest = message
            enabled = false

            if((quest.split(\" \").length) > 8){
                swal({
                    title: quest,
                    type: \"warning\",
                    showConfirmButton: false,
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {

                })
            }else{
                swal({
                    title: quest,
                    type: \"warning\",
                    showCancelButton: true,
                    confirmButtonColor: \"#004c99\",
                    cancelButtonColor: \"#F44336\",
                    confirmButtonText: \"Aceptar\",
                    cancelButtonText: \"Cancelar\"
                }).then(function () {
                    ajax_call(\"/docprocesorev_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
            }

            }, 1500
        )
    })
</script>

{% endblock %}", "docprocesorev/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\docprocesorev\\index.html.twig");
    }
}
