<?php

/* croseguimiento/table.html.twig */
class __TwigTemplate_a1306f935b0a0a64838e4bd09f50b3c76a43a25086089da3d6e97c8c9f09fd2d extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "croseguimiento/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fecha_seg", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkriesgos", array()), "descripcion", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "responsable", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "observaciones", array()), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 8
            if (twig_in_filter("croseguimiento_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 8, $this->source); })()))) {
                echo " 
        <button id=\"edit\" data-json=\"";
                // line 9
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 11
            echo "    ";
            if (twig_in_filter("croseguimiento_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 11, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 14
            echo "    </td>
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
        return "croseguimiento/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 14,  64 => 12,  59 => 11,  54 => 9,  50 => 8,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td>{{ t.fecha_seg }}</td>
    <td>{{ t.fkriesgos.descripcion }}</td>
    <td>{{ t.responsable }}</td>
    <td>{{ t.observaciones }}</td>
    <td align=\"center\">
    {% if 'croseguimiento_editar' in permisos %} 
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'croseguimiento_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %}
    </td>
</tr>
{% endfor %}", "croseguimiento/table.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\croseguimiento\\table.html.twig");
    }
}