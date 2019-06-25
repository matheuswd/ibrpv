'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import browsersync from 'browser-sync';

// ----------------------------------------
// Init browser sync so its good to go
// ----------------------------------------
gulp.task('browser-sync', () => browsersync.init({
    proxy: process.env.BROWSERSYNC_PROXY
}));
