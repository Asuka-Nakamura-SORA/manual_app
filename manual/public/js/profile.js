$(document).ready(function() {
    $('#js-hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('#js-nav').toggleClass('active');
    });
});