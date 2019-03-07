<?php

/* correlativo/table.html.twig */
class __TwigTemplate_40ad24ca6423d2980e21bbcb30a3a0c13e2e8ec1c23d0832fbcf7e4b27692ce2 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "correlativo/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    
    <tr ";
            // line 3
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkestado", array()), "nombre", array()) == "Anulado")) {
                echo " style=\"background-color: #ffcdd2\" ";
            }
            echo ">
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"";
            // line 5
            echo twig_escape_filter($this->env, ("cr" . twig_get_attribute($this->env, $this->source, $context["tr"], "id", array())), "html", null, true);
            echo "\"></i>
        </td>
        <td class=\"d-none\">";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "numcorrelativo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "fechareg", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>
            ";
            // line 11
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fksolicitante", array()), "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fksolicitante", array()), "apellido", array())), "html", null, true);
            echo "
            ";
            // line 12
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fksolicitante", array()), "estado", array()) == 2)) {
                // line 13
                echo "                 <b><i>";
                echo " (Inactivo)";
                echo "</i></b>
            ";
            }
            // line 15
            echo "        </td>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "redactor", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "destinatario", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "referencia", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkcorrelativo", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fktiponota", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "equipo", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ip", array()), "html", null, true);
            echo "</td>
        ";
            // line 23
            if (((twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()) != "N/A"))) {
                // line 24
                echo "            <td><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()), "html", null, true);
                echo "\" class=\"ruta\"><i class=\"material-icons\">folder</i> Archivo</a></td>
        ";
            } else {
                // line 26
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()), "html", null, true);
                echo "</td>
        ";
            }
            // line 28
            echo "        <td class=\"d-none\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "antecedente", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkestado", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "item", array()), "html", null, true);
            echo "</td>
        ";
            // line 31
            if (((twig_get_attribute($this->env, $this->source, $context["tr"], "urleditable", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()) != "N/A"))) {
                // line 32
                echo "            <td><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "urleditable", array()), "html", null, true);
                echo "\" class=\"ruta\"><i class=\"material-icons\">folder_open</i> Archivo</a></td>
        ";
            } else {
                // line 34
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()), "html", null, true);
                echo "</td>
        ";
            }
            // line 36
            echo "        <td class=\"d-none\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "entrega", array()), "Y-m-d"), "html", null, true);
            echo "</td>
        <td class=\"d-none\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkunidad", array()), "nombre", array()), "html", null, true);
            echo "</td>
        ";
            // line 38
            if (((twig_get_attribute($this->env, $this->source, $context["tr"], "urlorigen", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()) != "N/A"))) {
                // line 39
                echo "            <td><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "urlorigen", array()), "html", null, true);
                echo "\" class=\"ruta\"><i class=\"material-icons\">folder_special</i> Archivo</a></td>
        ";
            } else {
                // line 41
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "url", array()), "html", null, true);
                echo "</td>
        ";
            }
            // line 43
            echo "        <td align=\"center\">
        ";
            // line 44
            if (twig_in_filter("correlativo_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 44, $this->source); })()))) {
                // line 45
                echo "            <button id=\"edit\" data-json=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 47
            echo "        ";
            if (twig_in_filter("correlativo_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 47, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 50
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
        return "correlativo/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 50,  181 => 48,  176 => 47,  170 => 45,  168 => 44,  165 => 43,  159 => 41,  153 => 39,  151 => 38,  147 => 37,  142 => 36,  136 => 34,  130 => 32,  128 => 31,  124 => 30,  120 => 29,  115 => 28,  109 => 26,  103 => 24,  101 => 23,  97 => 22,  93 => 21,  89 => 20,  85 => 19,  81 => 18,  77 => 17,  73 => 16,  70 => 15,  64 => 13,  62 => 12,  58 => 11,  53 => 9,  49 => 8,  45 => 7,  40 => 5,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    
    <tr {% if tr.fkestado.nombre == 'Anulado' %} style=\"background-color: #ffcdd2\" {% endif %}>
        <td class=\"details-control\">
            <i class=\"fa fa-plus-square cl-teal\" aria-hidden=\"true\" title=\"Mostrar más\" id=\"{{'cr' ~ tr.id}}\"></i>
        </td>
        <td class=\"d-none\">{{ tr.id }}</td>
        <td>{{ tr.numcorrelativo }}</td>
        <td>{{ tr.fechareg | date('Y-m-d') }}</td>
        <td>
            {{ tr.fksolicitante.nombre ~ ' ' ~ tr.fksolicitante.apellido }}
            {% if tr.fksolicitante.estado == 2 %}
                 <b><i>{{' (Inactivo)' }}</i></b>
            {% endif %}
        </td>
        <td>{{ tr.redactor }}</td>
        <td class=\"d-none\">{{ tr.destinatario }}</td>
        <td class=\"d-none\">{{ tr.referencia }}</td>
        <td class=\"d-none\">{{ tr.fkcorrelativo.nombre }}</td>
        <td class=\"d-none\">{{ tr.fktiponota.nombre }}</td>
        <td class=\"d-none\">{{ tr.equipo }}</td>
        <td class=\"d-none\">{{ tr.ip }}</td>
        {% if tr.url != null and tr.url != 'N/A' %}
            <td><a href=\"{{tr.url}}\" class=\"ruta\"><i class=\"material-icons\">folder</i> Archivo</a></td>
        {% else %}
            <td>{{ tr.url }}</td>
        {% endif %}
        <td class=\"d-none\">{{ tr.antecedente }}</td>
        <td class=\"d-none\">{{ tr.fkestado.nombre }}</td>
        <td class=\"d-none\">{{ tr.item }}</td>
        {% if tr.urleditable != null and tr.url != 'N/A' %}
            <td><a href=\"{{tr.urleditable}}\" class=\"ruta\"><i class=\"material-icons\">folder_open</i> Archivo</a></td>
        {% else %}
            <td>{{ tr.url }}</td>
        {% endif %}
        <td class=\"d-none\">{{ tr.entrega | date('Y-m-d') }}</td>
        <td class=\"d-none\">{{ tr.fkunidad.nombre }}</td>
        {% if tr.urlorigen != null and tr.url != 'N/A' %}
            <td><a href=\"{{tr.urlorigen}}\" class=\"ruta\"><i class=\"material-icons\">folder_special</i> Archivo</a></td>
        {% else %}
            <td>{{ tr.url }}</td>
        {% endif %}
        <td align=\"center\">
        {% if 'correlativo_editar' in permisos %}
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'correlativo_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "correlativo/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\correlativo\\table.html.twig");
    }
}
