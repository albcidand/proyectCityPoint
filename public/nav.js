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

$(document).ready(function () {
    if (sessionStorage.getItem('themeActive')) {

        $('.light').removeClass('themeActive');
        $('.dark').addClass('themeActive');

        $('body').addClass('dark-mode-colors');
    }

    $('.themeToggler').click(function () {
        if (sessionStorage.getItem('themeActive')) {

            $('.light').toggleClass('themeActive');
            $('.dark').toggleClass('themeActive');
            $('body').toggleClass('dark-mode-colors');
            sessionStorage.removeItem('themeActive')

        } else {

            $('.light').toggleClass('themeActive');
            $('.dark').toggleClass('themeActive');
            $('body').toggleClass('dark-mode-colors');
            sessionStorage.setItem('themeActive', true)

        }
    })
})
