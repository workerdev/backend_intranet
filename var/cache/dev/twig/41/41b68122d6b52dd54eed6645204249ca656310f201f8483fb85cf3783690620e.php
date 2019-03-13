<?php

/* accidentes/table.html.twig */
class __TwigTemplate_940b48a65928c3bab4413e5aa06cefc7fcc398ffe16cc8c1a2788778a733e3d8 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accidentes/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td class=\"fecini\">";
            // line 3
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechaInicio", array()), "Y-m-d"), "html", null, true);
            echo "</td>
    ";
            // line 4
            if (twig_get_attribute($this->env, $this->source, $context["t"], "fechaFin", array())) {
                // line 5
                echo "        <td class=\"fecfin\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechaFin", array()), "Y-m-d"), "html", null, true);
                echo "</td>
    ";
            } else {
                // line 7
                echo "        <td class=\"fecfin\">Vigente</td>
    ";
            }
            // line 9
            echo "    <td >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "tipo", array()), "html", null, true);
            echo "</td>
    <td class=\"dias\">

    </td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accidentes/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 9,  45 => 7,  39 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td class=\"fecini\">{{ t.fechaInicio|date('Y-m-d')  }}</td>
    {% if t.fechaFin %}
        <td class=\"fecfin\">{{ t.fechaFin|date('Y-m-d') }}</td>
    {% else %}
        <td class=\"fecfin\">Vigente</td>
    {% endif %}
    <td >{{ t.tipo }}</td>
    <td class=\"dias\">

    </td>
</tr>
{% endfor %}", "accidentes/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\accidentes\\table.html.twig");
    }
}
