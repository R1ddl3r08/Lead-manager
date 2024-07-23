$(function() {
    $('.hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('.nav-links').toggleClass('active');
    });
});