<?php

/* docprocesorev/form.html.twig */
class __TwigTemplate_c25c1fa8665041e346edb387029b0e9661aba07017101d02b839e1e95285372b extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "docprocesorev/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en Revisión</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento en revisión ID</label>
                        </div>
                    </div>

                     <label>Documento en proceso</label>
                        <select id=\"fkdoc\" class=\"form-control\">
                        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipo"]) || array_key_exists("tipo", $context) ? $context["tipo"] : (function () { throw new Twig_Error_Runtime('Variable "tipo" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 21
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "titulo", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "                        </select>
                        </br>
                        </br>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                    <label>Responsable</label>
                        <select id=\"responsable\" class=\"form-control\">
                        ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["responsable"]) || array_key_exists("responsable", $context) ? $context["responsable"] : (function () { throw new Twig_Error_Runtime('Variable "responsable" does not exist.', 38, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 39
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
        // line 41
        echo "                        </select>
                    </div> 

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firma\" name=\"firma\" type=\"text\" class=\"form-control text\" value=\"Por revisar\">
                            <label class=\"form-label\">Firma</label>
                        </div>
                    </div>

                      <div class=\"form-group form-float\">
                         <label class=\"form-label\">Estado del documento</label>
                        <select id=\"estadodoc\" class=\"form-control\">
                            <option value=\"APROBADO\">APROBADO </option>
                            <option value=\"DERIVADO\">DERIVADO </option>
                            <option value=\"RECHAZADO\">RECHAZADO </option>
                        </select>
                        </br>
                        </br>
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



<div id=\"form-rev\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            ";
        // line 76
        if ((isset($context["docderiv"]) || array_key_exists("docderiv", $context) ? $context["docderiv"] : (function () { throw new Twig_Error_Runtime('Variable "docderiv" does not exist.', 76, $this->source); })())) {
            // line 77
            echo "            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documentos derivados</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\">
                <label style=\"color: grey\">Responsable</label>
                    <select id=\"dresponsable\" class=\"form-control\" required=\"required\" autofocus>
                    ";
            // line 84
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["responsable"]) || array_key_exists("responsable", $context) ? $context["responsable"] : (function () { throw new Twig_Error_Runtime('Variable "responsable" does not exist.', 84, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 85
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["d"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["d"], "apellido", array())), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["d"], "nombre", array()) . " ") . twig_get_attribute($this->env, $this->source, $context["d"], "apellido", array())), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "                    </select>
                </div> 
            </div>
            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                            <th class=\"order_by_th\" data-name=\"names\">Documento en proceso </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado documento </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["docderiv"]) || array_key_exists("docderiv", $context) ? $context["docderiv"] : (function () { throw new Twig_Error_Runtime('Variable "docderiv" does not exist.', 102, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 103
                echo "                                <tr>
                                    <td>";
                // line 104
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "fecha", array()), "d-m-Y"), "html", null, true);
                echo "</td>
                                    <td>";
                // line 105
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["v"], "fkdoc", array()), "titulo", array()), "html", null, true);
                echo "</td>
                                    <td>";
                // line 106
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "estadodoc", array()), "html", null, true);
                echo "</td>
                                    <td align=\"center\">
                                        <button id=\"drdoc\" data-json=\"";
                // line 108
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-light-green waves-effect waves-light drdoc\" title=\"Derivar\"><i class=\"material-icons\">send</i></button>
                                        <button id=\"apdoc\" data-json=\"";
                // line 109
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apdoc\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcdoc\" data-json=\"";
                // line 110
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["v"], "id", array()), "html", null, true);
                echo "\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcdoc\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "                        </tbody>
                    </table>
                </div>
            </div>
            ";
        } else {
            // line 119
            echo "                <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documentos derivados</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene documentos derivados.</div>
                <div class=\"modal-footer\"> </div>
            ";
        }
        // line 127
        echo "        </div>
    </div>
</div>



