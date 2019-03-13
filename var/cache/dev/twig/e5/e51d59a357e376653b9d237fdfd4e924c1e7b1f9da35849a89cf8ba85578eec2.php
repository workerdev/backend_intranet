<?php

/* gciarsector/form.html.twig */
class __TwigTemplate_46690cc087a0308a8d796e95c01772de6e2da8fc6b91fb908fb2ade65be4af14 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "gciarsector/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Gerencia, Área y Sector</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Gerencia, Área y Sector ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">codigo</label>
                        </div>
                    </div>

                    <label>Vigente</label>
                        <select id=\"vigente\" name=\"vigente\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
                    
                    <label>Gerencia</label>
                        <select id=\"fkgerencia\" name=\"fkgerencia\" class=\"form-control\">
                        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gerencia"]) || array_key_exists("gerencia", $context) ? $context["gerencia"] : (function () { throw new Twig_Error_Runtime('Variable "gerencia" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 35
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
        // line 37
        echo "                        </select>
                        </br>
                        </br> 
                    
                    <label>Área</label>
                        <select id=\"fkarea\" class=\"form-control\">
                        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["area"]) || array_key_exists("area", $context) ? $context["area"] : (function () { throw new Twig_Error_Runtime('Variable "area" does not exist.', 43, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 44
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
        // line 46
        echo "                        </select>
                        </br>
                        </br> 
                    
                    <label>Sector</label>
                        <select id=\"fksector\" class=\"form-control\">
                        ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sector"]) || array_key_exists("sector", $context) ? $context["sector"] : (function () { throw new Twig_Error_Runtime('Variable "sector" does not exist.', 52, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 53
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
        // line 55
        echo "                        </select>
                        </br>
                        </br> 
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fkresponsable"]) || array_key_exists("fkresponsable", $context) ? $context["fkresponsable"] : (function () { throw new Twig_Error_Runtime('Variable "fkresponsable" does not exist.', 60, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 61
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["tr"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["tr"], "apellido", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
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
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "gciarsector/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 63,  133 => 61,  129 => 60,  122 => 55,  111 => 53,  107 => 52,  99 => 46,  88 => 44,  84 => 43,  76 => 37,  65 => 35,  61 => 34,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Gerencia, Área y Sector</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Gerencia, Área y Sector ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">codigo</label>
                        </div>
                    </div>

                    <label>Vigente</label>
                        <select id=\"vigente\" name=\"vigente\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
                    
                    <label>Gerencia</label>
                        <select id=\"fkgerencia\" name=\"fkgerencia\" class=\"form-control\">
                        {% for tr in gerencia %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    
                    <label>Área</label>
                        <select id=\"fkarea\" class=\"form-control\">
                        {% for tr in area %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                    
                    <label>Sector</label>
                        <select id=\"fksector\" class=\"form-control\">
                        {% for tr in sector %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        {% for tr in fkresponsable %}
                            <option value=\"{{tr.id}}\">{{tr.nombre ~ ' ' ~ tr.apellido}}</option>
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
</div>", "gciarsector/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\gciarsector\\form.html.twig");
    }
}
