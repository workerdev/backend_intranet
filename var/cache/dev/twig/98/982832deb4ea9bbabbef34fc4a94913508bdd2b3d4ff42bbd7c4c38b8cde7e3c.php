<?php

/* documentobaja/table.html.twig */
class __TwigTemplate_2c861c40400c037898406121cf103d7806c69106a6a13c00bacdcebd692f7f4f extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentobaja/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "codigo", array()), "html", null, true);
            echo "</td>
        ";
            // line 4
            if ((twig_get_attribute($this->env, $this->source, $context["tr"], "fkproceso", array()) != null)) {
                // line 5
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkproceso", array()), "codproceso", array()), "html", null, true);
                echo "</td>
        ";
            } else {
                // line 7
                echo "            <td></td>
        ";
            }
            // line 9
            echo "        <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "titulo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "versionvigente", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 12
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechapublicacion", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 13
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaprobador", array()), "apellido", array())), "html", null, true);
            echo "</td>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "carpetaoperativa", array()), "html", null, true);
            echo "</td>
        ";
            // line 15
            if ((twig_get_attribute($this->env, $this->source, $context["tr"], "vinculoarchivo", array()) != "N/A")) {
                // line 16
                echo "            <td><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "vinculoarchivo", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "vinculoarchivo", array()), 28, null), "html", null, true);
                echo "</a></td>
        ";
            } else {
                // line 18
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "vinculoarchivo", array()), "html", null, true);
                echo "</td>
        ";
            }
            // line 20
            echo "        <td align=\"center\">
        ";
            // line 21
            if (twig_in_filter("bajadocumento_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 21, $this->source); })()))) {
                // line 22
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 24
            echo "        ";
            if (twig_in_filter("bajadocumento_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 24, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 27
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
        return "documentobaja/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 27,  106 => 25,  101 => 24,  95 => 22,  93 => 21,  90 => 20,  84 => 18,  76 => 16,  74 => 15,  70 => 14,  66 => 13,  62 => 12,  58 => 11,  54 => 10,  49 => 9,  45 => 7,  39 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td>{{ tr.codigo }}</td>
        {% if tr.fkproceso != null %}
            <td>{{ tr.fkproceso.codproceso }}</td>
        {% else %}
            <td></td>
        {% endif %}
        <td>{{ tr.fktipo.nombre }}</td>
        <td>{{ tr.titulo }}</td>
        <td>{{ tr.versionvigente }}</td>
        <td>{{ tr.fechapublicacion | date('Y-m-d') }}</td>
        <td>{{ tr.fkaprobador.nombre ~ ' ' ~ tr.fkaprobador.apellido }}</td>
        <td>{{ tr.carpetaoperativa }}</td>
        {% if tr.vinculoarchivo != 'N/A' %}
            <td><a href=\"{{ tr.vinculoarchivo }}\">{{ tr.vinculoarchivo[28:] }}</a></td>
        {% else %}
            <td>{{ tr.vinculoarchivo }}</td>
        {% endif %}
        <td align=\"center\">
        {% if 'bajadocumento_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'bajadocumento_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "documentobaja/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\documentobaja\\table.html.twig");
    }
}
