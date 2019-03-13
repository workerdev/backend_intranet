<?php

/* personal/form.html.twig */
class __TwigTemplate_c44a99b7697cbe349003aaca1067d4355fc0d50cc91a2009089a4118509b16fd extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "personal/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Personal</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Personal ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellido\" name=\"apellido\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Apellido</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ci\" name=\"ci\" type=\"text\" class=\"form-control ci\">
                            <label class=\"form-label\">Ci</label>
                        </div>
                    </div><div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"correo\" name=\"correo\" type=\"text\" class=\"form-control email\">
                            <label class=\"form-label\">Correo</label>
                        </div>
                    </div><div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"telefono\" name=\"telefono\" type=\"text\" class=\"form-control telefono\">
                            <label class=\"form-label\">Teléfono</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        
                            <label class=\"form-label\">Fecha de Nacimiento</label>
                            </br>
                            </br>
                            <input id=\"fnac\" name=\"fnac\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <label>Tipo de Cargo</label>
                        <select id=\"fkprocesoscargo\" class=\"form-control\">
                        ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 56, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 57
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "                        </select>
                        </br>
                        </br>
                        <label>Tipo de Estado Personal</label>
                        <select id=\"fkestadopersonal\" class=\"form-control\">
                        ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo2"]) || array_key_exists("tipo2", $context) ? $context["tipo2"] : (function () { throw new Twig_Error_Runtime('Variable "tipo2" does not exist.', 64, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t2"]) {
            // line 65
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t2"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t2"], "nombre", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t2'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                        </select>
                        </br>
                        </br>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "personal/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 67,  109 => 65,  105 => 64,  98 => 59,  87 => 57,  83 => 56,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Personal</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Personal ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellido\" name=\"apellido\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Apellido</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ci\" name=\"ci\" type=\"text\" class=\"form-control ci\">
                            <label class=\"form-label\">Ci</label>
                        </div>
                    </div><div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"correo\" name=\"correo\" type=\"text\" class=\"form-control email\">
                            <label class=\"form-label\">Correo</label>
                        </div>
                    </div><div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"telefono\" name=\"telefono\" type=\"text\" class=\"form-control telefono\">
                            <label class=\"form-label\">Teléfono</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        
                            <label class=\"form-label\">Fecha de Nacimiento</label>
                            </br>
                            </br>
                            <input id=\"fnac\" name=\"fnac\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <label>Tipo de Cargo</label>
                        <select id=\"fkprocesoscargo\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                        <label>Tipo de Estado Personal</label>
                        <select id=\"fkestadopersonal\" class=\"form-control\">
                        {% for t2 in tipo2 %}
                            <option value=\"{{t2.id}}\">{{t2.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "personal/form.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\personal\\form.html.twig");
    }
}
