<?php

/* accionreprograma/table.html.twig */
class __TwigTemplate_20469027ac76c598d59d2a4e72b7c6f9422fa77eabffb082522040af35cbb453 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "accionreprograma/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkaccion", array()), "descripcion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechaanterior", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechaimplementacion", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "motivojustificacion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "autoriza", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsableregistro", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fecharegistro", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 11
            if (twig_in_filter("accionreprograma_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 11, $this->source); })()))) {
                // line 12
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 14
            echo "        ";
            if (twig_in_filter("accionreprograma_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 14, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 17
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
        return "accionreprograma/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 17,  75 => 15,  70 => 14,  64 => 12,  62 => 11,  57 => 9,  53 => 8,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td>{{ tr.fkaccion.descripcion }}</td>
        <td>{{ tr.fechaanterior | date ('Y-m-d') }}</td>
        <td>{{ tr.fechaimplementacion | date ('Y-m-d') }}</td>
        <td>{{ tr.motivojustificacion }}</td>
        <td>{{ tr.autoriza }}</td>
        <td>{{ tr.responsableregistro }}</td>
        <td>{{ tr.fecharegistro | date ('Y-m-d') }}</td>
        <td align=\"center\">
        {% if 'accionreprograma_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'accionreprograma_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "accionreprograma/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\accionreprograma\\table.html.twig");
    }
}