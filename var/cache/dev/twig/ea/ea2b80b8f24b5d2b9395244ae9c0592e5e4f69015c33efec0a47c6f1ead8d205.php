<?php

/* rol/index.html.twig */
class __TwigTemplate_95d5d0217f490e7bd2af49ec09ad6a5f2988cf48a3ce42b499c6559051ac6d81 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "rol/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "rol/index.html.twig"));

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

    .list-simple{
        list-style: none;
    }

    .checkbox label:after, 
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .checkbox label input[type=\"checkbox\"],
    .radio label input[type=\"radio\"] {
        display: none;
    }

    .checkbox label input[type=\"checkbox\"] + .cr > .cr-icon,
    .radio label input[type=\"radio\"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type=\"checkbox\"]:checked + .cr > .cr-icon,
    .radio label input[type=\"radio\"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type=\"checkbox\"]:disabled + .cr,
    .radio label input[type=\"radio\"]:disabled + .cr {
        opacity: .5;
    }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/rol'

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

    // line 76
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 77
        echo "
";
        // line 78
        echo twig_include($this->env, $context, "rol/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>rol</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 84
        if (twig_in_filter("rol_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 84, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 88
        echo "    
        </div>
    </div>
    ";
        // line 91
        if ((twig_in_filter("home_rol", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 91, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 91, $this->source); })()))) {
            // line 92
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripcion </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 103
            echo twig_include($this->env, $context, "rol/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 109
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 111
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 113
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 114
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#descripcion').val('')
        \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    //el primer caso cuando elijo un paquete
\tfunction check_mod(e){ //console.log(\$(e).attr('id'));
\t\tif(\$(e).is(':checked')){
\t\t\tvar res = \$(e).parent().attr('id'); //console.log((res));
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);
\t\t}else{
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t}
        \$('li#sub1').siblings('li');
\t}
\t//segundo caso cuando es hijo selecciona a su padre y su sus hijos
\tfunction check_content(e){ //alert(\"Chldren\");
\t\tif(\$(e).is(':checked')){
            var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t\$(\"#\"+res4+\">input\").prop( \"checked\", true);
\t\t\t\$(e).parent().parent().prev().prop( \"checked\", true);
\t\t\tvar res = \$(e).parent().attr('id'); //console.log(res);
\t\t    \$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);
\t\t}else{
\t\t\tif(\$(e).parent().siblings().children().is(':checked')){
                var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t    \$(\"#\"+res4+\">input\").prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\telse{
                var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t    \$(\"#\"+res4+\">input\").prop( \"checked\", false);
\t\t\t\t\$(e).parent().parent().prev().prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t}
\t}

\tfunction check_action(e){
        if(\$(e).is(':checked')){
\t\t\tvar parent = \$(e).parent().parent();
\t\t\tparent.siblings().prop( \"checked\", true);
\t\t\tparent.parent().parent().siblings().prop( \"checked\", true);
\t\t}     
\t}
       
        \$('#insert').click(function () {
        if(!validate_fields(['nombre', 'descripcion'])){
            return
        }
        
        var modulos = []
        \$(\"input[type=checkbox]\").each(function (index) {
            parent = \$(this).attr(\"data-parent\") 
            //alert(\"PARENT \"+\$(this).attr(\"data-parent\")+\" | \"+idetq);
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
        //console.log(modulos)
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        console.log(objeto)
        ajax_call(\"/rol_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function clean_check(){
        \$(\"input[type=checkbox]\").each(function (index) {
            \$(this).attr(\"checked\", false)
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);
            //setTimeout(clean_check(), 500);
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get_mods(\"/rol_editar\",{
                object: obj
            },function(response){
                //evar self = JSON.parse(response);

                //console.log('Data | '+response)
                roldata = JSON.parse(response[0])
                modules = JSON.parse(response[1])
                for (var i in modules) {
                    item = modules[i]
                    console.log(\" VAL | \"+ item.fkmodulo.id)
                    idmod = item.fkmodulo.id
                    \$(\"input[type=checkbox]\").each(function (index) {
                        if (\$(this).attr(\"data-id\") == idmod){
                            \$(this).prop(\"checked\", true)
                        }//else {
                        //    \$(this).attr(\"checked\", false)
                        //}
                    });
                }
                //console.log(\"VAL | \"+modules)
                \$('#id').val(roldata.id)
                \$('#nombre').val(roldata.nombre)
                \$('#descripcion').val(roldata.descripcion)

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
        var modulos = []
        \$(\"input[type=checkbox]\").each(function (index) {
            parent = \$(this).attr(\"data-parent\") 
            //alert(\"PARENT \"+\$(this).attr(\"data-parent\")+\" | \"+idetq);
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        ajax_call(\"/rol_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el rol de usuario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/rol_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "rol/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 114,  192 => 113,  184 => 111,  180 => 109,  171 => 103,  158 => 92,  156 => 91,  151 => 88,  143 => 84,  134 => 78,  131 => 77,  125 => 76,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }

    .list-simple{
        list-style: none;
    }

    .checkbox label:after, 
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .checkbox label input[type=\"checkbox\"],
    .radio label input[type=\"radio\"] {
        display: none;
    }

    .checkbox label input[type=\"checkbox\"] + .cr > .cr-icon,
    .radio label input[type=\"radio\"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type=\"checkbox\"]:checked + .cr > .cr-icon,
    .radio label input[type=\"radio\"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type=\"checkbox\"]:disabled + .cr,
    .radio label input[type=\"radio\"]:disabled + .cr {
        opacity: .5;
    }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/rol'

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

{{ include('rol/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>rol</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'rol_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}    
        </div>
    </div>
    {% if 'home_rol' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripcion </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('rol/table.html.twig') }}
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
        \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    //el primer caso cuando elijo un paquete
\tfunction check_mod(e){ //console.log(\$(e).attr('id'));
\t\tif(\$(e).is(':checked')){
\t\t\tvar res = \$(e).parent().attr('id'); //console.log((res));
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);
\t\t}else{
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t}
        \$('li#sub1').siblings('li');
\t}
\t//segundo caso cuando es hijo selecciona a su padre y su sus hijos
\tfunction check_content(e){ //alert(\"Chldren\");
\t\tif(\$(e).is(':checked')){
            var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t\$(\"#\"+res4+\">input\").prop( \"checked\", true);
\t\t\t\$(e).parent().parent().prev().prop( \"checked\", true);
\t\t\tvar res = \$(e).parent().attr('id'); //console.log(res);
\t\t    \$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);
\t\t}else{
\t\t\tif(\$(e).parent().siblings().children().is(':checked')){
                var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t    \$(\"#\"+res4+\">input\").prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\telse{
                var res4 = \$(e).parents().eq(2).attr('id'); //console.log(\"Second \"+res4);
\t    \t    \$(\"#\"+res4+\">input\").prop( \"checked\", false);
\t\t\t\t\$(e).parent().parent().prev().prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t}
\t}

\tfunction check_action(e){
        if(\$(e).is(':checked')){
\t\t\tvar parent = \$(e).parent().parent();
\t\t\tparent.siblings().prop( \"checked\", true);
\t\t\tparent.parent().parent().siblings().prop( \"checked\", true);
\t\t}     
\t}
       
        \$('#insert').click(function () {
        if(!validate_fields(['nombre', 'descripcion'])){
            return
        }
        
        var modulos = []
        \$(\"input[type=checkbox]\").each(function (index) {
            parent = \$(this).attr(\"data-parent\") 
            //alert(\"PARENT \"+\$(this).attr(\"data-parent\")+\" | \"+idetq);
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
        //console.log(modulos)
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        console.log(objeto)
        ajax_call(\"/rol_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function clean_check(){
        \$(\"input[type=checkbox]\").each(function (index) {
            \$(this).attr(\"checked\", false)
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);
            //setTimeout(clean_check(), 500);
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get_mods(\"/rol_editar\",{
                object: obj
            },function(response){
                //evar self = JSON.parse(response);

                //console.log('Data | '+response)
                roldata = JSON.parse(response[0])
                modules = JSON.parse(response[1])
                for (var i in modules) {
                    item = modules[i]
                    console.log(\" VAL | \"+ item.fkmodulo.id)
                    idmod = item.fkmodulo.id
                    \$(\"input[type=checkbox]\").each(function (index) {
                        if (\$(this).attr(\"data-id\") == idmod){
                            \$(this).prop(\"checked\", true)
                        }//else {
                        //    \$(this).attr(\"checked\", false)
                        //}
                    });
                }
                //console.log(\"VAL | \"+modules)
                \$('#id').val(roldata.id)
                \$('#nombre').val(roldata.nombre)
                \$('#descripcion').val(roldata.descripcion)

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
        var modulos = []
        \$(\"input[type=checkbox]\").each(function (index) {
            parent = \$(this).attr(\"data-parent\") 
            //alert(\"PARENT \"+\$(this).attr(\"data-parent\")+\" | \"+idetq);
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        ajax_call(\"/rol_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
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
            title: \"¿Desea dar de baja el rol de usuario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/rol_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "rol/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\rol\\index.html.twig");
    }
}
