<?php

/* documentoproceso/form.html.twig */
class __TwigTemplate_eae38b6468d989d3f580c4bbc6727edf5d165e79a585755e49a0b061039daaf7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentoproceso/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en proceso</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento en proceso ID</label>
                        </div>
                    </div>

                    <label>Nuevo/Actualización</label>
                        <select id=\"nuevoactualizacion\" class=\"form-control\">
                            <option value=\"Nuevo\">Nuevo</option>
                            <option value=\"Actualizacion\">Actualización</option>
                        </select>
                        </br>
                        </br>
                    
                    <label>Ficha de proceso</label>
                        <select id=\"proceso\" class=\"form-control\">
                        ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["proceso"]) || array_key_exists("proceso", $context) ? $context["proceso"] : (function () { throw new Twig_Error_Runtime('Variable "proceso" does not exist.', 28, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 29
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
        // line 31
        echo "                        </select>
                        </br>
                        </br> 
                        
                    <label>Tipo de Documento</label>
                        <select id=\"tipo\" class=\"form-control\">
                        ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 38
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
        // line 40
        echo "                        </select>
                        </br>
                        </br>  

                    <label>Documento</label>
                        <select id=\"documento\" class=\"form-control\">
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documento"]) || array_key_exists("documento", $context) ? $context["documento"] : (function () { throw new Twig_Error_Runtime('Variable "documento" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 47
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
        // line 49
        echo "                        </select>
                        </br>
                        </br> 
                   
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"titulo\" name=\"titulo\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Título</label>
                        </div>
                    </div>
                   
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"versionvigente\" name=\"versionvigente\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Versión vigente</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoarchivo\" name=\"vinculoarchivo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vinculo Archivo</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"carpetaoperativa\" name=\"carpetaoperativa\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Carpeta Operativa</label>
                        </div>
                    </div>

                    <label>Aprobado/Rechazado</label>
                        <select id=\"aprobadorechazado\" class=\"form-control\">
                            <option value=\"Aprobado\">Aprobado</option>
                            <option value=\"Rechazado\">Rechazado</option>
                        </select>
                        </br>
                        </br>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadopor\" name=\"aprobadopor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha Aprobación</label><br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\" class=\"form-control\">
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
        return "documentoproceso/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 49,  105 => 47,  101 => 46,  93 => 40,  82 => 38,  78 => 37,  70 => 31,  59 => 29,  55 => 28,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en proceso</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento en proceso ID</label>
                        </div>
                    </div>

                    <label>Nuevo/Actualización</label>
                        <select id=\"nuevoactualizacion\" class=\"form-control\">
                            <option value=\"Nuevo\">Nuevo</option>
                            <option value=\"Actualizacion\">Actualización</option>
                        </select>
                        </br>
                        </br>
                    
                    <label>Ficha de proceso</label>
                        <select id=\"proceso\" class=\"form-control\">
                        {% for t in proceso %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                        
                    <label>Tipo de Documento</label>
                        <select id=\"tipo\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.nombre}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>  

                    <label>Documento</label>
                        <select id=\"documento\" class=\"form-control\">
                        {% for t in documento %}
                            <option value=\"{{t.id}}\">{{t.titulo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                   
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"titulo\" name=\"titulo\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Título</label>
                        </div>
                    </div>
                   
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"versionvigente\" name=\"versionvigente\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Versión vigente</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoarchivo\" name=\"vinculoarchivo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vinculo Archivo</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"carpetaoperativa\" name=\"carpetaoperativa\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Carpeta Operativa</label>
                        </div>
                    </div>

                    <label>Aprobado/Rechazado</label>
                        <select id=\"aprobadorechazado\" class=\"form-control\">
                            <option value=\"Aprobado\">Aprobado</option>
                            <option value=\"Rechazado\">Rechazado</option>
                        </select>
                        </br>
                        </br>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadopor\" name=\"aprobadopor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha Aprobación</label><br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\" class=\"form-control\">
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
</div>", "documentoproceso/form.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\documentoproceso\\form.html.twig");
    }
}
