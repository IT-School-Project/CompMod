$(document).ready(function () {
    $('a.dd-menu').click(function () {
        $('ul.dropdown_list').toggleClass('active')
    })
    $('.dropdown_list').on('mouseleave', function () {
        $(this).removeClass('active')
    });
});