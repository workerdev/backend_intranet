<?php

/* seguimientoindicador/form.html.twig */
class __TwigTemplate_2d3d7e01c013b1a45bc3f2d7921eb670f0f18c19b537cf7b365d4360f88e6341 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientoindicador/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Indicador de Seguimiento</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Indicador de seguimiento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ano\" name=\"ano\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Año</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"mes\" name=\"mes\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Mes</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"valor\" name=\"valor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Valor</label>
                        </div>
                    </div>
                    
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observacion\" name=\"observacion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observación</label>
                        </div>
                    </div>
                    
                    
                    <label>Tipo de indicador</label>
                        <select id=\"fkindicador\" class=\"form-control\">
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 47
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "codigo", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "                        </select>
                        </br>
                        </br>
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo2"]) || array_key_exists("tipo2", $context) ? $context["tipo2"] : (function () { throw new Twig_Error_Runtime('Variable "tipo2" does not exist.', 54, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 55
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["t"], "apellido", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
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
        return "seguimientoindicador/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 57,  99 => 55,  95 => 54,  88 => 49,  77 => 47,  73 => 46,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Indicador de Seguimiento</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Indicador de seguimiento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ano\" name=\"ano\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Año</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"mes\" name=\"mes\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Mes</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"valor\" name=\"valor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Valor</label>
                        </div>
                    </div>
                    
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observacion\" name=\"observacion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observación</label>
                        </div>
                    </div>
                    
                    
                    <label>Tipo de indicador</label>
                        <select id=\"fkindicador\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.codigo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        {% for t in tipo2 %}
                            <option value=\"{{t.id}}\">{{t.nombre ~ ' ' ~ t.apellido}}</option>
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
</div>", "seguimientoindicador/form.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\seguimientoindicador\\form.html.twig");
    }
}
