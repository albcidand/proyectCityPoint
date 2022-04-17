$('.categories_btn').click(function() {
    $.ajax({
        type: "GET",
        url: url_global + '/valencia_category',
        dataType: "json",
        data: {
            '_token': token,
            'category': $(this).val()
        },
        success: function (response) {
          $('#places').html('')
          response.forEach(element => {
            $('#places').append(
                '<div class="card">'+
                    '<button class="fav_btn" value="' + element.place_id + '"><i class="uil uil-heart-alt"></i></button>'+
                    '<img src="' + element.place_img + '" alt="">'+
                    '<div>'+
                    '<h2>' + element.place_title + '</h2>'+
                    '<p><i class="uil uil-map-marker"></i><a href="' + element.place_location + '" target="_BLANK">' + element.place_city + '</a></p>'+
                    '<p>' + element.place_description + '</p>'+
                    '</div>'+
                '</div>'
            )
          })
        }
    });
})