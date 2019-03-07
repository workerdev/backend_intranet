<?php

/* usuario/form.html.twig */
class __TwigTemplate_186f02ca319407cc08fb891006c468563b063471e5c09607802f2beb7767175e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "usuario/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Usuario</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Usuario ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellido\" name=\"apellido\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Apellido</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"correo\" name=\"correo\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Correo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"username\" name=\"username\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Username</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\" id=\"cont-pass\">
                        <div class=\"form-line\">
                            <input id=\"password\" name=\"password\" type=\"password\" class=\"form-control\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>
                    
                    <label>Rol</label>
                        <select id=\"rol\" class=\"form-control\">
                        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rol"]) || array_key_exists("rol", $context) ? $context["rol"] : (function () { throw new Twig_Error_Runtime('Variable "rol" does not exist.', 51, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 52
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "nombre", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                        </select>
                        </br>
                        </br> 
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id=\"modal_update_password\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
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
                            <input id=\"user_id\" type=\"hidden\">
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
                <button id=\"update_pass\" type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"Update_Password();\"><i class=\"material-icons\">save</i> Guardar</button>
                <button id=\"close\" type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><i class=\"material-icons\">delete</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "usuario/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 54,  82 => 52,  78 => 51,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Usuario</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Usuario ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellido\" name=\"apellido\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Apellido</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"correo\" name=\"correo\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Correo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"username\" name=\"username\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Username</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\" id=\"cont-pass\">
                        <div class=\"form-line\">
                            <input id=\"password\" name=\"password\" type=\"password\" class=\"form-control\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>
                    
                    <label>Rol</label>
                        <select id=\"rol\" class=\"form-control\">
                        {% for tr in rol %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id=\"modal_update_password\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
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
                            <input id=\"user_id\" type=\"hidden\">
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
                <button id=\"update_pass\" type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"Update_Password();\"><i class=\"material-icons\">save</i> Guardar</button>
                <button id=\"close\" type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><i class=\"material-icons\">delete</i> Cancelar</button>
            </div>
        </div>
    </div>
</div>", "usuario/form.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\usuario\\form.html.twig");
    }
}
