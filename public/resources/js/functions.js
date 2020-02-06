function ajax_call(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok")
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
        if (callback != null) {
            callback(response)
        }
    })
}

function ajax_call_validation(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        dictionary = JSON.parse(response)
        console.log(dictionary);
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                console.log(arrayErrorFocus);
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    console.log('Error' + i)
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            console.log(arreglo);
            console.log(arreglo.length);
            console.log(arreglo.parentElement);
            c = 0;
            //Recorrer los valores
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error')
                {
                    console.log(dictionary[0]);
                    console.log(document.getElementById(key[0])+'Errores Ciclo ' + key[0])
                    field = document.getElementById(key[0])
                    // field.parentElement.classList.add('error');
                    // document.getElementById('error-'+ key\[0\]).value = '';
                    // field.parentElement.classList.remove('error');
                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1])
                    ;

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)

                    // field.parent().addClass('error');
                    // field.parent().next('label').text(key\[1\]);
                    c++
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            //console.log(dictionary);

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok");
                    $('#form').modal('hide');
                    setTimeout(function () {
                        window.location = callback
                    }, 1500)
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
    // if(callback != null){
    // callback(response)
    // }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function getCookie(name) {
    var r = document.cookie.match("\\b" + name + "=([^;]*)\\b");
    return r ? r[1] : undefined;
}

function ajax_call_get(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        if (callback != null) {
            dictionary = JSON.parse(response)
            callback(dictionary.response)
        }
    })
}

function ajax_call_get_resp(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        if (callback != null) {
            dictionary = JSON.parse(response)
            callback(dictionary)
        }
    })
}

function clean_data(response) {
    dictionary = JSON.stringify(response)
    dictionary = dictionary.replace(/\\/g, '')
    pos = dictionary.indexOf("response")
    end = dictionary.indexOf("success")
    dictionary = dictionary.substr(pos + ("response").length + 2, dictionary.length)

    dictionary = dictionary.split(",")
    dictionary = dictionary.slice(0, 4)
    return dictionary
}

function valor_item(item) {
    valor = item.substr(item.lastIndexOf(":") + 1, item.length)
    valor = valor.replace(/['"]+/g, '')
    valor = valor.replace('}', '')
    return valor
}

function remove_empty_columns() {
    if (!$.trim($('#table_content > tr > td:last-child').html()).length) {
        $('#table_content > tr > td:last-child, .actions_header').remove()
    }
}

function query(url) {
    data = {
        data: JSON.stringify({
            page_nr: page_nr,
            max_entries: max_entries,
            like_search: like_search,
            order_by: order_by,
            ascendant: ascendant
        })
    }
    ajax_call(url, data, '#table_content', function () {
        remove_empty_columns()
    })
}

function verif_inputs() {
    $.each($('#form .form-line input'), function (index, value) {
        if (value.value.length > 0) {
            $(value).parent().addClass('focused')
        }
    })
}

function reload_form() {
    $('.form-control').focus(function () {
        $(this).parent().addClass('focused');
    }).focusout(function () {
        var $this = $(this);
        if ($this.parents('.form-group').hasClass('form-float')) {
            if ($this.val() == '') {
                $this.parents('.form-line').removeClass('focused');
            }
        } else {
            $this.parents('.form-line').removeClass('focused');
        }
    });

    $('body').on('click', '.form-float .form-line .form-label', function () {
        $(this).parent().find('input').focus();
    });
}

function confirmation_message(title, callback) {
    swal({
        title: "¿Está seguro de que desea cancelar la operacion?",
        text: "Al cerrar esta ventana, no se guardará ningún cambio realizado",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            $('#form').modal('hide')
            //callback()
        }
    })
}

function ajax_call_get_mods(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data
    }).done(function (response) {
        if (callback != null) {
            dictionary = JSON.parse(response)
            var modulos = []
            for (var i in dictionary) {
                modulos.push(dictionary[i]);
            }
            callback(modulos)
        }
    })
}

function ajax_call_rol(url, data, render, callback) {
    let receive_dt = JSON.parse(data['object'])
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $("#spn-rol").fadeIn(800);
            if(receive_dt.action == 'insert') $("#insert").attr('disabled', true);
            else $("#update").attr('disabled', true);
        },
        success: function () {
            $("#spn-rol").fadeOut(800);
            if(receive_dt.action == 'insert') $("#insert").attr('disabled', false);
            else $("#update").attr('disabled', false);
        }
    }).done(function (response) {
        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok")
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
        if (callback != null) {
            callback(response)
        }
    })
}

