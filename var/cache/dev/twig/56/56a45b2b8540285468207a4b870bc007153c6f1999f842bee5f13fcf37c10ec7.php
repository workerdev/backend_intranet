<?php

/* auditoria/table.html.twig */
class __TwigTemplate_c52b6d93779925707dbedc785f07818754f2ac561af954d0e5b474cdb97d97e3 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "auditoria/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td class=\"details-control\">
        <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 4
            echo twig_escape_filter($this->env, ("aud" . twig_get_attribute($this->env, $this->source, $context["t"], "id", array())), "html", null, true);
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkarea", array()), "fkarea", array()), "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fktipo", array()), "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechaprogramada", array()), "Y-m-d"), "html", null, true);
            echo "</td>
    <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "duracionestimada", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "lugar", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "alcance", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "objetivos", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 15
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechahorainicio", array()), "Y-m-d H:i"), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 16
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fechahorafin", array()), "Y-m-d H:i"), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "conclusiones", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "responsable", array()), "html", null, true);
            echo "</td>
    <td class=\"d-none\">";
            // line 19
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "fecharegistro", array()), "Y-m-d"), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 21
            if (twig_in_filter("auditoria_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 21, $this->source); })()))) {
                // line 22
                echo "        <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 24
            echo "    ";
            if (twig_in_filter("auditoria_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 24, $this->source); })()))) {
                echo "  
        <button id=\"delete\" data-json=\"";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 26
            echo " 
        <button id=\"notifrep\" data-json=\"";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\" type=\"button\" class=\"btn btn-primary waves-effect waves-light notifrep\" title=\"Notificación\"><i class=\"material-icons\">picture_as_pdf</i></button>
        <button id=\"audrep\" data-json=\"";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\" type=\"button\" class=\"btn btn-warning waves-effect waves-light audrep\" title=\"Auditoría\"><i class=\"material-icons\">picture_as_pdf</i></button>
    </td>
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
        return "auditoria/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 28,  117 => 27,  114 => 26,  109 => 25,  104 => 24,  98 => 22,  96 => 21,  91 => 19,  87 => 18,  83 => 17,  79 => 16,  75 => 15,  71 => 14,  67 => 13,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td class=\"details-control\">
        <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'aud' ~ t.id}}\"></i>
    </td>
    <td class=\"d-none\">{{ t.id }}</td>
    <td>{{ t.codigo }}</td>
    <td>{{ t.fkarea.fkarea.nombre }}</td>
    <td>{{ t.fktipo.nombre }}</td>
    <td>{{ t.fechaprogramada | date('Y-m-d') }}</td>
    <td>{{ t.duracionestimada }}</td>
    <td>{{ t.lugar }}</td>
    <td class=\"d-none\">{{ t.alcance }}</td>
    <td class=\"d-none\">{{ t.objetivos }}</td>
    <td class=\"d-none\">{{ t.fechahorainicio | date('Y-m-d H:i') }}</td>
    <td class=\"d-none\">{{ t.fechahorafin | date('Y-m-d H:i') }}</td>
    <td class=\"d-none\">{{ t.conclusiones }}</td>
    <td class=\"d-none\">{{ t.responsable }}</td>
    <td class=\"d-none\">{{ t.fecharegistro | date('Y-m-d') }}</td>
    <td align=\"center\">
    {% if 'auditoria_editar' in permisos %}
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'auditoria_eliminar' in permisos %}  
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %} 
        <button id=\"notifrep\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn btn-primary waves-effect waves-light notifrep\" title=\"Notificación\"><i class=\"material-icons\">picture_as_pdf</i></button>
        <button id=\"audrep\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn btn-warning waves-effect waves-light audrep\" title=\"Auditoría\"><i class=\"material-icons\">picture_as_pdf</i></button>
    </td>
</tr>
{% endfor %}", "auditoria/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\auditoria\\table.html.twig");
    }
}
