<?php

/* hallazgo/table.html.twig */
class __TwigTemplate_3a50ac25469b77ee75d1f946257cb4a469bd5f69389e4a798f6bddf3c3c86ed3 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "hallazgo/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("h" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkauditoria", array()), "codigo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ordinal", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "titulo", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "descripcion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "evidencia", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "documento", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "puntoiso", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkimpacto", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkprobabilidad", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "analisiscausaraiz", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "recomendaciones", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "cargoauditado", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "nombreauditado", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsable", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 22
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fecharegistro", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 24
            if (twig_in_filter("hallazgo_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 24, $this->source); })()))) {
                // line 25
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 27
            echo "        ";
            if (twig_in_filter("hallazgo_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 27, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 30
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
        return "hallazgo/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 30,  121 => 28,  116 => 27,  110 => 25,  108 => 24,  103 => 22,  99 => 21,  95 => 20,  91 => 19,  87 => 18,  83 => 17,  79 => 16,  75 => 15,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'h' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td>{{ tr.fkauditoria.codigo }}</td>
        <td>{{ tr.fktipo.nombre }}</td>
        <td>{{ tr.ordinal }}</td>
        <td>{{ tr.titulo }}</td>
        <td class=\"d-none\">{{ tr.descripcion }}</td>
        <td>{{ tr.evidencia }}</td>
        <td>{{ tr.documento }}</td>
        <td>{{ tr.puntoiso }}</td>
        <td>{{ tr.fkimpacto.nombre }}</td>
        <td class=\"d-none\">{{ tr.fkprobabilidad.nombre }}</td>
        <td class=\"d-none\">{{ tr.analisiscausaraiz }}</td>
        <td class=\"d-none\">{{ tr.recomendaciones }}</td>
        <td class=\"d-none\">{{ tr.cargoauditado }}</td>
        <td class=\"d-none\">{{ tr.nombreauditado }}</td>
        <td class=\"d-none\">{{ tr.responsable }}</td>
        <td class=\"d-none\">{{ tr.fecharegistro | date ('Y-m-d') }}</td>
        <td align=\"center\">
        {% if 'hallazgo_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'hallazgo_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "hallazgo/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\hallazgo\\table.html.twig");
    }
}
