import nodeListForEachPolyfill from '../polyfills/nodelist-foreach';

nodeListForEachPolyfill();

let toggleDropdownArrow = function(dropdown) {
    let arrow = dropdown.querySelector('.sub-menu-toggle');
    if (arrow) {
        arrow.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('dropdown--open');
        });
    }
}

document.querySelectorAll('.menu-item-has-children').forEach((dropdown) => {
    toggleDropdownArrow(dropdown);
});

let html    = document.documentElement,
    toggle  = document.getElementsByClassName("js-header-burger")[0];

toggle.addEventListener("click", function(){
    html.classList.toggle('no-scroll');
    html.classList.toggle('menu-open');

    toggle.classList.toggle('active');
});