<?php

/* documentoformulario/index.html.twig */
class __TwigTemplate_781ca483b3b82914808684735d8e2183790a16ee2cc95fb8df039869f7112c1d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "documentoformulario/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentoformulario/index.html.twig"));

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
<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/documentoformulario'

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
        echo twig_include($this->env, $context, "documentoformulario/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>DOCUMENTO FORMULARIO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 35
        if (twig_in_filter("documentoformulario_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 35, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 39
        echo "   
        </div>
    </div>
    ";
        // line 42
        if ((twig_in_filter("home_documentoformulario", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 42, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 42, $this->source); })()))) {
            // line 43
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th></th>
                    <th class=\"d-none\" data-name=\"phone\">ID </th>
                    <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Título </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Publicación </th>
                    <th class=\"d-none\" data-name=\"phone\">Aprobador </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                    <th class=\"d-none\" data-name=\"phone\">Archivo digital </th>
                    <th class=\"d-none\" data-name=\"phone\">Archivo de descarga </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 62
            echo twig_include($this->env, $context, "documentoformulario/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 68
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 70
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 72
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 73
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()

    \$('#documento_formulario_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })

    \$('#documento_formulario_fkdocumento').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar documento.',
        title: 'Seleccione un documento.'
    })

    \$('#documento_formulario_versionVigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar una opción.',
        title: 'Seleccione una opción.'
    })

    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#lnkvd').remove();
        \$('#documento_formulario_id').hide()
        \$(\"#documento_formulario_id\").siblings().hide()

        \$('#documento_formulario_codigo').val('')
        \$('#documento_formulario_titulo').val('')
        \$('#documento_formulario_versionVigente').val('')
        \$('#documento_formulario_fechaPublicacion').val('')
        \$('#documento_formulario_vinculoFileDig').val('')
        \$('#documento_formulario_vinculoFileDesc').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')

        document.getElementById(\"documento_formulario_submit\").innerHTML= \"Guardar\"
        \$('#documento_formulario_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_formulario_vinculoFileDig\").change(function(){
        \$(\"#lnkva\").hide();
    });

    \$(\"#documento_formulario_vinculoFileDesc\").change(function(){
        \$(\"#lnkvd\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
                console.log('into')
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/documentoformulario_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(self)
                
                \$('#documento_formulario_id').val(self.id)
                \$('#documento_formulario_codigo').val(self.codigo)
                \$('#documento_formulario_titulo').val(self.titulo)
                \$('#documento_formulario_carpetaOperativa').val(self.carpetaOperativa)
                \$('#documento_formulario_versionVigente').val(self.versionVigente)
                
                \$('#documento_formulario_fechaPublicacion').val(self.fechaPublicacion)

                \$('#documento_formulario_fkdocumento').val(self.fkdocumento.id)
                \$('#documento_formulario_fkdocumento').selectpicker('render')

                \$('#documento_formulario_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_formulario_fkaprobador').selectpicker('render')

                if(self.vinculoFileDig != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoFileDig;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_formulario_vinculoFileDig\");
                }

                if(self.vinculoFileDesc != 'N/A') {
                    \$('#lnkvd').remove();
                    let urldown = self.vinculoFileDesc;
                    let vdown = urldown.substring(urldown.lastIndexOf(\"/\")+1, urldown.length);
                    \$(\"<a id='lnkvd' href='\"+urldown+\"'>\"+vdown+\"</a>\").insertAfter(\"#documento_formulario_vinculoFileDesc\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"documento_formulario_submit\").innerHTML = \"Modificar\"
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
            title: \"¿Desea dar de baja al documento formulario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/documentoformulario_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>
<script>
    function format (d) {
        let urlfile = d[8];
        let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\") + 1, urlfile.length);
        let urldown = d[9];
        let vdown = urldown.substring(urldown.lastIndexOf(\"/\") + 1, urldown.length); 
        html = '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Versión vigente:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>';
        if(urlfile != 'N/A'){
            html += '<tr>'+
                '<td class=\"bold\">Vínculo archivo digital:</td>'+
                '<td><a href=\"' + urlfile +'\">' + vfile + '</a></td>'+
            '</tr>';
        }else{
            html += '<tr>'+
                '<td class=\"bold\">Vínculo archivo digital:</td>'+
                '<td>' + urlfile + '</td>'+
            '</tr>';
        } 

        if(urldown != 'N/A'){
            html += '<tr>'+
                '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                '<td><a href=\"' + urldown +'\">' + vdown + '</a></td>'+
            '</tr>';
        }else{
            html += '<tr>'+
                '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                '<td>' + urldown + '</td>'+
            '</tr>';
        }     
        html += '</table></div>';
        return html;
    }

    \$(document).ready(function() {
        table = \$('#data_table').DataTable();
        \$('#data_table tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'df'+row.data()[1];
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
        return "documentoformulario/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 73,  151 => 72,  143 => 70,  139 => 68,  130 => 62,  109 => 43,  107 => 42,  102 => 39,  94 => 35,  85 => 29,  82 => 28,  76 => 27,  46 => 3,  40 => 2,  15 => 1,);
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
<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/documentoformulario'

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

{{ include('documentoformulario/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>DOCUMENTO FORMULARIO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'documentoformulario_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}   
        </div>
    </div>
    {% if 'home_documentoformulario' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th></th>
                    <th class=\"d-none\" data-name=\"phone\">ID </th>
                    <th class=\"order_by_th\" data-name=\"names\">Codigo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Título </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Versión </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Publicación </th>
                    <th class=\"d-none\" data-name=\"phone\">Aprobador </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Documento </th>
                    <th class=\"d-none\" data-name=\"phone\">Archivo digital </th>
                    <th class=\"d-none\" data-name=\"phone\">Archivo de descarga </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('documentoformulario/table.html.twig') }}
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

    \$('#documento_formulario_fkaprobador').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar aprobador.',
        title: 'Seleccione un aprobador.'
    })

    \$('#documento_formulario_fkdocumento').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar documento.',
        title: 'Seleccione un documento.'
    })

    \$('#documento_formulario_versionVigente').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar una opción.',
        title: 'Seleccione una opción.'
    })

    \$('#new').click(function () {
        \$('#lnkva').remove();
        \$('#lnkvd').remove();
        \$('#documento_formulario_id').hide()
        \$(\"#documento_formulario_id\").siblings().hide()

        \$('#documento_formulario_codigo').val('')
        \$('#documento_formulario_titulo').val('')
        \$('#documento_formulario_versionVigente').val('')
        \$('#documento_formulario_fechaPublicacion').val('')
        \$('#documento_formulario_vinculoFileDig').val('')
        \$('#documento_formulario_vinculoFileDesc').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')

        document.getElementById(\"documento_formulario_submit\").innerHTML= \"Guardar\"
        \$('#documento_formulario_id').val(0)
        \$('#form').modal('show')
    })

    \$(\"#documento_formulario_vinculoFileDig\").change(function(){
        \$(\"#lnkva\").hide();
    });

    \$(\"#documento_formulario_vinculoFileDesc\").change(function(){
        \$(\"#lnkvd\").hide();
    });

    function attach_edit() {
        \$('.edit').click(function () {
                console.log('into')
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/documentoformulario_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(self)
                
                \$('#documento_formulario_id').val(self.id)
                \$('#documento_formulario_codigo').val(self.codigo)
                \$('#documento_formulario_titulo').val(self.titulo)
                \$('#documento_formulario_carpetaOperativa').val(self.carpetaOperativa)
                \$('#documento_formulario_versionVigente').val(self.versionVigente)
                
                \$('#documento_formulario_fechaPublicacion').val(self.fechaPublicacion)

                \$('#documento_formulario_fkdocumento').val(self.fkdocumento.id)
                \$('#documento_formulario_fkdocumento').selectpicker('render')

                \$('#documento_formulario_fkaprobador').val(self.fkaprobador.id)
                \$('#documento_formulario_fkaprobador').selectpicker('render')

                if(self.vinculoFileDig != 'N/A') {
                    \$('#lnkva').remove();
                    let urlfile = self.vinculoFileDig;
                    let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                    \$(\"<a id='lnkva' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#documento_formulario_vinculoFileDig\");
                }

                if(self.vinculoFileDesc != 'N/A') {
                    \$('#lnkvd').remove();
                    let urldown = self.vinculoFileDesc;
                    let vdown = urldown.substring(urldown.lastIndexOf(\"/\")+1, urldown.length);
                    \$(\"<a id='lnkvd' href='\"+urldown+\"'>\"+vdown+\"</a>\").insertAfter(\"#documento_formulario_vinculoFileDesc\");
                }
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            
            document.getElementById(\"documento_formulario_submit\").innerHTML = \"Modificar\"
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
            title: \"¿Desea dar de baja al documento formulario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/documentoformulario_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>
<script>
    function format (d) {
        let urlfile = d[8];
        let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\") + 1, urlfile.length);
        let urldown = d[9];
        let vdown = urldown.substring(urldown.lastIndexOf(\"/\") + 1, urldown.length); 
        html = '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Versión vigente:</td>'+
                '<td>'+d[6]+'</td>'+
            '</tr>';
        if(urlfile != 'N/A'){
            html += '<tr>'+
                '<td class=\"bold\">Vínculo archivo digital:</td>'+
                '<td><a href=\"' + urlfile +'\">' + vfile + '</a></td>'+
            '</tr>';
        }else{
            html += '<tr>'+
                '<td class=\"bold\">Vínculo archivo digital:</td>'+
                '<td>' + urlfile + '</td>'+
            '</tr>';
        } 

        if(urldown != 'N/A'){
            html += '<tr>'+
                '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                '<td><a href=\"' + urldown +'\">' + vdown + '</a></td>'+
            '</tr>';
        }else{
            html += '<tr>'+
                '<td class=\"bold\">Vínculo diagrama flujo:</td>'+
                '<td>' + urldown + '</td>'+
            '</tr>';
        }     
        html += '</table></div>';
        return html;
    }

    \$(document).ready(function() {
        table = \$('#data_table').DataTable();
        \$('#data_table tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'df'+row.data()[1];
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
{% endblock %}", "documentoformulario/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\documentoformulario\\index.html.twig");
    }
}
