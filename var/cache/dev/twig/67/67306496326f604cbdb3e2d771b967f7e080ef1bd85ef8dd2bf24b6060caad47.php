<?php

/* indicadorproceso/form.html.twig */
class __TwigTemplate_02b1a0ab9c55ad46fd156ad8f3939b1f4566abd6d0784aac2d957b04cf00d740 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "indicadorproceso/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Indicador de Proceso</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Indicador de proceso ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"formula\" name=\"formula\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Fórmula</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"metaanual\" name=\"metaanual\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Meta Anual</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"metamensual\" name=\"metamensual\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Meta Mensual</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Codigo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"objetivo\" name=\"objetivo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Objetivo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vigente\" name=\"vigente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vigente</label>
                        </div>
                    </div>
                    
                    <label>Tipo de ficha</label>
                        <select id=\"fkficha\" class=\"form-control\">
                        ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 62, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 63
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
        // line 65
        echo "                        </select>
                        </br>
                        </br> 
                    <label>Tipo de unidad</label>
                        <select id=\"fkunidad\" class=\"form-control\">
                        ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo2"]) || array_key_exists("tipo2", $context) ? $context["tipo2"] : (function () { throw new Twig_Error_Runtime('Variable "tipo2" does not exist.', 70, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 71
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
        // line 73
        echo "                        </select>
                        </br>
                        </br> 
                    <label>Tipo de responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo3"]) || array_key_exists("tipo3", $context) ? $context["tipo3"] : (function () { throw new Twig_Error_Runtime('Variable "tipo3" does not exist.', 78, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 79
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
        // line 81
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
        return "indicadorproceso/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 81,  137 => 79,  133 => 78,  126 => 73,  115 => 71,  111 => 70,  104 => 65,  93 => 63,  89 => 62,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Indicador de Proceso</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Indicador de proceso ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"formula\" name=\"formula\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Fórmula</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"metaanual\" name=\"metaanual\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Meta Anual</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"metamensual\" name=\"metamensual\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Meta Mensual</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Codigo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"objetivo\" name=\"objetivo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Objetivo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vigente\" name=\"vigente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vigente</label>
                        </div>
                    </div>
                    
                    <label>Tipo de ficha</label>
                        <select id=\"fkficha\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    <label>Tipo de unidad</label>
                        <select id=\"fkunidad\" class=\"form-control\">
                        {% for t in tipo2 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    <label>Tipo de responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        {% for t in tipo3 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
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
</div>", "indicadorproceso/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\indicadorproceso\\form.html.twig");
    }
}
