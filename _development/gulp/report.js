'use strict';

import config from '../config/config';
import gulp from 'gulp';
import sizereport from 'gulp-sizereport';

gulp.task('report', function () {
    return gulp.src([config.paths.base.dest + "**/*", "!" + config.paths.base.dest + "timestamp.txt"])
        .pipe(sizereport({
            gzip: true
        }));
});