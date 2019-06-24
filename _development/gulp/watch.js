'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';
import gulp from "gulp";

// ----------------------------------------
// Tasks
// ----------------------------------------
gulp.task('watch', ['default', 'browser-sync'], () => {

    // Styles
    gulp.watch(
        config.paths.styles.src   + '**/*.scss',
        {cwd: config.paths.base.src},
        ['styles:dev', 'styles:lint', 'scss-json', 'cache-bust']
    );

    // Scripts
    gulp.watch(
       config.paths.scripts.src  + '**/*.js',
       {cwd: config.paths.base.src},
       ['scripts:dev','cache-bust']
    );

    // Fonts
    gulp.watch(
       config.paths.fonts.src    + '**/*.*',
       {cwd: config.paths.base.src},
       ['fonts']
    );

    // Images
    gulp.watch(
       config.paths.images.src   + '**/*.*',
       {cwd: config.paths.base.src},
       ['images']
    );

    // SVGs
    gulp.watch(
       config.paths.svg.src      + '*.svg',
       {cwd: config.paths.base.src},
       ['images:svg']
    );

    gulp.watch(
        config.paths.php,
        ['wordpress-stylesheet', 'php']
    );
});
