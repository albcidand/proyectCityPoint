/* Este documento JS añade la funcionalidad para que una vez en la vista de cada ciudad se puedan filtrar los lugares por categoría y mostrar solo los sitios de cada categoría de forma dinámica mediante peticiones ajax */

$('.categories_btn').click(function () {
    $.ajax({
        type: "GET",
        url: url_global + '/lisbon_category',
        /* la variable url_global contiene la url base de la web (variable creada en las vistas de cada página) */
        dataType: "json",
        data: {
            '_token': token,
            /* la variable token contiene el csrf_token necesario para poder hacer la petición (variable creada en las vistas de cada página) */
            'category': $(this).val() /* enviamos al back (CityController.php) la categoría (que se encuentra en el value del botón) que se usará para filtrar los lugares que quiero mostrar*/
        },
        success: function (response) {

            $('#places').html('') /* vaciamos el contenedor de los lugares para poder llenarlo de nuevo con la información dependiendo del botón que se haya pulsado */

            if (response == '') {

                /* comprobamos si la respuesta que recibimos del back (CityController.php) contiene algún lugar o si por el contrario está vacía */

                $('#places').append(

                    /* si está vacía mostramos una notificación que haga de placeholder */

                    "<p id='notification' class='muted'>There is no places for this category yet.</p>"
                )
            } else {

                /* si no está vacía recorremos los datos y los mostramos */

                response.forEach(element => {
                    $('#places').append(
                        '<div class="card" id="expand">' +
                        '<button class="fav_btn" value="' + element.place_id + '"><i class="uil uil-heart likeHeart"></i></button>' +
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
    });
})
