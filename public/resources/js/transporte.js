function combo_tipo(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data
    }).done(function (response) {
        //console.log(response);
        if(callback != 'undefined' || callback != ''){
            dictionary = clean_data(response)
            console.log(dictionary)

        }
    })
}

function ajax_request(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data/*,
        async: false*/
    }).done(function (response) {
        //console.log(response);
        if(callback != 'undefined' || callback != ''){
            dictionary = response
            //console.log(dictionary)
        }
    })
}

function peticion_ajax(url, data, render, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        async: false
    }).done(function (response) {
        if (render != null){
            $(render).html(response)
        } else {
            dictionary = JSON.parse(response)
            if ("message" in dictionary && dictionary.message != ''){
                if (dictionary.success) {
                    showMessage(dictionary.message, "success", "ok")
                } else {
                    showMessage(dictionary.message, "danger", "remove")
                }
            }
        }
        if(callback != null){
            callback(response)
        }
    })
}