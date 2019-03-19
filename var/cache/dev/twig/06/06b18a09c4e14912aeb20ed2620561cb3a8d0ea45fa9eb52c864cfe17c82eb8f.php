<?php

/* cobertura/table.html.twig */
class __TwigTemplate_e090dcdc1029125a663674dba244245c7ba004eb18b8cf87876b71f6ce0e00de extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "cobertura/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "unidad", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "anio", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "mes", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "valor", array()), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 9
            if (twig_in_filter("cobertura_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 9, $this->source); })()))) {
                // line 10
                echo "        <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 12
            echo "    ";
            if (twig_in_filter("cobertura_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 12, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 14
            echo " 
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
        return "cobertura/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 14,  67 => 13,  62 => 12,  56 => 10,  54 => 9,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td>{{ t.fktipo.nombre }}</td>
    <td>{{ t.unidad }}</td>
    <td>{{ t.anio }}</td>
    <td>{{ t.mes }}</td>
    <td>{{ t.valor }}</td>
    <td align=\"center\">
    {% if 'cobertura_editar' in permisos %}
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'cobertura_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %} 
    </td>
</tr>
{% endfor %}", "cobertura/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec Backend\\Intranet-Backend\\templates\\cobertura\\table.html.twig");
    }
}
