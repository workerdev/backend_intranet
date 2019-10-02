attach_validators()

$('#fkauditoriafrt').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar auditoría.',
    title: 'Seleccione una auditoría.'
})

$('#new-frt').click(function () {
    $('#ordinalfrt').val('')
    $('#descripcionfrt').val('')
    $('#responsablefrt').val('')
    $('#fecharegistrofrt').val('')

    clean_form()
    verif_inputs()
    $('#id_div_frt').hide()
    $('#insert-frt').show()
    $('#update-frt').hide()
    $('#form-frt').modal('show')
})

$('#insert-frt').click(function () {
    objeto = JSON.stringify({
        'ordinal': $('#ordinalfrt').val(),
        'descripcion': $('#descripcionfrt').val(),
        'responsable': $('#responsablefrt').val(),
        'fecharegistro': $('#fecharegistrofrt').val(),
        
        'auditoria': $('#fkauditoriafrt').val(),
        'origin': $('#new-frt').attr('data-origin'),
        'form': $('#new-frt').attr('data-form')
    })
    ajax_call_validation_aud("/fortaleza_insertar", {object: objeto}, null, main_route)
})

fortaleza_delete()

function add_focusfrt(){
    $('#idfrt').parent().addClass('focused');
    $('#ordinalfrt').parent().addClass('focused')
    $('#descripcionfrt').parent().addClass('focused')
    $('#responsablefrt').parent().addClass('focused')
    $('#fecharegistrofrt').parent().addClass('focused')
}

function fortaleza_edit() {
    $('.edit-frt').click(function () {
        obj = JSON.stringify({
        'id': parseInt(JSON.parse($(this).attr('data-json')))
        });
        ajax_call_get("/fortaleza_editar",{
            object: obj
        },function(response){
            var self = JSON.parse(response);
            $('#idfrt').val(self.id)
            $('#ordinalfrt').val(self.ordinal)
            $('#descripcionfrt').val(self.descripcion)
            $('#responsablefrt').val(self.responsable)
            $('#fecharegistrofrt').val(self.fecharegistro)
            
            $('#fkauditoriafrt').val(self.fkauditoria.id)
            $('#fkauditoriafrt').selectpicker('render')
            
            clean_form()
            verif_inputs()
            add_focusfrt()
            $('#id_div_frt').show()
            $('#insert-frt').hide()
            $('#update-frt').show()
            $('#form-frt').modal('show')
        })
    })
}

$('#update-frt').click(function () {
    objeto = JSON.stringify({
        'id': parseInt(JSON.parse($('#idfrt').val())),
        'ordinal': $('#ordinalfrt').val(),
        'descripcion': $('#descripcionfrt').val(),
        'responsable': $('#responsablefrt').val(),
        'fecharegistro': $('#fecharegistrofrt').val(),
        
        'auditoria': $('#fkauditoriafrt').val(),
        'origin': $('#new-frt').attr('data-origin'),
        'form': $('#new-frt').attr('data-form')
    })
    ajax_call_validation_aud("/fortaleza_actualizar", {object: objeto}, null, main_route)
})
reload_form()

fortaleza_edit()

function fortaleza_delete(){
    $('.delete-frt').click(function () {
        id = parseInt(JSON.parse($(this).attr('data-json')))
        enabled = false
        swal({
            title: "¿Desea dar de baja los datos de la fortaleza?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#004c99",
            cancelButtonColor: "#F44336",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            ajax_call("/fortaleza_eliminar", { id,enabled,_xsrf: getCookie("_xsrf")}, null, function () {setTimeout(function(){window.location=main_route}, 1000);})
        })
    })
}

function edit_fortaleza(efrt) {
    obj = JSON.stringify({
        'id': parseInt(JSON.parse($(efrt).attr('data-json')))
    });
    ajax_call_get("/fortaleza_editar",{
        object: obj
    },function(response){
        var self = JSON.parse(response);
        
        $('#idfrt').val(self.id)
        $('#ordinalfrt').val(self.ordinal)
        $('#descripcionfrt').val(self.descripcion)
        $('#responsablefrt').val(self.responsable)
        $('#fecharegistrofrt').val(self.fecharegistro)
        
        $('#fkauditoriafrt').val(self.fkauditoria.id)
        $('#fkauditoriafrt').selectpicker('render')
        
        
        clean_form()
        verif_inputs()
        add_focusfrt()
        $('#id_div_frt').show()
        $('#insert-frt').hide()
        $('#update-frt').show()
        $('#form-frt').modal('show')
    })
}

function delete_fortaleza(efrt){
    id = parseInt(JSON.parse($(efrt).attr('data-json')))
    enabled = false
    swal({
        title: "¿Desea dar de baja los datos de la fortaleza?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#004c99",
        cancelButtonColor: "#F44336",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function () {
        ajax_call("/fortaleza_eliminar", { id,enabled,_xsrf: getCookie("_xsrf")}, null, function () {setTimeout(function(){window.location=main_route}, 1000);})
    })
}