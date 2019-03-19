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
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\" required>
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\" required>
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>

                    <div class=\"form-group\">
                    <label>Permisos</label>
                    <p>Para adicionar, actualizar o dar de baja se necesita obligatoriamente el privilegio consultar.</p>
                    <ul class=\"tree-container\" id=\"cont-mods\" style=\"\">
                        <div class=\"form-group form-float\">
                            <label class=\"containerdbt\">Marcar todos
                                <input id=\"slt-all\" type=\"radio\" onclick=\"check_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                            <label class=\"containerdbt\">Desmarcar todos
                                <input id=\"usl-all\" type=\"radio\" onclick=\"uncheck_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                        </div>
                    </ul>
                    </div>
                </div>

                <div class=\"container\" id=\"md-opt\">
                    ";
        // line 49
        $context["hb"] = 0;
        // line 50
        echo "                    ";
        $context["i"] = 0;
        // line 51
        echo "
                    <ul class=\"nav nav-tabs nav-tabs-responsive\" style=\"overflow-x: auto; width: 48%;\">
                    ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fparents"]) || array_key_exists("fparents", $context) ? $context["fparents"] : (function () { throw new Twig_Error_Runtime('Variable "fparents" does not exist.', 53, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mods"]) {
            // line 54
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                // line 55
                echo "                            ";
                if (((isset($context["hb"]) || array_key_exists("hb", $context) ? $context["hb"] : (function () { throw new Twig_Error_Runtime('Variable "hb" does not exist.', 55, $this->source); })()) == 0)) {
                    // line 56
                    echo "                                <li class=\"active\">
                                ";
                    // line 57
                    $context["hb"] = 1;
                    // line 58
                    echo "                            ";
                } else {
                    // line 59
                    echo "                                <li>
                            ";
                }
                // line 61
                echo "                            
                            <a data-toggle=\"tab\" href=\"";
                // line 62
                echo twig_escape_filter($this->env, ("#p" . twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array())), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array()), "html", null, true);
                echo "\">
                                <i class=\"material-icons\">";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "icono", array()), "html", null, true);
                echo "</i>
                            </a>
                        </li>
                        ";
            }
            // line 66
            echo "  
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                    </ul>

                    <div class=\"tab-content\">
                    ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fparents"]) || array_key_exists("fparents", $context) ? $context["fparents"] : (function () { throw new Twig_Error_Runtime('Variable "fparents" does not exist.', 71, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mods"]) {
            // line 72
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                // line 73
                echo "                            ";
                if (((isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new Twig_Error_Runtime('Variable "i" does not exist.', 73, $this->source); })()) == 0)) {
                    // line 74
                    echo "                                <div id=\"";
                    echo twig_escape_filter($this->env, ("p" . twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array())), "html", null, true);
                    echo "\" class=\"tab-pane fade in active\">
                                ";
                    // line 75
                    $context["i"] = 1;
                    // line 76
                    echo "                            ";
                } else {
                    // line 77
                    echo "                                <div id=\"";
                    echo twig_escape_filter($this->env, ("p" . twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array())), "html", null, true);
                    echo "\" class=\"tab-pane fade\">
                            ";
                }
                // line 79
                echo "                            <h3>
                                <a href=\"#rl-acn\" title=\"Desplazar abajo\" class=\"btn bg-blue-grey waves-effect\" style=\"padding:2px 4px; margin: 0;\">
                                    <i class=\"material-icons\">arrow_downward</i>
                                </a>
                                ";
                // line 83
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array())), "html", null, true);
                echo "
                            </h3>
                            ";
                // line 85
                if ((twig_get_attribute($this->env, $this->source, $context["mods"], "fkmodulo", array()) == null)) {
                    // line 86
                    echo "                                <li id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                    echo "\" class=\"list-unstyled\">
                                    <i class=\"material-icons\">";
                    // line 87
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "icono", array()), "html", null, true);
                    echo "</i>
                                    <input id=\"";
                    // line 88
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"padre chk-col-deep-purple\" data-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                    echo "\" data-parent=\"0\" onchange=\"check_mod(this)\">
                                    <label id=\"tmd\" for=\"";
                    // line 89
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "nombre", array()), "html", null, true);
                    echo "\" data-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "titulo", array()), "html", null, true);
                    echo "</label>
                                
                                ";
                    // line 91
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["fchildren"]) || array_key_exists("fchildren", $context) ? $context["fchildren"] : (function () { throw new Twig_Error_Runtime('Variable "fchildren" does not exist.', 91, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 92
                        echo "                                    ";
                        if (((twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "fkmodulo", array()), "id", array())))) {
                            // line 93
                            echo "                                    <ul class=\"tree-menu\">
                                        <li id=\"";
                            // line 94
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                            echo "\">
                                            <i class=\"material-icons\">";
                            // line 95
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "icono", array()), "html", null, true);
                            echo "</i>
                                            <input id=\"";
                            // line 96
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "nombre", array()), "html", null, true);
                            echo "\" type=\"checkbox\" class=\"hijo chk-col-deep-purple\" data-id=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                            echo "\" data-parent=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["mods"], "id", array()), "html", null, true);
                            echo "\" onchange=\"check_content(this);\">
                                            <label for=\"";
                            // line 97
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "nombre", array()), "html", null, true);
                            echo "\" data-id=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                            echo "\" >";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "titulo", array()), "html", null, true);
                            echo "</label>
                                            
                                        ";
                            // line 99
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable((isset($context["foptions"]) || array_key_exists("foptions", $context) ? $context["foptions"] : (function () { throw new Twig_Error_Runtime('Variable "foptions" does not exist.', 99, $this->source); })()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 100
                                echo "                                            <ul class=\"tree-menu\">
                                            ";
                                // line 101
                                if ((((twig_get_attribute($this->env, $this->source, $context["option"], "fkmodulo", array()) != null) && (twig_get_attribute($this->env, $this->source, $context["child"], "id", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "fkmodulo", array()), "id", array()))) && !twig_in_filter(twig_get_attribute($this->env, $this->source, $context["option"], "nombre", array()), array(0 => "usuario_insertar", 1 => "usuario_eliminar")))) {
                                    // line 102
                                    echo "                                            <li id=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                    echo "\">
                                                <i class=\"material-icons\">";
                                    // line 103
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "icono", array()), "html", null, true);
                                    echo "</i>
                                                <input id=\"";
                                    // line 104
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "nombre", array()), "html", null, true);
                                    echo "\" type=\"checkbox\" class=\"accion chk-col-deep-purple\" data-id=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                    echo "\" data-parent=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "id", array()), "html", null, true);
                                    echo "\" onchange=\"check_action(this);\">
                                                <label for=\"";
                                    // line 105
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "nombre", array()), "html", null, true);
                                    echo "\" data-id=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                                    echo "\">";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "titulo", array()), "html", null, true);
                                    echo "</label>
                                            </li>
                                            ";
                                }
                                // line 108
                                echo "                                            </ul>
                                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 110
                            echo "                                        </li>
                                    </ul>
                                    ";
                        }
                        // line 112
                        echo "      
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 114
                    echo "                                </li>
                            ";
                }
                // line 115
                echo "      
                        </div>
                        ";
            }
            // line 117
            echo "  
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "                    </div>
                </div>

                <div class=\"modal-footer\" id=\"rl-acn\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
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
        return array (  304 => 119,  297 => 117,  292 => 115,  288 => 114,  281 => 112,  276 => 110,  269 => 108,  259 => 105,  251 => 104,  247 => 103,  242 => 102,  240 => 101,  237 => 100,  233 => 99,  224 => 97,  216 => 96,  212 => 95,  208 => 94,  205 => 93,  202 => 92,  198 => 91,  189 => 89,  183 => 88,  179 => 87,  174 => 86,  172 => 85,  167 => 83,  161 => 79,  155 => 77,  152 => 76,  150 => 75,  145 => 74,  142 => 73,  139 => 72,  135 => 71,  130 => 68,  123 => 66,  116 => 63,  110 => 62,  107 => 61,  103 => 59,  100 => 58,  98 => 57,  95 => 56,  92 => 55,  89 => 54,  85 => 53,  81 => 51,  78 => 50,  76 => 49,  26 => 1,);
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
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\" required>
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"descripcion\" name=\"descripcion\" type=\"text\" class=\"form-control text\" required>
                            <label class=\"form-label\">Descripción</label>
                        </div>
                    </div>

                    <div class=\"form-group\">
                    <label>Permisos</label>
                    <p>Para adicionar, actualizar o dar de baja se necesita obligatoriamente el privilegio consultar.</p>
                    <ul class=\"tree-container\" id=\"cont-mods\" style=\"\">
                        <div class=\"form-group form-float\">
                            <label class=\"containerdbt\">Marcar todos
                                <input id=\"slt-all\" type=\"radio\" onclick=\"check_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                            <label class=\"containerdbt\">Desmarcar todos
                                <input id=\"usl-all\" type=\"radio\" onclick=\"uncheck_all(this)\">
                                <span class=\"checkmarkrdbt\"></span>
                            </label>
                        </div>
                    </ul>
                    </div>
                </div>

                <div class=\"container\" id=\"md-opt\">
                    {% set hb = 0 %}
                    {% set i = 0 %}

                    <ul class=\"nav nav-tabs nav-tabs-responsive\" style=\"overflow-x: auto; width: 48%;\">
                    {% for mods in fparents %}
                        {% if mods.fkmodulo == null %}
                            {% if hb == 0 %}
                                <li class=\"active\">
                                {% set hb = 1 %}
                            {% else %}
                                <li>
                            {% endif %}
                            
                            <a data-toggle=\"tab\" href=\"{{ '#p' ~ mods.nombre}}\" title=\"{{mods.titulo}}\">
                                <i class=\"material-icons\">{{mods.icono}}</i>
                            </a>
                        </li>
                        {% endif %}  
                    {% endfor %}
                    </ul>

                    <div class=\"tab-content\">
                    {% for mods in fparents %}
                        {% if mods.fkmodulo == null %}
                            {% if i == 0 %}
                                <div id=\"{{'p' ~ mods.nombre}}\" class=\"tab-pane fade in active\">
                                {% set i = 1 %}
                            {% else %}
                                <div id=\"{{'p' ~ mods.nombre}}\" class=\"tab-pane fade\">
                            {% endif %}
                            <h3>
                                <a href=\"#rl-acn\" title=\"Desplazar abajo\" class=\"btn bg-blue-grey waves-effect\" style=\"padding:2px 4px; margin: 0;\">
                                    <i class=\"material-icons\">arrow_downward</i>
                                </a>
                                {{ mods.titulo|upper }}
                            </h3>
                            {% if mods.fkmodulo == null %}
                                <li id=\"{{mods.id}}\" class=\"list-unstyled\">
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
                                            {% if  option.fkmodulo != null and child.id == option.fkmodulo.id and option.nombre not in ['usuario_insertar', 'usuario_eliminar'] %}
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
                        </div>
                        {% endif %}  
                    {% endfor %}
                    </div>
                </div>

                <div class=\"modal-footer\" id=\"rl-acn\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "rol/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec Backend\\Intranet-Backend\\templates\\rol\\form.html.twig");
    }
}
