'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import sassJson from 'gulp-sass-json';
import gulp from 'gulp';
import replace from 'gulp-replace';

gulp.task('scss-json', function () {
    let dest = config.paths.base.dest + config.paths.styles.dest;

    return gulp.src( config.paths.base.src + config.paths.styles.src + '0-framework/variables/_colors.scss')
        .pipe(sassJson())
        .pipe(replace('"\'', '"'))
        .pipe(replace('\'"', '"'))
        .pipe(gulp.dest(dest));
});