<div id=\"form-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgv\">
                
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clave\" name=\"clave\" type=\"password\" class=\"form-control text\">
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
                    <button id=\"confirm\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>

            </div>
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "docprocesorev/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 127,  219 => 119,  212 => 114,  202 => 110,  198 => 109,  194 => 108,  189 => 106,  185 => 105,  181 => 104,  178 => 103,  174 => 102,  157 => 87,  146 => 85,  142 => 84,  133 => 77,  131 => 76,  94 => 41,  83 => 39,  79 => 38,  62 => 23,  51 => 21,  47 => 20,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documento en Revisión</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Documento en revisión ID</label>
                        </div>
                    </div>

                     <label>Documento en proceso</label>
                        <select id=\"fkdoc\" class=\"form-control\">
                        {% for t in tipo %}
                            <option value=\"{{t.id}}\">{{t.titulo}}</option>
                        {% endfor %}
                        </select>
                        </br>
                        </br>

                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha</label>
                        <br>
                            <input id=\"fecha\" name=\"fecha\" type=\"date\" class=\"form-control\">
                        </div>
                    </div>

                    <div class=\"form-group form-float\">
                    <label>Responsable</label>
                        <select id=\"responsable\" class=\"form-control\">
                        {% for t in responsable %}
                            <option value=\"{{t.nombre ~ ' ' ~ t.apellido}}\">{{t.nombre ~ ' ' ~ t.apellido}}</option>
                        {% endfor %}
                        </select>
                    </div> 

                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firma\" name=\"firma\" type=\"text\" class=\"form-control text\" value=\"Por revisar\">
                            <label class=\"form-label\">Firma</label>
                        </div>
                    </div>

                      <div class=\"form-group form-float\">
                         <label class=\"form-label\">Estado del documento</label>
                        <select id=\"estadodoc\" class=\"form-control\">
                            <option value=\"APROBADO\">APROBADO </option>
                            <option value=\"DERIVADO\">DERIVADO </option>
                            <option value=\"RECHAZADO\">RECHAZADO </option>
                        </select>
                        </br>
                        </br>
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



<div id=\"form-rev\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            {% if docderiv %}
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documentos derivados</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                <div class=\"form-group form-float\">
                <label style=\"color: grey\">Responsable</label>
                    <select id=\"dresponsable\" class=\"form-control\" required=\"required\" autofocus>
                    {% for d in responsable %}
                        <option value=\"{{d.nombre ~ ' ' ~ d.apellido}}\">{{d.nombre ~ ' ' ~ d.apellido}}</option>
                    {% endfor %}
                    </select>
                </div> 
            </div>
            <div class=\"modal-body\">
                <div class=\"body table-responsive\">
                    <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                        <thead>
                        <tr>
                            <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                            <th class=\"order_by_th\" data-name=\"names\">Documento en proceso </th>
                            <th class=\"order_by_th\" data-name=\"phone\">Estado documento </th>
                            <th class=\"actions_header\">Acciones </th>
                        </tr>
                        </thead>
                        <tbody id=\"table_content\">
                            {% for v in docderiv %}
                                <tr>
                                    <td>{{ v.fecha | date('d-m-Y') }}</td>
                                    <td>{{ v.fkdoc.titulo }}</td>
                                    <td>{{ v.estadodoc }}</td>
                                    <td align=\"center\">
                                        <button id=\"drdoc\" data-json=\"{{v.id}}\" type=\"button\" class=\"btn bg-light-green waves-effect waves-light drdoc\" title=\"Derivar\"><i class=\"material-icons\">send</i></button>
                                        <button id=\"apdoc\" data-json=\"{{v.id}}\" type=\"button\" class=\"btn bg-cyan waves-effect waves-light apdoc\" title=\"Aprobar\"><i class=\"material-icons\">done</i></button>
                                        <button id=\"rcdoc\" data-json=\"{{v.id}}\" type=\"button\" class=\"btn bg-blue waves-effect waves-light rcdoc\" title=\"Rechazar\"><i class=\"material-icons\">clear</i></button>
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
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Documentos derivados</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
                </div>
                <div class=\"modal-body\">No tiene documentos derivados.</div>
                <div class=\"modal-footer\"> </div>
            {% endif %}
        </div>
    </div>
</div>



<div id=\"form-valid\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Confirmar acción</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"text-center\" style=\"background-color: rgba(0, 02, 204, .2); margin: 10px; padding: 10px; color: grey; display: none\" role=\"alert\" id=\"msgv\">
                
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"clave\" name=\"clave\" type=\"password\" class=\"form-control text\">
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
                    <button id=\"confirm\" type=\"button\" class=\"btn bg-green waves-effect\">Enviar <i class=\"material-icons\">lock_open</i></button>
                </div>

            </div>
        </div>
    </div>
</div>", "docprocesorev/form.html.twig", "C:\\Users\\Sum\\Documents\\Elfec_Doc\\travel_elfec_intranet\\elfec_intranet_backend\\templates\\docprocesorev\\form.html.twig");
    }
}
