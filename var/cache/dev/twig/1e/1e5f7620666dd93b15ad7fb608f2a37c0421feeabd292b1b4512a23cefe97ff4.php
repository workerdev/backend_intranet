<?php

/* noticia/index.html.twig */
class __TwigTemplate_648862133cdbd263e0d90907490f79c1c4ceb4c4217c322a9f04729d72f16f9c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "noticia/index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "noticia/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/noticia'

    function default_values() {
        page_nr = 1
        max_entries = 10
        like_search = \"\"
        order_by = \"\"
        ascendant = true
    }
    default_values()
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 22
        echo "
";
        // line 23
        echo twig_include($this->env, $context, "noticia/form.html.twig");
        echo "

<div class=\"header bg-indigo\"><h2>Noticia</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        ";
        // line 29
        if (twig_in_filter("noticia_insertar", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 29, $this->source); })()))) {
            // line 30
            echo "            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        ";
        }
        // line 34
        echo "        </div>
    </div>
    ";
        // line 36
        if ((twig_in_filter("home_noticia", (isset($context["permisos"]) || array_key_exists("permisos", $context) ? $context["permisos"] : (function () { throw new Twig_Error_Runtime('Variable "permisos" does not exist.', 36, $this->source); })())) && (isset($context["objects"]) || array_key_exists("objects", $context) ? $context["objects"] : (function () { throw new Twig_Error_Runtime('Variable "objects" does not exist.', 36, $this->source); })()))) {
            // line 37
            echo "    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Titulo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Subitulo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                ";
            // line 50
            echo twig_include($this->env, $context, "noticia/table.html.twig");
            echo "
                </tbody>
            </table>
        </div>
    </div>
    ";
        } else {
            // line 56
            echo "    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    ";
        }
        // line 58
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 60
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 61
        echo "<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
<script src=\"resources/plugins/tinymce/tinymce.js\"></script>

