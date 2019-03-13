<?php

/* accion/table.html.twig */
class __TwigTemplate_e632dc91e1553d8516e154ac51de26a81fa645f787a81ce77c8954ca9335dce7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accion/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("a" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkhallazgo", array()), "titulo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ordinal", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "descripcion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechaimplementacion", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsableimplementacion", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "estadoaccion", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsableregistro", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 14
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fecharegistro", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 16
            if (twig_in_filter("accion_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 16, $this->source); })()))) {
                // line 17
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 19
            echo "        ";
            if (twig_in_filter("accion_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 19, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 22
            echo "            <button id=\"eficrep\" data-json=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\" type=\"button\" class=\"btn btn-warning waves-effect waves-light eficrep\" title=\"Auditoría\"><i class=\"material-icons\">picture_as_pdf</i></button>
        </td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "accion/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 22,  89 => 20,  84 => 19,  78 => 17,  76 => 16,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'a' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td>{{ tr.fkhallazgo.titulo }}</td>
        <td>{{ tr.ordinal }}</td>
        <td>{{ tr.descripcion }}</td>
        <td>{{ tr.fechaimplementacion | date ('Y-m-d') }}</td>
        <td class=\"d-none\">{{ tr.responsableimplementacion }}</td>
        <td class=\"d-none\">{{ tr.estadoaccion }}</td>
        <td class=\"d-none\">{{ tr.responsableregistro }}</td>
        <td class=\"d-none\">{{ tr.fecharegistro | date ('Y-m-d') }}</td>
        <td align=\"center\">
        {% if 'accion_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'accion_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
            <button id=\"eficrep\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn btn-warning waves-effect waves-light eficrep\" title=\"Auditoría\"><i class=\"material-icons\">picture_as_pdf</i></button>
        </td>
    </tr>
{% endfor %}", "accion/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\accion\\table.html.twig");
    }
}
