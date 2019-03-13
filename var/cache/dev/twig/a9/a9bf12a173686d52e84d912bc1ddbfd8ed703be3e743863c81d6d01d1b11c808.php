<?php

/* riesgosoportunidades/table.html.twig */
class __TwigTemplate_763aed400bdd91535618941b3cb2bddc012b20d81518f1d1813faa4067b0212c extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "riesgosoportunidades/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("cro" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "descripcion", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "origen", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "accion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fecha", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "estadocro", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "analisiscausaraiz", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkficha", array()), "codproceso", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkprobabilidad", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkimpacto", array()), "nombre", array()), "html", null, true);
            echo "</td>
        ";
            // line 17
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkresponsable", array()), "estado", array()) == 2)) {
                // line 18
                echo "            <td class=\"d-none\">";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo " <b><i>";
                echo " (Inactivo)";
                echo "</i></b></td>
        ";
            } else {
                // line 20
                echo "            <td class=\"d-none\">";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo "</td>
        ";
            }
            // line 22
            echo "        <td align=\"center\">
        ";
            // line 23
            if (twig_in_filter("riesgosoportunidades_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 23, $this->source); })()))) {
                // line 24
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 26
            echo "        ";
            if (twig_in_filter("riesgosoportunidades_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 26, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 29
            echo "        </td>
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
        return "riesgosoportunidades/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 29,  115 => 27,  110 => 26,  104 => 24,  102 => 23,  99 => 22,  93 => 20,  85 => 18,  83 => 17,  79 => 16,  75 => 15,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'cro' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td class=\"d-none\">{{ tr.descripcion }}</td>
        <td class=\"d-none\">{{ tr.origen }}</td>
        <td class=\"d-none\">{{ tr.accion }}</td>
        <td>{{ tr.fecha|date('Y-m-d') }}</td>
        <td>{{ tr.estadocro }}</td>
        <td class=\"d-none\">{{ tr.analisiscausaraiz }}</td>
        <td>{{ tr.fkficha.codproceso }}</td>
        <td>{{ tr.fktipo.nombre }}</td>
        <td>{{ tr.fkprobabilidad.nombre }}</td>
        <td>{{ tr.fkimpacto.nombre }}</td>
        {% if tr.fkresponsable.estado == 2 %}
            <td class=\"d-none\">{{ tr.fkresponsable.nombre ~ ' ' ~ tr.fkresponsable.apellido}} <b><i>{{' (Inactivo)' }}</i></b></td>
        {% else %}
            <td class=\"d-none\">{{ tr.fkresponsable.nombre ~ ' ' ~ tr.fkresponsable.apellido }}</td>
        {% endif %}
        <td align=\"center\">
        {% if 'riesgosoportunidades_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'riesgosoportunidades_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "riesgosoportunidades/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\riesgosoportunidades\\table.html.twig");
    }
}
