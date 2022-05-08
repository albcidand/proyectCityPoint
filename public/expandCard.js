/* Este documento JS añade la funcionalidad para visualizar en grande las tarjetas de los diferentes lugares y poder ver sus datos. 
Al hacer click sobre una tarjeta, aparece un nuevo elemento que recoge los datos del html y los muestra bloqueando el scroll de la pantalla principal,
en el modo de escritorio al hacer click fuera del elemento de visualización de los datos, este se elimina y vuelve a verse la pantalla principal */


/* Esta función genera un evento click sobre las tarjetas de lugares (.card) */

$(document).on('click', '.card', function (e) {

    /* la funcion recibe el parámetro "e" que sirve para seleccionar el elemento target que ha recibido el click */

    if ($(e.target).is(".fav_btn i") || $(e.target).is(".fav_btn") || $(e.target).is(".card a")) {

        /* utilizo un condicional "if" junto con el parámetro "e.target" para identificar donde se hace click y evitar 
        que se interfiera con los demás elementos clickables (botón de favoritos y el enlace a la ubicación) */

    } else {

        /* si se cumple la condición significa que el usuario ha hecho click en la tarjeta para verla ampliada, por lo que se crea el elemento
        que va a recoger la información del html utilizando "this" para referirse a la tarjeta que se ha clickado */

        if ($(e.target).is("#expand *")) {
            /* pongo un segundo condicional para solucionar un problema con la forma de recoger los datos 
                   para mostrarlos una vez que se han actualizado las tarjetas mediante ajax */

            $('#content').append(
                '<div id="infoCardContainer">' +

                '<div id="infoCard">' +
                '<button class="fav_btn" value="' + $(this).children('button').val() + '"><i class="uil uil-heart likeHeart"></i></button>' +
                '<button class="closeCard_btn"><i class="uil uil-arrow-left"></i></button>' +
                '<div id="infoCardImg"><img src="' + $(this).children('img').attr('src') + '" alt=""></div>' +
                '<div id="infoCardData">' +
                '<div id="infoCardTitle">' +
                '<h2>' + $(this).children('div').children('h3').text() + '</h2>' +


                '<p><i class="uil uil-map-marker"></i>' + $(this).children('div').children('p:nth-child(2)').text() + '</p>' +
                '</div>' +
                '<div id="infoCardDescription">' +
                '<h4>About</h4>' +
                '<p>' + $(this).children('div').children('p:nth-child(3)').html() + '</p>' + /* para que mantenga el formato de texto después de usar ajax necesito coger el innerHTML */
                '</div>' +
                '<div id="infoCardMap">' +
                '<iframe src="' + $(this).children('#srcMap').text() + '" width="100%" height="100" style="border:0;"  referrerpolicy="no-referrer-when-downgrade"></iframe>' +
                '</div>' +
                '</div>' +
                '</div>' +

                '</div>'
            )

        } else {

            $('#content').append(
                '<div id="infoCardContainer">' +

                '<div id="infoCard">' +
                '<button class="fav_btn" value="' + $(this).children('button').val() + '"><i class="uil uil-heart likeHeart"></i></button>' +
                '<button class="closeCard_btn"><i class="uil uil-arrow-left"></i></button>' +
                '<div id="infoCardImg"><img src="' + $(this).children('img').attr('src') + '" alt=""></div>' +
                '<div id="infoCardData">' +
                '<div id="infoCardTitle">' +
                '<h2>' + $(this).children('div').children('h3').text() + '</h2>' +


                '<p><i class="uil uil-map-marker"></i>' + $(this).children('div').children('p:nth-child(2)').text() + '</p>' +
                '</div>' +
                '<div id="infoCardDescription">' +
                '<h4>About</h4>' +
                '<p>' + $(this).children('div').children('p:nth-child(3)').text() + '</p>' + /* antes de hacer ajax necesito coger solo el texto */
                '</div>' +
                '<div id="infoCardMap">' +
                '<iframe src="' + $(this).children('#srcMap').text() + '" width="100%" height="100" style="border:0;"  referrerpolicy="no-referrer-when-downgrade"></iframe>' +
                '</div>' +
                '</div>' +
                '</div>' +

                '</div>'
            )
        }


        $('#infoCardContainer').hide().fadeIn(300); /* animación para que el elemento aparezca de forma más fluida */
        $('body').css('overflow', 'hidden') /* elimino el scroll de la pantalla principal */
    }

})

/* función para cerrar el elemento que muestra los datos y volver a la pantalla principal */

$(document).on('click', '.closeCard_btn', function () {

    $('#infoCardContainer').fadeOut(300, function () {
        /* animación para que el elemento desaparezca de forma más fluida */
        $('#infoCardContainer').remove() /* elimino el elemento */
        $('body').css('overflow', 'auto') /* restauro el scroll de la pantalla principal */
    });

})

/* función para cerrar el elemento que muestra los datos pero al hacer click fuera del elemento */

$(document).on('click', '#infoCardContainer', function (e) {

    if ($(e.target).is("#infoCard") || $(e.target).is("#infoCard *")) {

        /* compruebo que el click se ha hecho fuera del elemento */

    } else {

        /* elimino el elemento */

        $('#infoCardContainer').fadeOut(300, function () {
            $('#infoCardContainer').remove()
            $('body').css('overflow', 'auto')
        });

    }
})
