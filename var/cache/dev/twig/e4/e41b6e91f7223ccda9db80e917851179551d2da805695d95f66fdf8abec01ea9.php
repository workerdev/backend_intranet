<?php

/* rol/index.html.twig */
class __TwigTemplate_f462a50879d908719abd12726113e54ed5abb520d337553d3fcbc3d97ebc062c extends Twig_Template
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

    /* The container */
    .containerdbt {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default checkbox */
    .containerdbt input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }

    /* Create a custom checkbox */
    .checkmarkrdbt {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .containerdbt:hover input ~ .checkmarkrdbt {
    background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .containerdbt input:checked ~ .checkmarkrdbt {
    background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmarkrdbt:after {
    content: \"\";
    position: absolute;
    display: none;
    }

    /* Show the checkmark when checked */
    .containerdbt input:checked ~ .checkmarkrdbt:after {
    display: block;
    }

    /* Style the checkmark/indicator */
    .containerdbt .checkmarkrdbt:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    }
    .swal2-title{
        font-size: 16px !important;
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

    // line 147
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 148
        echo "
";
        // line 149
        echo twig_include($this->env, $context, "rol/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>ROL</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 155
        if (twig_in_filter("rol_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 155, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 159
        echo "    
        </div>
    </div>
    ";
        // line 162
        if ((twig_in_filter("home_rol", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 162, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 162, $this->source); })()))) {
            // line 163
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 174
            echo twig_include($this->env, $context, "rol/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 180
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 182
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 184
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 185
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()
    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#descripcion').val('')
        \$(\"#cont-mods input[type=radio]\").prop( \"checked\", false);
        \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    function check_all(e){
        if(\$(e).is(':checked')){
            \$(\"#usl-all\").prop( \"checked\", false);
            \$(\"input[type=checkbox]\").each(function (index) {
\t\t\t    \$(\".padre\").prop( \"checked\", true);
                check_content(this);
            });
\t\t}
\t}

    function uncheck_all(e){
        if(\$(e).is(':checked')){
            \$(\"#slt-all\").prop( \"checked\", false);
            \$(\"input[type=checkbox]\").each(function (index) {
\t\t\t    \$(\".padre\").prop( \"checked\", false);
                check_content(this);
            });
\t\t}
\t}

    //Primer caso cuando elijo un paquete
\tfunction check_mod(e){
\t\tif(\$(e).is(':checked')){
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);

\t\t}else{
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t}
\t}
\t//Segundo caso cuando es hijo selecciona a su padre y su sus hijos
\tfunction check_content(e){
\t\tif(\$(e).is(':checked')){
            var parent = \$(e).parent().parent();
\t\t\tparent.siblings().prop( \"checked\", true);
\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);

\t\t}else{// Tercer caso 
\t\t\tif(\$(e).parent().siblings().children().is(':checked')){
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\telse{
\t\t\t\t\$(e).parent().parent().prev().prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\t
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
            
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
    
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        
        ajax_call_rol(\"/rol_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function clean_check(){
        \$(\"input[type=checkbox]\").each(function (index) {
            \$(this).attr(\"checked\", false)
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            \$(\"#cont-mods input[type=radio]\").prop( \"checked\", false);
            \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);
            
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get_mods(\"/rol_editar\",{
                object: obj
            },function(response){
                roldata = JSON.parse(response[0])
                modules = JSON.parse(response[1])
                for (var i in modules) {
                    item = modules[i]
                    
                    idmod = item.fkmodulo.id
                    \$(\"input[type=checkbox]\").each(function (index) {
                        if (\$(this).attr(\"data-id\") == idmod){
                            \$(this).prop(\"checked\", true)
                        }
                    });
                }
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
        ajax_call_rol(\"/rol_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()

    let message= ''
    function rol_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/rol_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        rol_prev(id)

        setTimeout(function(){
            let quest = message
            enabled = false

            if((quest.split(\" \").length) > 6){
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
                    ajax_call(\"/rol_eliminar\", { 
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
        return "rol/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  269 => 185,  263 => 184,  255 => 182,  251 => 180,  242 => 174,  229 => 163,  227 => 162,  222 => 159,  214 => 155,  205 => 149,  202 => 148,  196 => 147,  46 => 3,  40 => 2,  15 => 1,);
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

    /* The container */
    .containerdbt {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default checkbox */
    .containerdbt input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }

    /* Create a custom checkbox */
    .checkmarkrdbt {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .containerdbt:hover input ~ .checkmarkrdbt {
    background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .containerdbt input:checked ~ .checkmarkrdbt {
    background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmarkrdbt:after {
    content: \"\";
    position: absolute;
    display: none;
    }

    /* Show the checkmark when checked */
    .containerdbt input:checked ~ .checkmarkrdbt:after {
    display: block;
    }

    /* Style the checkmark/indicator */
    .containerdbt .checkmarkrdbt:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    }
    .swal2-title{
        font-size: 16px !important;
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

<div class=\"header bg-indigo\"><h2>ROL</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'rol_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\" title=\"Nuevo\">
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
                    <th class=\"order_by_th\" data-name=\"phone\">Descripción </th>
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
        \$(\"#cont-mods input[type=radio]\").prop( \"checked\", false);
        \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })

    function check_all(e){
        if(\$(e).is(':checked')){
            \$(\"#usl-all\").prop( \"checked\", false);
            \$(\"input[type=checkbox]\").each(function (index) {
\t\t\t    \$(\".padre\").prop( \"checked\", true);
                check_content(this);
            });
\t\t}
\t}

    function uncheck_all(e){
        if(\$(e).is(':checked')){
            \$(\"#slt-all\").prop( \"checked\", false);
            \$(\"input[type=checkbox]\").each(function (index) {
\t\t\t    \$(\".padre\").prop( \"checked\", false);
                check_content(this);
            });
\t\t}
\t}

    //Primer caso cuando elijo un paquete
\tfunction check_mod(e){
\t\tif(\$(e).is(':checked')){
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);

\t\t}else{
\t\t\tvar res = \$(e).parent().attr('id');
\t\t\t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t}
\t}
\t//Segundo caso cuando es hijo selecciona a su padre y su sus hijos
\tfunction check_content(e){
\t\tif(\$(e).is(':checked')){
            var parent = \$(e).parent().parent();
\t\t\tparent.siblings().prop( \"checked\", true);
\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", true);

\t\t}else{// Tercer caso 
\t\t\tif(\$(e).parent().siblings().children().is(':checked')){
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\telse{
\t\t\t\t\$(e).parent().parent().prev().prop( \"checked\", false);
\t\t\t\tvar res = \$(e).parent().attr('id');
\t\t    \t\$(\"#\"+res+\" input[type=checkbox]\").prop( \"checked\", false);
\t\t\t}
\t\t\t
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
            
            if(\$(this).is(':checked')){
                modulos.push(\$(this).attr(\"data-id\"))
            }
        });
    
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'descripcion': \$('#descripcion').val(),
            'modules': modulos
        })
        
        ajax_call_rol(\"/rol_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function clean_check(){
        \$(\"input[type=checkbox]\").each(function (index) {
            \$(this).attr(\"checked\", false)
        });
    }

    function attach_edit() {
        \$('.edit').click(function () {
            \$(\"#cont-mods input[type=radio]\").prop( \"checked\", false);
            \$(\"#cont-mods input[type=checkbox]\").prop( \"checked\", false);
            
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get_mods(\"/rol_editar\",{
                object: obj
            },function(response){
                roldata = JSON.parse(response[0])
                modules = JSON.parse(response[1])
                for (var i in modules) {
                    item = modules[i]
                    
                    idmod = item.fkmodulo.id
                    \$(\"input[type=checkbox]\").each(function (index) {
                        if (\$(this).attr(\"data-id\") == idmod){
                            \$(this).prop(\"checked\", true)
                        }
                    });
                }
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
        ajax_call_rol(\"/rol_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>
    attach_edit()

    let message= ''
    function rol_prev(id) {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse(id))
        });
        ajax_call_get(\"/rol_prev\",{
            object: obj
        },function(response){
            message = response;
        });
    }

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        rol_prev(id)

        setTimeout(function(){
            let quest = message
            enabled = false

            if((quest.split(\" \").length) > 6){
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
                    ajax_call(\"/rol_eliminar\", { 
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

{% endblock %}", "rol/index.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\rol\\index.html.twig");
    }
}
