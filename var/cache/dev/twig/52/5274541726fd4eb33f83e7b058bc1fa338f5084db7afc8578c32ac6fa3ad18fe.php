<?php

/* personal/table.html.twig */
class __TwigTemplate_14d35c4a76280cbb1bbd9a4157453f52b8de541d7c6531b2c428921117753581 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "personal/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "apellido", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ci", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "correo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "telefono", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fnac", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        ";
            // line 9
            if (twig_get_attribute($this->env, $this->source, $context["tr"], "fkpersonalcargo", array())) {
                // line 10
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkpersonalcargo", array()), "nombre", array()), "html", null, true);
                echo "</td>
        ";
            } else {
                // line 12
                echo "            <td> Sin cargo</td>
        ";
            }
            // line 14
            echo "        <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkestadopersonal", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 16
            if (twig_in_filter("personal_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 16, $this->source); })()))) {
                // line 17
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 19
            echo "        ";
            if (twig_in_filter("personal_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 19, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 22
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
        return "personal/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 22,  88 => 20,  83 => 19,  77 => 17,  75 => 16,  69 => 14,  65 => 12,  59 => 10,  57 => 9,  53 => 8,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td>{{ tr.nombre }}</td>
        <td>{{ tr.apellido }}</td>
        <td>{{ tr.ci }}</td>
        <td>{{ tr.correo }}</td>
        <td>{{ tr.telefono }}</td>
        <td>{{ tr.fnac|date('Y-m-d')}}</td>
        {% if tr.fkpersonalcargo %}
            <td>{{ tr.fkpersonalcargo.nombre }}</td>
        {% else %}
            <td> Sin cargo</td>
        {% endif %}
        <td>{{ tr.fkestadopersonal.nombre }}</td>
        <td align=\"center\">
        {% if 'personal_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'personal_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "personal/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\personal\\table.html.twig");
    }
}