function ajax_call_rep(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false,
        beforeSend: function() {
            $("#spn-adrp").fadeIn(800);
            $('#aud_yrep').attr('disabled', 'disabled');
        },
        success:function (data, textStatus) {
            $("#spn-adrp").fadeOut(800);
            $('#aud_yrep').removeAttr('disabled');
        }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        if ("message" in dictionary && dictionary.message != ''){
            if (dictionary.success) {
                showMessage(dictionary.message, "success", "ok")
            } else {
                showMessage(dictionary.message, "danger", "remove")
            }
        }
        if(callback != null){
            callback(response)
        }
    })
}

function ajax_call_reptb(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function() {
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#spn-grep").fadeIn(800);
        },
        success:function (data, textStatus) {
            $("#spn-grep").fadeOut(800);
        }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        if ("message" in dictionary && dictionary.message != ''){
            if (dictionary.success) {
                showMessage(dictionary.message, "success", "ok")
            } else {
                showMessage(dictionary.message, "danger", "remove")
            }
        }
        if(callback != null){
            callback(response)
        }
    })
}

function ajax_call_reptbf(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function() {
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#spn-grepf").fadeIn(800);
        },
        success:function (data, textStatus) {
            $("#spn-grepf").fadeOut(800);
        }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        if ("message" in dictionary && dictionary.message != ''){
            if (dictionary.success) {
                showMessage(dictionary.message, "success", "ok")
            } else {
                showMessage(dictionary.message, "danger", "remove")
            }
        }
        if(callback != null){
            callback(response)
        }
    })
}

function ajax_call_get_nwr(url, data, callback) {
    receive_dt = JSON.parse(data['object'])
    
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $("#spn-addrv").fadeIn(800);
            if(receive_dt.action == 'insert') $("#insert-rev").hide();
            else $("#update-rev").hide();
         },
         success: function (data, textStatus) {
            $("#spn-addrv").fadeOut(800);
            if(receive_dt.action == 'insert') $("#insert-rev").show();
            else $("#update-rev").show();
         }
    }).done(function (response) {
        if (callback != null) {
            dictionary = response
            callback(dictionary)
        }
    })
}

