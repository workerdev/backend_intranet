<?php

/* hallazgo/form.html.twig */
class __TwigTemplate_d2269676cc2b0e56cf24abab202cb5395bceeb1f1da9ae94fac99d82216fc04b extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "hallazgo/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Hallazgo</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Hallazgo ID</label>
                        </div>
                    </div>
                    
                    <label>Auditoría</label>
                        <select id=\"fkauditoria\" class=\"form-control\">
                        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["auditoria"]) || array_key_exists("auditoria", $context) ? $context["auditoria"] : (function () { throw new Twig_Error_Runtime('Variable "auditoria" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 21
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
        // line 23
        echo "                        </select>
                        </br>
                        </br>

                    <label>Tipo de Hallazgo</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 29, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 30
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
        // line 32
        echo "                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ordinal\" name=\"ordinal\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Ordinal</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"titulo\" name=\"titulo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Título</label>
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
                            <input id=\"evidencia\" name=\"evidencia\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Evidencia</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"documento\" name=\"documento\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Documento</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"puntoiso\" name=\"puntoiso\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Punto ISO</label>
                        </div>
                    </div>
                    
                    <label>Nivel de Impacto</label>
                        <select id=\"fkimpacto\" class=\"form-control\">
                        ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["impacto"]) || array_key_exists("impacto", $context) ? $context["impacto"] : (function () { throw new Twig_Error_Runtime('Variable "impacto" does not exist.', 75, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 76
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
        // line 78
        echo "                        </select>
                        </br>
                        </br>

                    <label>Probabilidad</label>
                        <select id=\"fkprobabilidad\" class=\"form-control\">
                        ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["probabilidad"]) || array_key_exists("probabilidad", $context) ? $context["probabilidad"] : (function () { throw new Twig_Error_Runtime('Variable "probabilidad" does not exist.', 84, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 85
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
        // line 87
        echo "                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"analisiscausaraiz\" name=\"analisiscausaraiz\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Análisis causa raíz</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"recomendaciones\" name=\"recomendaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Recomendaciones</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"cargoauditado\" name=\"cargoauditado\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Cargo del auditado</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombreauditado\" name=\"nombreauditado\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre del auditado</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsable\" name=\"responsable\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Responsable</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de registro</label><br>
                            <input id=\"fecharegistro\" name=\"fecharegistro\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
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
        return "hallazgo/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 87,  157 => 85,  153 => 84,  145 => 78,  134 => 76,  130 => 75,  85 => 32,  74 => 30,  70 => 29,  62 => 23,  51 => 21,  47 => 20,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Hallazgo</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Hallazgo ID</label>
                        </div>
                    </div>
                    
                    <label>Auditoría</label>
                        <select id=\"fkauditoria\" class=\"form-control\">
                        {% for t in auditoria %}
                            <option value=\"{{t.id}}\">{{t.codigo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                    <label>Tipo de Hallazgo</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"ordinal\" name=\"ordinal\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Ordinal</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"titulo\" name=\"titulo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Título</label>
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
                            <input id=\"evidencia\" name=\"evidencia\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Evidencia</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"documento\" name=\"documento\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Documento</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"puntoiso\" name=\"puntoiso\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Punto ISO</label>
                        </div>
                    </div>
                    
                    <label>Nivel de Impacto</label>
                        <select id=\"fkimpacto\" class=\"form-control\">
                        {% for t in impacto %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                    <label>Probabilidad</label>
                        <select id=\"fkprobabilidad\" class=\"form-control\">
                        {% for t in probabilidad %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"analisiscausaraiz\" name=\"analisiscausaraiz\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Análisis causa raíz</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"recomendaciones\" name=\"recomendaciones\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Recomendaciones</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"cargoauditado\" name=\"cargoauditado\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Cargo del auditado</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombreauditado\" name=\"nombreauditado\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre del auditado</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsable\" name=\"responsable\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Responsable</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de registro</label><br>
                            <input id=\"fecharegistro\" name=\"fecharegistro\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "hallazgo/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\hallazgo\\form.html.twig");
    }
}
