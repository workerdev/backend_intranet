<?php

/* enlaces/index.html.twig */
class __TwigTemplate_c6f0cfc25eb968c64bfcc762009adf85936b11f9f6fea9586229482f4ea1e031 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "enlaces/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "enlaces/index.html.twig"));

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

<script>
    main_route = '/enlaces'

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

    // line 21
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 22
        echo twig_include($this->env, $context, "enlaces/form.html.twig");
        echo "


<div class=\"header bg-indigo\"><h2>ENLACE EXTERNO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("enlaces_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 34
        echo "        </div>
    </div>
    ";
        // line 36
        if ((twig_in_filter("home_enlaces", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                    <th class=\"order_by_th\" data-name=\"phone\">URL </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 49
            echo twig_include($this->env, $context, "enlaces/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 55
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 57
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 59
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 60
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()
    \$('#new').click(function () {
        \$('#enlaces_id').hide()
        \$( \"#enlaces_id\" ).siblings().hide()
        \$('#enlaces_nombre').val('')
        \$('#enlaces_descripcion').val('')
        \$('#enlaces_link').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
        document.getElementById(\"enlaces_submit\").innerHTML= \"Guardar\"
        \$('#enlaces_id').val(0)
    })
    

    function attach_edit() {
        \$('.edit').click(function () {
            \$('#enlaces_id').show()
            \$( \"#enlaces_id\" ).siblings().show()
            //\$('#enlaces_id').attr('disabled', 'disabled')
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/enlaces_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(self);
                
                \$('#enlaces_id').val(self.id)
                \$('#enlaces_nombre').val(self.nombre)
                \$('#enlaces_descripcion').val(self.descripcion)
                \$('#enlaces_link').val(self.link)
                \$('#enlaces_ruta').val(self.ruta)
            })
                
            clean_form()
            verif_inputs()
            \$('#id_div').hide()
            \$('#insert').show()
            \$('#update').hide()
            setTimeout(function(){\$('#form').modal('show')}, 1000);
            document.getElementById(\"enlaces_submit\").innerHTML = \"Modificar\"
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'link': \$('#link').val()
        })
        ajax_call(\"/enlaces_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form2').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el enlace externo?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/enlaces_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "enlaces/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 60,  135 => 59,  127 => 57,  123 => 55,  114 => 49,  100 => 37,  98 => 36,  94 => 34,  86 => 29,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/enlaces'

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
{{ include('enlaces/form.html.twig') }}


<div class=\"header bg-indigo\"><h2>ENLACE EXTERNO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'enlaces_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_enlaces' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                    <th class=\"order_by_th\" data-name=\"phone\">URL </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('enlaces/table.html.twig') }}
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
    \$('#new').click(function () {
        \$('#enlaces_id').hide()
        \$( \"#enlaces_id\" ).siblings().hide()
        \$('#enlaces_nombre').val('')
        \$('#enlaces_descripcion').val('')
        \$('#enlaces_link').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
        document.getElementById(\"enlaces_submit\").innerHTML= \"Guardar\"
        \$('#enlaces_id').val(0)
    })
    

    function attach_edit() {
        \$('.edit').click(function () {
            \$('#enlaces_id').show()
            \$( \"#enlaces_id\" ).siblings().show()
            //\$('#enlaces_id').attr('disabled', 'disabled')
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/enlaces_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                console.log(self);
                
                \$('#enlaces_id').val(self.id)
                \$('#enlaces_nombre').val(self.nombre)
                \$('#enlaces_descripcion').val(self.descripcion)
                \$('#enlaces_link').val(self.link)
                \$('#enlaces_ruta').val(self.ruta)
            })
                
            clean_form()
            verif_inputs()
            \$('#id_div').hide()
            \$('#insert').show()
            \$('#update').hide()
            setTimeout(function(){\$('#form').modal('show')}, 1000);
            document.getElementById(\"enlaces_submit\").innerHTML = \"Modificar\"
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'link': \$('#link').val()
        })
        ajax_call(\"/enlaces_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form2').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja el enlace externo?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/enlaces_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "enlaces/index.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\enlaces\\index.html.twig");
    }
}