<?php

/* documento/form.html.twig */
class __TwigTemplate_12e4f533c4fec4644d8f1c7fb58461387c007753f1feac7111f3d5c683e64d29 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documento/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">    </h3>
                <h4 id=\"cliente_enable\" class=\"\">Documento</h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Código</label>
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
                            <input id=\"versionvigente\" name=\"versionvigente\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Versión Vigente</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoarchivodig\" name=\"vinculoarchivodig\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vínculo archivo digital</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculodiagflujo\" name=\"vinculodiagflujo\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vínculo diagrama flujo</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha Publicación</label><br>
                            <input id=\"fechaPublicacion\" name=\"fechaPublicacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"carpetaOperativa\" name=\"carpetaOperativa\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Carpeta Operativa</label>
                        </div>
                    </div>

                    <label>Tipo de ficha</label>
                        <select id=\"fkficha\" class=\"form-control\">
                        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 63, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 64
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
        // line 66
        echo "                        </select>
                        </br>
                        </br>
                          
                    <label>Tipo de documento</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo2"]) || array_key_exists("tipo2", $context) ? $context["tipo2"] : (function () { throw new Twig_Error_Runtime('Variable "tipo2" does not exist.', 72, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 73
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
        // line 75
        echo "                        </select>
                        </br>
                        </br>
                          
                    <label>Tipo de aprobador</label>
                        <select id=\"fkaprobador\" class=\"form-control\">
                        ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo3"]) || array_key_exists("tipo3", $context) ? $context["tipo3"] : (function () { throw new Twig_Error_Runtime('Variable "tipo3" does not exist.', 81, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 82
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
        // line 84
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
        return "documento/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 84,  140 => 82,  136 => 81,  128 => 75,  117 => 73,  113 => 72,  105 => 66,  94 => 64,  90 => 63,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">    </h3>
                <h4 id=\"cliente_enable\" class=\"\">Documento</h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codigo\" name=\"codigo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Código</label>
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
                            <input id=\"versionvigente\" name=\"versionvigente\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Versión Vigente</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoarchivodig\" name=\"vinculoarchivodig\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vínculo archivo digital</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculodiagflujo\" name=\"vinculodiagflujo\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vínculo diagrama flujo</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha Publicación</label><br>
                            <input id=\"fechaPublicacion\" name=\"fechaPublicacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"carpetaOperativa\" name=\"carpetaOperativa\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Carpeta Operativa</label>
                        </div>
                    </div>

                    <label>Tipo de ficha</label>
                        <select id=\"fkficha\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.codproceso}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                          
                    <label>Tipo de documento</label>
                        <select id=\"fktipo\" class=\"form-control\">
                        {% for t in tipo2 %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                          
                    <label>Tipo de aprobador</label>
                        <select id=\"fkaprobador\" class=\"form-control\">
                        {% for t in tipo3 %}
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
</div>", "documento/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\documento\\form.html.twig");
    }
}
