<?php

/* personalcargo/organigrama.html.twig */
class __TwigTemplate_5ec72cd3167acc56c9e6252a1489e043f07ef638b6162d369263711def97317b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "personalcargo/organigrama.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "personalcargo/organigrama.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    <style>
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>


    <script>
        main_route = '/organigrama'

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

    // line 23
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 24
        echo "    ";
        echo twig_include($this->env, $context, "personalcargo/form_asignar_cargo");
        echo "
    <div class=\"header bg-indigo\"><h2>PROCESOS CARGO</h2></div>
    <div class=\"body\">
        <div id=\"myDiagramDiv\" style=\"background-color: white; border: solid 1px black; height: 500px\"></div>
        <button id=\"btnsave\" class=\"btn btn-primary\">Confirmar cambios</button>
        <textarea id=\"resultado\" style=\"display: none;\"></textarea>
        <textarea id=\"mySavedModel\" style=\"width:100%;height:250px;display: none;\">
            { \"class\": \"go.TreeModel\",
            \"nodeDataArray\": ";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["organigrama"]) || array_key_exists("organigrama", $context) ? $context["organigrama"] : (function () { throw new Twig_Error_Runtime('Variable "organigrama" does not exist.', 32, $this->source); })()), "html", null, true);
        echo "
            }
        </textarea>
        <input id=\"cantidad\" style=\"display: none\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["cantidad"]) || array_key_exists("cantidad", $context) ? $context["cantidad"] : (function () { throw new Twig_Error_Runtime('Variable "cantidad" does not exist.', 35, $this->source); })()), "html", null, true);
        echo "\">

    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 39
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 40
        echo "    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
    <script type=\"text/javascript\">
        
        \$('#btnsave').click(function(){
            var modelasText = JSON.parse(myDiagram.model.toJson());
            var modelo2 = JSON.parse(\$('#mySavedModel').val());

            document.getElementById('resultado').value = myDiagram.model.toJson();
            var data =  JSON.stringify({
                original: modelo2,
                cambio:modelasText
            });
            ajax_call(\"/organigrama_cambios\", {data: data}, null, function () {setTimeout(function(){window.location=main_route}, 2000);});
        })
    </script>
    <script src=\"Plugins/gojs/go-debug.js\"></script>
    <script id=\"code\">
        var nombre = '[VACANTE]';
        var id = 0;
        var nodo = 0;
        var numero_seleccionado = 0;
        function getNextKey() {
            var key = nodeIdCounter;
            while (myDiagram.model.findNodeDataForKey(key) !== null) {
                key = nodeIdCounter++;
            }
            return key;
        }

        var texto = document.getElementById('cantidad').value;
        var text = texto.substring(1,texto.length-1);
        var idMaximo = JSON.parse(text);

        var nodeIdCounter = idMaximo.last_id;

        function abrir_modal(a, b){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = valor[0];
                nombre = valor[1];
                crear(a,b,id,nombre)
                \$('#form').modal('hide');
            })
        }
        function crear(a,b,id,nombre){
            nodo++;
            a.archetypeNodeData = {
                key: getNextKey(), // assign the key based on the number of nodes
                name: nombre,
                title: \"\",
                id_personal: id
            };
            if(nodo <= 1){
                nodo++;
                return go.ClickCreatingTool.prototype.insertPart.call(a, b);
            }
            return;
        }
        function abrir_modal2(e, obj, myDiagram){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = valor[0];
                nombre = valor[1];
                crear2(e, obj, myDiagram, id, nombre)
                \$('#form').modal('hide');
            })
        }
        function crear2(e, obj, myDiagram, id, nombre){
            nodo++;
            var clicked = obj.part;
            if (clicked !== null && nodo <= 1) {
                var thisemp = clicked.data;
                myDiagram.startTransaction(\"add employee\");
                var newemp = { key: getNextKey(), name: nombre, title: \"\", parent: thisemp.key, id_personal: id};
                myDiagram.model.addNodeData(newemp);
                myDiagram.commitTransaction(\"add employee\");
            }
        }

        function editar(e, obj, myDiagram, node){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = parseInt(valor[0],10);
                nombre = valor[1];
                var numero_dentro = myDiagram.model.getKeyForNodeData(node);
                if (node !== null && numero_seleccionado == numero_dentro) {
                    var thisemp = node.data;
                    var nombre_personal = node.data.name;
                    var id_personal = node.data.id_personal;
                    
                    \$(\"#persona\").append( \$(\"<option></option>\").attr(\"value\",id_personal+'-'+nombre_personal).text(nombre_personal)); // Update the content clearing the caret
                    \$(\"select\").material_select;
                    \$(\"select\").closest('.input-field').children('span.caret').remove();
                    \$('select').material_select('update');
                    \$('select').material_select;
                    myDiagram.startTransaction(\"edit\");
                    myDiagram.model.setDataProperty(thisemp, \"name\", nombre);
                    myDiagram.model.setDataProperty(thisemp, \"id_personal\", id);
                    myDiagram.commitTransaction(\"edit\");
                }
                \$('#form').modal('hide');
            })
        }


        function init() {
            var \$ = go.GraphObject.make;  // for conciseness in defining templates

            myDiagram =
                \$(go.Diagram, \"myDiagramDiv\", // must be the ID or reference to div
                    {
                        initialContentAlignment: go.Spot.Center,
                        initialAutoScale: go.Diagram.Uniform,
                        maxSelectionCount: 1, // users can select only one part at a time
                        validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
                        layout:
                            \$(SideTreeLayout,
                                {
                                    treeStyle: go.TreeLayout.StyleLastParents,
                                    arrangement: go.TreeLayout.ArrangementHorizontal,
                                    // properties for most of the tree:
                                    angle: 90,
                                    layerSpacing: 35,
                                    // properties for the \"last parents\":
                                    alternateAngle: 90,
                                    alternateLayerSpacing: 35,
                                    alternateAlignment: go.TreeLayout.AlignmentBus,
                                    alternateNodeSpacing: 20
                                }),
                        \"undoManager.isEnabled\": true // enable undo & redo
                    });

            // when the document is modified, add a \"*\" to the title and enable the \"Save\" button
            myDiagram.addDiagramListener(\"Modified\", function(e) {
                var button = document.getElementById(\"SaveButton\");
                if (button) button.disabled = !myDiagram.isModified;
                var idx = document.title.indexOf(\"*\");
                if (myDiagram.isModified) {
                    if (idx < 0) document.title += \"*\";
                } else {
                    if (idx >= 0) document.title = document.title.substr(0, idx);
                }
            });

            // manage boss info manually when a node or link is deleted from the diagram
            myDiagram.addDiagramListener(\"SelectionDeleting\", function(e) {
                var part = e.subject.first(); // e.subject is the myDiagram.selection collection,
                                              // so we'll get the first since we know we only have one selection
                myDiagram.startTransaction(\"clear boss\");
                if (part instanceof go.Node) {
                    var it = part.findTreeChildrenNodes(); // find all child nodes
                    while(it.next()) { // now iterate through them and clear out the boss information
                        var child = it.value;
                        var bossText = child.findObject(\"boss\"); // since the boss TextBlock is named, we can access it by name
                        if (bossText === null) return;
                        bossText.text = \"\";
                    }
                } else if (part instanceof go.Link) {
                    var child = part.toNode;
                    var bossText = child.findObject(\"boss\"); // since the boss TextBlock is named, we can access it by name
                    if (bossText === null) return;
                    bossText.text = \"\";
                }
                myDiagram.commitTransaction(\"clear boss\");
            });

            var levelColors = [\"#19458D\",\"#ff0000\",\"#1f55ad\",\"#2260c3\",\"#266bd9\",\"#3c7add\",\"#5288e0\",\"#6797e4\",\"#7da6e8\",\"#93b5ec\",\"#a8c4f0\"];

            // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
            myDiagram.layout.commitNodes = function() {
                go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
                // then go through all of the vertexes and set their corresponding node's Shape.fill
                // to a brush dependent on the TreeVertex.level value
                myDiagram.layout.network.vertexes.each(function(v) {
                    if (v.node) {
                        var level = v.level % (levelColors.length);
                        var color = levelColors[level];
                        var shape = v.node.findObject(\"SHAPE\");
                        if (shape) shape.fill = \$(go.Brush, \"Linear\", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
                    }
                });
            };

            // This function is used to find a suitable ID when modifying/creating nodes.
            // We used the counter combined with findNodeDataForKey to ensure uniqueness.
             // use a sequence to guarantee key uniqueness as we add/remove/modify nodes
            // when a node is double-clicked, add a child to it
            function nodeDoubleClick(e, obj) {
                nodo = 0;
                abrir_modal2(e, obj, myDiagram)

            }

            // this is used to determine feedback during drags
            function mayWorkFor(node1, node2) {
                if (!(node1 instanceof go.Node)) return false;  // must be a Node
                if (node1 === node2) return false;  // cannot work for yourself
                if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
                return true;
            }

            // This function provides a common style for most of the TextBlocks.
            // Some of these values may be overridden in a particular TextBlock.
            function textStyle() {
                return { font: \"12pt  Arial,sans-serif\", stroke: \"white\" };
            }
            function textStyle2() {
                return { font: \"0pt  Segoe UI,sans-serif\", stroke: \"transparent\" };
            }


            // define the Node template
            myDiagram.nodeTemplate =
                \$(go.Node, \"Auto\",
                    // { doubleClick: nodeDoubleClick },
                    { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
                        mouseDragEnter: function (e, node, prev) {
                            // Este
                            var diagram = node.diagram;
                            var selnode = diagram.selection.first();
                            if (!mayWorkFor(selnode, node)) return;
                            var shape = node.findObject(\"SHAPE\");
                            if (shape) {
                                shape._prevFill = shape.fill;  // remember the original brush
                                shape.fill = \"darkred\";
                            }
                        },
                        mouseDragLeave: function (e, node, next) {
                            var shape = node.findObject(\"SHAPE\");
                            if (shape && shape._prevFill) {
                                shape.fill = shape._prevFill;  // restore the original brush
                            }
                        },
                        mouseDrop: function (e, node) {
                            var diagram = node.diagram;
                            var selnode = diagram.selection.first();  // assume just one Node in selection
                            if (mayWorkFor(selnode, node)) {
                                // find any existing link into the selected node
                                var link = selnode.findTreeParentLink();
                                if (link !== null) {  // reconnect any existing link
                                    link.fromNode = node;
                                } else {  // else create a new link
                                    diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                                }
                            }
                        }
                    },
                    // for sorting, have the Node.text be the data.name
                    new go.Binding(\"text\", \"name\"),
                    // bind the Part.layerName to control the Node's layer depending on whether it isSelected
                    new go.Binding(\"layerName\", \"isSelected\", function(sel) { return sel ? \"Foreground\" : \"\"; }).ofObject(),
                    // define the node's outer shape
                    \$(go.Shape, \"Rectangle\",
                        {
                            name: \"SHAPE\", fill: \"white\", stroke: null,
                            // set the port properties:
                            portId: \"\", fromLinkable: true, toLinkable: true, cursor: \"pointer\"
                        }),
                    \$(go.Panel, \"Horizontal\",
                        // define the panel where the text will appear
                        \$(go.Panel, \"Table\",
                            {
                                maxSize: new go.Size(185, 1049),
                                margin: new go.Margin(6, 10, 0, 3),
                                defaultAlignment: go.Spot.Left
                            },
                            \$(go.TextBlock, textStyle(),
                                { row: 0, column: 0 }),
                            \$(go.TextBlock, textStyle(),
                                {
                                    row: 0, column: 1, columnSpan: 5,
                                    editable: false, isMultiline: false,
                                    minSize: new go.Size(10, 14),
                                    margin: new go.Margin(3, 3, 3, 3)
                                },
                                new go.Binding(\"text\", \"title\").makeTwoWay()),
                            \$(go.RowColumnDefinition, { column: 1, width: 4 }),
                            \$(go.TextBlock, textStyle(),  // the name
                                {
                                    row: 1, column: 0, columnSpan: 5,
                                    font: \"9pt Arial,sans-serif\",
                                    editable: false, isMultiline: false,
                                    minSize: new go.Size(10, 16),
                                    margin: new go.Margin(3, 3, 3, 3)
                                },
                                new go.Binding(\"text\", \"name\").makeTwoWay()),
                            \$(go.TextBlock, textStyle2(),
                                { row: 1, column: 0 },
                                new go.Binding(\"text\", \"key\", function(v) {return \"ID: \" + v;})),
                            \$(go.TextBlock, textStyle2(),
                                { name: \"boss\", row: 1, column: 3, }, // we include a name so we can access this TextBlock when deleting Nodes/Links
                                new go.Binding(\"text\", \"parent\", function(v) {return \"Boss: \" + v;})),
                            \$(go.TextBlock, textStyle2(),  // the comments
                                {
                                    row: 1, column: 0, columnSpan: 1,
                                    font: \"italic 9pt sans-serif\",
                                    wrap: go.TextBlock.WrapFit,
                                    editable: false,  // by default newlines are allowed
                                    minSize: new go.Size(10, 14)
                                },
                                new go.Binding(\"text\", \"comments\").makeTwoWay()),
                            \$(go.TextBlock, textStyle2(),
                                { name: \"id_personal\", row: 2, column: 0, }, // we include a name so we can access this TextBlock when deleting Nodes/Links

                                new go.Binding(\"text\", \"id_personal\", function(v) {return \"ID: \" + (v == null ? \"0\" : v);})),
                            \$(go.TextBlock, textStyle2(),  // the comments
                                {
                                    row: 1, column: 3, columnSpan: 1,
                                    font: \"italic 9pt sans-serif\",
                                    wrap: go.TextBlock.WrapFit,
                                    editable: false,  // by default newlines are allowed
                                    minSize: new go.Size(10, 10)
                                },
                                new go.Binding(\"text\", \"comments\").makeTwoWay())
                        ),
                        \$(\"TreeExpanderButton\")// end Table Panel
                    ), // end Horizontal Panel
                );  // end Node

            // the context menu allows users to make a position vacant,
            // remove a role and reassign the subtree, or remove a department
            myDiagram.nodeTemplate.contextMenu =
                \$(go.Adornment, \"Vertical\",
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Crear Cargo\"),
                        {
                            click: function(e, obj) {
                                window.location.href = '/procesoscargo'
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Asignar-Editar Personal \"),
                        {
                            click: function(e, obj) {
                                var node = obj.part.adornedPart;
                                numero_seleccionado = myDiagram.model.getKeyForNodeData(node);
                                editar(e, obj, myDiagram, node);
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Vacante\"),
                        {
                            click: function(e, obj) {
                                var node = obj.part.adornedPart;
                                if (node !== null) {
                                    var thisemp = node.data;
                                    myDiagram.startTransaction(\"vacante\");
                                    // update the key, name, and comments
                                    myDiagram.model.setKeyForNodeData(thisemp, getNextKey());
                                    myDiagram.model.setDataProperty(thisemp, \"name\", \"[VACANTES]\");
                                    myDiagram.model.setDataProperty(thisemp, \"id_personal\", null);
                                    myDiagram.model.setDataProperty(thisemp, \"isassistant\", !node.data.isassistant);
                                    myDiagram.commitTransaction(\"vacante\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Eliminar Rol\"),
                        {
                            click: function(e, obj) {
                                // reparent the subtree to this node's boss, then remove the node
                                var node = obj.part.adornedPart;
                                if (node !== null && myDiagram.model.getKeyForNodeData(node) != 1) {
                                    var thisemp = node.data;
                                        myDiagram.startTransaction(\"reparent remove\");

                                        var chl = node.findTreeChildrenNodes();
                                        // iterate through the children and set their parent key to our selected node's parent key
                                        while(chl.next()) {
                                            var emp = chl.value;
                                            myDiagram.model.setParentKeyForNodeData(emp.data, node.findTreeParentNode().data.key);
                                        }
                                        // and now remove the selected node itself
                                        myDiagram.model.removeNodeData(node.data);
                                        myDiagram.model.setDataProperty(thisemp, \"name\", \"ELIMINADO\");
                                        myDiagram.model.setDataProperty(thisemp, \"id_personal\", null);
                                        myDiagram.model.setDataProperty(thisemp, \"isassistant\", !node.data.isassistant);

                                    myDiagram.commitTransaction(\"reparent remove\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Eliminar Gerencia\"),
                        {
                            click: function(e, obj) {
                                // remove the whole subtree, including the node itself
                                var node = obj.part.adornedPart;
                                if (node !== null && myDiagram.model.getKeyForNodeData(node) != 1 ) {

                                    myDiagram.startTransaction(\"remove dept\");
                                    myDiagram.removeParts(node.findTreeParts());
                                    myDiagram.commitTransaction(\"remove dept\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Convertir Staff\"),
                        {
                            click: function(e, obj) {
                                // remove the whole subtree, including the node itself
                                var node = obj.part.adornedPart;
                                if (node !== null) {
                                    myDiagram.startTransaction(\"toggle assistant\");
                                    myDiagram.model.setDataProperty(node.data, \"isassistant\", !node.data.isassistant);
                                    myDiagram.layout.invalidateLayout();
                                    myDiagram.commitTransaction(\"toggle assistant\");
                                }
                            }
                        }
                    )
                );

            // define the Link template
            myDiagram.linkTemplate =
                \$(go.Link, go.Link.Orthogonal,
                    { corner: 5, relinkableFrom: true, relinkableTo: true },
                    \$(go.Shape, { strokeWidth: 4, stroke: \"#19458D\" }));  // the link shape

            // read in the JSON-format data from the \"mySavedModel\" element
            load();


            // support editing the properties of the selected person in HTML
            if (window.Inspector) myInspector = new Inspector(\"myInspector\", myDiagram,
                {
                    properties: {
                        \"key\": { readOnly: true },
                        \"isassistant\": { type: \"boolean\" }
                    },
                    propertyModified: function(name, val) {
                        if (name === \"isassistant\") myDiagram.layout.invalidateLayout();
                    }
                });
        }


        // Assume that the SideTreeLayout determines whether a node is an \"assistant\" if a particular data property is true.
        // You can adapt this code to decide according to your app's needs.
        function isassistant(n) {
            if (n === null) return false;
            return n.data.isassistant;
        }


        // This is a custom TreeLayout that knows about \"assistants\".
        // A Node for which isassistant(n) is true will be placed at the side below the parent node
        // but above all of the other child nodes.
        // An assistant node may be the root of its own subtree.
        // An assistant node may have its own assistant nodes.
        function SideTreeLayout() {
            go.TreeLayout.call(this);
        }
        go.Diagram.inherit(SideTreeLayout, go.TreeLayout);

        SideTreeLayout.prototype.makeNetwork = function(coll) {
            var net = go.TreeLayout.prototype.makeNetwork.call(this, coll);
            // copy the collection of TreeVertexes, because we will modify the network
            var vertexcoll = new go.Set(go.TreeVertex);
            vertexcoll.addAll(net.vertexes);
            for (var it = vertexcoll.iterator; it.next() ;) {
                var parent = it.value;
                // count the number of assistants
                var acount = 0;
                var ait = parent.destinationVertexes;
                while (ait.next()) {
                    if (isassistant(ait.value.node)) acount++;
                }
                // if a vertex has some number of children that should be assistants
                if (acount > 0) {
                    // remember the assistant edges and the regular child edges
                    var asstedges = new go.Set(go.TreeEdge);
                    var childedges = new go.Set(go.TreeEdge);
                    var eit = parent.destinationEdges;
                    while (eit.next()) {
                        var e = eit.value;
                        if (isassistant(e.toVertex.node)) {
                            asstedges.add(e);
                        } else {
                            childedges.add(e);
                        }
                    }
                    // first remove all edges from PARENT
                    eit = asstedges.iterator;
                    while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
                    eit = childedges.iterator;
                    while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
                    // if the number of assistants is odd, add a dummy assistant, to make the count even
                    if (acount % 2 == 1) {
                        var dummy = net.createVertex();
                        net.addVertex(dummy);
                        net.linkVertexes(parent, dummy, asstedges.first().link);
                    }
                    // now PARENT should get all of the assistant children
                    eit = asstedges.iterator;
                    while (eit.next()) {
                        parent.addDestinationEdge(eit.value);
                    }
                    // create substitute vertex to be new parent of all regular children
                    var subst = net.createVertex();
                    net.addVertex(subst);
                    // reparent regular children to the new substitute vertex
                    eit = childedges.iterator;
                    while (eit.next()) {
                        var ce = eit.value;
                        ce.fromVertex = subst;
                        subst.addDestinationEdge(ce);
                    }
                    // finally can add substitute vertex as the final odd child,
                    // to be positioned at the end of the PARENT's immediate subtree.
                    var newedge = net.linkVertexes(parent, subst, null);
                }
            }
            return net;
        };

        SideTreeLayout.prototype.assignTreeVertexValues = function(v) {
            // if a vertex has any assistants, use Bus alignment
            var any = false;
            var children = v.children;
            for (var i = 0; i < children.length; i++) {
                var c = children[i];
                if (isassistant(c.node)) {
                    any = true;
                    break;
                }
            }
            if (any) {
                // this is the parent for the assistant(s)
                v.alignment = go.TreeLayout.AlignmentBus;  // this is required
                v.nodeSpacing = 50; // control the distance of the assistants from the parent's main links
            } else if (v.node == null && v.childrenCount > 0) {
                // found the substitute parent for non-assistant children
                //v.alignment = go.TreeLayout.AlignmentCenterChildren;
                //v.breadthLimit = 3000;
                v.layerSpacing = 0;
            }
        };

        SideTreeLayout.prototype.commitLinks = function() {
            go.TreeLayout.prototype.commitLinks.call(this);
            // make sure the middle segment of an orthogonal link does not cross over the assistant subtree
            var eit = this.network.edges.iterator;
            while (eit.next()) {
                var e = eit.value;
                if (e.link == null) continue;
                var r = e.link;
                // does this edge come from a substitute parent vertex?
                var subst = e.fromVertex;
                if (subst.node == null && r.routing == go.Link.Orthogonal) {
                    r.updateRoute();
                    r.startRoute();
                    // middle segment goes from point 2 to point 3
                    var p1 = subst.center;  // assume artificial vertex has zero size
                    var p2 = r.getPoint(2).copy();
                    var p3 = r.getPoint(3).copy();
                    var p5 = r.getPoint(r.pointsCount - 1);
                    var dist = 10;
                    if (subst.angle == 270 || subst.angle == 180) dist = -20;
                    if (subst.angle == 90 || subst.angle == 270) {
                        p2.y = p5.y - dist; // (p1.y+p5.y)/2;
                        p3.y = p5.y - dist; // (p1.y+p5.y)/2;
                    } else {
                        p2.x = p5.x - dist; // (p1.x+p5.x)/2;
                        p3.x = p5.x - dist; // (p1.x+p5.x)/2;
                    }
                    r.setPoint(2, p2);
                    r.setPoint(3, p3);
                    r.commitRoute();
                }
            }
        };  // end of SideTreeLayout


        // Show the diagram's model in JSON format
        function save() {
            document.getElementById(\"mySavedModel\").value = myDiagram.model.toJson();
            myDiagram.isModified = true;
        }
        function load() {
            myDiagram.model = go.Model.fromJson(document.getElementById(\"mySavedModel\").value);
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "personalcargo/organigrama.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 40,  107 => 39,  96 => 35,  90 => 32,  78 => 24,  72 => 23,  46 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    <style>
        .accion{ cursor:pointer }
    </style>
    <script src=\"resources/js/transporte.js\"></script>
    <script src=\"resources/js/functions.js\"></script>


    <script>
        main_route = '/organigrama'

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
    {{ include('personalcargo/form_asignar_cargo') }}
    <div class=\"header bg-indigo\"><h2>PROCESOS CARGO</h2></div>
    <div class=\"body\">
        <div id=\"myDiagramDiv\" style=\"background-color: white; border: solid 1px black; height: 500px\"></div>
        <button id=\"btnsave\" class=\"btn btn-primary\">Confirmar cambios</button>
        <textarea id=\"resultado\" style=\"display: none;\"></textarea>
        <textarea id=\"mySavedModel\" style=\"width:100%;height:250px;display: none;\">
            { \"class\": \"go.TreeModel\",
            \"nodeDataArray\": {{organigrama}}
            }
        </textarea>
        <input id=\"cantidad\" style=\"display: none\" value=\"{{cantidad}}\">

    </div>
{%endblock%}
{% block javascripts %}
    <script src=\"resources/plugins/momentjs/moment.js\"></script>
    <script src=\"resources/plugins/momentjs/locale/es.js\"></script>
    <script src=\"resources/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>
    <script type=\"text/javascript\">
        
        \$('#btnsave').click(function(){
            var modelasText = JSON.parse(myDiagram.model.toJson());
            var modelo2 = JSON.parse(\$('#mySavedModel').val());

            document.getElementById('resultado').value = myDiagram.model.toJson();
            var data =  JSON.stringify({
                original: modelo2,
                cambio:modelasText
            });
            ajax_call(\"/organigrama_cambios\", {data: data}, null, function () {setTimeout(function(){window.location=main_route}, 2000);});
        })
    </script>
    <script src=\"Plugins/gojs/go-debug.js\"></script>
    <script id=\"code\">
        var nombre = '[VACANTE]';
        var id = 0;
        var nodo = 0;
        var numero_seleccionado = 0;
        function getNextKey() {
            var key = nodeIdCounter;
            while (myDiagram.model.findNodeDataForKey(key) !== null) {
                key = nodeIdCounter++;
            }
            return key;
        }

        var texto = document.getElementById('cantidad').value;
        var text = texto.substring(1,texto.length-1);
        var idMaximo = JSON.parse(text);

        var nodeIdCounter = idMaximo.last_id;

        function abrir_modal(a, b){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = valor[0];
                nombre = valor[1];
                crear(a,b,id,nombre)
                \$('#form').modal('hide');
            })
        }
        function crear(a,b,id,nombre){
            nodo++;
            a.archetypeNodeData = {
                key: getNextKey(), // assign the key based on the number of nodes
                name: nombre,
                title: \"\",
                id_personal: id
            };
            if(nodo <= 1){
                nodo++;
                return go.ClickCreatingTool.prototype.insertPart.call(a, b);
            }
            return;
        }
        function abrir_modal2(e, obj, myDiagram){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = valor[0];
                nombre = valor[1];
                crear2(e, obj, myDiagram, id, nombre)
                \$('#form').modal('hide');
            })
        }
        function crear2(e, obj, myDiagram, id, nombre){
            nodo++;
            var clicked = obj.part;
            if (clicked !== null && nodo <= 1) {
                var thisemp = clicked.data;
                myDiagram.startTransaction(\"add employee\");
                var newemp = { key: getNextKey(), name: nombre, title: \"\", parent: thisemp.key, id_personal: id};
                myDiagram.model.addNodeData(newemp);
                myDiagram.commitTransaction(\"add employee\");
            }
        }

        function editar(e, obj, myDiagram, node){
            \$('#form').modal('show');
            \$('#insert').click(function(){
                var valor = (\$('#persona').val()).split(\"-\");
                id = parseInt(valor[0],10);
                nombre = valor[1];
                var numero_dentro = myDiagram.model.getKeyForNodeData(node);
                if (node !== null && numero_seleccionado == numero_dentro) {
                    var thisemp = node.data;
                    var nombre_personal = node.data.name;
                    var id_personal = node.data.id_personal;
                    
                    \$(\"#persona\").append( \$(\"<option></option>\").attr(\"value\",id_personal+'-'+nombre_personal).text(nombre_personal)); // Update the content clearing the caret
                    \$(\"select\").material_select;
                    \$(\"select\").closest('.input-field').children('span.caret').remove();
                    \$('select').material_select('update');
                    \$('select').material_select;
                    myDiagram.startTransaction(\"edit\");
                    myDiagram.model.setDataProperty(thisemp, \"name\", nombre);
                    myDiagram.model.setDataProperty(thisemp, \"id_personal\", id);
                    myDiagram.commitTransaction(\"edit\");
                }
                \$('#form').modal('hide');
            })
        }


        function init() {
            var \$ = go.GraphObject.make;  // for conciseness in defining templates

            myDiagram =
                \$(go.Diagram, \"myDiagramDiv\", // must be the ID or reference to div
                    {
                        initialContentAlignment: go.Spot.Center,
                        initialAutoScale: go.Diagram.Uniform,
                        maxSelectionCount: 1, // users can select only one part at a time
                        validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
                        layout:
                            \$(SideTreeLayout,
                                {
                                    treeStyle: go.TreeLayout.StyleLastParents,
                                    arrangement: go.TreeLayout.ArrangementHorizontal,
                                    // properties for most of the tree:
                                    angle: 90,
                                    layerSpacing: 35,
                                    // properties for the \"last parents\":
                                    alternateAngle: 90,
                                    alternateLayerSpacing: 35,
                                    alternateAlignment: go.TreeLayout.AlignmentBus,
                                    alternateNodeSpacing: 20
                                }),
                        \"undoManager.isEnabled\": true // enable undo & redo
                    });

            // when the document is modified, add a \"*\" to the title and enable the \"Save\" button
            myDiagram.addDiagramListener(\"Modified\", function(e) {
                var button = document.getElementById(\"SaveButton\");
                if (button) button.disabled = !myDiagram.isModified;
                var idx = document.title.indexOf(\"*\");
                if (myDiagram.isModified) {
                    if (idx < 0) document.title += \"*\";
                } else {
                    if (idx >= 0) document.title = document.title.substr(0, idx);
                }
            });

            // manage boss info manually when a node or link is deleted from the diagram
            myDiagram.addDiagramListener(\"SelectionDeleting\", function(e) {
                var part = e.subject.first(); // e.subject is the myDiagram.selection collection,
                                              // so we'll get the first since we know we only have one selection
                myDiagram.startTransaction(\"clear boss\");
                if (part instanceof go.Node) {
                    var it = part.findTreeChildrenNodes(); // find all child nodes
                    while(it.next()) { // now iterate through them and clear out the boss information
                        var child = it.value;
                        var bossText = child.findObject(\"boss\"); // since the boss TextBlock is named, we can access it by name
                        if (bossText === null) return;
                        bossText.text = \"\";
                    }
                } else if (part instanceof go.Link) {
                    var child = part.toNode;
                    var bossText = child.findObject(\"boss\"); // since the boss TextBlock is named, we can access it by name
                    if (bossText === null) return;
                    bossText.text = \"\";
                }
                myDiagram.commitTransaction(\"clear boss\");
            });

            var levelColors = [\"#19458D\",\"#ff0000\",\"#1f55ad\",\"#2260c3\",\"#266bd9\",\"#3c7add\",\"#5288e0\",\"#6797e4\",\"#7da6e8\",\"#93b5ec\",\"#a8c4f0\"];

            // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
            myDiagram.layout.commitNodes = function() {
                go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
                // then go through all of the vertexes and set their corresponding node's Shape.fill
                // to a brush dependent on the TreeVertex.level value
                myDiagram.layout.network.vertexes.each(function(v) {
                    if (v.node) {
                        var level = v.level % (levelColors.length);
                        var color = levelColors[level];
                        var shape = v.node.findObject(\"SHAPE\");
                        if (shape) shape.fill = \$(go.Brush, \"Linear\", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
                    }
                });
            };

            // This function is used to find a suitable ID when modifying/creating nodes.
            // We used the counter combined with findNodeDataForKey to ensure uniqueness.
             // use a sequence to guarantee key uniqueness as we add/remove/modify nodes
            // when a node is double-clicked, add a child to it
            function nodeDoubleClick(e, obj) {
                nodo = 0;
                abrir_modal2(e, obj, myDiagram)

            }

            // this is used to determine feedback during drags
            function mayWorkFor(node1, node2) {
                if (!(node1 instanceof go.Node)) return false;  // must be a Node
                if (node1 === node2) return false;  // cannot work for yourself
                if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
                return true;
            }

            // This function provides a common style for most of the TextBlocks.
            // Some of these values may be overridden in a particular TextBlock.
            function textStyle() {
                return { font: \"12pt  Arial,sans-serif\", stroke: \"white\" };
            }
            function textStyle2() {
                return { font: \"0pt  Segoe UI,sans-serif\", stroke: \"transparent\" };
            }


            // define the Node template
            myDiagram.nodeTemplate =
                \$(go.Node, \"Auto\",
                    // { doubleClick: nodeDoubleClick },
                    { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
                        mouseDragEnter: function (e, node, prev) {
                            // Este
                            var diagram = node.diagram;
                            var selnode = diagram.selection.first();
                            if (!mayWorkFor(selnode, node)) return;
                            var shape = node.findObject(\"SHAPE\");
                            if (shape) {
                                shape._prevFill = shape.fill;  // remember the original brush
                                shape.fill = \"darkred\";
                            }
                        },
                        mouseDragLeave: function (e, node, next) {
                            var shape = node.findObject(\"SHAPE\");
                            if (shape && shape._prevFill) {
                                shape.fill = shape._prevFill;  // restore the original brush
                            }
                        },
                        mouseDrop: function (e, node) {
                            var diagram = node.diagram;
                            var selnode = diagram.selection.first();  // assume just one Node in selection
                            if (mayWorkFor(selnode, node)) {
                                // find any existing link into the selected node
                                var link = selnode.findTreeParentLink();
                                if (link !== null) {  // reconnect any existing link
                                    link.fromNode = node;
                                } else {  // else create a new link
                                    diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                                }
                            }
                        }
                    },
                    // for sorting, have the Node.text be the data.name
                    new go.Binding(\"text\", \"name\"),
                    // bind the Part.layerName to control the Node's layer depending on whether it isSelected
                    new go.Binding(\"layerName\", \"isSelected\", function(sel) { return sel ? \"Foreground\" : \"\"; }).ofObject(),
                    // define the node's outer shape
                    \$(go.Shape, \"Rectangle\",
                        {
                            name: \"SHAPE\", fill: \"white\", stroke: null,
                            // set the port properties:
                            portId: \"\", fromLinkable: true, toLinkable: true, cursor: \"pointer\"
                        }),
                    \$(go.Panel, \"Horizontal\",
                        // define the panel where the text will appear
                        \$(go.Panel, \"Table\",
                            {
                                maxSize: new go.Size(185, 1049),
                                margin: new go.Margin(6, 10, 0, 3),
                                defaultAlignment: go.Spot.Left
                            },
                            \$(go.TextBlock, textStyle(),
                                { row: 0, column: 0 }),
                            \$(go.TextBlock, textStyle(),
                                {
                                    row: 0, column: 1, columnSpan: 5,
                                    editable: false, isMultiline: false,
                                    minSize: new go.Size(10, 14),
                                    margin: new go.Margin(3, 3, 3, 3)
                                },
                                new go.Binding(\"text\", \"title\").makeTwoWay()),
                            \$(go.RowColumnDefinition, { column: 1, width: 4 }),
                            \$(go.TextBlock, textStyle(),  // the name
                                {
                                    row: 1, column: 0, columnSpan: 5,
                                    font: \"9pt Arial,sans-serif\",
                                    editable: false, isMultiline: false,
                                    minSize: new go.Size(10, 16),
                                    margin: new go.Margin(3, 3, 3, 3)
                                },
                                new go.Binding(\"text\", \"name\").makeTwoWay()),
                            \$(go.TextBlock, textStyle2(),
                                { row: 1, column: 0 },
                                new go.Binding(\"text\", \"key\", function(v) {return \"ID: \" + v;})),
                            \$(go.TextBlock, textStyle2(),
                                { name: \"boss\", row: 1, column: 3, }, // we include a name so we can access this TextBlock when deleting Nodes/Links
                                new go.Binding(\"text\", \"parent\", function(v) {return \"Boss: \" + v;})),
                            \$(go.TextBlock, textStyle2(),  // the comments
                                {
                                    row: 1, column: 0, columnSpan: 1,
                                    font: \"italic 9pt sans-serif\",
                                    wrap: go.TextBlock.WrapFit,
                                    editable: false,  // by default newlines are allowed
                                    minSize: new go.Size(10, 14)
                                },
                                new go.Binding(\"text\", \"comments\").makeTwoWay()),
                            \$(go.TextBlock, textStyle2(),
                                { name: \"id_personal\", row: 2, column: 0, }, // we include a name so we can access this TextBlock when deleting Nodes/Links

                                new go.Binding(\"text\", \"id_personal\", function(v) {return \"ID: \" + (v == null ? \"0\" : v);})),
                            \$(go.TextBlock, textStyle2(),  // the comments
                                {
                                    row: 1, column: 3, columnSpan: 1,
                                    font: \"italic 9pt sans-serif\",
                                    wrap: go.TextBlock.WrapFit,
                                    editable: false,  // by default newlines are allowed
                                    minSize: new go.Size(10, 10)
                                },
                                new go.Binding(\"text\", \"comments\").makeTwoWay())
                        ),
                        \$(\"TreeExpanderButton\")// end Table Panel
                    ), // end Horizontal Panel
                );  // end Node

            // the context menu allows users to make a position vacant,
            // remove a role and reassign the subtree, or remove a department
            myDiagram.nodeTemplate.contextMenu =
                \$(go.Adornment, \"Vertical\",
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Crear Cargo\"),
                        {
                            click: function(e, obj) {
                                window.location.href = '/procesoscargo'
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Asignar-Editar Personal \"),
                        {
                            click: function(e, obj) {
                                var node = obj.part.adornedPart;
                                numero_seleccionado = myDiagram.model.getKeyForNodeData(node);
                                editar(e, obj, myDiagram, node);
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Vacante\"),
                        {
                            click: function(e, obj) {
                                var node = obj.part.adornedPart;
                                if (node !== null) {
                                    var thisemp = node.data;
                                    myDiagram.startTransaction(\"vacante\");
                                    // update the key, name, and comments
                                    myDiagram.model.setKeyForNodeData(thisemp, getNextKey());
                                    myDiagram.model.setDataProperty(thisemp, \"name\", \"[VACANTES]\");
                                    myDiagram.model.setDataProperty(thisemp, \"id_personal\", null);
                                    myDiagram.model.setDataProperty(thisemp, \"isassistant\", !node.data.isassistant);
                                    myDiagram.commitTransaction(\"vacante\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Eliminar Rol\"),
                        {
                            click: function(e, obj) {
                                // reparent the subtree to this node's boss, then remove the node
                                var node = obj.part.adornedPart;
                                if (node !== null && myDiagram.model.getKeyForNodeData(node) != 1) {
                                    var thisemp = node.data;
                                        myDiagram.startTransaction(\"reparent remove\");

                                        var chl = node.findTreeChildrenNodes();
                                        // iterate through the children and set their parent key to our selected node's parent key
                                        while(chl.next()) {
                                            var emp = chl.value;
                                            myDiagram.model.setParentKeyForNodeData(emp.data, node.findTreeParentNode().data.key);
                                        }
                                        // and now remove the selected node itself
                                        myDiagram.model.removeNodeData(node.data);
                                        myDiagram.model.setDataProperty(thisemp, \"name\", \"ELIMINADO\");
                                        myDiagram.model.setDataProperty(thisemp, \"id_personal\", null);
                                        myDiagram.model.setDataProperty(thisemp, \"isassistant\", !node.data.isassistant);

                                    myDiagram.commitTransaction(\"reparent remove\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Eliminar Gerencia\"),
                        {
                            click: function(e, obj) {
                                // remove the whole subtree, including the node itself
                                var node = obj.part.adornedPart;
                                if (node !== null && myDiagram.model.getKeyForNodeData(node) != 1 ) {

                                    myDiagram.startTransaction(\"remove dept\");
                                    myDiagram.removeParts(node.findTreeParts());
                                    myDiagram.commitTransaction(\"remove dept\");
                                }
                            }
                        }
                    ),
                    \$(\"ContextMenuButton\",
                        \$(go.TextBlock, \"Convertir Staff\"),
                        {
                            click: function(e, obj) {
                                // remove the whole subtree, including the node itself
                                var node = obj.part.adornedPart;
                                if (node !== null) {
                                    myDiagram.startTransaction(\"toggle assistant\");
                                    myDiagram.model.setDataProperty(node.data, \"isassistant\", !node.data.isassistant);
                                    myDiagram.layout.invalidateLayout();
                                    myDiagram.commitTransaction(\"toggle assistant\");
                                }
                            }
                        }
                    )
                );

            // define the Link template
            myDiagram.linkTemplate =
                \$(go.Link, go.Link.Orthogonal,
                    { corner: 5, relinkableFrom: true, relinkableTo: true },
                    \$(go.Shape, { strokeWidth: 4, stroke: \"#19458D\" }));  // the link shape

            // read in the JSON-format data from the \"mySavedModel\" element
            load();


            // support editing the properties of the selected person in HTML
            if (window.Inspector) myInspector = new Inspector(\"myInspector\", myDiagram,
                {
                    properties: {
                        \"key\": { readOnly: true },
                        \"isassistant\": { type: \"boolean\" }
                    },
                    propertyModified: function(name, val) {
                        if (name === \"isassistant\") myDiagram.layout.invalidateLayout();
                    }
                });
        }


        // Assume that the SideTreeLayout determines whether a node is an \"assistant\" if a particular data property is true.
        // You can adapt this code to decide according to your app's needs.
        function isassistant(n) {
            if (n === null) return false;
            return n.data.isassistant;
        }


        // This is a custom TreeLayout that knows about \"assistants\".
        // A Node for which isassistant(n) is true will be placed at the side below the parent node
        // but above all of the other child nodes.
        // An assistant node may be the root of its own subtree.
        // An assistant node may have its own assistant nodes.
        function SideTreeLayout() {
            go.TreeLayout.call(this);
        }
        go.Diagram.inherit(SideTreeLayout, go.TreeLayout);

        SideTreeLayout.prototype.makeNetwork = function(coll) {
            var net = go.TreeLayout.prototype.makeNetwork.call(this, coll);
            // copy the collection of TreeVertexes, because we will modify the network
            var vertexcoll = new go.Set(go.TreeVertex);
            vertexcoll.addAll(net.vertexes);
            for (var it = vertexcoll.iterator; it.next() ;) {
                var parent = it.value;
                // count the number of assistants
                var acount = 0;
                var ait = parent.destinationVertexes;
                while (ait.next()) {
                    if (isassistant(ait.value.node)) acount++;
                }
                // if a vertex has some number of children that should be assistants
                if (acount > 0) {
                    // remember the assistant edges and the regular child edges
                    var asstedges = new go.Set(go.TreeEdge);
                    var childedges = new go.Set(go.TreeEdge);
                    var eit = parent.destinationEdges;
                    while (eit.next()) {
                        var e = eit.value;
                        if (isassistant(e.toVertex.node)) {
                            asstedges.add(e);
                        } else {
                            childedges.add(e);
                        }
                    }
                    // first remove all edges from PARENT
                    eit = asstedges.iterator;
                    while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
                    eit = childedges.iterator;
                    while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
                    // if the number of assistants is odd, add a dummy assistant, to make the count even
                    if (acount % 2 == 1) {
                        var dummy = net.createVertex();
                        net.addVertex(dummy);
                        net.linkVertexes(parent, dummy, asstedges.first().link);
                    }
                    // now PARENT should get all of the assistant children
                    eit = asstedges.iterator;
                    while (eit.next()) {
                        parent.addDestinationEdge(eit.value);
                    }
                    // create substitute vertex to be new parent of all regular children
                    var subst = net.createVertex();
                    net.addVertex(subst);
                    // reparent regular children to the new substitute vertex
                    eit = childedges.iterator;
                    while (eit.next()) {
                        var ce = eit.value;
                        ce.fromVertex = subst;
                        subst.addDestinationEdge(ce);
                    }
                    // finally can add substitute vertex as the final odd child,
                    // to be positioned at the end of the PARENT's immediate subtree.
                    var newedge = net.linkVertexes(parent, subst, null);
                }
            }
            return net;
        };

        SideTreeLayout.prototype.assignTreeVertexValues = function(v) {
            // if a vertex has any assistants, use Bus alignment
            var any = false;
            var children = v.children;
            for (var i = 0; i < children.length; i++) {
                var c = children[i];
                if (isassistant(c.node)) {
                    any = true;
                    break;
                }
            }
            if (any) {
                // this is the parent for the assistant(s)
                v.alignment = go.TreeLayout.AlignmentBus;  // this is required
                v.nodeSpacing = 50; // control the distance of the assistants from the parent's main links
            } else if (v.node == null && v.childrenCount > 0) {
                // found the substitute parent for non-assistant children
                //v.alignment = go.TreeLayout.AlignmentCenterChildren;
                //v.breadthLimit = 3000;
                v.layerSpacing = 0;
            }
        };

        SideTreeLayout.prototype.commitLinks = function() {
            go.TreeLayout.prototype.commitLinks.call(this);
            // make sure the middle segment of an orthogonal link does not cross over the assistant subtree
            var eit = this.network.edges.iterator;
            while (eit.next()) {
                var e = eit.value;
                if (e.link == null) continue;
                var r = e.link;
                // does this edge come from a substitute parent vertex?
                var subst = e.fromVertex;
                if (subst.node == null && r.routing == go.Link.Orthogonal) {
                    r.updateRoute();
                    r.startRoute();
                    // middle segment goes from point 2 to point 3
                    var p1 = subst.center;  // assume artificial vertex has zero size
                    var p2 = r.getPoint(2).copy();
                    var p3 = r.getPoint(3).copy();
                    var p5 = r.getPoint(r.pointsCount - 1);
                    var dist = 10;
                    if (subst.angle == 270 || subst.angle == 180) dist = -20;
                    if (subst.angle == 90 || subst.angle == 270) {
                        p2.y = p5.y - dist; // (p1.y+p5.y)/2;
                        p3.y = p5.y - dist; // (p1.y+p5.y)/2;
                    } else {
                        p2.x = p5.x - dist; // (p1.x+p5.x)/2;
                        p3.x = p5.x - dist; // (p1.x+p5.x)/2;
                    }
                    r.setPoint(2, p2);
                    r.setPoint(3, p3);
                    r.commitRoute();
                }
            }
        };  // end of SideTreeLayout


        // Show the diagram's model in JSON format
        function save() {
            document.getElementById(\"mySavedModel\").value = myDiagram.model.toJson();
            myDiagram.isModified = true;
        }
        function load() {
            myDiagram.model = go.Model.fromJson(document.getElementById(\"mySavedModel\").value);
        }
    </script>
{% endblock %}
", "personalcargo/organigrama.html.twig", "C:\\Users\\CHARLY\\Desktop\\elfec_intranet_jan21\\elfec_intranet_backend\\templates\\personalcargo\\organigrama.html.twig");
    }
}