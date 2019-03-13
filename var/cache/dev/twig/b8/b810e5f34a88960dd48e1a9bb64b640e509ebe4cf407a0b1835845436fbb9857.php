<?php

/* documentoproceso/index.html.twig */
class __TwigTemplate_680f5cf13cbb4a73ef44d5fe2b3a91198c88c13219947159f6b670778b551f56 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "documentoproceso/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentoproceso/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <style>
        .accion{ 
            cursor:pointer 
        }
        .swal2-title{
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/documentoproceso'

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
        echo twig_include($this->env, $context, "documentoproceso/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>DOCUMENTO EN PROCESO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("documentoproceso_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
            ";
        }
        // line 42
        echo "        </div>
        ";
        // line 43
        if ((twig_in_filter("home_documentoproceso", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Proceso </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo archivo </th>
                            <th class=\"d-none\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"d-none\" data-name=\"names\">Nuevo/Actualización </th>
                            <th class=\"d-none\" data-name=\"phone\">Aprobado/Rechazado </th>
                            <th class=\"d-none\" data-name=\"phone\">Aprobado por </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de aprobación </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 66
            echo twig_include($this->env, $context, "documentoproceso/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 72
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 74
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 76
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 77
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    attach_validators()

    \$('#documento_proceso_fkproceso').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar proceso.',
        title: 'Seleccione un proceso.'
    })
    
    \$('#documento_proceso_fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#documento_proceso_fkdocumento').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar documento.',
        title: 'Seleccione un tipo de documento.'
    })

    \$('#documento_proceso_nuevoactualizacion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#documento_proceso_aprobadorechazado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#documento_proceso_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })
    
    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#documento_proceso_id').hide()
        \$(\"#documento_proceso_id\").siblings().hide()

        \$('#documento_proceso_nuevoactualizacion').val('')
        \$('#documento_proceso_titulo').val('')
        \$('#documento_proceso_versionvigente').val('')
        \$('#documento_proceso_fechapublicacion').val('')
        \$('#documento_proceso_aprobadorechazado').val('')
        \$('#documento_proceso_carpetaoperativa').val('')
        \$('#documento_proceso_vinculoarchivo').val('')
        \$('#documento_proceso_fechaaprobacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')

        document.getElementById(\"documento_proceso_submit\").innerHTML= \"Guardar\"
        \$('#documento_proceso_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_proceso_vinculoarchivo\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/documentoproceso_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#documento_proceso_id').val(self.id)
                \$('#documento_proceso_titulo').val(self.titulo)
                \$('#documento_proceso_versionvigente').val(self.versionvigente)
                \$('#documento_proceso_carpetaoperativa').val(self.carpetaoperativa)
                \$('#documento_proceso_fechaaprobacion').val(self.fechaaprobacion)

                \$('#documento_proceso_fkproceso').val(self.fkproceso.id)
                \$('#documento_proceso_fkproceso').selectpicker('render')

                \$('#documento_proceso_fktipo').val(self.fktipo.id)
                \$('#documento_proceso_fktipo').selectpicker('render')

                \$('#documento_proceso_fkdocumento').val(self.fkdocumento.id)
                \$('#documento_proceso_fkdocumento').selectpicker('render')
                
                \$('#documento_proceso_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_proceso_fkaprobador').selectpicker('render')

                \$('#documento_proceso_aprobadorechazado').val(self.aprobadorechazado)
                \$('#documento_proceso_aprobadorechazado').selectpicker('render')

                \$('#documento_proceso_nuevoactualizacion').val(self.nuevoactualizacion)
                \$('#documento_proceso_nuevoactualizacion').selectpicker('render')

                if(self.vinculoarchivo != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoarchivo;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_proceso_vinculoarchivo\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            \$('#form').modal('show')
            
            document.getElementById(\"documento_proceso_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function docproc_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/docproc_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            docproc_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el documento?\" 
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
                    ajax_call(\"/documentoproceso_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1000
            )
        })
    </script>
    <script>
        function format (d) {
            let urlfile = d[7];
            let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\") + 1, urlfile.length);
            html = '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">';

            if(urlfile != 'N/A'){
                html += '<tr>'+
                    '<td class=\"bold\">Vínculo archivo:</td>'+
                    '<td><a href=\"' + urlfile +'\">' + vfile + '</a></td>'+
                '</tr>';
            }else{
                html += '<tr>'+
                    '<td class=\"bold\">Vínculo archivo:</td>'+
                    '<td>' + urlfile + '</td>'+
                '</tr>';
            } 
            
            html += '<tr>'+
                    '<td class=\"bold\">Carpeta operativa:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Nuevo/Actualización:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Aprobado/Rechazado:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Aprobado por:</td>'+
                    '<td>'+d[11]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de aprobación:</td>'+
                    '<td>'+d[12]+'</td>'+
                '</tr>'+
            '</table></div>';
            return html;
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'dp'+row.data()[1];
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
        return "documentoproceso/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 77,  154 => 76,  146 => 74,  142 => 72,  133 => 66,  109 => 44,  107 => 43,  104 => 42,  97 => 37,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <style>
        .accion{ 
            cursor:pointer 
        }
        .swal2-title{
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/documentoproceso'

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

    {{ include('documentoproceso/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>DOCUMENTO EN PROCESO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'documentoproceso_insertar' in permisos %}
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            </div>
            {% endif %}
        </div>
        {% if 'home_documentoproceso' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Proceso </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Título </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                            <th class=\"d-none\" data-name=\"phone\">Vínculo archivo </th>
                            <th class=\"d-none\" data-name=\"phone\">Carpeta operativa </th>
                            <th class=\"d-none\" data-name=\"names\">Nuevo/Actualización </th>
                            <th class=\"d-none\" data-name=\"phone\">Aprobado/Rechazado </th>
                            <th class=\"d-none\" data-name=\"phone\">Aprobado por </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de aprobación </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('documentoproceso/table.html.twig') }}
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
    attach_validators()

    \$('#documento_proceso_fkproceso').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar proceso.',
        title: 'Seleccione un proceso.'
    })
    
    \$('#documento_proceso_fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })
    
    \$('#documento_proceso_fkdocumento').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar documento.',
        title: 'Seleccione un tipo de documento.'
    })

    \$('#documento_proceso_nuevoactualizacion').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#documento_proceso_aprobadorechazado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar opción.',
        title: 'Seleccione una opción.'
    })

    \$('#documento_proceso_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })
    
    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#documento_proceso_id').hide()
        \$(\"#documento_proceso_id\").siblings().hide()

        \$('#documento_proceso_nuevoactualizacion').val('')
        \$('#documento_proceso_titulo').val('')
        \$('#documento_proceso_versionvigente').val('')
        \$('#documento_proceso_fechapublicacion').val('')
        \$('#documento_proceso_aprobadorechazado').val('')
        \$('#documento_proceso_carpetaoperativa').val('')
        \$('#documento_proceso_vinculoarchivo').val('')
        \$('#documento_proceso_fechaaprobacion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')

        document.getElementById(\"documento_proceso_submit\").innerHTML= \"Guardar\"
        \$('#documento_proceso_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_proceso_vinculoarchivo\").change(function(){
        \$(\"#lnkva\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/documentoproceso_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response)                
                \$('#documento_proceso_id').val(self.id)
                \$('#documento_proceso_titulo').val(self.titulo)
                \$('#documento_proceso_versionvigente').val(self.versionvigente)
                \$('#documento_proceso_carpetaoperativa').val(self.carpetaoperativa)
                \$('#documento_proceso_fechaaprobacion').val(self.fechaaprobacion)

                \$('#documento_proceso_fkproceso').val(self.fkproceso.id)
                \$('#documento_proceso_fkproceso').selectpicker('render')

                \$('#documento_proceso_fktipo').val(self.fktipo.id)
                \$('#documento_proceso_fktipo').selectpicker('render')

                \$('#documento_proceso_fkdocumento').val(self.fkdocumento.id)
                \$('#documento_proceso_fkdocumento').selectpicker('render')
                
                \$('#documento_proceso_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_proceso_fkaprobador').selectpicker('render')

                \$('#documento_proceso_aprobadorechazado').val(self.aprobadorechazado)
                \$('#documento_proceso_aprobadorechazado').selectpicker('render')

                \$('#documento_proceso_nuevoactualizacion').val(self.nuevoactualizacion)
                \$('#documento_proceso_nuevoactualizacion').selectpicker('render')

                if(self.vinculoarchivo != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoarchivo;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_proceso_vinculoarchivo\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            \$('#form').modal('show')
            
            document.getElementById(\"documento_proceso_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }

    reload_form()
    </script>
    <script>
        attach_edit()

        let message= ''
        function docproc_previous(id) { 
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(id))
            });
            ajax_call_get(\"/docproc_prev\",{
                object: obj
            },function(response){
                message = response;
            });
        }
        
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            docproc_previous(id)
            setTimeout(function(){
                let quest = message + \" ¿Está seguro en dar de baja el documento?\" 
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
                    ajax_call(\"/documentoproceso_eliminar\", { 
                        id, enabled,_xsrf: getCookie(\"_xsrf\")}, 
                        null, 
                        function () {
                            setTimeout(function(){ window.location=main_route }, 2000);
                    })
                })
                }, 1000
            )
        })
    </script>
    <script>
        function format (d) {
            let urlfile = d[7];
            let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\") + 1, urlfile.length);
            html = '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
            '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">';

            if(urlfile != 'N/A'){
                html += '<tr>'+
                    '<td class=\"bold\">Vínculo archivo:</td>'+
                    '<td><a href=\"' + urlfile +'\">' + vfile + '</a></td>'+
                '</tr>';
            }else{
                html += '<tr>'+
                    '<td class=\"bold\">Vínculo archivo:</td>'+
                    '<td>' + urlfile + '</td>'+
                '</tr>';
            } 
            
            html += '<tr>'+
                    '<td class=\"bold\">Carpeta operativa:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Nuevo/Actualización:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Aprobado/Rechazado:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Aprobado por:</td>'+
                    '<td>'+d[11]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de aprobación:</td>'+
                    '<td>'+d[12]+'</td>'+
                '</tr>'+
            '</table></div>';
            return html;
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'dp'+row.data()[1];
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
{% endblock %}", "documentoproceso/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\documentoproceso\\index.html.twig");
    }
}
