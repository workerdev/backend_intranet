<?php

/* correlativo/index.html.twig */
class __TwigTemplate_1b9b57b2d411e103262ca1bb48489c45bd0772f9f7e009945059a238f63c323d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "correlativo/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "correlativo/index.html.twig"));

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
        .accion { 
            cursor: pointer 
        }
        .swal2-title {
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/correlativo'

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
        echo twig_include($this->env, $context, "correlativo/form.html.twig");
        echo "

    <div class=\"header bg-indigo\"><h2>CORRELATIVO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            ";
        // line 36
        if (twig_in_filter("correlativo_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })()))) {
            echo "    
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            ";
        }
        // line 40
        echo "   
            </div>
        </div>
        ";
        // line 43
        if ((twig_in_filter("home_correlativo", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 43, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Número correlativo </th>
                            <th class=\"order_by_th\" data-name=\"names\">Fecha de registro </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Solicitante </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Redactor </th>
                            <th class=\"d-none\" data-name=\"phone\">Destinatario </th>
                            <th class=\"d-none\" data-name=\"phone\">Referencia </th>
                            <th class=\"d-none\" data-name=\"phone\">Centro de control correlativo </th>
                            <th class=\"d-none\" data-name=\"phone\">Tipo de nota </th>
                            <th class=\"d-none\" data-name=\"phone\">Equipo </th>
                            <th class=\"d-none\" data-name=\"phone\">IP </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL </th>
                            <th class=\"d-none\" data-name=\"phone\">Antecedente </th>
                            <th class=\"d-none\" data-name=\"phone\">Estado correlativo </th>
                            <th class=\"d-none\" data-name=\"phone\">Item </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL editable </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de entrega </th>
                            <th class=\"d-none\" data-name=\"phone\">Unidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL origen </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        ";
            // line 73
            echo twig_include($this->env, $context, "correlativo/table.html.twig");
            echo "
                        </tbody>
                    </table>
                </div>
            </div>
        ";
        } else {
            // line 79
            echo "            <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
        ";
        }
        // line 81
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 84
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <script>
    \$('#correlativo_fksolicitante').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar solicitante.',
        title: 'Seleccione un solicitante.'
    })
    \$('#correlativo_fkcorrelativo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar control correlativo.',
        title: 'Seleccione un control correlativo.'
    })
    \$('#correlativo_fktiponota').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de nota.',
        title: 'Seleccione un tipo de nota.'
    })
    \$('#correlativo_fkestado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })
    \$('#correlativo_fkunidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar unidad.',
        title: 'Seleccione una unidad.'
    })

    \$(\"#correlativo_fktiponota\").change(function(){
        obj = JSON.stringify({
            'tipo': \$(this).val()
        })
        //console.log(obj)
        ajax_call_get(\"/correlativo_numerar\",{
            object: obj
        },function(response){ 
            //console.log(response)
            var self = JSON.parse(response) 
            \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
        })
    });

    function init(){
        var rutas = document.getElementsByClassName('ruta');
        for (let i = 0; i < rutas.length; i++) {
            var ruta = rutas[i];
            var href = ruta.getAttribute('href');
            var rutaCortada = href.split('public')
            rutas[i].setAttribute('href', rutaCortada[1] + \"\");
        }
    };
    
    \$('#new').click(function () {
        \$('#correlativo_id').hide()
        \$( \"#correlativo_id\" ).siblings().hide()

        \$('#correlativo_numcorrelativo').val('')
        \$('#correlativo_fechareg').val('')
        \$('#correlativo_redactor').val('')
        \$('#correlativo_destinatario').val('')
        \$('#correlativo_referencia').val('')
        \$('#correlativo_equipo').val('')
        \$('#correlativo_ip').val('')
        \$('#correlativo_url').val('')
        \$('#correlativo_antecedente').val('')
        \$('#correlativo_item').val('')
        \$('#correlativo_urleditable').val('')
        \$('#correlativo_entrega').val('')
        \$('#correlativo_urlorigen').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        document.getElementById(\"correlativo_submit\").innerHTML= \"Guardar\"
        \$('#correlativo_id').val(0)

        obj = JSON.stringify({
            'tipo': document.getElementById('correlativo_fktiponota').value
        })
        //console.log(obj)
        ajax_call_get(\"/correlativo_numerar\",{
            object: obj
        },function(response){ 
            //console.log(response)
            var self = JSON.parse(response) 
            \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
        })
        setTimeout(function(){ 
            \$('#form').modal('show')
            }, 2000
        )
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/correlativo_editar\",{
                object: obj
            },function(response){ 
                
                var self = JSON.parse(response)    
                console.log(self)        
                \$('#correlativo_id').val(self.id)
                \$('#correlativo_antecedente').val(self.antecedente)
                \$('#correlativo_item').val(self.item)
                \$('#correlativo_entrega').val(self.entrega)
                \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
                \$('#correlativo_fechareg').val(self.fechareg)
               
                \$('#correlativo_redactor').val(self.redactor)
                 
                \$('#correlativo_destinatario').val(self.destinatario)
                \$('#correlativo_referencia').val(self.referencia)
                \$('#correlativo_equipo').val(self.equipo)
                \$('#correlativo_ip').val(self.ip)
                // console.log('1.1')
                // \$('#correlativo_url').val(self.url)
                //console.log('1.2')
                //   \$('#correlativo_urleditable').val(self.urleditable)
                // console.log('1.3')
                // \$('#correlativo_urlorigen').val(self.urlorigen)

                document.getElementById('correlativo_fksolicitante').value = self.fksolicitante.id
                \$('#correlativo_fksolicitante').selectpicker('render')
    
                document.getElementById('correlativo_fkcorrelativo').value = self.fkcorrelativo.id
                \$('#correlativo_fkcorrelativo').selectpicker('render')

                document.getElementById('correlativo_fktiponota').value = self.fktiponota.id
                \$('#correlativo_fktiponota').selectpicker('render')

                document.getElementById('correlativo_fkestado').value = self.fkestado.id
                \$('#correlativo_fkestado').selectpicker('render')

                document.getElementById('correlativo_fkunidad').value = self.fkunidad.id
                \$('#correlativo_fkunidad').selectpicker('render')
          
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            //\$('#form').modal('show')
            document.getElementById(\"correlativo_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }
    </script>
    <script>
        attach_edit()
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja los datos del correlativo?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/correlativo_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })      
    </script>
    <script>
        function format (d) {
            let frg = '<div class=\"card\" style=\"width: 100%; ';
            console.log(d[14]);
            let estadocr = d[14];
            if(estadocr.localeCompare(\"Anulado\") == 0) frg = frg + 'background-color: rgba(204, 0, 0, .12)\">';
            else frg = frg + 'background-color: rgba(0, 76, 153, .15)\">';
            frg = frg + '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Destinatario:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Referencia:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Centro de control correlativo:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Tipo de nota:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Equipo:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">IP:</td>'+
                    '<td>'+d[11]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Antecedente:</td>'+
                    '<td>'+d[13]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Estado correlativo:</td>'+
                    '<td>'+d[14]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Item:</td>'+
                    '<td>'+d[15]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de entrega:</td>'+
                    '<td>'+d[17]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Unidad:</td>'+
                    '<td>'+d[18]+'</td>'+
                '</tr>'+
            '</table></div>';
            return frg;
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'cr'+row.data()[1];
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
        return "correlativo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 84,  162 => 83,  154 => 81,  150 => 79,  141 => 73,  110 => 44,  108 => 43,  103 => 40,  95 => 36,  86 => 30,  83 => 29,  77 => 28,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"resources/font-awesome-4.7.0/css/font-awesome.min.css\">
    <style>
        .accion { 
            cursor: pointer 
        }
        .swal2-title {
            font-size: 16px !important;
        }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>

    <script>
        main_route = '/correlativo'

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

    {{ include('correlativo/form.html.twig') }}

    <div class=\"header bg-indigo\"><h2>CORRELATIVO</h2></div>
    <div class=\"body\">
        <div class=\"row clearfix\">
            <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            {% if 'correlativo_insertar' in permisos %}    
                <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                    <i class=\"material-icons\">add</i>
                </button>
            {% endif %}   
            </div>
        </div>
        {% if 'home_correlativo' in permisos and objects %}
            <div class=\"row\">
                <div class=\"body table-responsive\">
                    <table id=\"data_tabletr\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th></th>
                            <th class=\"d-none\" data-name=\"phone\">ID </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Número correlativo </th>
                            <th class=\"order_by_th\" data-name=\"names\">Fecha de registro </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Solicitante </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Redactor </th>
                            <th class=\"d-none\" data-name=\"phone\">Destinatario </th>
                            <th class=\"d-none\" data-name=\"phone\">Referencia </th>
                            <th class=\"d-none\" data-name=\"phone\">Centro de control correlativo </th>
                            <th class=\"d-none\" data-name=\"phone\">Tipo de nota </th>
                            <th class=\"d-none\" data-name=\"phone\">Equipo </th>
                            <th class=\"d-none\" data-name=\"phone\">IP </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL </th>
                            <th class=\"d-none\" data-name=\"phone\">Antecedente </th>
                            <th class=\"d-none\" data-name=\"phone\">Estado correlativo </th>
                            <th class=\"d-none\" data-name=\"phone\">Item </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL editable </th>
                            <th class=\"d-none\" data-name=\"phone\">Fecha de entrega </th>
                            <th class=\"d-none\" data-name=\"phone\">Unidad </th>
                            <th class=\"order_by_th\" data-name=\"phone\">URL origen </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                        {{ include('correlativo/table.html.twig') }}
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
    \$('#correlativo_fksolicitante').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar solicitante.',
        title: 'Seleccione un solicitante.'
    })
    \$('#correlativo_fkcorrelativo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar control correlativo.',
        title: 'Seleccione un control correlativo.'
    })
    \$('#correlativo_fktiponota').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo de nota.',
        title: 'Seleccione un tipo de nota.'
    })
    \$('#correlativo_fkestado').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar estado.',
        title: 'Seleccione un estado.'
    })
    \$('#correlativo_fkunidad').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar unidad.',
        title: 'Seleccione una unidad.'
    })

    \$(\"#correlativo_fktiponota\").change(function(){
        obj = JSON.stringify({
            'tipo': \$(this).val()
        })
        //console.log(obj)
        ajax_call_get(\"/correlativo_numerar\",{
            object: obj
        },function(response){ 
            //console.log(response)
            var self = JSON.parse(response) 
            \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
        })
    });

    function init(){
        var rutas = document.getElementsByClassName('ruta');
        for (let i = 0; i < rutas.length; i++) {
            var ruta = rutas[i];
            var href = ruta.getAttribute('href');
            var rutaCortada = href.split('public')
            rutas[i].setAttribute('href', rutaCortada[1] + \"\");
        }
    };
    
    \$('#new').click(function () {
        \$('#correlativo_id').hide()
        \$( \"#correlativo_id\" ).siblings().hide()

        \$('#correlativo_numcorrelativo').val('')
        \$('#correlativo_fechareg').val('')
        \$('#correlativo_redactor').val('')
        \$('#correlativo_destinatario').val('')
        \$('#correlativo_referencia').val('')
        \$('#correlativo_equipo').val('')
        \$('#correlativo_ip').val('')
        \$('#correlativo_url').val('')
        \$('#correlativo_antecedente').val('')
        \$('#correlativo_item').val('')
        \$('#correlativo_urleditable').val('')
        \$('#correlativo_entrega').val('')
        \$('#correlativo_urlorigen').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        document.getElementById(\"correlativo_submit\").innerHTML= \"Guardar\"
        \$('#correlativo_id').val(0)

        obj = JSON.stringify({
            'tipo': document.getElementById('correlativo_fktiponota').value
        })
        //console.log(obj)
        ajax_call_get(\"/correlativo_numerar\",{
            object: obj
        },function(response){ 
            //console.log(response)
            var self = JSON.parse(response) 
            \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
        })
        setTimeout(function(){ 
            \$('#form').modal('show')
            }, 2000
        )
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
                'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/correlativo_editar\",{
                object: obj
            },function(response){ 
                
                var self = JSON.parse(response)    
                console.log(self)        
                \$('#correlativo_id').val(self.id)
                \$('#correlativo_antecedente').val(self.antecedente)
                \$('#correlativo_item').val(self.item)
                \$('#correlativo_entrega').val(self.entrega)
                \$('#correlativo_numcorrelativo').val(self.numcorrelativo)
                \$('#correlativo_fechareg').val(self.fechareg)
               
                \$('#correlativo_redactor').val(self.redactor)
                 
                \$('#correlativo_destinatario').val(self.destinatario)
                \$('#correlativo_referencia').val(self.referencia)
                \$('#correlativo_equipo').val(self.equipo)
                \$('#correlativo_ip').val(self.ip)
                // console.log('1.1')
                // \$('#correlativo_url').val(self.url)
                //console.log('1.2')
                //   \$('#correlativo_urleditable').val(self.urleditable)
                // console.log('1.3')
                // \$('#correlativo_urlorigen').val(self.urlorigen)

                document.getElementById('correlativo_fksolicitante').value = self.fksolicitante.id
                \$('#correlativo_fksolicitante').selectpicker('render')
    
                document.getElementById('correlativo_fkcorrelativo').value = self.fkcorrelativo.id
                \$('#correlativo_fkcorrelativo').selectpicker('render')

                document.getElementById('correlativo_fktiponota').value = self.fktiponota.id
                \$('#correlativo_fktiponota').selectpicker('render')

                document.getElementById('correlativo_fkestado').value = self.fkestado.id
                \$('#correlativo_fkestado').selectpicker('render')

                document.getElementById('correlativo_fkunidad').value = self.fkunidad.id
                \$('#correlativo_fkunidad').selectpicker('render')
          
            })
            clean_form()
            verif_inputs()
            \$('#id_div').show()
            \$('#insert').hide()
            \$('#update').show()
            //\$('#form').modal('show')
            document.getElementById(\"correlativo_submit\").innerHTML = \"Modificar\"
            setTimeout(function(){\$('#form').modal('show')}, 500);
        })
    }
    </script>
    <script>
        attach_edit()
        \$('.delete').click(function () {
            id = parseInt(JSON.parse(\$(this).attr('data-json')))
            enabled = false
            swal({
                title: \"¿Desea dar de baja los datos del correlativo?\",
                type: \"warning\",
                showCancelButton: true,
                confirmButtonColor: \"#004c99\",
                cancelButtonColor: \"#F44336\",
                confirmButtonText: \"Aceptar\",
                cancelButtonText: \"Cancelar\"
            }).then(function () {
                ajax_call(\"/correlativo_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
            })
        })      
    </script>
    <script>
        function format (d) {
            let frg = '<div class=\"card\" style=\"width: 100%; ';
            console.log(d[14]);
            let estadocr = d[14];
            if(estadocr.localeCompare(\"Anulado\") == 0) frg = frg + 'background-color: rgba(204, 0, 0, .12)\">';
            else frg = frg + 'background-color: rgba(0, 76, 153, .15)\">';
            frg = frg + '<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">'+
                '<tr>'+
                    '<td class=\"bold\">Destinatario:</td>'+
                    '<td>'+d[6]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Referencia:</td>'+
                    '<td>'+d[7]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Centro de control correlativo:</td>'+
                    '<td>'+d[8]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Tipo de nota:</td>'+
                    '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Equipo:</td>'+
                    '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">IP:</td>'+
                    '<td>'+d[11]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Antecedente:</td>'+
                    '<td>'+d[13]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Estado correlativo:</td>'+
                    '<td>'+d[14]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Item:</td>'+
                    '<td>'+d[15]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Fecha de entrega:</td>'+
                    '<td>'+d[17]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td class=\"bold\">Unidad:</td>'+
                    '<td>'+d[18]+'</td>'+
                '</tr>'+
            '</table></div>';
            return frg;
        }
    
        \$(document).ready(function() {
            table = \$('#data_tabletr').DataTable();
            \$('#data_tabletr tbody').on('click', 'td.details-control', function () {
                var tr = \$(this).closest('tr');
                var row = table.row(tr);

                let idet = 'cr'+row.data()[1];
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

{% endblock %}", "correlativo/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\correlativo\\index.html.twig");
    }
}
