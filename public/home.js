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

                /* si la respuesta es true se genera una ventana de alerta */

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

                $('.fav_places').html(''); /* vaciamos el contenedor de los lugares favoritos para poder llenarlo de nuevo con la información actualizada después de haber añadido un nuevo lugar */

                response.forEach(element => {

                    /* con un bucle forEach recorremos la respuesta que nos manda el back (FavController.php) y colocamos toda la información en las tarjetas de lugar */

                    $('.fav_places').append(
                        '<div class="card" id="expand">' +
                        '<button class="fav_btn btn_active" value="' + element.place_id + '"><i class="uil uil-heart likeHeart fav_active"></i></button>' +
                        '<img src="' + element.place_img + '" alt="">' +
                        '<div>' +
                        '<h3>' + element.place_title + '</h3>' +
                        '<p><i class="uil uil-map-marker"></i><a href="' + element.place_location + '" target="_BLANK">' + element.place_city + '</a></p>' +
                        '<p class="hidden_info">' + element.place_description + '</p>' +
                        '</div>' +
                        '<p id="srcMap" class="hidden_info">' + element.place_map + '</p>' +
                        '</div>'
                    );

                    $('.card').eq(8).hide().fadeIn(); /* efecto de fade In para que el nuevo lugar que se ha añadido aparezca de forma suave */
                })

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
    de la tabla de favoritos de la base de datos y además actualiza los datos después de eliminar el sitio */

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

            $('.fav_places').html(''); /* vaciamos el contenedor de los lugares favoritos para poder llenarlo de nuevo con la información actualizada después de haber eliminado el lugar */

            if (response == '') {

                /* comprobamos si la respuesta que recibimos del back (DeleteController.php) contiene algún lugar o si por el contrario está vacía */

                $('.fav_places').append(

                    /* si está vacía mostramos una notificación que haga de placeholder */

                    "<p id='notification' class='muted'>You don't have any favorites yet.<br>Try adding a couple.</p>"
                )
            } else {

                /* si no está vacía recorremos los datos y los mostramos */

                response.forEach(element => {
                    $('.fav_places').append(
                        '<div class="card">' +
                        '<button class="fav_btn btn_active" value="' + element.place_id + '"><i class="uil uil-heart likeHeart fav_active"></i></button>' +
                        '<img src="' + element.place_img + '" alt="">' +
                        '<div>' +
                        '<h3>' + element.place_title + '</h3>' +
                        '<p><i class="uil uil-map-marker"></i><a href="' + element.place_location + '" target="_BLANK">' + element.place_city + '</a></p>' +
                        '<p class="hidden_info">' + element.place_description + '</p>' +
                        '</div>' +
                        '<p id="srcMap" class="hidden_info">' + element.place_map + '</p>' +
                        '</div>'
                    )
                })
            }

        }
    })

    $('#alert').remove(); /* elimino la alerta */

});
