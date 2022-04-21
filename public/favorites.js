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

                return true

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


            return true

        }
    })

    $('#alert').remove();

})
