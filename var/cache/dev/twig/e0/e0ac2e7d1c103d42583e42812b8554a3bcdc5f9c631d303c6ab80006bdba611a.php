<?php

/* rol/form.html.twig */
class __TwigTemplate_951c94c561bc4002adda414bc4ac8a5936cdf102dc451084ff590d4ec92e45e4 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "rol/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Rol</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Rol ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>

                    <div class=\"form-group\">
                    <label>Permisos</label>
                    <p>Para adicionar, actualizar o dar de baja se necesita obligatoriamente el privilegio consultar.</p>
                    <ul class=\"tree-container\" id=\"cont-mods\" style=\"\">
                        <div class=\"form-group form-float\">
                            <label class=\"containerdbt\">Marcar todos
                                <input type=\"radio\" onclick=\"check_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                        </div>
                        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fparents"]) || array_key_exists("fparents", $context) ? $context["fparents"] : (function () { throw new Twig_Error_Runtime('Variable "fparents" does not exist.', 40, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mods"]) {
            // line 41
            echo "                            ";
            if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                // line 42
                echo "                                <li id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                echo "\">
                                    <i class=\"material-icons\">";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "icono", array()), "html", null, true);
                echo "</i>
                                    <input id=\"";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"padre chk-col-deep-purple\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                echo "\" data-parent=\"0\" onchange=\"check_mod(this)\">
                                    <label id=\"tmd\" for=\"";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array()), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array()), "html", null, true);
                echo "</label>
                                
                                ";
                // line 47
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fchildren"]) || array_key_exists("fchildren", $context) ? $context["fchildren"] : (function () { throw new Twig_Error_Runtime('Variable "fchildren" does not exist.', 47, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 48
                    echo "                                    ";
                    if (((twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()), "id", array())))) {
                        // line 49
                        echo "                                    <ul class=\"tree-menu\">
                                        <li id=\"";
                        // line 50
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                        echo "\">
                                            <i class=\"material-icons\">";
                        // line 51
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "icono", array()), "html", null, true);
                        echo "</i>
                                            <input id=\"";
                        // line 52
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "nombre", array()), "html", null, true);
                        echo "\" type=\"checkbox\" class=\"hijo chk-col-deep-purple\" data-id=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                        echo "\" data-parent=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                        echo "\" onchange=\"check_content(this);\">
                                            <label for=\"";
                        // line 53
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "nombre", array()), "html", null, true);
                        echo "\" data-id=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                        echo "\" >";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "titulo", array()), "html", null, true);
                        echo "</label>
                                            
                                        ";
                        // line 55
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["foptions"]) || array_key_exists("foptions", $context) ? $context["foptions"] : (function () { throw new Twig_Error_Runtime('Variable "foptions" does not exist.', 55, $this->source); })()));
                        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                            // line 56
                            echo "                                            <ul class=\"tree-menu\">
                                            ";
                            // line 57
                            if (((twig_get_attribute($this->env, $this->source, $context["option"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["child"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "fkmodulo", array()), "id", array())))) {
                                // line 58
                                echo "                                            <li id=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                echo "\">
                                                <i class=\"material-icons\">";
                                // line 59
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "icono", array()), "html", null, true);
                                echo "</i>
                                                <input id=\"";
                                // line 60
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "nombre", array()), "html", null, true);
                                echo "\" type=\"checkbox\" class=\"accion chk-col-deep-purple\" data-id=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                echo "\" data-parent=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                                echo "\" onchange=\"check_action(this);\">
                                                <label for=\"";
                                // line 61
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "nombre", array()), "html", null, true);
                                echo "\" data-id=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "titulo", array()), "html", null, true);
                                echo "</label>
                                            </li>
                                            ";
                            }
                            // line 64
                            echo "                                            </ul>
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 66
                        echo "                                        </li>
                                    </ul>
                                    ";
                    }
                    // line 68
                    echo "      
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                echo "                                </li>
                            ";
            }
            // line 71
            echo "      
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                    </ul>
                    </div>
                </div>
                
                <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                    <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                        <img src='resources/images/carga.gif' style='height:100%;width:auto;'/>
                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "rol/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 73,  192 => 71,  188 => 70,  181 => 68,  176 => 66,  169 => 64,  159 => 61,  151 => 60,  147 => 59,  142 => 58,  140 => 57,  137 => 56,  133 => 55,  124 => 53,  116 => 52,  112 => 51,  108 => 50,  105 => 49,  102 => 48,  98 => 47,  89 => 45,  83 => 44,  79 => 43,  74 => 42,  71 => 41,  67 => 40,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Rol</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Rol ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>

                    <div class=\"form-group\">
                    <label>Permisos</label>
                    <p>Para adicionar, actualizar o dar de baja se necesita obligatoriamente el privilegio consultar.</p>
                    <ul class=\"tree-container\" id=\"cont-mods\" style=\"\">
                        <div class=\"form-group form-float\">
                            <label class=\"containerdbt\">Marcar todos
                                <input type=\"radio\" onclick=\"check_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                        </div>
                        {% for mods in fparents %}
                            {% if mods.fkmodulo == null %}
                                <li id=\"{{mods.id}}\">
                                    <i class=\"material-icons\">{{mods.icono}}</i>
                                    <input id=\"{{mods.nombre}}\" type=\"checkbox\" class=\"padre chk-col-deep-purple\" data-id=\"{{mods.id}}\" data-parent=\"0\" onchange=\"check_mod(this)\">
                                    <label id=\"tmd\" for=\"{{mods.nombre}}\" data-id=\"{{mods.id}}\" >{{mods.titulo}}</label>
                                
                                {% for child in fchildren %}
                                    {% if child.fkmodulo != null and mods.id == child.fkmodulo.id %}
                                    <ul class=\"tree-menu\">
                                        <li id=\"{{child.id}}\">
                                            <i class=\"material-icons\">{{child.icono}}</i>
                                            <input id=\"{{child.nombre}}\" type=\"checkbox\" class=\"hijo chk-col-deep-purple\" data-id=\"{{child.id}}\" data-parent=\"{{mods.id}}\" onchange=\"check_content(this);\">
                                            <label for=\"{{child.nombre}}\" data-id=\"{{child.id}}\" >{{child.titulo}}</label>
                                            
                                        {% for option in foptions %}
                                            <ul class=\"tree-menu\">
                                            {% if  option.fkmodulo != null and child.id == option.fkmodulo.id %}
                                            <li id=\"{{option.id}}\">
                                                <i class=\"material-icons\">{{option.icono}}</i>
                                                <input id=\"{{option.nombre}}\" type=\"checkbox\" class=\"accion chk-col-deep-purple\" data-id=\"{{option.id}}\" data-parent=\"{{child.id}}\" onchange=\"check_action(this);\">
                                                <label for=\"{{option.nombre}}\" data-id=\"{{option.id}}\">{{option.titulo}}</label>
                                            </li>
                                            {% endif %}
                                            </ul>
                                        {% endfor %}
                                        </li>
                                    </ul>
                                    {% endif %}      
                                {% endfor %}
                                </li>
                            {% endif %}      
                        {% endfor %}
                    </ul>
                    </div>
                </div>
                
                <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                    <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                        <img src='resources/images/carga.gif' style='height:100%;width:auto;'/>
                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "rol/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\rol\\form.html.twig");
    }
}
