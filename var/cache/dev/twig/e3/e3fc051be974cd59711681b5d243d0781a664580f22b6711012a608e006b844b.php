<?php

/* noticia/form.html.twig */
class __TwigTemplate_eafe43153632c0d3febc382a036f6c01b2acd9e9bac5b181aee6b7e3c03d423f extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "noticia/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Noticia</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Noticia ID</label>
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
                            <input id=\"subtitulo\" name=\"subtitulo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Subtítulo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <label>Tipo</label>
                        <select id=\"tipo\" class=\"form-control\" onchange=\"hideContenido(this)\">
                            <option value=\"Noticia Prensa\">Noticia Prensa</option>
                            <option value=\"Noticia Empresa\">Noticia Empresa</option>
                            <option value=\"Urgente\">Urgente</option>
                            <option value=\"Destacados\">Destacados</option>
                        </select>
                        </br>
                        </br>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha</label><br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>
                            Categoría
                        </label>
                        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categorias"]) || array_key_exists("categorias", $context) ? $context["categorias"] : (function () { throw new Twig_Error_Runtime('Variable "categorias" does not exist.', 51, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 52
            echo "                            <p>
                                <input value=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"filled-in categoria\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\" />
                                <label for=\"";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "nombre", array()), "html", null, true);
            echo "</label>
                            </p>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                    </div>
                </div>
                <div class=\"row clearfix\" id=\"cont-tpnt\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"card\">
                            <div class=\"header bg-indigo\">
                                <h2>
                                    CONTENIDO
                                </h2>
                            </div>
                            <div class=\"body\">
                                <textarea id=\"contenido\">
                                
                                </textarea>
                            </div>
                        </div>
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
        return "noticia/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 57,  91 => 54,  85 => 53,  82 => 52,  78 => 51,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Noticia</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Noticia ID</label>
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
                            <input id=\"subtitulo\" name=\"subtitulo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Subtítulo</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <label>Tipo</label>
                        <select id=\"tipo\" class=\"form-control\" onchange=\"hideContenido(this)\">
                            <option value=\"Noticia Prensa\">Noticia Prensa</option>
                            <option value=\"Noticia Empresa\">Noticia Empresa</option>
                            <option value=\"Urgente\">Urgente</option>
                            <option value=\"Destacados\">Destacados</option>
                        </select>
                        </br>
                        </br>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha</label><br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>
                            Categoría
                        </label>
                        {% for tr in categorias %}
                            <p>
                                <input value=\"{{ tr.id }}\" type=\"checkbox\" class=\"filled-in categoria\" id=\"{{ tr.id }}\" />
                                <label for=\"{{ tr.id }}\">{{ tr.nombre }}</label>
                            </p>
                        {% endfor %}
                    </div>
                </div>
                <div class=\"row clearfix\" id=\"cont-tpnt\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"card\">
                            <div class=\"header bg-indigo\">
                                <h2>
                                    CONTENIDO
                                </h2>
                            </div>
                            <div class=\"body\">
                                <textarea id=\"contenido\">
                                
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "noticia/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\noticia\\form.html.twig");
    }
}
