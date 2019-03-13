<?php

/* files/table.html.twig */
class __TwigTemplate_42afe7b42e8e103cd30e595e1b9d551faa44f493f04a4560f0921cd7432f7163 extends Twig_Template
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
            <button id=\"edit\" data-json=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
            <button id=\"delete\" data-json=\"";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tr"], "id", array()), "html", null, true);
            echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        </td>
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
        return array (  71 => 20,  67 => 19,  62 => 17,  57 => 16,  48 => 11,  45 => 9,  38 => 6,  35 => 4,  33 => 3,  30 => 2,  26 => 1,);
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
            <button id=\"edit\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
            <button id=\"delete\" data-json=\"{{tr.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
        </td>
    </tr>
{% endfor %}", "files/table.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\files\\table.html.twig");
    }
}
