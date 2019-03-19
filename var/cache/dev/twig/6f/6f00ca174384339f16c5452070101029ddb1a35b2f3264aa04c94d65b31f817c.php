<?php

/* cobertura/form.html.twig */
class __TwigTemplate_a179859c0f4c91bf571f09dd3d08e3118ffb32c30c93f7a2513a6ece492f0b62 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "cobertura/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Cobertura</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">ID</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"unidad\" name=\"unidad\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Unidad</label>
                        </div>
                    </div>
                    
                    <label>Tipo de cobertura</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 28
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
        // line 30
        echo "                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"anio\" name=\"anio\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Año</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>Mes</label>
                        <select id=\"mes\" class=\"form-control\" onchange=\"hideContenido(this)\">
                            <option value=\"ENERO\">ENERO</option>
                            <option value=\"FEBRERO\">FEBRERO</option>
                            <option value=\"MARZO\">MARZO</option>
                            <option value=\"ABRIL\">ABRIL</option>
                            <option value=\"MAYO\">MAYO</option>
                            <option value=\"JUNIO\">JUNIO</option>
                            <option value=\"JULIO\">JULIO</option>
                            <option value=\"AGOSTO\">AGOSTO</option>
                            <option value=\"SEPTIEMBRE\">SEPTIEMBRE</option>
                            <option value=\"OCTUBRE\">OCTUBRE</option>
                            <option value=\"NOVIEMBRE\">NOVIEMBRE</option>
                            <option value=\"DICIEMBRE\">DICIEMBRE</option>
                        </select>
                        </br>
                        </br>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"valor\" name=\"valor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Valor</label>
                        </div>
                    </div>
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
        return "cobertura/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 30,  58 => 28,  54 => 27,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Cobertura</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">ID</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"unidad\" name=\"unidad\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Unidad</label>
                        </div>
                    </div>
                    
                    <label>Tipo de cobertura</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        {% for tr in tipo %}
                            <option value=\"{{tr.id}}\">{{tr.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"anio\" name=\"anio\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Año</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>Mes</label>
                        <select id=\"mes\" class=\"form-control\" onchange=\"hideContenido(this)\">
                            <option value=\"ENERO\">ENERO</option>
                            <option value=\"FEBRERO\">FEBRERO</option>
                            <option value=\"MARZO\">MARZO</option>
                            <option value=\"ABRIL\">ABRIL</option>
                            <option value=\"MAYO\">MAYO</option>
                            <option value=\"JUNIO\">JUNIO</option>
                            <option value=\"JULIO\">JULIO</option>
                            <option value=\"AGOSTO\">AGOSTO</option>
                            <option value=\"SEPTIEMBRE\">SEPTIEMBRE</option>
                            <option value=\"OCTUBRE\">OCTUBRE</option>
                            <option value=\"NOVIEMBRE\">NOVIEMBRE</option>
                            <option value=\"DICIEMBRE\">DICIEMBRE</option>
                        </select>
                        </br>
                        </br>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"valor\" name=\"valor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Valor</label>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "cobertura/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec Backend\\Intranet-Backend\\templates\\cobertura\\form.html.twig");
    }
}
