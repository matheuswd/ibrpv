'use strict';

import config from '../config/config';

import gulp from 'gulp';
import sassdoc from 'sassdoc';

gulp.task('sassdoc', () => {
    return gulp.src(config.paths.base.src + config.paths.styles.src + '**/*.scss')
        .pipe(sassdoc());
});
