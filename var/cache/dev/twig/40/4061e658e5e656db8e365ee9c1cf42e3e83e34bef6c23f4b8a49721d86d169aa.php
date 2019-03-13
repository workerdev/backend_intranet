<?php

/* riesgosoportunidades/form.html.twig */
class __TwigTemplate_07c40f57e2c8e69277280f853f05ab98bfc1f787b57a41864de1cad4c0574703 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "riesgosoportunidades/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Riesgos y Oportunidades</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Riesgos y oportunidades ID</label> 
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"descripcion\">Descripción</label>
                            <textarea id=\"descripcion\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"origen\">Origen</label>
                            <textarea id=\"origen\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"accion\">Acción</label>
                            <textarea id=\"accion\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"analisiscausaraiz\" name=\"analisiscausaraiz\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Analisis Causa Raiz</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        </br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                         <label>Estado</label>
                        <select id=\"estadocro\" class=\"form-control\">
                            <option value=\"\" disabled selected>Seleccione una opción</option>
                            <option value=\"PENDIENTE\">PENDIENTE</option>
                            <option value=\"CERRADO\">CERRADO</option>
                        </select>
                        </br>
                        </br>
                    </div>
                    
                    <label>Tipo de ficha de procesos</label>
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "codproceso", array()), "html", null, true);
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

                        <label>Tipo de riesgo</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo2"]) || array_key_exists("tipo2", $context) ? $context["tipo2"] : (function () { throw new Twig_Error_Runtime('Variable "tipo2" does not exist.', 71, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 72
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
        // line 74
        echo "                        </select>
                        </br>
                        </br>
                        <label>Tipo de probabilidad</label>
                        <select id=\"fkprobabilidad\" class=\"form-control\">
                        ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo3"]) || array_key_exists("tipo3", $context) ? $context["tipo3"] : (function () { throw new Twig_Error_Runtime('Variable "tipo3" does not exist.', 79, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 80
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
        // line 82
        echo "                        </select>
                        </br>
                        </br>

                        <label>Tipo de impacto</label>
                        <select id=\"fkimpacto\" class=\"form-control\">
                        ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo4"]) || array_key_exists("tipo4", $context) ? $context["tipo4"] : (function () { throw new Twig_Error_Runtime('Variable "tipo4" does not exist.', 88, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 89
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
        // line 91
        echo "                        </select>
                        </br>
                        </br>
                       
                       
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo5"]) || array_key_exists("tipo5", $context) ? $context["tipo5"] : (function () { throw new Twig_Error_Runtime('Variable "tipo5" does not exist.', 98, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 99
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
        // line 101
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
        return "riesgosoportunidades/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 101,  185 => 99,  181 => 98,  172 => 91,  161 => 89,  157 => 88,  149 => 82,  138 => 80,  134 => 79,  127 => 74,  116 => 72,  112 => 71,  104 => 65,  93 => 63,  89 => 62,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Riesgos y Oportunidades</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Riesgos y oportunidades ID</label> 
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"descripcion\">Descripción</label>
                            <textarea id=\"descripcion\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"origen\">Origen</label>
                            <textarea id=\"origen\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label for=\"accion\">Acción</label>
                            <textarea id=\"accion\" class=\"materialize-textarea\" data-length=\"120\"></textarea>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"analisiscausaraiz\" name=\"analisiscausaraiz\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Analisis Causa Raiz</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        </br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                         <label>Estado</label>
                        <select id=\"estadocro\" class=\"form-control\">
                            <option value=\"\" disabled selected>Seleccione una opción</option>
                            <option value=\"PENDIENTE\">PENDIENTE</option>
                            <option value=\"CERRADO\">CERRADO</option>
                        </select>
                        </br>
                        </br>
                    </div>
                    
                    <label>Tipo de ficha de procesos</label>
                        <select id=\"fkficha\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.codproceso}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                        <label>Tipo de riesgo</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        {% for t in tipo2 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                        <label>Tipo de probabilidad</label>
                        <select id=\"fkprobabilidad\" class=\"form-control\">
                        {% for t in tipo3 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                        <label>Tipo de impacto</label>
                        <select id=\"fkimpacto\" class=\"form-control\">
                        {% for t in tipo4 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                       
                       
                        <label>Responsable</label>
                        <select id=\"fkresponsable\" class=\"form-control\">
                        {% for t in tipo5 %}
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
</div>", "riesgosoportunidades/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\riesgosoportunidades\\form.html.twig");
    }
}
