<?php

/* fichacargo/form.html.twig */
class __TwigTemplate_a7abb342810c07243ec0ca65a0a69f4d9cb7fbcb67e523c35e09a62bbb517fae extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "fichacargo/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">

            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Ficha de Cargos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>

            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    ";
        // line 13
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 13, $this->source); })()), 'form');
        echo "
                </div>
            </div>

        </div>
    </div>
</div>



<div id=\"form-fcj\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">

        <div class=\"modal-content\">
            ";
        // line 27
        if ((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 27, $this->source); })())) {
            // line 28
            echo "            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Jefe inmediato superior</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\"></div>
            </div>

            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Gerencia, área y sector </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Experiencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 47, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 48
                echo "                                <tr>
                                    <td>";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "nombre", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 50
                echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fksector", array()), "nombre", array())), "html", null, true);
                echo "</td>
                                    <td>";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "experiencia", array()), "html", null, true);
                echo "</td>
                                    <td align=\"center\">
                                        <button id=\"apfcj\" data-json=\"";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcj\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcj\" data-json=\"";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcj\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                        </tbody>
                    </table>
                </div>
            </div>

            ";
        } else {
            // line 64
            echo "                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Jefe inmediato superior</h3>
                    <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            ";
        }
        // line 72
        echo "
        </div>
    </div>
</div>



<div id=\"formjf-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">

            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción - Jefe inmediato superior</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>

            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgfcj\">
                
            </div>

            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clavejf\" name=\"clavejf\" type=\"password\" class=\"form-control text\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>     
                </div>

                <div class=\"modal-footer\">
                    <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                        <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                            <img src='resources/images/loaders.gif' style='height:100%;width:auto;'/>
                        </div>
                    </div>
                    <button id=\"confirmjf\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>
            </div>

        </div>
    </div>
</div>



<div id=\"form-fcg\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            ";
        // line 122
        if ((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 122, $this->source); })())) {
            // line 123
            echo "            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\"></div>
            </div>
            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Gerencia, área y sector </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Experiencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            ";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 141, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["w"]) {
                // line 142
                echo "                                <tr>
                                    <td>";
                // line 143
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "nombre", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 144
                echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fksector", array()), "nombre", array())), "html", null, true);
                echo "</td>
                                    <td>";
                // line 145
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "experiencia", array()), "html", null, true);
                echo "</td>
                                    <td align=\"center\">
                                        <button id=\"apfcg\" data-json=\"";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcg\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcg\" data-json=\"";
                // line 148
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcg\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['w'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "                        </tbody>
                    </table>
                </div>
            </div>
            ";
        } else {
            // line 157
            echo "                <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            ";
        }
        // line 165
        echo "        </div>
    </div>
</div>



<div id=\"formgr-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgfcg\">
                
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clavegr\" name=\"clavegr\" type=\"password\" class=\"form-control text\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>     
                </div>
                <div class=\"modal-footer\">
                    <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                        <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                            <img src='resources/images/loaders.gif' style='height:100%;width:auto;'/>
                        </div>
                    </div>
                    <button id=\"confirmgr\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "fichacargo/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 165,  247 => 157,  240 => 152,  230 => 148,  226 => 147,  221 => 145,  217 => 144,  213 => 143,  210 => 142,  206 => 141,  186 => 123,  184 => 122,  132 => 72,  122 => 64,  114 => 58,  104 => 54,  100 => 53,  95 => 51,  91 => 50,  87 => 49,  84 => 48,  80 => 47,  59 => 28,  57 => 27,  40 => 13,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">

            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Ficha de Cargos</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>

            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    {{ form(form) }}
                </div>
            </div>

        </div>
    </div>
</div>



<div id=\"form-fcj\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">

        <div class=\"modal-content\">
            {% if fcaprobjf %}
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Jefe inmediato superior</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\"></div>
            </div>

            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Gerencia, área y sector </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Experiencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            {% for v in fcaprobjf %}
                                <tr>
                                    <td>{{ v.nombre }}</td>
                                    <td>{{ v.fkarea.fkarea.nombre ~' | '~ v.fkarea.fkgerencia.nombre ~' | '~  v.fkarea.fksector.nombre }}</td>
                                    <td>{{ v.experiencia }}</td>
                                    <td align=\"center\">
                                        <button id=\"apfcj\" data-json=\"{{v.id}}\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcj\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcj\" data-json=\"{{v.id}}\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcj\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>

            {% else %}
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Jefe inmediato superior</h3>
                    <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            {% endif %}

        </div>
    </div>
</div>



<div id=\"formjf-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">

            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción - Jefe inmediato superior</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>

            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgfcj\">
                
            </div>

            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clavejf\" name=\"clavejf\" type=\"password\" class=\"form-control text\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>     
                </div>

                <div class=\"modal-footer\">
                    <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                        <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                            <img src='resources/images/loaders.gif' style='height:100%;width:auto;'/>
                        </div>
                    </div>
                    <button id=\"confirmjf\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>
            </div>

        </div>
    </div>
</div>



<div id=\"form-fcg\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            {% if fcaprobgr %}
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\"></div>
            </div>
            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Nombre </th>
                            <th class=\"order_by_th\" data-name=\"names\">Gerencia, área y sector </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Experiencia </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            {% for w in fcaprobgr %}
                                <tr>
                                    <td>{{ w.nombre }}</td>
                                    <td>{{ w.fkarea.fkarea.nombre ~' | '~ w.fkarea.fkgerencia.nombre ~' | '~  w.fkarea.fksector.nombre }}</td>
                                    <td>{{ w.experiencia }}</td>
                                    <td align=\"center\">
                                        <button id=\"apfcg\" data-json=\"{{w.id}}\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcg\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcg\" data-json=\"{{w.id}}\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcg\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
            {% else %}
                <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            {% endif %}
        </div>
    </div>
</div>



<div id=\"formgr-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgfcg\">
                
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clavegr\" name=\"clavegr\" type=\"password\" class=\"form-control text\">
                            <label class=\"form-label\">Password</label>
                        </div>
                    </div>     
                </div>
                <div class=\"modal-footer\">
                    <div style=\"text-align: center; margin:auto;width:100%;height:55px;\">
                        <div class=\"plan-icon-load progress\" style='margin:auto;display:none;height:55px;'>
                            <img src='resources/images/loaders.gif' style='height:100%;width:auto;'/>
                        </div>
                    </div>
                    <button id=\"confirmgr\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "fichacargo/form.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\fichacargo\\form.html.twig");
    }
}
