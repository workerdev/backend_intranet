<?php

/* documento/table.html.twig */
class __TwigTemplate_7bd78d3c31214387c8f13b406f3eb989a857048a2a031c350a4c9ad1de8f7142 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documento/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("d" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "codigo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "titulo", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "versionvigente", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "vinculoarchivodig", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "vinculodiagflujo", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "carpetaOperativa", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 13
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechaPublicacion", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkficha", array()), "codproceso", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
        ";
            // line 16
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "estado", array()) == 2)) {
                // line 17
                echo "            <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "apellido", array())), "html", null, true);
                echo " <b><i>";
                echo " (Inactivo)";
                echo "</i></b></td>
        ";
            } else {
                // line 19
                echo "            <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "apellido", array())), "html", null, true);
                echo "</td>
        ";
            }
            // line 21
            echo "        <td align=\"center\">
        ";
            // line 22
            if (twig_in_filter("documento_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 22, $this->source); })()))) {
                // line 23
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 25
            echo "        ";
            if (twig_in_filter("documento_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 25, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 28
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
        return "documento/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 28,  111 => 26,  106 => 25,  100 => 23,  98 => 22,  95 => 21,  89 => 19,  81 => 17,  79 => 16,  75 => 15,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'d' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td>{{ tr.codigo }}</td>
        <td>{{ tr.titulo }}</td>
        <td class=\"d-none\">{{ tr.versionvigente }}</td>
        <td class=\"d-none\">{{ tr.vinculoarchivodig }}</td>
        <td class=\"d-none\">{{ tr.vinculodiagflujo }}</td>
        <td class=\"d-none\">{{ tr.carpetaOperativa }}</td>
        <td class=\"d-none\">{{ tr.fechaPublicacion | date('Y-m-d')  }}</td>
        <td>{{ tr.fkficha.codproceso }}</td>
        <td>{{ tr.fktipo.nombre }}</td>
        {% if tr.fkaprobador.estado == 2 %}
            <td>{{ tr.fkaprobador.nombre ~ ' ' ~ tr.fkaprobador.apellido}} <b><i>{{' (Inactivo)' }}</i></b></td>
        {% else %}
            <td>{{ tr.fkaprobador.nombre ~ ' ' ~ tr.fkaprobador.apellido }}</td>
        {% endif %}
        <td align=\"center\">
        {% if 'documento_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'documento_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "documento/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\documento\\table.html.twig");
    }
}
