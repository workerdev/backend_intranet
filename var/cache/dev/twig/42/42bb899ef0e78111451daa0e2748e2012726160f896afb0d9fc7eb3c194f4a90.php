<?php

/* auditoria/index.html.twig */
class __TwigTemplate_70dfefe2021c53f22c054efe498b5b89b93be9c27751fd588ae530c2b979e31e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "auditoria/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "auditoria/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>
<style>
    .swal2-title{
        font-size: 16px !important;
    }
</style>
<script>
    main_route = '/auditoria'

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
        echo twig_include($this->env, $context, "auditoria/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>AUDITORÍA</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 31
        if (twig_in_filter("auditoria_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 31, $this->source); })()))) {
            echo " 
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
            <button id=\"rep\" type=\"button\" class=\"btn btn-info waves-effect\" title=\"Reporte programa anual\">
                <i class=\"material-icons\">picture_as_pdf</i>
            </button>
        ";
        }
        // line 38
        echo "  
        </div>
    </div>
    <div style=\"text-align:center; margin:auto; width:100%; height:60px;\" id=\"spn-adrp\">
        <div class=\"plan-icon-load progress\" style='margin:auto; display:none; height:60px;'>
            <img src='resources/images/loaders.gif' style='height:100%; width:auto;'/>
        </div>
    </div>
    ";
        // line 46
        if ((twig_in_filter("home_auditoria", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 46, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 46, $this->source); })()))) {
            // line 47
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th></th>
                    <th class=\"d-none\" data-name=\"phone\">ID </th>
                    <th class=\"order_by_th\" data-name=\"names\">Código </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Área </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha programada </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Duración estimada </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Lugar </th>
                    <th class=\"d-none\" data-name=\"phone\">Alcance </th>
                    <th class=\"d-none\" data-name=\"phone\">Objetivos </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha/hora de inicio </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha/hora de fin </th>
                    <th class=\"d-none\" data-name=\"phone\">Conclusiones </th>
                    <th class=\"d-none\" data-name=\"phone\">Responsable </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha de registro </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 71
            echo twig_include($this->env, $context, "auditoria/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 77
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 79
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 82
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    //attach_validators()

    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar área.',
        title: 'Seleccione un área.'
    })

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })

    \$('#rep').click(function () {
        \$('#gestion').val('')
        \$('#form_aud').modal('show')
    })

    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#fechaprogramada').val('')
        \$('#duracionestimada').val('')
        \$('#lugar').val('')
        \$('#alcance').val('')
        \$('#objetivos').val('')
        \$('#fechahorainicio').val('')
        \$('#fechahorafin').val('')
        \$('#conclusiones').val('')
        \$('#responsable').val('')
        \$('#fecharegistro').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'fechaprogramada': \$('#fechaprogramada').val(),
            'duracionestimada': \$('#duracionestimada').val(),
            'lugar': \$('#lugar').val(),
            'alcance': \$('#alcance').val(),
            'objetivos': \$('#objetivos').val(),
            'fechahorainicio': \$('#fechahorainicio').val(),
            'fechahorafin': \$('#fechahorafin').val(),
            'conclusiones': \$('#conclusiones').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),
            
            'area': \$('#fkarea').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation( \"/auditoria_insertar\" , {object: objeto}, null, main_route)
        // ajax_call(\"/auditoria_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/auditoria_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                //console.log(self)
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                
                \$('#fkarea').val(self.fkarea.id)
                \$('#fkarea').selectpicker('render')
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                var fechaprog = moment(self.fechaprogramada)
                //console.log(fechaprog.format(\"YYYY-MM-DD\"))
                \$('#fechaprogramada').val(fechaprog.format(\"YYYY-MM-DD\"))
                \$('#duracionestimada').val(self.duracionestimada)
                \$('#lugar').val(self.lugar)
                \$('#alcance').val(self.alcance)
                \$('#objetivos').val(self.objetivos)
                var d = self.fechahorainicio
                var fi = d.replace(\" \",\"T\")
                //console.log(fi)
                \$('#fechahorainicio').val(d)
                var d2= self.fechahorafin
                if(d2 != null){
                    var ff = d2.replace(\" \",\"T\")
                    //console.log(ff)
                    \$('#fechahorafin').val(d2)
                }else \$('#fechahorafin').val(ff)
                \$('#conclusiones').val(self.conclusiones)
                \$('#responsable').val(self.responsable)
                var fecharegistro = moment(self.fecharegistro)
                //console.log(fechaprog.format(\"YYYY-MM-DD\"))

                \$('#fecharegistro').val(fecharegistro.format(\"YYYY-MM-DD\"))

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    function proaud_rep() {
        \$('.prorep').click(function () {
            obj = JSON.stringify({
                'anio': \$('#gestion').val()
            });
            ajax_call_rep(\"/auditoria_anual\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                //console.log(response);
            })
            \$('#form_aud').modal('hide')
        })
    }

    function proaud_xrep() {
        \$('.proxrep').click(function () {
            obj = JSON.stringify({
                'anio': \$('#gestion').val()
            });

            ajax_call_rep(\"/aud_anual\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
            \$('#form_aud').modal('hide')
        })
    }

    function notaud_rep() {
        \$('.notifrep').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });

            ajax_call_reptb(\"/auditoria_notif\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
        })
    }

    function genaud_rep() {
        \$('.audrep').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            
            ajax_call_reptb(\"/auditoria_rep\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'codigo': \$('#codigo').val(),
            'fechaprogramada': \$('#fechaprogramada').val(),
            'duracionestimada': \$('#duracionestimada').val(),
            'lugar': \$('#lugar').val(),
            'alcance': \$('#alcance').val(),
            'objetivos': \$('#objetivos').val(),
            'fechahorainicio': \$('#fechahorainicio').val(),
            'fechahorafin': \$('#fechahorafin').val(),
            'conclusiones': \$('#conclusiones').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),
            
            'area': \$('#fkarea').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/auditoria_actualizar\" , {object: objeto}, null, main_route)
        // ajax_call(\"/auditoria_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()
    proaud_rep()
    proaud_xrep()
    notaud_rep()
    genaud_rep()

    let message= ''
    function aud_previous(id) { 
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/auditoria_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        aud_previous(id)
        setTimeout(function(){
            let quest = message + \" ¿Está seguro en dar de baja los datos de la auditoría?\" 
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
                ajax_call(\"/auditoria_eliminar\", { 
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
        return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Alcance:</td>'+
                '<td>'+d[8]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Objetivos:</td>'+
                '<td>'+d[9]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha/hora de inicio:</td>'+
                '<td>'+d[10]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha/hora de fin:</td>'+
                '<td>'+d[11]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Conclusiones:</td>'+
                '<td>'+d[12]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable:</td>'+
                '<td>'+d[13]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de registro:</td>'+
                '<td>'+d[14]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        table = \$('#data_table').DataTable();
        \$('#data_table tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'aud'+row.data()[1];
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
        return "auditoria/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 82,  160 => 81,  152 => 79,  148 => 77,  139 => 71,  113 => 47,  111 => 46,  101 => 38,  90 => 31,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
<script src=\"resources/js/functions.js\"></script>
<style>
    .swal2-title{
        font-size: 16px !important;
    }
</style>
<script>
    main_route = '/auditoria'

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

{{ include('auditoria/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>AUDITORÍA</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'auditoria_insertar' in permisos %} 
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
            <button id=\"rep\" type=\"button\" class=\"btn btn-info waves-effect\" title=\"Reporte programa anual\">
                <i class=\"material-icons\">picture_as_pdf</i>
            </button>
        {% endif %}  
        </div>
    </div>
    <div style=\"text-align:center; margin:auto; width:100%; height:60px;\" id=\"spn-adrp\">
        <div class=\"plan-icon-load progress\" style='margin:auto; display:none; height:60px;'>
            <img src='resources/images/loaders.gif' style='height:100%; width:auto;'/>
        </div>
    </div>
    {% if 'home_auditoria' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th></th>
                    <th class=\"d-none\" data-name=\"phone\">ID </th>
                    <th class=\"order_by_th\" data-name=\"names\">Código </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Área </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha programada </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Duración estimada </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Lugar </th>
                    <th class=\"d-none\" data-name=\"phone\">Alcance </th>
                    <th class=\"d-none\" data-name=\"phone\">Objetivos </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha/hora de inicio </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha/hora de fin </th>
                    <th class=\"d-none\" data-name=\"phone\">Conclusiones </th>
                    <th class=\"d-none\" data-name=\"phone\">Responsable </th>
                    <th class=\"d-none\" data-name=\"phone\">Fecha de registro </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('auditoria/table.html.twig') }}
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
    //attach_validators()

    \$('#fkarea').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar área.',
        title: 'Seleccione un área.'
    })

    \$('#fktipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo.',
        title: 'Seleccione un tipo.'
    })

    \$('#rep').click(function () {
        \$('#gestion').val('')
        \$('#form_aud').modal('show')
    })

    \$('#new').click(function () {
        \$('#codigo').val('')
        \$('#fechaprogramada').val('')
        \$('#duracionestimada').val('')
        \$('#lugar').val('')
        \$('#alcance').val('')
        \$('#objetivos').val('')
        \$('#fechahorainicio').val('')
        \$('#fechahorafin').val('')
        \$('#conclusiones').val('')
        \$('#responsable').val('')
        \$('#fecharegistro').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'codigo': \$('#codigo').val(),
            'fechaprogramada': \$('#fechaprogramada').val(),
            'duracionestimada': \$('#duracionestimada').val(),
            'lugar': \$('#lugar').val(),
            'alcance': \$('#alcance').val(),
            'objetivos': \$('#objetivos').val(),
            'fechahorainicio': \$('#fechahorainicio').val(),
            'fechahorafin': \$('#fechahorafin').val(),
            'conclusiones': \$('#conclusiones').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),
            
            'area': \$('#fkarea').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation( \"/auditoria_insertar\" , {object: objeto}, null, main_route)
        // ajax_call(\"/auditoria_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/auditoria_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                //console.log(self)
                \$('#id').val(self.id)
                \$('#codigo').val(self.codigo)
                
                \$('#fkarea').val(self.fkarea.id)
                \$('#fkarea').selectpicker('render')
                \$('#fktipo').val(self.fktipo.id)
                \$('#fktipo').selectpicker('render')

                var fechaprog = moment(self.fechaprogramada)
                //console.log(fechaprog.format(\"YYYY-MM-DD\"))
                \$('#fechaprogramada').val(fechaprog.format(\"YYYY-MM-DD\"))
                \$('#duracionestimada').val(self.duracionestimada)
                \$('#lugar').val(self.lugar)
                \$('#alcance').val(self.alcance)
                \$('#objetivos').val(self.objetivos)
                var d = self.fechahorainicio
                var fi = d.replace(\" \",\"T\")
                //console.log(fi)
                \$('#fechahorainicio').val(d)
                var d2= self.fechahorafin
                if(d2 != null){
                    var ff = d2.replace(\" \",\"T\")
                    //console.log(ff)
                    \$('#fechahorafin').val(d2)
                }else \$('#fechahorafin').val(ff)
                \$('#conclusiones').val(self.conclusiones)
                \$('#responsable').val(self.responsable)
                var fecharegistro = moment(self.fecharegistro)
                //console.log(fechaprog.format(\"YYYY-MM-DD\"))

                \$('#fecharegistro').val(fecharegistro.format(\"YYYY-MM-DD\"))

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    function proaud_rep() {
        \$('.prorep').click(function () {
            obj = JSON.stringify({
                'anio': \$('#gestion').val()
            });
            ajax_call_rep(\"/auditoria_anual\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                //console.log(response);
            })
            \$('#form_aud').modal('hide')
        })
    }

    function proaud_xrep() {
        \$('.proxrep').click(function () {
            obj = JSON.stringify({
                'anio': \$('#gestion').val()
            });

            ajax_call_rep(\"/aud_anual\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
            \$('#form_aud').modal('hide')
        })
    }

    function notaud_rep() {
        \$('.notifrep').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });

            ajax_call_reptb(\"/auditoria_notif\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
        })
    }

    function genaud_rep() {
        \$('.audrep').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            
            ajax_call_reptb(\"/auditoria_rep\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                let urlfile = self.url;
                let vfile = urlfile.substring(urlfile.lastIndexOf(\"/\")+1, urlfile.length);
                \$(\"<a id='lnkrp' class='btn bg-teal waves-effect' href='\"+urlfile+\"'>\"+vfile+\"</a>\").insertAfter(\"#rep\");
                setTimeout(function(){ \$(\"#lnkrp\").remove() }, 10000);
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'codigo': \$('#codigo').val(),
            'fechaprogramada': \$('#fechaprogramada').val(),
            'duracionestimada': \$('#duracionestimada').val(),
            'lugar': \$('#lugar').val(),
            'alcance': \$('#alcance').val(),
            'objetivos': \$('#objetivos').val(),
            'fechahorainicio': \$('#fechahorainicio').val(),
            'fechahorafin': \$('#fechahorafin').val(),
            'conclusiones': \$('#conclusiones').val(),
            'responsable': \$('#responsable').val(),
            'fecharegistro': \$('#fecharegistro').val(),
            
            'area': \$('#fkarea').val(),
            'tipo': \$('#fktipo').val()
        })
        ajax_call_validation(\"/auditoria_actualizar\" , {object: objeto}, null, main_route)
        // ajax_call(\"/auditoria_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()
    proaud_rep()
    proaud_xrep()
    notaud_rep()
    genaud_rep()

    let message= ''
    function aud_previous(id) { 
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/auditoria_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        aud_previous(id)
        setTimeout(function(){
            let quest = message + \" ¿Está seguro en dar de baja los datos de la auditoría?\" 
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
                ajax_call(\"/auditoria_eliminar\", { 
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
        return '<div class=\"card\" style=\"width: 100%; background-color: rgba(0, 76, 153, .15)\">'+
        '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
            '<tr>'+
                '<td class=\"bold\">Alcance:</td>'+
                '<td>'+d[8]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Objetivos:</td>'+
                '<td>'+d[9]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha/hora de inicio:</td>'+
                '<td>'+d[10]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha/hora de fin:</td>'+
                '<td>'+d[11]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Conclusiones:</td>'+
                '<td>'+d[12]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Responsable:</td>'+
                '<td>'+d[13]+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td class=\"bold\">Fecha de registro:</td>'+
                '<td>'+d[14]+'</td>'+
            '</tr>'+
        '</table></div>';
    }
 
    \$(document).ready(function() {
        table = \$('#data_table').DataTable();
        \$('#data_table tbody').on('click', 'td.details-control', function () {
            var tr = \$(this).closest('tr');
            var row = table.row(tr);

            let idet = 'aud'+row.data()[1];
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

{% endblock %}", "auditoria/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\auditoria\\index.html.twig");
    }
}
