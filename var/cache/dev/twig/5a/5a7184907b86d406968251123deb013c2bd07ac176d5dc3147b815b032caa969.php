<?php

/* docprocesorev/form.html.twig */
class __TwigTemplate_0899996b623b2aceddaa5eda997f36e4addd6fa75d4838ee231b10aced35e749 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "docprocesorev/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en Revision</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Docmento Revision ID</label>
                        </div>
                    </div>
                     <label>Documento en Proceso</label>
                        <select id=\"fkdocs\" class=\"form-control\">
                        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 20
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
        // line 22
        echo "                        </select>
                        </br>
                        </br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        <br>
                        <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                            
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
                            <input id=\"firma\" name=\"firma\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma</label>
                        </div>
                    </div>  
                      <div class=\"form-group form-float\">
                         <label>Estado Documento</label>
                        <select id=\"estadodoc\" class=\"form-control\">
                            <option value=\"APROVADO\">APROVADO</option>
                            <option value=\"DERIVADO\">DERIVADO</option>
                            <option value=\"RECHAZADO\">RECHAZADO</option>
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
        return "docprocesorev/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 22,  50 => 20,  46 => 19,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en Revision</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Docmento Revision ID</label>
                        </div>
                    </div>
                     <label>Documento en Proceso</label>
                        <select id=\"fkdocs\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.titulo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        <br>
                        <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                            
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
                            <input id=\"firma\" name=\"firma\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma</label>
                        </div>
                    </div>  
                      <div class=\"form-group form-float\">
                         <label>Estado Documento</label>
                        <select id=\"estadodoc\" class=\"form-control\">
                            <option value=\"APROVADO\">APROVADO</option>
                            <option value=\"DERIVADO\">DERIVADO</option>
                            <option value=\"RECHAZADO\">RECHAZADO</option>
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
</div>", "docprocesorev/form.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\docprocesorev\\form.html.twig");
    }
}
