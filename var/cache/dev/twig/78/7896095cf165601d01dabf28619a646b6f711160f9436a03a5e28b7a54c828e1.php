<?php

/* seguimientoplan/form.html.twig */
class __TwigTemplate_5012a960db0ce82e4ba43d56cc82b5b816871ecd54e8f043dc17519593707270 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientoplan/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Seguimiento de Plan</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Seguimiento de plan ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsable\" name=\"responsable\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Responsable</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control text\">
                            <label class=\"form-label\">Fecha</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observaciones\" name=\"observaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observaciones</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <br>
                            <input id=\"fechaimplementacion\" name=\"fechaimplementacion\" type=\"date\" class=\"form-control text\">
                            <label class=\"form-label\">Fecha de Implementación</label>
                        </div>
                    </div>
                    
                    <label>Estado de Plan</label>
                        <select id=\"fkestado\" class=\"form-control\">
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["estado"]) || array_key_exists("estado", $context) ? $context["estado"] : (function () { throw new Twig_Error_Runtime('Variable "estado" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 47
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
        // line 49
        echo "                        </select>
                        </br>
                        </br> 
                    <label>Plan de Acción</label>
                        <select id=\"fkplan\" class=\"form-control\">
                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new Twig_Error_Runtime('Variable "plan" does not exist.', 54, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 55
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "titulo", array()), "html", null, true);
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
        return "seguimientoplan/form.html.twig";
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
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Seguimiento de Plan</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Seguimiento de plan ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsable\" name=\"responsable\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Responsable</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control text\">
                            <label class=\"form-label\">Fecha</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observaciones\" name=\"observaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observaciones</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <br>
                            <input id=\"fechaimplementacion\" name=\"fechaimplementacion\" type=\"date\" class=\"form-control text\">
                            <label class=\"form-label\">Fecha de Implementación</label>
                        </div>
                    </div>
                    
                    <label>Estado de Plan</label>
                        <select id=\"fkestado\" class=\"form-control\">
                        {% for t in estado %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    <label>Plan de Acción</label>
                        <select id=\"fkplan\" class=\"form-control\">
                        {% for t in plan %}
                            <option value=\"{{t.id}}\">{{t.titulo}}</option>
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
</div>", "seguimientoplan/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\seguimientoplan\\form.html.twig");
    }
}
