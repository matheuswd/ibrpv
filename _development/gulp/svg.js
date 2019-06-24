'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp'
import plumber from 'gulp-plumber';
import imagemin from 'gulp-imagemin';
import svgSymbols from 'gulp-svg-symbols';

gulp.task('images:svg', () => {
    let dest = config.paths.base.dest + config.paths.svg.dest;

    return gulp.src(config.paths.base.src + config.paths.svg.src + '*.svg')
        .pipe(plumber())
        .pipe(imagemin([
            imagemin.svgo(config.plugins.imagemin.svgdeep)
        ], {
            verbose: false
        }))
        .pipe(gulp.dest(dest))
        .pipe(svgSymbols({
            templates: ['default-svg'],
            svgAttrs: {
                xmlns: 'http://www.w3.org/2000/svg',
                style: 'position: absolute; width: 0; height: 0;',
                'aria-hidden': 'true',
            }
        }))
        .pipe(gulp.dest(dest));
});
