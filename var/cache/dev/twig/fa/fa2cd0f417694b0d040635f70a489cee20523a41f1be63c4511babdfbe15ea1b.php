<?php

/* accidentes/index.html.twig */
class __TwigTemplate_bc6dbc647b9fc4007fcd6a85765257a4d7436b3206d20a61da36b24cff338d6d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "accidentes/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accidentes/index.html.twig"));

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
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyD-0Wt6vynQ9q_P23Hj5s0DZv5KvbVTBHc\"></script>
               

<script>
    main_route = '/accidentes'

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
        echo twig_include($this->env, $context, "accidentes/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>Accidentes</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        </div>
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            <button id=\"ubi\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">location_on</i>
            </button>
        </div>
    </div>
    ";
        // line 41
        if ((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 41, $this->source); })())) {
            // line 42
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Fecha Inicio </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Fin </th>
                    <th class=\"order_by_th\" data-name=\"phone\"> Dias </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 54
            echo twig_include($this->env, $context, "accidentes/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 60
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 61
        echo "                 
</div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 65
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 66
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()
    \$('#ubi').click(function () {
        if (\"geolocation\" in navigator){ //check geolocation available 
            //try to get user current location using getCurrentPosition() method
            navigator.geolocation.getCurrentPosition(function(position){ 

                var geocoder = new google.maps.Geocoder();
                var ubicacion = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                geocoder.geocode({
                    'latLng': ubicacion 
                    // ej. \"-34.653015, -58.674850\"
                }, function(results, status) {
                    // si la solicitud fue exitosa
                    if (status === google.maps.GeocoderStatus.OK) {
                        // si encontró algún resultado.
                        if (results[1]) {
                            //console.log(results[1].formatted_address);
                            //console.log(\"Send: \"+results[5].formatted_address);
                            objeto = JSON.stringify({
                                'nombre': results[0].address_components[3].short_name
                            })
                            ajax_call(\"/departamento_insertar\", {
                                object: objeto
                            }, null, function () {
                                setTimeout(
                                    function(){
                                        window.location=main_route
                                }, 2000);
                            })
                        }
                    }
                    //console.log(results);
                });
                console.log(\"Location nLat : \"+position.coords.latitude+\" nLang :\"+ position.coords.longitude);
            });
        }else{
            console.log(\"Browser doesn't support geolocation!\");
        }   
    }) 

    \$('#new').click(function () {
        \$('#fini').val('')
        \$('#ffin').val('')
        \$('#dias').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    
    \$('#insert').click(function () {
        if(!validate_fields(['dias'])){
            return
        }
        objeto = JSON.stringify({
            'fini': \$('#fini').val(),
            'ffin': \$('#ffin').val(),
            'dias': \$('#dias').val()
        })
        ajax_call(\"/accidentes_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accidentes_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

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
            'descripcion': \$('#descripcion').val()
        })
        ajax_call(\"/accidentes_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el tipo de transporte?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/accidentes_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accidentes/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 66,  139 => 65,  129 => 61,  125 => 60,  116 => 54,  102 => 42,  100 => 41,  81 => 25,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyD-0Wt6vynQ9q_P23Hj5s0DZv5KvbVTBHc\"></script>
               

<script>
    main_route = '/accidentes'

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

{{ include('accidentes/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>Accidentes</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        </div>
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
            <button id=\"ubi\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">location_on</i>
            </button>
        </div>
    </div>
    {% if objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Fecha Inicio </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha Fin </th>
                    <th class=\"order_by_th\" data-name=\"phone\"> Dias </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('accidentes/table.html.twig') }}
                </tbody>
            </table>
        </div>
    </div>
    {% else %}
    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    {% endif %}                 
</div>
</div>
{%endblock%}
{% block javascripts %}
<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()
    \$('#ubi').click(function () {
        if (\"geolocation\" in navigator){ //check geolocation available 
            //try to get user current location using getCurrentPosition() method
            navigator.geolocation.getCurrentPosition(function(position){ 

                var geocoder = new google.maps.Geocoder();
                var ubicacion = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                geocoder.geocode({
                    'latLng': ubicacion 
                    // ej. \"-34.653015, -58.674850\"
                }, function(results, status) {
                    // si la solicitud fue exitosa
                    if (status === google.maps.GeocoderStatus.OK) {
                        // si encontró algún resultado.
                        if (results[1]) {
                            //console.log(results[1].formatted_address);
                            //console.log(\"Send: \"+results[5].formatted_address);
                            objeto = JSON.stringify({
                                'nombre': results[0].address_components[3].short_name
                            })
                            ajax_call(\"/departamento_insertar\", {
                                object: objeto
                            }, null, function () {
                                setTimeout(
                                    function(){
                                        window.location=main_route
                                }, 2000);
                            })
                        }
                    }
                    //console.log(results);
                });
                console.log(\"Location nLat : \"+position.coords.latitude+\" nLang :\"+ position.coords.longitude);
            });
        }else{
            console.log(\"Browser doesn't support geolocation!\");
        }   
    }) 

    \$('#new').click(function () {
        \$('#fini').val('')
        \$('#ffin').val('')
        \$('#dias').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    
    \$('#insert').click(function () {
        if(!validate_fields(['dias'])){
            return
        }
        objeto = JSON.stringify({
            'fini': \$('#fini').val(),
            'ffin': \$('#ffin').val(),
            'dias': \$('#dias').val()
        })
        ajax_call(\"/accidentes_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/accidentes_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#descripcion').val(self.descripcion)

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
            'descripcion': \$('#descripcion').val()
        })
        ajax_call(\"/accidentes_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el tipo de transporte?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/accidentes_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "accidentes/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\accidentes\\index.html.twig");
    }
}
