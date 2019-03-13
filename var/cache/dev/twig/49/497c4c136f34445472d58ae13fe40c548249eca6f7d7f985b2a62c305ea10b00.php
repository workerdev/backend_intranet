<?php

/* fichacargo/table.html.twig */
class __TwigTemplate_071df154a485c2d6b2d02568fba9bb34151794a71b414e317cc422c05c98c0af extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "fichacargo/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("fc" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "nombre", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkarea", array()), "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkarea", array()), "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkarea", array()), "fksector", array()), "nombre", array())), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "objetivo", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "responsabilidades", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "experiencia", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "conocimientos", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "formacion", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "caracteristicas", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 15
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechaaprobacion", array()), "d-m-Y"), "html", null, true);
            echo "</td>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkjefeaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkjefeaprobador", array()), "apellido", array())), "html", null, true);
            echo "</td>
        <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "firmajefe", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkgerenteaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkgerenteaprobador", array()), "apellido", array())), "html", null, true);
            echo "</td>
        <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "firmagerente", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "hipervinculo", array()), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 22
            if (twig_in_filter("fichacargo_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 22, $this->source); })()))) {
                // line 23
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 25
            echo "        ";
            if (twig_in_filter("fichacargo_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 25, $this->source); })()))) {
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
        return "fichacargo/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 28,  113 => 26,  108 => 25,  102 => 23,  100 => 22,  95 => 20,  91 => 19,  87 => 18,  83 => 17,  79 => 16,  75 => 15,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'fc' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td>{{ tr.nombre }}</td>
        <td>{{ tr.fkarea.fkarea.nombre ~' | '~ tr.fkarea.fkgerencia.nombre ~' | '~  tr.fkarea.fksector.nombre }}</td>
        <td class=\"d-none\">{{ tr.objetivo }}</td>
        <td class=\"d-none\">{{ tr.responsabilidades }}</td>
        <td class=\"d-none\">{{ tr.experiencia }}</td>
        <td class=\"d-none\">{{ tr.conocimientos }}</td>
        <td class=\"d-none\">{{ tr.formacion }}</td>
        <td class=\"d-none\">{{ tr.caracteristicas }}</td>
        <td class=\"d-none\">{{ tr.fechaaprobacion | date('d-m-Y') }}</td>
        <td>{{ tr.fkjefeaprobador.nombre ~ ' ' ~ tr.fkjefeaprobador.apellido }}</td>
        <td>{{ tr.firmajefe }}</td>
        <td>{{ tr.fkgerenteaprobador.nombre ~ ' ' ~ tr.fkgerenteaprobador.apellido }}</td>
        <td>{{ tr.firmagerente }}</td>
        <td class=\"d-none\">{{ tr.hipervinculo }}</td>
        <td align=\"center\">
        {% if 'fichacargo_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'fichacargo_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "fichacargo/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\fichacargo\\table.html.twig");
    }
}