<script>
    //TinyMCE
    tinymce.init({
        selector: \"textarea#contenido\",
        language : \"es_MX\",
        theme: \"modern\",
        resize: false,
        //skin: \"blue\",
        height: 350,
        menubar: false,
        toolbar1: 'imageupload | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        image_advtab: false,
        statusbar: false,
        setup: function(editor) {
            var inp = \$('<input id=\"tinymce-uploader\" type=\"file\" name=\"pic\" accept=\"image/*\" style=\"display:none\">');
            \$(editor.getElement()).parent().append(inp);

            inp.on(\"change\",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src=\"'+img.src+'\"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {
                icon: \"image\",
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        }
    });
    tinymce.suffix = \".min\";
    tinyMCE.baseURL = 'resources/plugins/tinymce'

    \$('#tipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo constitucional.',
        title: 'Seleccione un tipo constitucional.'
    })

    function hideContenido(e){ //alert('event')
        if (\$(e).val() == 'Urgente' || \$(e).val() == 'Destacados') \$('#cont-tpnt').hide()
        else \$('#cont-tpnt').show()
    }

    \$('#new').click(function () {
        \$('#titulo').val('')
        \$('#subtitulo').val('')
        \$('#contenido').val('')
        \$(\"#tipo\").val('')
        \$(\"#fecha\").val('')

        clean_form()
        verif_inputs()
        \$('#cont-tpnt').show()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        tinyMCE.triggerSave();
        var categorias =  new Array();
        \$('.categoria:checked').each(
            function() {
                console.log(\"El checkbox con valor \" + \$(this).val() + \" está seleccionado\");
                categorias.push(\$(this).val());
            }
        );
        objeto = JSON.stringify({
            'titulo': \$('#titulo').val(),
            'subtitulo': \$('#subtitulo').val(),
            'contenido': \$(\"#contenido\").val(),
            'tipo': \$(\"#tipo\").val(),
            'fecha': \$(\"#fecha\").val(),
            'categorias': categorias
        })
        ajax_call(\"/noticia_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            \$('#cont-tpnt').show()
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/noticia_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#titulo').val(self.titulo)
                \$('#subtitulo').val(self.subtitulo)
                \$('#tipo').val(self.tipo)
                \$('#fecha').val(self.fecha)

                tinyMCE.get('contenido').setContent(self.contenido)
                \$(\"#contenido\").html(self.contenido)

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        tinyMCE.triggerSave();
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'titulo': \$('#titulo').val(),
            'subtitulo': \$('#subtitulo').val(),
            'contenido': \$('#contenido').val(),
            'tipo': \$('#tipo').val(),
            'fecha': \$('#fecha').val()
        })
        ajax_call(\"/noticia_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja los datos noticia?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/noticia_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "noticia/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 61,  138 => 60,  130 => 58,  126 => 56,  117 => 50,  102 => 37,  100 => 36,  96 => 34,  90 => 30,  88 => 29,  79 => 23,  76 => 22,  70 => 21,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
<style>
    .accion{ cursor:pointer }
</style>
<script src=\"resources/js/functions.js\"></script>

<script>
    main_route = '/noticia'

    function default_values() {
        page_nr = 1
        max_entries = 10
        like_search = \"\"
        order_by = \"\"
        ascendant = true
    }
    default_values()
</script>
{% endblock %}
{% block body %}

{{ include('noticia/form.html.twig') }}

<div class=\"header bg-indigo\"><h2>Noticia</h2></div>
<div class=\"body\">
    <div class=\"row clearfix\">
        <div class=\"col-xs-3 col-sm-2 col-md-2 col-lg-2\">
        {% if 'noticia_insertar' in permisos %}
            <button id=\"new\" type=\"button\" class=\"btn bg-indigo waves-effect\">
                <i class=\"material-icons\">add</i>
            </button>
        {% endif %}
        </div>
    </div>
    {% if 'home_noticia' in permisos and objects %}
    <div class=\"row\">
        <div class=\"body table-responsive\">
            <table id=\"data_table\" class=\"table table-bordered table-striped table-hover js-basic-example dataTable\">
                <thead>
                <tr>
                    <th class=\"order_by_th\" data-name=\"names\">Titulo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Subitulo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Tipo </th>
                    <th class=\"order_by_th\" data-name=\"phone\">Fecha </th>
                    <th class=\"actions_header\">Acciones </th>
                </tr>
                </thead>
                <tbody id=\"table_content\">
                {{ include('noticia/table.html.twig') }}
                </tbody>
            </table>
        </div>
    </div>
    {% else %}
    <div class=\"col-xs-9 col-sm-10 col-md-10 col-lg-10\"></div>
    {% endif %}
</div>
{%endblock%}
{% block javascripts %}
<script src=\"resources/plugins/momentjs/moment.js\"></script>
<script src=\"resources/plugins/momentjs/locale/es.js\"></script>
<script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
<script src=\"resources/plugins/tinymce/tinymce.js\"></script>

<script>
    //TinyMCE
    tinymce.init({
        selector: \"textarea#contenido\",
        language : \"es_MX\",
        theme: \"modern\",
        resize: false,
        //skin: \"blue\",
        height: 350,
        menubar: false,
        toolbar1: 'imageupload | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        image_advtab: false,
        statusbar: false,
        setup: function(editor) {
            var inp = \$('<input id=\"tinymce-uploader\" type=\"file\" name=\"pic\" accept=\"image/*\" style=\"display:none\">');
            \$(editor.getElement()).parent().append(inp);

            inp.on(\"change\",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src=\"'+img.src+'\"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {
                icon: \"image\",
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        }
    });
    tinymce.suffix = \".min\";
    tinyMCE.baseURL = 'resources/plugins/tinymce'

    \$('#tipo').selectpicker({
        size: 4,
        liveSearch: true,
        liveSearchPlaceholder: 'Buscar tipo constitucional.',
        title: 'Seleccione un tipo constitucional.'
    })

    function hideContenido(e){ //alert('event')
        if (\$(e).val() == 'Urgente' || \$(e).val() == 'Destacados') \$('#cont-tpnt').hide()
        else \$('#cont-tpnt').show()
    }

    \$('#new').click(function () {
        \$('#titulo').val('')
        \$('#subtitulo').val('')
        \$('#contenido').val('')
        \$(\"#tipo\").val('')
        \$(\"#fecha\").val('')

        clean_form()
        verif_inputs()
        \$('#cont-tpnt').show()
        \$('#id_div').hide()
        \$('#insert').show()
        \$('#update').hide()
        \$('#form').modal('show')
    })
    
    \$('#insert').click(function () {
        tinyMCE.triggerSave();
        var categorias =  new Array();
        \$('.categoria:checked').each(
            function() {
                console.log(\"El checkbox con valor \" + \$(this).val() + \" está seleccionado\");
                categorias.push(\$(this).val());
            }
        );
        objeto = JSON.stringify({
            'titulo': \$('#titulo').val(),
            'subtitulo': \$('#subtitulo').val(),
            'contenido': \$(\"#contenido\").val(),
            'tipo': \$(\"#tipo\").val(),
            'fecha': \$(\"#fecha\").val(),
            'categorias': categorias
        })
        ajax_call(\"/noticia_insertar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })

    function attach_edit() {
        \$('.edit').click(function () {
            \$('#cont-tpnt').show()
            obj = JSON.stringify({
            'id': parseInt(JSON.parse(\$(this).attr('data-json')))
            })
            ajax_call_get(\"/noticia_editar\",{
                object: obj
            },function(response){
                var self = JSON.parse(response);
                \$('#id').val(self.id)
                \$('#titulo').val(self.titulo)
                \$('#subtitulo').val(self.subtitulo)
                \$('#tipo').val(self.tipo)
                \$('#fecha').val(self.fecha)

                tinyMCE.get('contenido').setContent(self.contenido)
                \$(\"#contenido\").html(self.contenido)

                clean_form()
                verif_inputs()
                \$('#id_div').show()
                \$('#insert').hide()
                \$('#update').show()
                \$('#form').modal('show')
            })
        })
    }

    \$('#update').click(function () {
        tinyMCE.triggerSave();
        objeto = JSON.stringify({
            'id': parseInt(JSON.parse(\$('#id').val())),
            'titulo': \$('#titulo').val(),
            'subtitulo': \$('#subtitulo').val(),
            'contenido': \$('#contenido').val(),
            'tipo': \$('#tipo').val(),
            'fecha': \$('#fecha').val()
        })
        ajax_call(\"/noticia_actualizar\", {object: objeto}, null, function () {setTimeout(function(){window.location=main_route}, 2000);})
        \$('#form').modal('hide')
    })
    reload_form()
</script>
<script>

    attach_edit()

    \$('.delete').click(function () {
        id = parseInt(JSON.parse(\$(this).attr('data-json')))
        enabled = false
        swal({
            title: \"¿Desea dar de baja los datos noticia?\",
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#004c99\",
            cancelButtonColor: \"#F44336\",
            confirmButtonText: \"Aceptar\",
            cancelButtonText: \"Cancelar\"
        }).then(function () {
            ajax_call(\"/noticia_eliminar\", { id,enabled,_xsrf: getCookie(\"_xsrf\")}, null, function () {setTimeout(function(){window.location=main_route}, 2000);S})
        })
    })

</script>

{% endblock %}", "noticia/index.html.twig", "C:\\xampp\\htdocs\\elfec_intranet_backend\\templates\\noticia\\index.html.twig");
    }
}
