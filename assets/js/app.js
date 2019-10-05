/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
import $ from 'jquery';
import swal from 'sweetalert2';

window.onload (() => { 
    $('.slimScrollBar').addClass('slimScrollBar-own')
})

export function iniciar() {
    setTimeout(function(){ window.location="/login" }, 500);
}

export function salir() {
    swal({
        title: "¿Desea cerrar su sesión?",
        imageUrl: "{{ asset('' ~ close_image ~ '') }}",
        showCancelButton: true,
        confirmButtonColor: "#3F51B5",
        cancelButtonColor: "#F44336",
        confirmButtonText: "Aceptar",
        reverseButtons: true,
        cancelButtonText: "Cancelar"
    }).then(function () {
        swal(
            'Gracias por tu trabajo.',
            'Vuelve pronto.',
            'success'
        )
        setTimeout(function(){window.location="/logout"}, 500);
    })
}

//import dt from 'datatables.net';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
