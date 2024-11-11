$(document).ready(function () {
    // chrome
    $('body').css('zoom', 'reset');
    $(document).keydown(function (event) {
        //event.metaKey mac的command键
        if ((event.ctrlKey === true || event.metaKey === true)
        && (event.which === 61 || event.which === 107 || event.which === 173 
        || event.which === 109 || event.which === 187  || event.which === 189)){
            event.preventDefault();
        }
    });
    // firfox
    $(window).bind('mousewheel DOMMouseScroll', function (event) {
        if (event.ctrlKey === true || event.metaKey) {
            event.preventDefault();
        }
    });
});