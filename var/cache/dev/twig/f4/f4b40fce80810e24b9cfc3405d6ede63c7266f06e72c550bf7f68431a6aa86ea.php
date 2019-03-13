<?php

/* security/login.html.twig */
class __TwigTemplate_37812bd2bd386ae3e8eab14c755e7f2c89064665ff29804949c23841ca2ea515 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <title>ELFEC</title>
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"resources/elfec.ico\" type=\"image/x-icon\">
        <link href=\"resources/css/iconfont/material-icons.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/node-waves/waves.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/fileinput/css/fileinput.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/animate-css/animate.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/sweetalert2/sweetalert2.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\">
        <link href=\"resources/css/style.css\" rel=\"stylesheet\">
        <link href=\"resources/css/themes/all-themes.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/nestable/jquery-nestable.css\" rel=\"stylesheet\">
        <link href=\"resources/css/main.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css\" rel=\"stylesheet\">
        
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
        ";
        // line 27
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "</head>
    <style>
        .login-page{ background-color: #3F51B5 }
        .input-group .form-line::after{
            border-bottom: 2px solid #302d66;
        }
    </style>

<body class=\"login-page\">
    <div class=\"login-box\">
        <div class=\"logo\" style=\"margin: 0px\">
            <center>
                <img class=\"img-responsive\" width=\"250\" height=\"250\" src=\"resources/images/elfeclgw.png\">
            </center>
        </div>
        <div class=\"card\">
            <div class=\"body\">
                <form id=\"sign_in\" method=\"POST\" autocomplete=\"off\" action=\"";
        // line 45
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\">
                    
                    <div class=\"msg\">Iniciar sesión</div>
                    ";
        // line 48
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 48, $this->source); })())) {
            // line 49
            echo "                    <div class=\"alert alert-danger text-center\" id=\"lgfail\">
                        <span class=\"glyphicon glyphicon-lock\"> </span><span> ";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 50, $this->source); })()), "messageKey", array()), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 50, $this->source); })()), "messageData", array()), "security"), "html", null, true);
            echo "</span>
                    </div>
                    ";
        }
        // line 53
        echo "                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">person</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new Twig_Error_Runtime('Variable "last_username" does not exist.', 58, $this->source); })()), "html", null, true);
        echo "\" id=\"_username\" name=\"_username\" placeholder=\"Nombre de usuario\" required autofocus>
                        </div>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">lock</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"password\" class=\"form-control\" id=\"_password\" name=\"_password\" placeholder=\"Contraseña\" required>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-4\">

                        </div>
                        <div class=\"col-xs-4\">
                            <button id=\"iniciar\" class=\"btn bg-indigo btn-block waves-effect\" type=\"submit\">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src=\"resources/plugins/jquery/jquery.min.js\"></script>
        <script src=\"resources/plugins/jquery-slimscroll/jquery.slimscroll.js\"></script>
        <script src=\"resources/plugins/bootstrap/js/bootstrap.js\"></script>
        <script src=\"resources/plugins/node-waves/waves.js\"></script>
        <script src=\"resources/js/admin.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/bootstrap-notify/bootstrap-notify.js\"></script>
        <script src=\"resources/plugins/fileinput/js/fileinput.min.js\"></script>
        <script src=\"resources/plugins/sweetalert2/sweetalert2.min.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/jquery-validation/jquery.validate.js\"></script>
        <script src=\"resources/plugins/nestable/jquery.nestable.js\"></script>
        <script src=\"resources/js/jquery.toast.js\"></script>
        <script src=\"resources/js/functions.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
</body>
<script>
</script>

</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "ELFEC";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 27,  157 => 8,  104 => 58,  97 => 53,  91 => 50,  88 => 49,  86 => 48,  80 => 45,  61 => 28,  59 => 27,  37 => 8,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <title>ELFEC</title>
        <title>{% block title %}ELFEC{% endblock %}</title>
        <link rel=\"icon\" href=\"resources/elfec.ico\" type=\"image/x-icon\">
        <link href=\"resources/css/iconfont/material-icons.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        <link href=\"resources/plugins/node-waves/waves.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/fileinput/css/fileinput.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/animate-css/animate.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/sweetalert2/sweetalert2.min.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\">
        <link href=\"resources/css/style.css\" rel=\"stylesheet\">
        <link href=\"resources/css/themes/all-themes.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/nestable/jquery-nestable.css\" rel=\"stylesheet\">
        <link href=\"resources/css/main.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />
        <link href=\"resources/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css\" rel=\"stylesheet\">
        
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
        {% block stylesheets %}{% endblock %}
</head>
    <style>
        .login-page{ background-color: #3F51B5 }
        .input-group .form-line::after{
            border-bottom: 2px solid #302d66;
        }
    </style>

<body class=\"login-page\">
    <div class=\"login-box\">
        <div class=\"logo\" style=\"margin: 0px\">
            <center>
                <img class=\"img-responsive\" width=\"250\" height=\"250\" src=\"resources/images/elfeclgw.png\">
            </center>
        </div>
        <div class=\"card\">
            <div class=\"body\">
                <form id=\"sign_in\" method=\"POST\" autocomplete=\"off\" action=\"{{ path('login') }}\">
                    
                    <div class=\"msg\">Iniciar sesión</div>
                    {% if error %}
                    <div class=\"alert alert-danger text-center\" id=\"lgfail\">
                        <span class=\"glyphicon glyphicon-lock\"> </span><span> {{ error.messageKey | trans(error.messageData, 'security') }}</span>
                    </div>
                    {% endif %}
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">person</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"text\" class=\"form-control\" value=\"{{ last_username }}\" id=\"_username\" name=\"_username\" placeholder=\"Nombre de usuario\" required autofocus>
                        </div>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">lock</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"password\" class=\"form-control\" id=\"_password\" name=\"_password\" placeholder=\"Contraseña\" required>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-4\">

                        </div>
                        <div class=\"col-xs-4\">
                            <button id=\"iniciar\" class=\"btn bg-indigo btn-block waves-effect\" type=\"submit\">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src=\"resources/plugins/jquery/jquery.min.js\"></script>
        <script src=\"resources/plugins/jquery-slimscroll/jquery.slimscroll.js\"></script>
        <script src=\"resources/plugins/bootstrap/js/bootstrap.js\"></script>
        <script src=\"resources/plugins/node-waves/waves.js\"></script>
        <script src=\"resources/js/admin.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/bootstrap-notify/bootstrap-notify.js\"></script>
        <script src=\"resources/plugins/fileinput/js/fileinput.min.js\"></script>
        <script src=\"resources/plugins/sweetalert2/sweetalert2.min.js\"></script>
        <script src=\"resources/plugins/bootstrap-select/js/bootstrap-select.js\"></script>
        <script src=\"resources/plugins/jquery-validation/jquery.validate.js\"></script>
        <script src=\"resources/plugins/nestable/jquery.nestable.js\"></script>
        <script src=\"resources/js/jquery.toast.js\"></script>
        <script src=\"resources/js/functions.js\"></script>
        <script src=\"resources/plugins/momentjs/moment.js\"></script>
        <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
        <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
</body>
<script>
</script>

</html>", "security/login.html.twig", "H:\\Elfec\\new_backend\\elfec_intranet_backend\\templates\\security\\login.html.twig");
    }
}
