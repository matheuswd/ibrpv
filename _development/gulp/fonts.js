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

// ----------------------------------------
// SVG Copy
// ----------------------------------------
gulp.task('fonts', () => {
    let dest = config.paths.base.dest + config.paths.fonts.dest;

    return gulp.src(config.paths.base.src + config.paths.fonts.src + '*.*')
        .pipe(plumber())
        .pipe(gulp.dest(dest));
});
