/* esta función da funcionalidad al menu de móvil (muestra el menú) */

$('#hamburger').click(function () {
    $('#hamburger').toggleClass('active'); /* animación del botón hamburguesa */
    $('#mobileNav').toggleClass('active'); /* muestra el menu de móvil */
    $('.blur').toggleClass('blurActive'); /* muestra un elemento que se superpone al body (para que no se pueda clickar) y lo vuelve borroso */
    $('body').toggleClass('blurActive'); /* elimina el overflow del body */
});

/* esta función da funcionalidad al menu de móvil (cierra el menú) */

$('#mobileNav a').click(function () {
    $('#hamburger').toggleClass('active'); /* animación */
    $('#mobileNav').toggleClass('active'); /* cierra el menú */
    $('.blur').toggleClass('blurActive'); /* quita el elemento blur */
    $('body').toggleClass('blurActive'); /* vuelve a permitir el overflow del body */
})

/* esta función da funcionalidad al menu de móvil (cierra el menú al hacer click fuera de este) */

$('.blur').click(function () {
    $('.blur').toggleClass('blurActive');
    $('#hamburger').toggleClass('active');
    $('#mobileNav').toggleClass('active');
    $('body').toggleClass('blurActive');
})

/* esta función da funcionalidad a los temas de la web (tema claro/tema oscuro), además permite guardar en la memoria del navegador del usuario su preferencia (memoria de la sesión) */

$(document).ready(function () {

    /* cuando la web ha cargado completamente comprueba la memoria de la sesión del usuario para ver si tiene el item "themeActive" que se crea cuando el usuario hace click sobre el theme toggler */

    if (sessionStorage.getItem('themeActive')) {

        /* si el item themeActive existe significa que el usuario ha puesto el tema oscuro */

        $('.light').removeClass('themeActive'); /* quitamos la clase themeActive del botón del tema claro (efecto visual del botón) */
        $('.dark').addClass('themeActive'); /* añadimos la clase themeActive al botón del tema oscuro (efecto visual del botón) */

        $('body').addClass('dark-mode-colors'); /* cambiamos los colores de la web al tema oscuro */
    }

    $('.themeToggler').click(function () {

        /* cuando el usuario hace click sobre el theme toggler comprobamos si el item "themeActive" existe, si existe quiere decir que el usuario ya ha clickado con anterioridad por lo que ahora quiere volver al tema claro */

        if (sessionStorage.getItem('themeActive')) {

            $('.light').toggleClass('themeActive'); /* cambiamos los colores del botón */
            $('.dark').toggleClass('themeActive');
            $('body').toggleClass('dark-mode-colors'); /* cambiamos los colores de la web (al tema claro) */
            sessionStorage.removeItem('themeActive') /* eliminamos el item "themeActive" */

        } else {

            /* si el item "themeActive" no existe quiere decir que es la primera vez que el usuario hace click, por lo que quiere poner el tema oscuro */

            $('.light').toggleClass('themeActive'); /* cambiamos los colores del botón */
            $('.dark').toggleClass('themeActive');
            $('body').toggleClass('dark-mode-colors'); /* cambiamos los colores de la web (al tema oscuro) */
            sessionStorage.setItem('themeActive', true) /* generamos el item "themeActive" */

        }
    })
})
