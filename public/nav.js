$('#hamburger').click(function () {
    $('#hamburger').toggleClass('active');
    $('#mobileNav').toggleClass('active');
    $('.blur').toggleClass('blurActive');
    $('body').toggleClass('blurActive');
});

$('#mobileNav a').click(function () {
    $('#hamburger').toggleClass('active');
    $('#mobileNav').toggleClass('active');
    $('.blur').toggleClass('blurActive');
    $('body').toggleClass('blurActive');
})

$('.blur').click(function () {
    $('.blur').toggleClass('blurActive');
    $('#hamburger').toggleClass('active');
    $('#mobileNav').toggleClass('active');
    $('body').toggleClass('blurActive');
})

$('#alert').click(function () {

})
