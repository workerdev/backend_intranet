<?php

/* seguimientocro/form.html.twig */
class __TwigTemplate_fb1c9c6b80a4dda72c6c13aab81274a7231d094c6c9ca161729b1541b4161252 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientocro/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Seguimiento de Riesgos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Seguimiento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de seguimiento</label><br>
                            <input id=\"fechaseg\" name=\"fechaseg\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    
                    <label>Riesgo oportunidad</label>
                        <select id=\"fkriesgos\" class=\"form-control\">
                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["riesgos"]) || array_key_exists("riesgos", $context) ? $context["riesgos"] : (function () { throw new Twig_Error_Runtime('Variable "riesgos" does not exist.', 26, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 27
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "descripcion", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                        </select>
                        </br>
                        </br> 

                   <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fkresponsable"]) || array_key_exists("fkresponsable", $context) ? $context["fkresponsable"] : (function () { throw new Twig_Error_Runtime('Variable "fkresponsable" does not exist.', 35, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 36
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
        // line 38
        echo "                        </select>
                        </br>
                        </br> 
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observaciones\" name=\"observaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observaciones</label>
                        </div>
                    </div> 
                      <div class=\"form-group form-float\">
                         <label>Estado de seguimiento</label>
                        <select id=\"estadoseg\" class=\"form-control\">
                            <option value=\"PENDIENTE\">PENDIENTE</option>
                            <option value=\"CERRADO\">CERRADO</option>
                        </select>
                        </br>
                        </br>
                        </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "seguimientocro/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 38,  80 => 36,  76 => 35,  68 => 29,  57 => 27,  53 => 26,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Seguimiento de Riesgos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Seguimiento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de seguimiento</label><br>
                            <input id=\"fechaseg\" name=\"fechaseg\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    
                    <label>Riesgo oportunidad</label>
                        <select id=\"fkriesgos\" class=\"form-control\">
                        {% for tr in riesgos %}
                            <option value=\"{{tr.id}}\">{{tr.descripcion}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 

                   <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        {% for tr in fkresponsable %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"observaciones\" name=\"observaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Observaciones</label>
                        </div>
                    </div> 
                      <div class=\"form-group form-float\">
                         <label>Estado de seguimiento</label>
                        <select id=\"estadoseg\" class=\"form-control\">
                            <option value=\"PENDIENTE\">PENDIENTE</option>
                            <option value=\"CERRADO\">CERRADO</option>
                        </select>
                        </br>
                        </br>
                        </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "seguimientocro/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\seguimientocro\\form.html.twig");
    }
}
