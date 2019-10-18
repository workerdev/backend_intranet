attach_validators()

$('#fkhallazgo').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar hallazgo.',
    title: 'Seleccione un hallazgo.'
})

$('#estadoaccion ').selectpicker({
    size: 4,
    liveSearch: true,
    liveSearchPlaceholder: 'Buscar estado.',
    title: 'Seleccione un estado.'
})

$('#hlg-link').click(function(){
    window.location = '/hallazgo';
});

$('#new-acn').click(function () {
    $('#ordinalacn').val('')
    $('#descripcionacn').val('')
    $('#fechaimplementacion').val('')
    $('#responsableimplementacion').val('')
    $('#responsableregistro').val('')
    $('#fecharegistroacn').val('')

    $('#estadoaccion ').val('')
    $('#estadoaccion ').selectpicker('render')

    clean_form()
    verif_inputs()
    $('#idacn_div').hide()
    $('#insert-acn').show()
    $('#update-acn').hide()
    $('#form-acn').modal('show')
})

$('#insert-acn').click(function () {
    objeto = JSON.stringify({
        'ordinal': $('#ordinalacn').val(),
        'descripcion': $('#descripcionacn').val(),
        'fechaimplementacion': $('#fechaimplementacion').val(),
        'responsableimplementacion': $('#responsableimplementacion').val(),
        'responsableregistro': $('#responsableregistro').val(),
        'fecharegistro': $('#fecharegistroacn').val(),

        'hallazgo': $('#fkhallazgo').val(),
        'estadoaccion': $('#estadoaccion ').val(),
        'origin': $('#new-acn').attr('data-origin'),
        'form': $('#new-acn').attr('data-form'),
        'spnr': $('#new-acn').attr('data-spn'),
        'btn_id': $(this).attr('id')
    })

    if(!validate_formacn() || validate_combosacn()){
        swal(
            'Error de datos',
            'Por favor ingrese todos los datos requeridos.',
            'warning'
        )
    }else{ 
        ajax_call_validation_hlg("/accion_insertar", {object: objeto}, null, main_route)
    }
})

function attach_edit() {
    $('.edit').click(function () {
        obj = JSON.stringify({
            'id': parseInt(JSON.parse($(this).attr('data-json')))
        });
        ajax_call_get("/accion_editar",{
            object: obj
        },function(response){
            var self = JSON.parse(response);
            $('#idacn').val(self.id)
            $('#ordinalacn').val(self.ordinal)
            $('#descripcionacn').val(self.descripcion)
            $('#fechaimplementacion').val(self.fechaimplementacion)
            $('#responsableimplementacion').val(self.responsableimplementacion)
            $('#responsableregistro').val(self.responsableregistro)
            $('#fecharegistroacn').val(self.fecharegistro)

            $('#estadoaccion ').val(self.estadoaccion)
            $('#estadoaccion ').selectpicker('render')

            $('#fkhallazgo').val(self.fkhallazgo.id)
            $('#fkhallazgo').selectpicker('render')

            clean_form()
            verif_inputs()
            $('#idacn_div').show()
            $('#insert-acn').hide()
            $('#update-acn').show()

            $('#idacn').parent().addClass('focused')
            $('.item-acn').parent().addClass('focused')
            $('#form-acn').modal('show')
        })
    })
}

function verifacc_rep() {
    $('.eficrep').click(function () {
        obj = JSON.stringify({
        'id': parseInt(JSON.parse($(this).attr('data-json')))
        });
        ajax_call_reptb("/accion_verif",{
            object: obj
        },function(response){
            var self = JSON.parse(response);
            let urlfile = self.url;
            let vfile = urlfile.substring(urlfile.lastIndexOf("/")+1, urlfile.length);
            $("<a id='lnkrp' class='btn bg-teal waves-effect' href='"+urlfile+"'>"+vfile+"</a>").insertAfter("#new");
            setTimeout(function(){ $("#lnkrp").remove() }, 10000);
        })
    })
}

$('#update-acn').click(function () {
    objeto = JSON.stringify({
        'id': parseInt(JSON.parse($('#idacn').val())),
        'ordinal': $('#ordinalacn').val(),
        'descripcion': $('#descripcionacn').val(),
        'fechaimplementacion': $('#fechaimplementacion').val(),
        'responsableimplementacion': $('#responsableimplementacion').val(),
        'responsableregistro': $('#responsableregistro').val(),
        'fecharegistro': $('#fecharegistroacn').val(),

        'hallazgo': $('#fkhallazgo').val(),
        'estadoaccion': $('#estadoaccion ').val(),
        'origin': $('#new-acn').attr('data-origin'),
        'form': $('#new-acn').attr('data-form'),
        'spnr': $('#new-acn').attr('data-spn'),
        'btn_id': $(this).attr('id')
    })
    
    if(!validate_formacn() || validate_combosacn()){
        swal(
            'Error de datos',
            'Por favor ingrese todos los datos requeridos.',
            'warning'
        )
    }else{ 
        ajax_call_validation_hlg("/accion_actualizar", {object: objeto}, null, main_route)
    }
})
reload_form()

attach_edit()
verifacc_rep()

let message= ''
function accion_previous(id) {
    obj = JSON.stringify({
        'id': parseInt(JSON.parse(id))
    });
    ajax_call_get("/accion_prev",{
        object: obj
    },function(response){
        message = response;
    });
}

$('.delete').click(function () {
    id = parseInt(JSON.parse($(this).attr('data-json')))
    accion_previous(id)
    
    let quest = message + " ¿Desea dar de baja los datos de la acción?" 
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
        ajax_call("/accion_eliminar", { 
            id: id, enabled: enabled, _xsrf: getCookie("_xsrf")}, 
            null, 
            function () {
                setTimeout(function(){ window.location = main_route }, 1000);
        })
    })
})

function validate_formacn(){
    var resv = true;

    $('.item-acn').each(function(){
        let valitf = $(this).val();

        if(valitf != 0 && valitf != '' && valitf != null){}
        else resv = false;
    });
    return resv;
}

function validate_combosacn(){
    return ($('#fkhallazgo').val() == '' || $('#estadoaccion').val() == '');
}