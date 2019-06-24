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
import wpPot from 'gulp-wp-pot';

// ----------------------------------------
// Task
// ----------------------------------------
gulp.task('wordpress-pot', () => {
    let dest = '../' + config.wordpress['Text Domain'] + '.pot';

    return gulp.src(config.paths.php)
        .pipe(plumber())
        .pipe(wpPot({
            domain: config.wordpress['Text Domain'],
            package: config.wordpress['Text Domain']
        }))
        .pipe(gulp.dest(dest));
});

