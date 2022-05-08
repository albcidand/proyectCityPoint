/* Este documento JS añade la funcionalidad que hace que al hacer click en el botón de favoritos de un lugar, este se añada o se elimine
a la tabla de favoritos de la base de datos */

var clicked_btn
/* variable creada para guardar el botón en el que se hace click, de esta forma podemos acceder a la id del lugar concreto que se ha clickado, 
luego nos sirve para identificar en la base de datos el elemento que queremos añadir o eliminar */

/* esta función genera un evento click sobre el botón de favoritos de las tarjetas de lugar */

$(document).on('click', '.fav_btn', function () {

    /* la función realiza una petición ajax que envía la id del lugar y comprueba  si el elemento clickado existe ya en la base de datos (FavController.php)*/

    let id = $(this).val() /* variable que guarda la id del botón clickado (esta es la id del lugar en la base de datos) */
    clicked_btn = $(this) /* guardo el botón */


    $.ajax({
        method: 'GET',
        dataType: 'json',
        url: url_global + '/add_fav',
        /* la variable url_global contiene la url base de la web (variable creada en las vistas de cada página) */
        data: {
            '_token': token,
            /* la variable token contiene el csrf_token necesario para poder hacer la petición (variable creada en las vistas de cada página) */
            'place_id': id
        },
        success: function (response) {

            /* la respuesta que devuelve el controlador será 'true' si el lugar ya se encuentra en la tabla de favoritos */

            if (response == 1) {

                /* si la respuesta es true se genera una ventana de alerta  */

                $('#content').append(
                    '<div id="alert">' +
                    '<div>' +
                    '<p>This place is already in your favorites list, do you want to remove it from the list?</p>' +
                    '<div>' +
                    '<button id="btn_confirm_alert" value="' + id + '">Yes</button>' +
                    '<button id="btn_cancel_alert">No</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                )

            } else {

                /* si la respuesta no es true significa que el lugar no estaba en la tabla de favoritos por lo que se habrá añadido */

                clicked_btn.addClass('btn_active')
                clicked_btn.children('i').addClass('fav_active') /* añadimos las clases active del botón */

                return true

            }
        }
    })
});

$(document).on('click', '#btn_cancel_alert', function () {

    /* si se hace click sobre el botón de cancelar de la alerta, esta función elimina el elemento */

    $('#alert').remove();
})

$(document).on('click', '#btn_confirm_alert', function () {

    /* si se hace click sobre el botón de aceptar de la alerta se hace otra petición ajax (DeleteController.php) que elimina el lugar
    de la tabla de favoritos de la base de datos */

    clicked_btn.removeClass('btn_active')
    clicked_btn.children('i').removeClass('fav_active') /* añadimos las clases active del botón */

    $.ajax({
        method: 'GET',
        dataType: 'json',
        url: url_global + '/delete_fav',
        data: {
            '_token': token,
            'place_id': $('#btn_confirm_alert').val() /* aquí cogemos la id del value del botón de confirmación de la alerta */
        },
        success: function (response) {


            return true

        }
    })

    $('#alert').remove(); /* elimino la alerta */

})
