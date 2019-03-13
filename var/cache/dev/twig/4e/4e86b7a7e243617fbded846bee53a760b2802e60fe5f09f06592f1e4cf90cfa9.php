<?php

/* rol/table.html.twig */
class __TwigTemplate_919d0e76c633bbddbc1e241f1b31121935334fce2eacf2961a20050f35d893a6 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "rol/table.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 2
            echo "<tr>
    <td>";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "descripcion", array()), "html", null, true);
            echo "</td>
    <td align=\"center\">
    ";
            // line 6
            if (twig_in_filter("rol_editar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 6, $this->source); })()))) {
                echo " 
        <button id=\"edit\" data-json=\"";
                // line 7
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    ";
            }
            // line 9
            echo "    ";
            if ((twig_in_filter("rol_eliminar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 9, $this->source); })())) && !twig_in_filter(twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()), array(0 => "Administrador", 1 => "Usuario")))) {
                echo "    
        <button id=\"delete\" data-json=\"";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    ";
            }
            // line 12
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
        return "rol/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  56 => 10,  51 => 9,  46 => 7,  42 => 6,  37 => 4,  33 => 3,  30 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for t in objects %}
<tr>
    <td>{{ t.nombre }}</td>
    <td>{{ t.descripcion }}</td>
    <td align=\"center\">
    {% if 'rol_editar' in permisos %} 
        <button id=\"edit\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-indigo waves-effect waves-light edit\" title=\"Editar\"><i class=\"material-icons\">create</i></button>
    {% endif %}
    {% if 'rol_eliminar' in permisos and t.nombre not in ['Administrador', 'Usuario'] %}    
        <button id=\"delete\" data-json=\"{{t.id}}\" type=\"button\" class=\"btn bg-red waves-effect waves-light delete\" title=\"Eliminar\"><i class=\"material-icons\">clear</i></button>
    {% endif %}
    </td>
</tr>
{% endfor %}", "rol/table.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\rol\\table.html.twig");
    }
}
