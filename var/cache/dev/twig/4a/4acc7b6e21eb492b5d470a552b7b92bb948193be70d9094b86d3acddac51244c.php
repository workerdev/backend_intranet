<?php

/* usuario/index.html.twig */
class __TwigTemplate_ecc4c8c62aea8e4f6f8429bbe0791ee5af5e12f7d6d1b233f4c7a14c02c1c6cb extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "usuario/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "usuario/index.html.twig"));

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
    main_route = '/usuario'

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
        echo "
";
        // line 23
        echo twig_include($this->env, $context, "usuario/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>USUARIO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("usuario_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
            echo "    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 33
        echo "   
        </div>
    </div>
    ";
        // line 36
        if ((twig_in_filter("home_usuario", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Apellido </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Ci </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Correo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Username </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Rol </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 52
            echo twig_include($this->env, $context, "usuario/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 58
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 60
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 62
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 63
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()

    \$('#rol').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar rol.',
        title: 'Seleccione un rol.'
    })

    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#apellido').val('')
        \$('#ci').val('')
        \$('#correo').val('')
        \$('#username').val('')
        \$('#password').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        if(!validate_fields(['nombre', 'apellido'])){
            return
        }
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'username': \$('#username').val(),
            'password': \$('#password').val(),

            'rol': \$('#rol').val()
        })
        
        ajax_call(\"/usuario_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/usuario_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#apellido').val(self.apellido)
                \$('#ci').val(self.ci)
                \$('#correo').val(self.correo)
                \$('#username').val(self.username)

                \$('#rol').val(self.fkrol.id)
                \$('#rol').selectpicker('render')

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#cont-pass').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'username': \$('#username').val(),

            'rol': \$('#rol').val()
        })
        
        \$.ajax({
                url: \"/usuario_actualizar\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Usuario modificado.',
                            'Se modificó los datos correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Fallo en la actualizacion.',
                            'No se modificó la contraseña.',
                            'error'
                          )
                    }
                    \$('#form').modal('hide')
                    setTimeout(function(){window.location=main_route}, 2000)
            })

    })
    reload_form()

    \$('.upd-pass').click(function () { console.log('upd-pass');
        var id = \$(this).attr('data-json');
        \$('#user_id').val(id);
    }) 

    \$('#modal_update_password').on('shown.bs.modal', function () {
        \$('#new_pass').focus();
    })
    function Open_Modal()
    {
        \$('#new_pass').val('')
        \$('#new_rpass').val('')
        \$('#new_pass').parent().addClass('focused')
        \$('#new_rpass').parent().addClass('focused')
        \$('#modal_update_password').modal('show');
    }
    function Update_Password()
    {
        id = \$('#user_id').val()
        newp = \$('#new_pass').val()
        newp1 = \$('#new_rpass').val()
        objeto =JSON.stringify({'id' : id,'new_password' : newp, 'new_password_2':newp1})
        
        if(newp==newp1)
        {
            \$.ajax({
                url: \"/usuario_update_password\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Contraseña modificada.',
                            'Se modificó la contraseña correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Contraseña actual erronea.',
                            'No se modificó la contraseña.',
                            'error'
                          )
                    }
            })
        }
        else
        {
            swal(
                'Error de datos.',
                'Las contraseñas no son iguales.',
                'error'
              )
        }
    }
</script>
<script>
    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja al usuario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/usuario_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })
</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "usuario/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 63,  141 => 62,  133 => 60,  129 => 58,  120 => 52,  103 => 37,  101 => 36,  96 => 33,  88 => 29,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/usuario'

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

{{ include('usuario/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>USUARIO</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'usuario_insertar' in permisos %}    
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}   
        </div>
    </div>
    {% if 'home_usuario' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Nombre </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Apellido </th>                    
                    <th class=\"order_by_th\" data-name=\"phone\">Ci </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Correo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Username </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Rol </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('usuario/table.html.twig') }}
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

    \$('#rol').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar rol.',
        title: 'Seleccione un rol.'
    })

    \$('#new').click(function () {
        \$('#nombre').val('')
        \$('#apellido').val('')
        \$('#ci').val('')
        \$('#correo').val('')
        \$('#username').val('')
        \$('#password').val('')

        clean_form()
        verif_inputs()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        if(!validate_fields(['nombre', 'apellido'])){
            return
        }
        objeto = JSON.stringify({
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'username': \$('#username').val(),
            'password': \$('#password').val(),

            'rol': \$('#rol').val()
        })
        
        ajax_call(\"/usuario_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            });
            ajax_call_get(\"/usuario_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#nombre').val(self.nombre)
                \$('#apellido').val(self.apellido)
                \$('#ci').val(self.ci)
                \$('#correo').val(self.correo)
                \$('#username').val(self.username)

                \$('#rol').val(self.fkrol.id)
                \$('#rol').selectpicker('render')

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#cont-pass').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'nombre': \$('#nombre').val(),
            'apellido': \$('#apellido').val(),
            'ci': \$('#ci').val(),
            'correo': \$('#correo').val(),
            'username': \$('#username').val(),

            'rol': \$('#rol').val()
        })
        
        \$.ajax({
                url: \"/usuario_actualizar\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Usuario modificado.',
                            'Se modificó los datos correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Fallo en la actualizacion.',
                            'No se modificó la contraseña.',
                            'error'
                          )
                    }
                    \$('#form').modal('hide')
                    setTimeout(function(){window.location=main_route}, 2000)
            })

    })
    reload_form()

    \$('.upd-pass').click(function () { console.log('upd-pass');
        var id = \$(this).attr('data-json');
        \$('#user_id').val(id);
    }) 

    \$('#modal_update_password').on('shown.bs.modal', function () {
        \$('#new_pass').focus();
    })
    function Open_Modal()
    {
        \$('#new_pass').val('')
        \$('#new_rpass').val('')
        \$('#new_pass').parent().addClass('focused')
        \$('#new_rpass').parent().addClass('focused')
        \$('#modal_update_password').modal('show');
    }
    function Update_Password()
    {
        id = \$('#user_id').val()
        newp = \$('#new_pass').val()
        newp1 = \$('#new_rpass').val()
        objeto =JSON.stringify({'id' : id,'new_password' : newp, 'new_password_2':newp1})
        
        if(newp==newp1)
        {
            \$.ajax({
                url: \"/usuario_update_password\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Contraseña modificada.',
                            'Se modificó la contraseña correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Contraseña actual erronea.',
                            'No se modificó la contraseña.',
                            'error'
                          )
                    }
            })
        }
        else
        {
            swal(
                'Error de datos.',
                'Las contraseñas no son iguales.',
                'error'
              )
        }
    }
</script>
<script>
    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja al usuario?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/usuario_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })
</script>

{% endblock %}", "usuario/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\usuario\\index.html.twig");
    }
}
