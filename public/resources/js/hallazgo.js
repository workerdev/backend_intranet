attach_validators()

$('#fkauditoriahlg').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar auditoría.',
    title: 'Seleccione una auditoría.'
})

$('#fktipohlg').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar tipo.',
    title: 'Seleccione un tipo.'
})

$('#fkimpacto').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar nivel de impacto.',
    title: 'Seleccione un nivel de impacto.'
})

$('#fkprobabilidad').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar probabilidad.',
    title: 'Seleccione una probabilidad.'
})

$('#new-hlg').click(function () {
    $('#ordinalhlg').val('')
    $('#titulo').val('')
    $('#descripcionhlg').val('')
    $('#evidencia').val('')
    $('#documento').val('')
    $('#puntoiso').val('')
    $('#analisiscausaraiz').val('')
    $('#recomendaciones').val('')
    $('#cargoauditado').val('')
    $('#nombreauditado').val('')
    $('#responsablehlg').val('')
    $('#fecharegistrohlg').val('')
    
    $('#fktipohlg').val('')
    $('#fktipohlg').selectpicker('render')
    $('#fkauditoriahlg').val('')
    $('#fkauditoriahlg').selectpicker('render')
    $('#fkimpacto').val('')
    $('#fkimpacto').selectpicker('render')
    $('#fkprobabilidad').val('')
    $('#fkprobabilidad').selectpicker('render')

    clean_form()
    verif_inputs()
    $('#id_div_hlg').hide()
    $('#insert-hlg').show()
    $('#update-hlg').hide()
    $('#form-hlg').modal('show')
})

$('#insert-hlg').click(function () {
    objeto = JSON.stringify({
        'ordinal': $('#ordinalhlg').val(),
        'titulo': $('#titulo').val(),
        'descripcion': $('#descripcionhlg').val(),
        'evidencia': $('#evidencia').val(),
        'documento': $('#documento').val(),
        'puntoiso': $('#puntoiso').val(),
        'analisiscausaraiz': $('#analisiscausaraiz').val(),
        'recomendaciones': $('#recomendaciones').val(),
        'cargoauditado': $('#cargoauditado').val(),
        'nombreauditado': $('#nombreauditado').val(),
        'responsable': $('#responsablehlg').val(),
        'fecharegistro': $('#fecharegistrohlg').val(),

        'auditoria': $('#fkauditoriahlg').val(),
        'tipo': $('#fktipohlg').val(),
        'impacto': $('#fkimpacto').val(),
        'probabilidad': $('#fkprobabilidad').val(),
        'origin': $('#new-hlg').attr('data-origin'),
        'form': $('#new-hlg').attr('data-form'),
        'spnr': $('#new-hlg').attr('data-spn'),
        'btn_id': $(this).attr('id')
    })
    
    if(!validate_formhlg() || validate_comboshlg()){
        swal(
            'Error de datos',
            'Por favor ingrese todos los datos requeridos.',
            'warning'
        )
    }else{ 
        ajax_call_validation_aud("/hallazgo_insertar", {object: objeto}, null, main_route)
    }
})

function add_focushlg(){
    $('#idhlg').parent().addClass('focused')
    $('#ordinalhlg').parent().addClass('focused')
    $('#titulo').parent().addClass('focused')
    $('#descripcionhlg').parent().addClass('focused')
    $('#evidencia').parent().addClass('focused')
    $('#documento').parent().addClass('focused')
    $('#puntoiso').parent().addClass('focused')
    $('#analisiscausaraiz').parent().addClass('focused')
    $('#recomendaciones').parent().addClass('focused')
    $('#cargoauditado').parent().addClass('focused')
    $('#nombreauditado').parent().addClass('focused')
    $('#responsablehlg').parent().addClass('focused')
    $('#fecharegistrohlg').parent().addClass('focused')
}

function hallazgo_edit() {
    $('.edit-hlg').click(function () {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse($(this).attr('data-json')))
        });
        ajax_call_get("/hallazgo_editar",{
            object: obj
        },function(response){
            var self = JSON.parse(response);
            $('#idhlg').val(self.id)
            $('#ordinalhlg').val(self.ordinal)
            $('#titulo').val(self.titulo)
            $('#descripcionhlg').val(self.descripcion)
            $('#evidencia').val(self.evidencia)
            $('#documento').val(self.documento)
            $('#puntoiso').val(self.puntoiso)
            $('#analisiscausaraiz').val(self.analisiscausaraiz)
            $('#recomendaciones').val(self.recomendaciones)
            $('#cargoauditado').val(self.cargoauditado)
            $('#nombreauditado').val(self.nombreauditado)
            $('#responsablehlg').val(self.responsable)
            $('#fecharegistrohlg').val(self.fecharegistro)

            $('#fktipohlg').val(self.fktipo.id)
            $('#fktipohlg').selectpicker('render')

            $('#fkauditoriahlg').val(self.fkauditoria.id)
            $('#fkauditoriahlg').selectpicker('render')

            $('#fkimpacto').val(self.fkimpacto.id)
            $('#fkimpacto').selectpicker('render')

            $('#fkprobabilidad').val(self.fkprobabilidad.id)
            $('#fkprobabilidad').selectpicker('render')
            
            clean_form()
            verif_inputs()
            $('#id_div_hlg').show()
            $('#insert-hlg').hide()
            $('#update-hlg').show()
            add_focushlg()
            $('#form-hlg').modal('show')
        })
    })
}

