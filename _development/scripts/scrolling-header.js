jQuery(function () {
    jQuery(document).scroll(function () {
        let nav = jQuery(".header");
        nav.toggleClass('scrolled', jQuery(this).scrollTop() > nav.height());
        
        let firstLogo = jQuery(".header__logo svg:first-child");
        let lastLogo = jQuery(".header__logo svg:last-child");
        if(! nav.hasClass("scrolled")) {
            firstLogo.show();
            lastLogo.hide();
        } else {
            firstLogo.hide();
            lastLogo.show();
        }
        
    });
});
