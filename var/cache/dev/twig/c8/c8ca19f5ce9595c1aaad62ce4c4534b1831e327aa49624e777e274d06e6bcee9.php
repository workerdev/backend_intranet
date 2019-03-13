<?php

/* files/table.html.twig */
class __TwigTemplate_215566d9df6fbeff4a03c7a4f67f208a1428fec245290a2a89bc88145a29d6c7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "files/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 2
            echo "    <tr>
        ";
            // line 3
            if ((twig_get_attribute($this->env, $this->source, $context["tr"], "tipo", array()) == "imagen")) {
                // line 4
                echo "            <td>
                ";
                // line 6
                echo "                <img class=\"ruta\" style=\"width:12vw;height: vw;\" src=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ruta", array()), "html", null, true);
                echo " >
            </td>
        ";
            } else {
                // line 9
                echo "            <td>
                ";
                // line 11
                echo "                <video style=\"width:12vw;height: 8vw;\" class=\"ruta\" src=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "ruta", array()), "html", null, true);
                echo " controls>
                    Your browser does not support the video tag.
                </video>
            </td>
        ";
            }
            // line 16
            echo "        <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "tipo", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tr"], "fkgaleria", array()), "nombre", array()), "html", null, true);
            echo "</td>
        <td align=\"center\">
        ";
            // line 19
            if (twig_in_filter("file_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 19, $this->source); })()))) {
                echo "  
            <button id=\"edit\" data-json=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        ";
            }
            // line 22
            echo "        ";
            if (twig_in_filter("file_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 22, $this->source); })()))) {
                echo "  
            <button id=\"delete\" data-json=\"";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        ";
            }
            // line 25
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
        return "files/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 25,  81 => 23,  76 => 22,  71 => 20,  67 => 19,  62 => 17,  57 => 16,  48 => 11,  45 => 9,  38 => 6,  35 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for tr in objects %}
    <tr>
        {% if tr.tipo == 'imagen' %}
            <td>
                {#<input class=\"ruta\" value={{ tr.ruta }} />#}
                <img class=\"ruta\" style=\"width:12vw;height: vw;\" src={{ tr.ruta }} >
            </td>
        {% else %}
            <td>
                {#<input class=\"ruta\" value={{ tr.ruta }} />#}
                <video style=\"width:12vw;height: 8vw;\" class=\"ruta\" src={{ tr.ruta }} controls>
                    Your browser does not support the video tag.
                </video>
            </td>
        {% endif %}
        <td>{{ tr.tipo }}</td>
        <td>{{ tr.fkgaleria.nombre }}</td>
        <td align=\"center\">
        {% if 'file_editar' in permisos %}  
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
        {% endif %}
        {% if 'file_eliminar' in permisos %}  
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        {% endif %}
        </td>
    </tr>
{% endfor %}", "files/table.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\files\\table.html.twig");
    }
}
