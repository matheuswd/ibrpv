'use strict';

import config from '../config/config';
// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp'
import del from 'del'

// ----------------------------------------
// Task
// ----------------------------------------
gulp.task('clean', () => {
    return del([
        config.paths.base.dest
    ],{
        force: true,
    });
});
