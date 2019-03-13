<?php

/* fichaprocesos/form.html.twig */
class __TwigTemplate_9a04992709cd88a9ae8b531a4e44196750d5ff355d6cf833e4235a9891c22cb7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "fichaprocesos/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span>
                </button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Ficha de Procesos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Ficha de Proceso ID</label>
                        </div>
                    </div>
                    <label>Tipo de Área, Gerencia y Sector</label>
                    <select id=\"fkareagerenciasector\" class=\"form-control\">
                        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 21
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fksector", array()), "nombre", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "                    </select>
                    </br>
                    </br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codproceso\" name=\"codproceso\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Cod. Proceso</label>
                        </div>
                    </div>
                    <br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Objetivo</label>
                        <textarea id=\"objetivo\" name=\"objetivo\" class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label>Vigente</label>
                        <select id=\"vigente\" class=\"form-control\">
                            <option value=\"SI\">SI</option>
                            <option value=\"NO\">NO</option>
                        </select>
                        </br>
                        </br>

                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"version\" name=\"version\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Versión</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de emisión</label><br>
                            <input id=\"fechaemision\" name=\"fechaemision\" type=\"date\"
                                   class=\"form-control text datepicker\">
                            ";
        // line 66
        echo "                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Entradas requeridas</label>
                        <textarea id=\"entradasrequeridas\" name=\"entradasrequeridas\"
                                  class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Salidas esperadas</label>
                        <textarea id=\"salidasesperadas\" name=\"salidasesperadas\" class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\" for=\"recursosnecesarios\">Recursos necesarios</label>
                        <textarea id=\"recursosnecesarios\" name=\"recursosnecesarios\"
                                  class=\"materialize-textarea\"></textarea>
                        ";
        // line 82
        echo "                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i
                                class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i
                                class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "fichaprocesos/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 82,  106 => 66,  62 => 23,  51 => 21,  47 => 20,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span>
                </button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Ficha de Procesos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Ficha de Proceso ID</label>
                        </div>
                    </div>
                    <label>Tipo de Área, Gerencia y Sector</label>
                    <select id=\"fkareagerenciasector\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{ t.id }}\">{{ t.fkarea.nombre ~' | '~ t.fkgerencia.nombre ~' | '~  t.fksector.nombre }}</option>
                        {% endfor %}
                    </select>
                    </br>
                    </br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"codproceso\" name=\"codproceso\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Cod. Proceso</label>
                        </div>
                    </div>
                    <br>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Objetivo</label>
                        <textarea id=\"objetivo\" name=\"objetivo\" class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label>Vigente</label>
                        <select id=\"vigente\" class=\"form-control\">
                            <option value=\"SI\">SI</option>
                            <option value=\"NO\">NO</option>
                        </select>
                        </br>
                        </br>

                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"version\" name=\"version\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Versión</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de emisión</label><br>
                            <input id=\"fechaemision\" name=\"fechaemision\" type=\"date\"
                                   class=\"form-control text datepicker\">
                            {#<input id=\"fechaemision\" name=\"fechaemision\" type=\"date\">#}
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Entradas requeridas</label>
                        <textarea id=\"entradasrequeridas\" name=\"entradasrequeridas\"
                                  class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\">Salidas esperadas</label>
                        <textarea id=\"salidasesperadas\" name=\"salidasesperadas\" class=\"materialize-textarea\"></textarea>
                    </div>
                    <div class=\"form-group form-float\">
                        <label class=\"form-label\" for=\"recursosnecesarios\">Recursos necesarios</label>
                        <textarea id=\"recursosnecesarios\" name=\"recursosnecesarios\"
                                  class=\"materialize-textarea\"></textarea>
                        {#<input id=\"recursosnecesarios\" name=\"recursosnecesarios\" type=\"text\" class=\"form-control text\">#}
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i
                                class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i
                                class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "fichaprocesos/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\fichaprocesos\\form.html.twig");
    }
}
