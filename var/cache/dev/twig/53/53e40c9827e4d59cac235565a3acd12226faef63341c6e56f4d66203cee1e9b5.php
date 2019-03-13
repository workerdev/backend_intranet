<?php

/* perfil/index.html.twig */
class __TwigTemplate_ebf9b55d70af589ae6e2abea2060081f9fe277a30ad07fe0312548ebeaa4ee62 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "perfil/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "perfil/index.html.twig"));

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
    main_route = '/perfil'

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
        echo twig_include($this->env, $context, "perfil/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>PERFIL DE USUARIO</h2></div>
<div class=\"body\">
    <form class=\"form-horizontal\">
        <input type=\"hidden\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 28, $this->source); })()), "id", array()), "html", null, true);
        echo "\" id=\"user_id\">
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Nombre</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input  type=\"text\" id=\"name_profile\" class=\"form-control nombres\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 36, $this->source); })()), "nombre", array()), "html", null, true);
        echo "\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Apellido</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input  type=\"text\" id=\"lastname_profile\" class=\"form-control nombres\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 48, $this->source); })()), "apellido", array()), "html", null, true);
        echo "\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Correo electrónico</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"mail_profile\" class=\"form-control\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 60, $this->source); })()), "correo", array()), "html", null, true);
        echo "\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_empresa_profile\">Rol</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"rol_profile\" class=\"form-control\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 72, $this->source); })()), "fkrol", array()), "nombre", array()), "html", null, true);
        echo "\" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"username_profile\">Nombre de usuario</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"username_profile\" class=\"form-control\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["profile"]) || array_key_exists("profile", $context) ? $context["profile"] : (function () { throw new Twig_Error_Runtime('Variable "profile" does not exist.', 84, $this->source); })()), "username", array()), "html", null, true);
        echo "\" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5\">
                <button type=\"button\" class=\"btn btn-primary m-t-15 waves-effect\" onclick=\"Modificar_Perfil();\">GUARDAR</button>
                <button type=\"button\" class=\"btn btn-primary m-t-15 waves-effect\" onclick=\"Open_Modal_Pass();\">MODIFICAR CONTRASEÑA</button>
            </div>
        </div>
    </form>
</div>

<div id=\"modal_modificar_password\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"user_tittle\" class=\"modal-title\">Modificar Contraseña</h3>
                <h4 id=\"user_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"user_form_body\" class=\"box-body\">
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"new_pass\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Nueva contraseña</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"new_rpass\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Repita su contraseña</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button id=\"modify_pass\" type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\" onclick=\"Modificar_Password();\"><i class=\"material-icons\">save</i> Guardar</button>
                <button id=\"close\" type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><i class=\"material-icons\">delete</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 130
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 131
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()

    \$('#modal_modificar_password').on('shown.bs.modal', function () {
        \$('#new_pass').focus();
    })

    function Open_Modal_Pass()
    {
        \$('#new_pass').val('')
        \$('#new_rpass').val('')
        \$('#new_pass').parent().addClass('focused')
        \$('#new_rpass').parent().addClass('focused')
        \$('#modal_modificar_password').modal('show');
    }

    function Modificar_Password()
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

    function Modificar_Perfil()
    {
        id = \$('#user_id').val()
        mail = \$('#mail_profile').val()
        name = \$('#name_profile').val()
        lastname = \$('#lastname_profile').val()
        objeto =JSON.stringify({'id' : id,'nombre' : name,'apellido' : lastname,'correo':mail})

        \$.ajax({
                url: \"/usuario_update_profile\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Perfil modificado.',
                            'Se modificó el perfil de usuario correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Perfil no modificado.',
                            'No se modificó el perfil de usuario.',
                            'error'
                          )
                    }
            })
    }
    reload_form()
</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "perfil/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 131,  211 => 130,  158 => 84,  143 => 72,  128 => 60,  113 => 48,  98 => 36,  87 => 28,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
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
    main_route = '/perfil'

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

{{ include('perfil/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>PERFIL DE USUARIO</h2></div>
<div class=\"body\">
    <form class=\"form-horizontal\">
        <input type=\"hidden\" value=\"{{profile.id}}\" id=\"user_id\">
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Nombre</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input  type=\"text\" id=\"name_profile\" class=\"form-control nombres\" value=\"{{profile.nombre}}\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Apellido</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input  type=\"text\" id=\"lastname_profile\" class=\"form-control nombres\" value=\"{{profile.apellido  }}\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_profile\">Correo electrónico</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"mail_profile\" class=\"form-control\" value=\"{{profile.correo}}\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"name_empresa_profile\">Rol</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"rol_profile\" class=\"form-control\" value=\"{{profile.fkrol.nombre}}\" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label\">
                <label for=\"username_profile\">Nombre de usuario</label>
            </div>
            <div class=\"col-lg-10 col-md-10 col-sm-8 col-xs-7\">
                <div class=\"form-group\">
                    <div class=\"form-line\">
                        <input type=\"text\" id=\"username_profile\" class=\"form-control\" value=\"{{profile.username}}\" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row clearfix\">
            <div class=\"col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5\">
                <button type=\"button\" class=\"btn btn-primary m-t-15 waves-effect\" onclick=\"Modificar_Perfil();\">GUARDAR</button>
                <button type=\"button\" class=\"btn btn-primary m-t-15 waves-effect\" onclick=\"Open_Modal_Pass();\">MODIFICAR CONTRASEÑA</button>
            </div>
        </div>
    </form>
</div>

<div id=\"modal_modificar_password\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"user_tittle\" class=\"modal-title\">Modificar Contraseña</h3>
                <h4 id=\"user_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"user_form_body\" class=\"box-body\">
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"new_pass\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Nueva contraseña</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"new_rpass\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Repita su contraseña</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button id=\"modify_pass\" type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\" onclick=\"Modificar_Password();\"><i class=\"material-icons\">save</i> Guardar</button>
                <button id=\"close\" type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><i class=\"material-icons\">delete</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
{%endblock%}
{% block javascripts %}
<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

<script>
    attach_validators()

    \$('#modal_modificar_password').on('shown.bs.modal', function () {
        \$('#new_pass').focus();
    })

    function Open_Modal_Pass()
    {
        \$('#new_pass').val('')
        \$('#new_rpass').val('')
        \$('#new_pass').parent().addClass('focused')
        \$('#new_rpass').parent().addClass('focused')
        \$('#modal_modificar_password').modal('show');
    }

    function Modificar_Password()
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

    function Modificar_Perfil()
    {
        id = \$('#user_id').val()
        mail = \$('#mail_profile').val()
        name = \$('#name_profile').val()
        lastname = \$('#lastname_profile').val()
        objeto =JSON.stringify({'id' : id,'nombre' : name,'apellido' : lastname,'correo':mail})

        \$.ajax({
                url: \"/usuario_update_profile\",
                type: \"post\",
                data: {object:objeto, _xsrf: getCookie(\"_xsrf\")},
            }).done(function (response) {
                    valor=JSON.parse(response)
                    if(valor.success)
                    {
                        swal(
                            'Perfil modificado.',
                            'Se modificó el perfil de usuario correctamente.',
                            'success'
                          )
                    }
                    else
                    {
                        swal(
                            'Perfil no modificado.',
                            'No se modificó el perfil de usuario.',
                            'error'
                          )
                    }
            })
    }
    reload_form()
</script>

{% endblock %}", "perfil/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\perfil\\index.html.twig");
    }
}
