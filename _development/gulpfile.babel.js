'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from './config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import requireDir from 'require-dir';
import runSequence from 'run-sequence';
import env from 'gulp-env';

const taskName = process.argv[2];

if(taskName === 'watch') {
    // Load environment variables
    env(".env.js");
}

requireDir('./gulp');

gulp.task('default', ['clean'], () => {
    // Run the following one after another
        // clean
        // create-asset-dir
    // Then run the rest in any order
    runSequence(
        'create-asset-dir',
        [
            'wordpress-pot',
            'wordpress-stylesheet',
            'styles',
            'scripts',
            'fonts',
            'images',
            'images:svg',
            'scss-json',
            'cache-bust'
        ],
        'report'
    );
});
