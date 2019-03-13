<?php

/* documentoformulario/table.html.twig */
class __TwigTemplate_40d5f30d618eeeb3b59587e19e2c9ce842fe94d6b89fc83e796c317218611f37 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "documentoformulario/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td class=\"details-control\">
        <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("df" . twig_get_attribute($this->env, $this->source, $context["t"], "id", array())), "html", null, true);
            echo "\"></i>
    </td>
    <td class=\"d-none\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "codigo", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "titulo", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "versionVigente", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechaPublicacion", array()), "Y-m-d"), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 11
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkaprobador", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkaprobador", array()), "apellido", array())), "html", null, true);
            echo "</td>
    <td>";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkdocumento", array()), "codigo", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "vinculofiledig", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "vinculofiledesc", array()), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 16
            if (twig_in_filter("documentoformulario_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 16, $this->source); })()))) {
                echo " 
        <button id=\"edit\" data-json=\"";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 19
            echo "    ";
            if (twig_in_filter("documentoformulario_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 19, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 22
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
        return "documentoformulario/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 22,  90 => 20,  85 => 19,  80 => 17,  76 => 16,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td class=\"details-control\">
        <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'df' ~ t.id}}\"></i>
    </td>
    <td class=\"d-none\">{{ t.id }}</td>
    <td>{{ t.codigo }}</td>
    <td>{{ t.titulo }}</td>
    <td>{{ t.versionVigente }}</td>
    <td>{{ t.fechaPublicacion | date('Y-m-d')  }}</td>
    <td class=\"d-none\">{{ t.fkaprobador.nombre ~ ' ' ~ t.fkaprobador.apellido }}</td>
    <td>{{ t.fkdocumento.codigo }}</td>
    <td class=\"d-none\">{{ t.vinculofiledig }}</td>
    <td class=\"d-none\">{{ t.vinculofiledesc }}</td>
    <td align=\"center\">
    {% if 'documentoformulario_editar' in permisos %} 
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'documentoformulario_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %}
    </td>
</tr>
{% endfor %}", "documentoformulario/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\documentoformulario\\table.html.twig");
    }
}