function ajax_call_validation_pbl(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $("#spn-pbl").fadeIn(800);
            $("#btn-publicar").hide();
         },
         success: function (data, textStatus) {
            $("#spn-pbl").fadeOut(800);
            $("#btn-publicar").show();
         }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            c = 0;
            //Recorrer los valores
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error')
                {
                    field = document.getElementById(key[0])
                    
                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1]);

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)
                    c++
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok");
                    $('#form').modal('hide');
                    setTimeout(function () {
                        window.location = callback
                    }, 1500)
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function ajax_call_validation_aud(url, data, render, callback) {
    var datos = JSON.parse(data['object']);
    console.log(datos)
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $('#'+datos.spnr).fadeIn(800);
            $('#'+datos.btn_id).hide();
         },
         success: function (data, textStatus) {
            $('#'+datos.spnr).fadeOut(800);
            $('#'+datos.btn_id).show();
         }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        console.log(dictionary);
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                console.log(arrayErrorFocus);
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    console.log('Error' + i)
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            c = 0;
            
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error'){
                    console.log(dictionary[0]);
                    console.log(document.getElementById(key[0])+'Errores Ciclo ' + key[0])
                    field = document.getElementById(key[0])
                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1])
                    ;

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)
                    c++
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            //console.log(dictionary);

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    if(datos.origin == 'auditoria'){
                        swal(
                            'Datos registrados',
                            '',
                            'success'
                        )
                        $('#'+datos.form).modal('hide');
                        reload_tabhlfr()
                    }else{
                        showMessage(dictionary.message, "success", "ok");
                        $('#'+datos.form).modal('hide');
                        setTimeout(function () {
                            window.location = callback
                        }, 1000)
                    }
                } else {
                    if(datos.origin == 'auditoria'){
                        swal(
                            'Error',
                            dictionary.message,
                            'warning'
                        )
                    }
                    else showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function ajax_call_validation_hlg(url, data, render, callback) {
    var datos = JSON.parse(data['object']);
    console.log(datos)
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $('#'+datos.spnr).fadeIn(800);
            $('#'+datos.btn_id).hide();
         },
         success: function (data, textStatus) {
            $('#'+datos.spnr).fadeOut(800);
            $('#'+datos.btn_id).show();
         }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        console.log(dictionary);
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                console.log(arrayErrorFocus);
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    console.log('Error' + i)
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            c = 0;
            
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error'){
                    console.log(dictionary[0]);
                    console.log(document.getElementById(key[0])+'Errores Ciclo ' + key[0])
                    field = document.getElementById(key[0])
                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1])
                    ;

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)
                    c++
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            //console.log(dictionary);

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    if(datos.origin == 'hallazgo'){
                        swal(
                            'Datos registrados',
                            '',
                            'success'
                        )
                        $('#'+datos.form).modal('hide');
                        reload_tabacn()
                    }else{
                        showMessage(dictionary.message, "success", "ok");
                        $('#'+datos.form).modal('hide');
                        setTimeout(function () {
                            window.location = callback
                        }, 1000)
                    }
                } else {
                    if(datos.origin == 'hallazgo'){
                        swal(
                            'Error',
                            dictionary.message,
                            'warning'
                        )
                    }
                    else showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function ajax_call_validation_rpg(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function () {
            $("#spn-rpg").fadeIn(800);
            $("#insert-rpg").hide();
         },
         success: function (data, textStatus) {
            $("#spn-rpg").fadeOut(800);
            $("#insert-rpg").show();
         }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        console.log(dictionary);
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    console.log('Error' + i)
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            c = 0;
            //Recorrer los valores
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error')
                {
                    console.log(dictionary[0]);
                    console.log(document.getElementById(key[0])+'Errores Ciclo ' + key[0])
                    field = document.getElementById(key[0])

                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1])
                    ;

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            //console.log(dictionary);

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok");
                    $('#form-rpg').modal('hide');
                    setTimeout(function () {
                        window.location = callback
                    }, 1500)
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function ajax_call_validation_msg(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        dictionary = JSON.parse(response)
        console.log(dictionary);
        if ('error' in dictionary) {
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                arrayErrorFocus = document.getElementsByClassName('error focused')
                console.log(arrayErrorFocus);
                for (i = 0; i < arrayErrorFocus.length; i++) {
                    console.log('Error' + i)
                    arrayErrorFocus[i].classList.remove('error');
                }
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove();
            }
            arreglo = document.getElementsByClassName('label-form123')
            console.log(arreglo.length);
            if (arreglo.length > 0) {
                for (i = 0; i < arreglo.length; i++)
                    arreglo[i].remove()
            }
            console.log(arreglo);
            console.log(arreglo.length);
            console.log(arreglo.parentElement);
            c = 0;
            //Recorrer los valores
            Object.entries(dictionary).forEach(function (key) {
                if (key[0] != 'error')
                {
                    console.log(dictionary[0]);
                    console.log(document.getElementById(key[0])+'Errores Ciclo ' + key[0])
                    field = document.getElementById(key[0])
                    // field.parentElement.classList.add('error');
                    // document.getElementById('error-'+ key\[0\]).value = '';
                    // field.parentElement.classList.remove('error');
                    field.parentElement.classList.add('error');
                    labelError = document.createElement("label");
                    labelError.setAttribute('id', 'label-form123');
                    labelError.setAttribute('class', 'label-form123');
                    labelErrorText = document.createTextNode(key[1])
                    ;

                    labelError.appendChild(labelErrorText);

                    labelError.classList.add("error");
                    labelError.classList.add("text-danger");

                    field.parentElement.insertAdjacentElement("afterend", labelError)

                    // field.parent().addClass('error');
                    // field.parent().next('label').text(key\[1\]);
                    c++
                }
            })
        }

        if (render != null) {
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            //console.log(dictionary);

            if ("message" in dictionary && dictionary.message != '') {
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok");
                    $('#form').modal('hide');
                    setTimeout(function () {
                        window.location = callback
                    }, 1500)
                } else {
                    $('#form').modal('hide');
                    swal(
                        dictionary.response,
                        dictionary.message,
                        'info'
                    ) 
                }
            }
        }
    }).fail(function () {
        console.log('Error Ajax')
    })
}

function ajax_call_spnr(url, data, callback) {
    dtcont = JSON.parse(data['object']);
    
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: true,
        beforeSend: function() {
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#"+dtcont.spinner).fadeIn(800);
        },
        success:function (data, textStatus) {
            $("#"+dtcont.spinner).fadeOut(800);
        }
    }).done(function (response) {
        dictionary = JSON.parse(response)
        if ("message" in dictionary && dictionary.message != ''){
            if (dictionary.success) {
                showMessage(dictionary.message, "success", "ok")
            } else {
                showMessage(dictionary.message, "danger", "remove")
            }
        }
        if(callback != null){
            callback(response)
        }
    })
}