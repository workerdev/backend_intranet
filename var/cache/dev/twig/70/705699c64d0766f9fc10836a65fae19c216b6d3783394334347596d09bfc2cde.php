<?php

/* auditor/form.html.twig */
class __TwigTemplate_94f824db784f62c2e317f7988c17304a5e938719d2fd133199c1c2147cb8736b extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "auditor/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Auditor</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Auditor ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"item\" name=\"item\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Item</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombres\" name=\"nombres\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombres</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"paterno\" name=\"paterno\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Paterno</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"materno\" name=\"materno\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Materno</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellidosnombres\" name=\"apellidosnombres\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Apellidos y Nombres</label>
                        </div>
                    </div>
                    
                    <label>Auditor SIG</label>
                        <select id=\"auditorsig\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"profesion\" name=\"profesion\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Profesión</label>
                        </div>
                    </div>
                    
                    <label>Vigente</label>
                        <select id=\"vigente\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
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
        return "auditor/form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Auditor</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Auditor ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"item\" name=\"item\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Item</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombres\" name=\"nombres\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombres</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"paterno\" name=\"paterno\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Paterno</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"materno\" name=\"materno\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Materno</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"apellidosnombres\" name=\"apellidosnombres\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Apellidos y Nombres</label>
                        </div>
                    </div>
                    
                    <label>Auditor SIG</label>
                        <select id=\"auditorsig\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"profesion\" name=\"profesion\" type=\"text\" class=\"form-control\">
                            <label class=\"form-label\">Profesión</label>
                        </div>
                    </div>
                    
                    <label>Vigente</label>
                        <select id=\"vigente\" class=\"form-control\">
                            <option value=\"Si\">Si</option>
                            <option value=\"No\">No</option>
                        </select>
                        </br>
                        </br>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "auditor/form.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\Elfec Github\\elfec_intranet_backend\\templates\\auditor\\form.html.twig");
    }
}
