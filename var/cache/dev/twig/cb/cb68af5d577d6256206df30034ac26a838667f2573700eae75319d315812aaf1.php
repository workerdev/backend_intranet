<?php

/* tipocro/index.html.twig */
class __TwigTemplate_22cbbed319a9f77b55b89608c6f90997aa864bf441ec9e7af6a45b44a2ca2a73 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "tipocro/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "tipocro/index.html.twig"));

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
    main_route = '/tipocro'

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
        echo twig_include($this->env, $context, "tipocro/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>TIPO DE RIESGOS</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 34
        if (twig_in_filter("tipocro_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 34, $this->source); })()))) {
            // line 35
            echo "            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 39
        echo "        </div>
    </div>
    ";
        // line 41
        if ((twig_in_filter("home_tipocro", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 41, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 41, $this->source); })()))) {
            // line 42
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
               <thead>
               <tr>
                   <th class=\"order_by_th \" data-name=\"names\">Nombre </th>
                   <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                   <th class=\"actions_header\">Acciones </th>
               </tr>
               </thead>
               <tbody id=\"table_content\">
               ";
            // line 53
            echo twig_include($this->env, $context, "tipocro/table.html.twig");
            echo "
               </tbody>
           </table>
        </div>
    </div>
    ";
        } else {
            // line 59
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 61
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 64
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()

    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#descripcion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/tipocro_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/tipocro_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/tipocro_editar\",{
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
        ajax_call_validation(\"/tipocro_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/tipocro_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()

    let message= ''
    function tipocro_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/tipocro_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        tipocro_prev(id)

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
                    ajax_call(\"/tipocro_eliminar\", { 
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
        return "tipocro/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 64,  141 => 63,  133 => 61,  129 => 59,  120 => 53,  107 => 42,  105 => 41,  101 => 39,  95 => 35,  93 => 34,  84 => 28,  81 => 27,  75 => 26,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/tipocro'

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

{{ include('tipocro/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>TIPO DE RIESGOS</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'tipocro_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_tipocro' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
               <thead>
               <tr>
                   <th class=\"order_by_th \" data-name=\"names\">Nombre </th>
                   <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                   <th class=\"actions_header\">Acciones </th>
               </tr>
               </thead>
               <tbody id=\"table_content\">
               {{ include('tipocro/table.html.twig') }}
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
        \$('#nombre').val('')
        \$('#descripcion').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val()
        })
        ajax_call_validation(\"/tipocro_insertar\", {object: objeto}, null, main_route)
        // ajax_call(\"/tipocro_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/tipocro_editar\",{
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
        ajax_call_validation(\"/tipocro_actualizar\", {object: objeto}, null, main_route)
        // ajax_call(\"/tipocro_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        // \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()

    let message= ''
    function tipocro_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/tipocro_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        tipocro_prev(id)

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
                    ajax_call(\"/tipocro_eliminar\", { 
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

{% endblock %}", "tipocro/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\tipocro\\index.html.twig");
    }
}
