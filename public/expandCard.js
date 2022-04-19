$(document).on('click', '.card', function () {
    console.log($(this).children('p').text());
    $('#content').append(
        '<div id="infoCardContainer">' +

        '<div id="infoCard">' +
        '<button class="fav_btn" value="' + $(this).children('button').val() + '"><i class="uil uil-heart-alt"></i></button>' +
        '<div id="infoCardImg"><img src="' + $(this).children('img').attr('src') + '" alt=""></div>' +
        '<div id="infoCardData">' +
        '<div id="infoCardTitle">' +
        '<h2>' + $(this).children('div').children('h2').text() + '</h2>' +
        '</div>' +
        '<div id="infoCardLocation">' +
        '<p><i class="uil uil-map-marker"></i>' + $(this).children('div').children('p:nth-child(2)').text() + '</p>' +
        '</div>' +
        '<div id="infoCardDescription">' +
        '<h4>About</h4>' +
        '<p>' + $(this).children('div').children('p:nth-child(3)').text() + '</p>' +
        '</div>' +
        '<div id="infoCardMap">' +
        '<iframe src="' + $(this).children('#srcMap').text() + '" width="100%" height="100" style="border:0;"  referrerpolicy="no-referrer-when-downgrade"></iframe>' +
        '</div>' +
        '</div>' +
        '</div>' +

        '</div>'
    )


})
