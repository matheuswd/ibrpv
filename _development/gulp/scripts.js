'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';
import webpackConfig from '../webpack.config.js';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import plumber from 'gulp-plumber';
import browserSync from 'browser-sync';
import webpack from 'webpack';
import webpackStream from 'webpack-stream';
import named from 'vinyl-named';

// ----------------------------------------
// Task
// ----------------------------------------
gulp.task('scripts', () => {
    let dest = config.paths.base.dest + config.paths.scripts.dest;

    return gulp.src(config.paths.base.src + config.paths.scripts.src + config.paths.scripts.entry)
        .pipe(named())
        .pipe(webpackStream(webpackConfig(),webpack))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream());
});

gulp.task('scripts:dev', () => {
    let dest = config.paths.base.dest + config.paths.scripts.dest;

    return gulp.src(config.paths.base.src + config.paths.scripts.src + config.paths.scripts.entry)
        .pipe(plumber())
        .pipe(named())
        .pipe(webpackStream(webpackConfig('development'), webpack))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream());
});
