<?php

/* gciarsector/table.html.twig */
class __TwigTemplate_e93b906255958d409744e92fe941b4273beca6c5e2c441d3e75acaaad40a26b3 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "gciarsector/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "codigo", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "vigente", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkgerencia", array()), "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkarea", array()), "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fksector", array()), "nombre", array()), "html", null, true);
            echo "</td>
    ";
            // line 8
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "estado", array()) == 2)) {
                // line 9
                echo "        <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo " <b><i>";
                echo " (Inactivo)";
                echo "</i></b></td>
    ";
            } else {
                // line 11
                echo "        <td>";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkresponsable", array()), "apellido", array())), "html", null, true);
                echo "</td>
    ";
            }
            // line 13
            echo "    <td align=\"center\">
    ";
            // line 14
            if (twig_in_filter("gciarsector_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 14, $this->source); })()))) {
                echo " 
        <button id=\"edit\" data-json=\"";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 17
            echo "    ";
            if (twig_in_filter("gciarsector_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 17, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 20
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
        return "gciarsector/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  86 => 18,  81 => 17,  76 => 15,  72 => 14,  69 => 13,  63 => 11,  55 => 9,  53 => 8,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td>{{ t.codigo }}</td>
    <td>{{ t.vigente }}</td>
    <td>{{ t.fkgerencia.nombre }}</td>
    <td>{{ t.fkarea.nombre }}</td>
    <td>{{ t.fksector.nombre }}</td>
    {% if t.fkresponsable.estado == 2 %}
        <td>{{ t.fkresponsable.nombre ~ ' ' ~ t.fkresponsable.apellido}} <b><i>{{' (Inactivo)' }}</i></b></td>
    {% else %}
        <td>{{ t.fkresponsable.nombre ~ ' ' ~ t.fkresponsable.apellido }}</td>
    {% endif %}
    <td align=\"center\">
    {% if 'gciarsector_editar' in permisos %} 
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'gciarsector_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %}
    </td>
</tr>
{% endfor %}", "gciarsector/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\gciarsector\\table.html.twig");
    }
}
