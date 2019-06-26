jQuery(function () {
    jQuery(document).scroll(function () {
        let nav = jQuery(".header");
        nav.toggleClass('scrolled', jQuery(this).scrollTop() > nav.height());
    });
});
