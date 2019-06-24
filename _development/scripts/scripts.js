// ------------------------------------------------------------------
// Custom scripts
// ------------------------------------------------------------------
import objectFit from './polyfills/object-fit';
import './helpers/skip-link-focus-fix';
import './helpers/lazy-load';

const Granola = () => {
    // ------------------------------------------------------------------
    // Image Fit
    // ------------------------------------------------------------------
    // This adds a compatibility layer for images and usage of object fit
    // The fall back will be applied if the no-object-fit class is on the
    // HTML element
    // ------------------------------------------------------------------
    objectFit({
        targetClass: [
            'img-fit', // Custom usage
            'gallery-icon' // WordPress
        ]
    });
}

document.addEventListener( 'DOMContentLoaded', () => Granola() );
