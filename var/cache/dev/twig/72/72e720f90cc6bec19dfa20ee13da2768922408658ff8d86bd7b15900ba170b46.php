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

                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Ficha cargos ID</label>
                        </div>
                    </div>
                       
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>

                    <label>Tipo de Área, Gerencia y Sector</label>
                    <select id=\"fkarea\" class=\"form-control\">
                        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 30, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 31
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["t"], "fksector", array()), "nombre", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                    </select>
                    </br>
                    </br>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"objetivo\" name=\"objetivo\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Objetivo</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsabilidades\" name=\"responsabilidades\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Responsabilidades</label>
                        </div>
                    </div>
                     
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"experiencia\" name=\"experiencia\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Experiencia</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"conocimientos\" name=\"conocimientos\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Conocimientos</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"formacion\" name=\"formacion\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Formación</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"caracteristicas\" name=\"caracteristicas\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Características</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de Aprobación</label>
                            <br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <label>Jefe inmediato superior</label>
                        <select id=\"aprobadojefe\" class=\"form-control\">
                        ";
        // line 90
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["responsable"]) || array_key_exists("responsable", $context) ? $context["responsable"] : (function () { throw new Twig_Error_Runtime('Variable "responsable" does not exist.', 90, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 91
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["t"], "apellido", array())), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["t"], "apellido", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "                        </select>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmajefe\" name=\"firmajefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma del jefe</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>Gerente de área</label>
                        <select id=\"aprobadogerente\" class=\"form-control\">
                        ";
        // line 106
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["responsable"]) || array_key_exists("responsable", $context) ? $context["responsable"] : (function () { throw new Twig_Error_Runtime('Variable "responsable" does not exist.', 106, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 107
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["t"], "apellido", array())), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["t"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["t"], "apellido", array())), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                        </select>
                    </div> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmagerente\" name=\"firmagerente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma de gerente</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"hipervinculo\" name=\"hipervinculo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Hipervínculo</label>
                        </div>
                    </div>

                </div>

                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
                </div>
            </div>

        </div>
    </div>
</div>



<div id=\"form-fcj\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">

        <div class=\"modal-content\">
            ";
        // line 144
        if ((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 144, $this->source); })())) {
            // line 145
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
            // line 164
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fcaprobjf"]) || array_key_exists("fcaprobjf", $context) ? $context["fcaprobjf"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobjf" does not exist.', 164, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 165
                echo "                                <tr>
                                    <td>";
                // line 166
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "nombre", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 167
                echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkarea", array()), "fksector", array()), "nombre", array())), "html", null, true);
                echo "</td>
                                    <td>";
                // line 168
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "experiencia", array()), "html", null, true);
                echo "</td>
                                    <td align=\"center\">
                                        <button id=\"apfcj\" data-json=\"";
                // line 170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcj\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcj\" data-json=\"";
                // line 171
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcj\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "                        </tbody>
                    </table>
                </div>
            </div>

            ";
        } else {
            // line 181
            echo "                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Jefe inmediato superior</h3>
                    <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            ";
        }
        // line 189
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
        // line 239
        if ((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 239, $this->source); })())) {
            // line 240
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
            // line 258
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fcaprobgr"]) || array_key_exists("fcaprobgr", $context) ? $context["fcaprobgr"] : (function () { throw new Twig_Error_Runtime('Variable "fcaprobgr" does not exist.', 258, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["w"]) {
                // line 259
                echo "                                <tr>
                                    <td>";
                // line 260
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "nombre", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 261
                echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fkarea", array()), "nombre", array()) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fkgerencia", array()), "nombre", array())) . " | ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["w"], "fkarea", array()), "fksector", array()), "nombre", array())), "html", null, true);
                echo "</td>
                                    <td>";
                // line 262
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "experiencia", array()), "html", null, true);
                echo "</td>
                                    <td align=\"center\">
                                        <button id=\"apfcg\" data-json=\"";
                // line 264
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apfcg\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcfcg\" data-json=\"";
                // line 265
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["w"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcfcg\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['w'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 269
            echo "                        </tbody>
                    </table>
                </div>
            </div>
            ";
        } else {
            // line 274
            echo "                <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Fichas por aprobar - Gerente de área</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene fichas por aprobar.</div>
                <div class=\"modal-footer\"> </div>
            ";
        }
        // line 282
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
        return array (  413 => 282,  403 => 274,  396 => 269,  386 => 265,  382 => 264,  377 => 262,  373 => 261,  369 => 260,  366 => 259,  362 => 258,  342 => 240,  340 => 239,  288 => 189,  278 => 181,  270 => 175,  260 => 171,  256 => 170,  251 => 168,  247 => 167,  243 => 166,  240 => 165,  236 => 164,  215 => 145,  213 => 144,  176 => 109,  165 => 107,  161 => 106,  146 => 93,  135 => 91,  131 => 90,  72 => 33,  61 => 31,  57 => 30,  26 => 1,);
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

                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Ficha cargos ID</label>
                        </div>
                    </div>
                       
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                    </div>

                    <label>Tipo de Área, Gerencia y Sector</label>
                    <select id=\"fkarea\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{ t.id }}\">{{ t.fkarea.nombre ~' | '~ t.fkgerencia.nombre ~' | '~  t.fksector.nombre }}</option>
                        {% endfor %}
                    </select>
                    </br>
                    </br>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"objetivo\" name=\"objetivo\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Objetivo</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"responsabilidades\" name=\"responsabilidades\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Responsabilidades</label>
                        </div>
                    </div>
                     
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"experiencia\" name=\"experiencia\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Experiencia</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"conocimientos\" name=\"conocimientos\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Conocimientos</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"formacion\" name=\"formacion\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Formación</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"caracteristicas\" name=\"caracteristicas\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Características</label>
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <label class=\"form-label\">Fecha de Aprobación</label>
                            <br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                     <div class=\"form-group form-float\">
                        <label>Jefe inmediato superior</label>
                        <select id=\"aprobadojefe\" class=\"form-control\">
                        {% for t in responsable %}
                            <option value=\"{{t.nombre ~ ' ' ~ t.apellido}}\">{{t.nombre ~ ' ' ~ t.apellido}}</option>
                        {% endfor %}
                        </select>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmajefe\" name=\"firmajefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma del jefe</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <label>Gerente de área</label>
                        <select id=\"aprobadogerente\" class=\"form-control\">
                        {% for t in responsable %}
                            <option value=\"{{t.nombre ~ ' ' ~ t.apellido}}\">{{t.nombre ~ ' ' ~ t.apellido}}</option>
                        {% endfor %}
                        </select>
                    </div> 

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmagerente\" name=\"firmagerente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma de gerente</label>
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"hipervinculo\" name=\"hipervinculo\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Hipervínculo</label>
                        </div>
                    </div>

                </div>

                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar <i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar <i class=\"material-icons\">refresh</i></button>
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
