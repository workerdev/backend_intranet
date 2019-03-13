<?php

/* menu/form.html.twig */
class __TwigTemplate_40050ed558096d9816eed1a41af7d668c0892656b29793571a6ca1b82cdd66dd extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "menu/form.html.twig"));

        // line 1
        echo "<div id=\"form\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Menú</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Menú ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                        <br>
                            <br>
                            <br>
                        <div class=\"btn-group\">
                            <button id=\"menupick\" class=\"btn btn-primary btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                               Selecciona una imagen
                            </button>
                            
                            <div class=\"dropdown-menu\" style=\"background-color: #ddddd;\">
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec03.png\">
                                    <img src=\"/images/Elfec03.png\" style=\"width:20%;\"/>
                                </button>
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec04.png\">
                                    <img src=\"/images/Elfec04.png\" style=\"width:20%;\"/>
                                </button>
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec06.png\">
                                    <img src=\"/images/Elfec06.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec07.png\">
                                    <img src=\"/images/Elfec07.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec08.png\">
                                    <img src=\"/images/Elfec08.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec09.png\">
                                    <img src=\"/images/Elfec09.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec10.png\">
                                    <img src=\"/images/Elfec10.png\" style=\"width:20%;\"/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/form.html.twig";
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
                <h3 id=\"cliente_tittle\" class=\"modal-title\">Menú</h3>
                <h4 id=\"cliente_enable\" class=\"\"></h4>
            </div>
            <div class=\"modal-body\">
                <div id=\"cliente_form_body\" class=\"box-body\">
                    <div id=\"id_div\" class=\"form-group\">
                        <div class=\"form-line\">
                            <input id=\"id\" type=\"text\" class=\"form-control\" disabled=\"disabled\">
                            <label class=\"form-label\">Menú ID</label>
                        </div>
                    </div>
                    <div class=\"form-group form-float\">
                        <div class=\"form-line\">
                            <input id=\"nombre\" name=\"nombre\" type=\"text\" class=\"form-control name\">
                            <label class=\"form-label\">Nombre</label>
                        </div>
                        <br>
                            <br>
                            <br>
                        <div class=\"btn-group\">
                            <button id=\"menupick\" class=\"btn btn-primary btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                               Selecciona una imagen
                            </button>
                            
                            <div class=\"dropdown-menu\" style=\"background-color: #ddddd;\">
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec03.png\">
                                    <img src=\"/images/Elfec03.png\" style=\"width:20%;\"/>
                                </button>
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec04.png\">
                                    <img src=\"/images/Elfec04.png\" style=\"width:20%;\"/>
                                </button>
                                <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec06.png\">
                                    <img src=\"/images/Elfec06.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec07.png\">
                                    <img src=\"/images/Elfec07.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec08.png\">
                                    <img src=\"/images/Elfec08.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec09.png\">
                                    <img src=\"/images/Elfec09.png\" style=\"width:20%;\"/>
                                </button>
                                  <button class=\"img\" style=\"background-color: #dddd;border: none;\" value=\"/images/Elfec10.png\">
                                    <img src=\"/images/Elfec10.png\" style=\"width:20%;\"/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button id=\"insert\" type=\"button\" class=\"btn bg-indigo waves-effect\">Guardar<i class=\"material-icons\">save</i></button>
                    <button id=\"update\" type=\"button\" class=\"btn bg-indigo waves-effect\">Modificar<i class=\"material-icons\">refresh</i></button>
                </div>
            </div>
        </div>
    </div>
</div>
", "menu/form.html.twig", "H:\\Elfec\\back_end\\1st_version\\elfec_intranet_backend\\templates\\menu\\form.html.twig");
    }
}
