'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import browserSync from 'browser-sync';
import phpcs from 'gulp-phpcs';
import phpcbf from 'gulp-phpcbf';
import gutil from 'gutil';
// ----------------------------------------
// Task
// ----------------------------------------
gulp.task('php', () => {
    return gulp.src(config.paths.php)
    	// Compares all PHP files with PSR-2
    	.pipe(phpcs({
            bin: 'vendor/bin/phpcs',
            standard: 'PSR2',
            severity: 5,
            warningSeverity: 1
        }))
        // Log all problems that was found
        .pipe(phpcs.reporter('log'))
        // Update Browser
        .pipe(browserSync.stream());
});

gulp.task('php:dev', () => {
    return gulp.src(config.paths.php)
        // Updates all code to follow PSR-2 
        .pipe(phpcbf({
            bin: 'vendor/bin/phpcbf',
            standard: 'PSR2',
            warningSeverity: 0
        }))
        // Log all problems that was found
        .on('error', gutil.log)
        // Outputs all files
        .pipe(gulp.dest('../'))
});
