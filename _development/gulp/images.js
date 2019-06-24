'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import plumber from 'gulp-plumber';
import imagemin from 'gulp-imagemin';

// ----------------------------------------
// Task
// ----------------------------------------
gulp.task('images', () => {
    let dest = config.paths.base.dest + config.paths.images.dest;

    return gulp.src(config.paths.base.src + config.paths.images.src + '**/*')
        .pipe(plumber())
        .pipe(imagemin([
            imagemin.gifsicle(config.plugins.imagemin.gif),
            imagemin.jpegtran(config.plugins.imagemin.jpg),
            imagemin.optipng(config.plugins.imagemin.png),
            imagemin.svgo(config.plugins.imagemin.svg)
        ], {
            verbose: false
        }))
        .pipe(gulp.dest(dest));
});
