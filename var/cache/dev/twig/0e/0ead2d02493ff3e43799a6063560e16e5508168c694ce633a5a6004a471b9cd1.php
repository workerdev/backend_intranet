<?php

/* fichacargo/form.html.twig */
class __TwigTemplate_17cba3c7587339c869526ec80e5ed5024d1ce5845e22fd391d1727c7b9f26a58 extends Twig_Template
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
                            <label class=\"form-label\">formacion</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"caracteristicas\" name=\"caracteristicas\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Caracteristicas</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha Aprobacion</label>
                        <br>
                        <br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\">
                            
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadojefe\" name=\"aprobadojefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por jefe</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmajefe\" name=\"firmajefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma del jefe</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadogerente\" name=\"aprobadogerente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por gerente</label>
                        </div>
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
                            <label class=\"form-label\">Hipervinculo</label>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">save</i></button>
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
                            <label class=\"form-label\">formacion</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"caracteristicas\" name=\"caracteristicas\" type=\"textarea\" class=\"form-control text\">
                            <label class=\"form-label\">Caracteristicas</label>
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                        <label class=\"form-label\">Fecha Aprobacion</label>
                        <br>
                        <br>
                            <input id=\"fechaaprobacion\" name=\"fechaaprobacion\" type=\"date\">
                            
                        </div>
                    </div>
                     <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadojefe\" name=\"aprobadojefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por jefe</label>
                        </div>
                    </div>
                    
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"firmajefe\" name=\"firmajefe\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Firma del jefe</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"aprobadogerente\" name=\"aprobadogerente\" type=\"text\" class=\"form-control text\">
                            <label class=\"form-label\">Aprobado por gerente</label>
                        </div>
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
                            <label class=\"form-label\">Hipervinculo</label>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">save</i></button>
                </div>
            </div>
        </div>
    </div>
</div>", "fichacargo/form.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\fichacargo\\form.html.twig");
    }
}
