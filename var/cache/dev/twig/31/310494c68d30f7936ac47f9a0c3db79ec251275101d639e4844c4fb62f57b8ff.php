<?php

/* login/index.html.twig */
class __TwigTemplate_0845f9767366d77d7e4bd4108c351ec63a8c3c72d77658262a6cdd10f287993e extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "login/index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <title>Cloudbit - ELFEC</title>
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"resources/icono.ico\" type=\"image/x-icon\">
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
        <div class=\"logo\">
            <center>
                <img class=\"img-responsive\" width=\"250\" height=\"250\" src=\"resources/images/elfec.jpg\">
            </center>
        </div>
        <div class=\"card\">
            <div class=\"body\">
                <form id=\"sign_in\" method=\"POST\" autocomplete=\"off\">
                    
                    <div class=\"msg\">Iniciar sesión</div>
                    <div class=\"alert alert-danger text-center\" id=\"lgfail\" style=\"display:none;\">
                        <span class=\"glyphicon glyphicon-lock\"> </span><span> Datos invalidos :(</span>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">person</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Nombre de usuario\" required autofocus>
                        </div>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">lock</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Contraseña\" required>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-4\">

                        </div>
                        <div class=\"col-xs-4\">
                            <button id=\"iniciar\" class=\"btn bg-indigo btn-block waves-effect\" type=\"button\">Ingresar</button>
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
    main_route = '../'
    
    \$(function () {
        \$('#sign_in').validate({
            highlight: function (input) {
                //console.log(input);
                \$(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                \$(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                \$(element).parents('.input-group').append(error);
            }
        });
    });

    \$('#iniciar').click(function () {
        //console.log(modulos)
        objeto = JSON.stringify({
            'username': \$('#username').val(),
            'password': \$('#password').val()
        })
        //console.log(\"START | \"+objeto)
        ajax_login(\"/login_init\", {object: objeto}, null, function(response){
            //console.log(response)
            var self = JSON.parse(response);
            //console.log(\"RES | \"+self)
            if(self.response == \"Acceso permitido\") setTimeout(function(){window.location=\"/\"}, 1000)
            else{ 
                //alert(self.response)
                \$('#lgfail').show().fadeToggle(5000);
            }
        })/*function () {setTimeout(function(){window.location=main_route}, 2000);}*/
    })
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
        return "login/index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  188 => 27,  176 => 8,  61 => 28,  59 => 27,  37 => 8,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <title>Cloudbit - ELFEC</title>
        <title>{% block title %}ELFEC{% endblock %}</title>
        <link rel=\"icon\" href=\"resources/icono.ico\" type=\"image/x-icon\">
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
        <div class=\"logo\">
            <center>
                <img class=\"img-responsive\" width=\"250\" height=\"250\" src=\"resources/images/elfec.jpg\">
            </center>
        </div>
        <div class=\"card\">
            <div class=\"body\">
                <form id=\"sign_in\" method=\"POST\" autocomplete=\"off\">
                    
                    <div class=\"msg\">Iniciar sesión</div>
                    <div class=\"alert alert-danger text-center\" id=\"lgfail\" style=\"display:none;\">
                        <span class=\"glyphicon glyphicon-lock\"> </span><span> Datos invalidos :(</span>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">person</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Nombre de usuario\" required autofocus>
                        </div>
                    </div>
                    <div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">lock</i>
                        </span>
                        <div class=\"form-line\">
                            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Contraseña\" required>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-4\">

                        </div>
                        <div class=\"col-xs-4\">
                            <button id=\"iniciar\" class=\"btn bg-indigo btn-block waves-effect\" type=\"button\">Ingresar</button>
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
    main_route = '../'
    
    \$(function () {
        \$('#sign_in').validate({
            highlight: function (input) {
                //console.log(input);
                \$(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                \$(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                \$(element).parents('.input-group').append(error);
            }
        });
    });

    \$('#iniciar').click(function () {
        //console.log(modulos)
        objeto = JSON.stringify({
            'username': \$('#username').val(),
            'password': \$('#password').val()
        })
        //console.log(\"START | \"+objeto)
        ajax_login(\"/login_init\", {object: objeto}, null, function(response){
            //console.log(response)
            var self = JSON.parse(response);
            //console.log(\"RES | \"+self)
            if(self.response == \"Acceso permitido\") setTimeout(function(){window.location=\"/\"}, 1000)
            else{ 
                //alert(self.response)
                \$('#lgfail').show().fadeToggle(5000);
            }
        })/*function () {setTimeout(function(){window.location=main_route}, 2000);}*/
    })
</script>

</html>", "login/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\login\\index.html.twig");
    }
}
