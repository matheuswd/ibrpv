import nodeListForEachPolyfill from '../polyfills/nodelist-foreach';

nodeListForEachPolyfill();

let html    = document.documentElement,
    toggle  = document.getElementsByClassName("js-header-burger")[0];

toggle.addEventListener("click", function(){
    html.classList.toggle('no-scroll');
    html.classList.toggle('menu-open');

    toggle.classList.toggle('active');
});