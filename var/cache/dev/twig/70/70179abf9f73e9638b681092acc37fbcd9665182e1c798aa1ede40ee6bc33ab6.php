<?php

/* seguimientocro/table.html.twig */
class __TwigTemplate_f4ee2f8868b37d199165827e2842e0a12d88dc90ec5c83cb13a26d9c37c41d15 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "seguimientocro/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkriesgos", array()), "descripcion", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechaseg", array()), "Y-m-d"), "html", null, true);
            echo "</td>
    ";
            // line 5
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "estado", array()) == 2)) {
                // line 6
                echo "        <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo " <b><i>";
                echo " (Inactivo)";
                echo "</i></b></td>
    ";
            } else {
                // line 8
                echo "        <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo "</td>
    ";
            }
            // line 10
            echo "    <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "observaciones", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "estadoseg", array()), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 13
            if (twig_in_filter("seguimientocro_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 13, $this->source); })()))) {
                echo " 
        <button id=\"edit\" data-json=\"";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 16
            echo "    ";
            if (twig_in_filter("seguimientocro_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 16, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 19
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
        return "seguimientocro/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 19,  81 => 17,  76 => 16,  71 => 14,  67 => 13,  62 => 11,  57 => 10,  51 => 8,  43 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td>{{ t.fkriesgos.descripcion }}</td>
    <td>{{ t.fechaseg | date('Y-m-d') }}</td>
    {% if t.fkresponsable.estado == 2 %}
        <td>{{ t.fkresponsable.nombre ~ ' ' ~ t.fkresponsable.apellido}} <b><i>{{' (Inactivo)' }}</i></b></td>
    {% else %}
        <td>{{ t.fkresponsable.nombre ~ ' ' ~ t.fkresponsable.apellido }}</td>
    {% endif %}
    <td>{{ t.observaciones }}</td>
    <td>{{ t.estadoseg }}</td>
    <td align=\"center\">
    {% if 'seguimientocro_editar' in permisos %} 
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'seguimientocro_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %}
    </td>
</tr>
{% endfor %}", "seguimientocro/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\seguimientocro\\table.html.twig");
    }
}