$('#update-hlg').click(function () {
    objeto = JSON.stringify({
        'id': parseInt(JSON.parse($('#idhlg').val())),
        'ordinal': $('#ordinalhlg').val(),
        'titulo': $('#titulo').val(),
        'descripcion': $('#descripcionhlg').val(),
        'evidencia': $('#evidencia').val(),
        'documento': $('#documento').val(),
        'puntoiso': $('#puntoiso').val(),
        'analisiscausaraiz': $('#analisiscausaraiz').val(),
        'recomendaciones': $('#recomendaciones').val(),
        'cargoauditado': $('#cargoauditado').val(),
        'nombreauditado': $('#nombreauditado').val(),
        'responsable': $('#responsablehlg').val(),
        'fecharegistro': $('#fecharegistrohlg').val(),

        'auditoria': $('#fkauditoriahlg').val(),
        'tipo': $('#fktipohlg').val(),
        'impacto': $('#fkimpacto').val(),
        'probabilidad': $('#fkprobabilidad').val(),
        'origin': $('#new-hlg').attr('data-origin'),
        'form': $('#new-hlg').attr('data-form'),
        'spnr': $('#new-hlg').attr('data-spn'),
        'btn_id': $(this).attr('id')
    })

    if(!validate_formhlg() || validate_comboshlg()){
        swal(
            'Error de datos',
            'Por favor ingrese todos los datos requeridos.',
            'warning'
        )
    }else{ 
        ajax_call_validation_aud("/hallazgo_actualizar", {object: objeto}, null, main_route)
    }
})
reload_form()

hallazgo_edit()

let messagehlg= ''
function hallazgo_prev(id) {
    obj = JSON.stringify({
        'id': parseInt(JSON.parse(id))
    });
    ajax_call_get("/hallazgo_prev",{
        object: obj
    },function(response){
        message = response;
    });
}

function hallazgo_delete(){
    $('.delete-hlg').click(function () {
        id = parseInt(JSON.parse($(this).attr('data-json')))
        hallazgo_prev(id)
        let quest = messagehlg + " ¿Está seguro en dar de baja el hallazgo?" 
        enabled = false
        swal({
            title: quest,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#004c99",
            cancelButtonColor: "#F44336",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            ajax_call("/hallazgo_eliminar", { 
                id, enabled,_xsrf: getCookie("_xsrf")}, 
                null,
                function () {
                    setTimeout(function(){ window.location=main_route }, 1000);
                }
            )
        })
    })
}

hallazgo_delete()

function edit_hallazgo(ehlg) {
    obj = JSON.stringify({
        'id': parseInt(JSON.parse($(ehlg).attr('data-json')))
    });
    ajax_call_get("/hallazgo_editar",{
        object: obj
    },function(response){
        var self = JSON.parse(response);
        $('#idhlg').val(self.id)
        $('#ordinalhlg').val(self.ordinal)
        $('#titulo').val(self.titulo)
        $('#descripcionhlg').val(self.descripcion)
        $('#evidencia').val(self.evidencia)
        $('#documento').val(self.documento)
        $('#puntoiso').val(self.puntoiso)
        $('#analisiscausaraiz').val(self.analisiscausaraiz)
        $('#recomendaciones').val(self.recomendaciones)
        $('#cargoauditado').val(self.cargoauditado)
        $('#nombreauditado').val(self.nombreauditado)
        $('#responsablehlg').val(self.responsable)
        $('#fecharegistrohlg').val(self.fecharegistro)

        $('#fktipohlg').val(self.fktipo.id)
        $('#fktipohlg').selectpicker('render')

        $('#fkauditoriahlg').val(self.fkauditoria.id)
        $('#fkauditoriahlg').selectpicker('render')

        $('#fkimpacto').val(self.fkimpacto.id)
        $('#fkimpacto').selectpicker('render')

        $('#fkprobabilidad').val(self.fkprobabilidad.id)
        $('#fkprobabilidad').selectpicker('render')
        
        clean_form()
        verif_inputs()
        $('#id_div_hlg').show()
        $('#insert-hlg').hide()
        $('#update-hlg').show()
        add_focushlg()
        $('#form-hlg').modal('show')
    })
}

function delete_hallazgo(ehlg){
    id = parseInt(JSON.parse($(ehlg).attr('data-json')))
    hallazgo_prev(id)
    let quest = messagehlg + " ¿Está seguro en dar de baja el hallazgo?" 
    enabled = false
    swal({
        title: quest,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#004c99",
        cancelButtonColor: "#F44336",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function () {
        ajax_call("/hallazgo_eliminar", { 
            id: id, enabled: enabled, _xsrf: getCookie("_xsrf")}, 
            null,  
            function () {
                swal(
                    'Datos eliminados',
                    '',
                    'success'
                )
                setTimeout(function(){ reload_tabhlfr(); }, 800);
            }
        )
    })
}

function validate_formhlg(){
    var res = true;

    $('.itemhlg').each(function(){
        let valif = $(this).val();

        if(valif != 0 && valif != '' && valif != null){}
        else res = false;
    });
    return res;
}

function validate_comboshlg(){
    return ($('#fkauditoriahlg').val() == '' || $('#fktipohlg').val() == '' || $('#fkimpacto').val() == '' || $('#fkprobabilidad').val() == '');
}