<?php

/* registromejora/table.html.twig */
class __TwigTemplate_9b537202ad5bb95ad193018087eeec89d91db3cf934a6c65184392a701dca11d extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "registromejora/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsablenovedad", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "novedad", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "analisis", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsableimplementacion", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkficha", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktiponovedad", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fknorma", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkestado", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 12
            if (twig_in_filter("registromejora_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 12, $this->source); })()))) {
                // line 13
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 15
            echo "        ";
            if (twig_in_filter("registromejora_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 15, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 18
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
        return "registromejora/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 18,  79 => 16,  74 => 15,  68 => 13,  66 => 12,  61 => 10,  57 => 9,  53 => 8,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td>{{ tr.responsablenovedad }}</td>
        <td>{{ tr.novedad }}</td>
        <td>{{ tr.analisis }}</td>
        <td>{{ tr.responsableimplementacion }}</td>
        <td>{{ tr.fkficha.nombre }}</td>
        <td>{{ tr.fktiponovedad.nombre }}</td>
        <td>{{ tr.fknorma.nombre }}</td>
        <td>{{ tr.fkestado.nombre }}</td>
        <td align=\"center\">
        {% if 'registromejora_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'registromejora_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "registromejora/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\registromejora\\table.html.twig");
    }
}