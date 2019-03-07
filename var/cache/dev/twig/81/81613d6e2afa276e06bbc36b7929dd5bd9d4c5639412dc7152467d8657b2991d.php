<?php

/* accionreprograma/form.html.twig */
class __TwigTemplate_df6e41d4a2288131f8710913be7567af9799624cd36525813ade7f0955410f5b extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accionreprograma/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Reprograma de Acción</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Reprograma de Acción ID</label>
                        </div>
                    </div>
                    
                    <label>Acción</label>
                        <select id=\"fkaccion\" class=\"form-control\" onchange=\"addDate()\">
                        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["accion"]) || array_key_exists("accion", $context) ? $context["accion"] : (function () { throw new Twig_Error_Runtime('Variable "accion" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 21
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "descripcion", array()), "html", null, true);
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

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha anterior</label><br>
                            <input id=\"fechaanterior\" name=\"fechaanterior\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de implementación</label><br>
                            <input id=\"fechaimplementacion\" name=\"fechaimplementacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"motivojustificacion\" name=\"motivojustificacion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Motivo y justificación</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"autoriza\" name=\"autoriza\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Autorizado por</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsableregistro\" name=\"responsableregistro\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Responsable de registro</label>
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
        return "accionreprograma/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 23,  51 => 21,  47 => 20,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Reprograma de Acción</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Reprograma de Acción ID</label>
                        </div>
                    </div>
                    
                    <label>Acción</label>
                        <select id=\"fkaccion\" class=\"form-control\" onchange=\"addDate()\">
                        {% for t in accion %}
                            <option value=\"{{t.id}}\">{{t.descripcion}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha anterior</label><br>
                            <input id=\"fechaanterior\" name=\"fechaanterior\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de implementación</label><br>
                            <input id=\"fechaimplementacion\" name=\"fechaimplementacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"motivojustificacion\" name=\"motivojustificacion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Motivo y justificación</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"autoriza\" name=\"autoriza\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Autorizado por</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsableregistro\" name=\"responsableregistro\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Responsable de registro</label>
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
</div>", "accionreprograma/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\accionreprograma\\form.html.twig");
    }
}
