<?php

/* documentoformulario/form.html.twig */
class __TwigTemplate_11d0a5de45ce6f6627aad304d12e803ba61fdb518b3bf5d0e1b2ac455ebe90e7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentoformulario/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento Formulario</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento formulario ID</label>
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
                            <input id=\"versionVigente\" name=\"versionVigente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Versión vigente</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de publicación</label><br>
                            <input id=\"fechaPublicacion\" name=\"fechaPublicacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadoPor\" name=\"aprobadoPor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobador</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoFileDig\" namie=\"vinculoFileDig\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vinculo del archivo digital</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoFileDesc\" name=\"vinculoFileDesc\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vinculo del archivo de descarga</label>
                        </div>
                    </div>
                    
                    <label>Documento</label>
                        <select id=\"fkdocumento\" class=\"form-control\">
                        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documento"]) || array_key_exists("documento", $context) ? $context["documento"] : (function () { throw new Twig_Error_Runtime('Variable "documento" does not exist.', 63, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 64
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "codigo", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </select>
                        </br>
                        </br> 
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
        return "documentoformulario/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 66,  94 => 64,  90 => 63,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento Formulario</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento formulario ID</label>
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
                            <input id=\"versionVigente\" name=\"versionVigente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Versión vigente</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de publicación</label><br>
                            <input id=\"fechaPublicacion\" name=\"fechaPublicacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadoPor\" name=\"aprobadoPor\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobador</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoFileDig\" namie=\"vinculoFileDig\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Vinculo del archivo digital</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"vinculoFileDesc\" name=\"vinculoFileDesc\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Vinculo del archivo de descarga</label>
                        </div>
                    </div>
                    
                    <label>Documento</label>
                        <select id=\"fkdocumento\" class=\"form-control\">
                        {% for tr in documento %}
                            <option value=\"{{tr.id}}\">{{tr.codigo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br> 
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "documentoformulario/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\documentoformulario\\form.html.twig");
    }
}
