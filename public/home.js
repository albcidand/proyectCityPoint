var clicked_btn

$(document).on('click', '.fav_btn', function () {
    let id = $(this).val()
    clicked_btn = $(this)


    $.ajax({
        method: 'GET',
        dataType: 'json',
        url: url_global + '/add_fav',
        data: {
            '_token': token,
            'place_id': $(this).val()
        },
        success: function (response) {

            if (response == 1) {

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

                clicked_btn.addClass('btn_active')
                clicked_btn.children('i').addClass('fav_active')

                $('.fav_places').html('');
                response.forEach(element => {
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

                    $('.card').eq(8).hide().fadeIn();
                })

            }
        }
    })
});

$(document).on('click', '#btn_cancel_alert', function () {
    $('#alert').remove();
})

$(document).on('click', '#btn_confirm_alert', function () {

    clicked_btn.removeClass('btn_active')
    clicked_btn.children('i').removeClass('fav_active')

    $.ajax({
        method: 'GET',
        dataType: 'json',
        url: url_global + '/delete_fav',
        data: {
            '_token': token,
            'place_id': $('#btn_confirm_alert').val()
        },
        success: function (response) {

            $('.fav_places').html('');

            if (response == '') {
                $('.fav_places').append(
                    "<p id='notification' class='muted'>You don't have any favorites yet.<br>Try adding a couple.</p>"
                )
            } else {
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

    $('#alert').remove();

});
