jQuery(function () {
    jQuery(document).scroll(function () {
        var nav = jQuery(".header");
        nav.toggleClass('scrolled', jQuery(this).scrollTop() > nav.height());
    });
});
