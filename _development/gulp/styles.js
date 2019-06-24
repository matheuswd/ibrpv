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
import browserSync from 'browser-sync';
import sourcemaps from 'gulp-sourcemaps';
import sass from 'gulp-sass';
import postcss from 'gulp-postcss';
import cssnano from 'cssnano';
import autoprefixer from 'autoprefixer';
import stylelint from 'gulp-stylelint';
import atImport from "postcss-import";

// ----------------------------------------
// Task
// ----------------------------------------
// - Sass compilation
// - Autoprefix CSS
// - Add media queries at the end of the file
// - Rename main file and put it into 'assets/css' folder
// - Minify css output
// - Reload browser (if browserSync installed)
// -------------------------------------------
gulp.task('styles', () => {
    let dest = config.paths.base.dest + config.paths.styles.dest;

    return gulp.src(config.paths.base.src + config.paths.styles.src + config.paths.styles.entry)
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: config.paths.includePaths,
        }))
        .pipe(postcss([
            atImport(),
            autoprefixer(),
            cssnano()
        ]))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream())
});

gulp.task('styles:dev', () => {

    let dest = config.paths.base.dest + config.paths.styles.dest;

    return gulp.src(config.paths.base.src + config.paths.styles.src + config.paths.styles.entry)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: config.paths.includePaths,
        }))
        .pipe(postcss([
            atImport(),
            autoprefixer(),
            cssnano()
        ]))
        .pipe(sourcemaps.write ('.'))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream())

});

gulp.task('styles:lint', () => {
    return gulp.src(config.paths.base.src + config.paths.styles.src + '**/*.scss')
        .pipe(plumber())
        .pipe(stylelint(config.plugins.stylelint));
});

gulp.task('styles:lint:fix', () => {

    let local_stylelint = config.plugins.stylelint;
    local_stylelint.fix = true;

    return gulp.src(config.paths.base.src + config.paths.styles.src + '**/*.scss')
        .pipe(plumber())
        .pipe(stylelint(local_stylelint))
        .pipe(gulp.dest(config.paths.base.src + config.paths.styles.src));
});
