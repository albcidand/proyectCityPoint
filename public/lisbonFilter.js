$('.categories_btn').click(function () {
    $.ajax({
        type: "GET",
        url: url_global + '/lisbon_category',
        dataType: "json",
        data: {
            '_token': token,
            'category': $(this).val()
        },
        success: function (response) {
            $('#places').html('')
            if (response == '') {
                $('#places').append(
                    "<p id='notification' class='muted'>There is no places for this category yet.</p>"
                )
            } else {
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
