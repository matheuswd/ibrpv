'use strict';

// ----------------------------------------
// Configuration
// ----------------------------------------
import config from '../config/config';

// ----------------------------------------
// Modules
// ----------------------------------------
import gulp from 'gulp';
import fs from 'fs';

// ----------------------------------------
// Init browser sync so its good to go
// ----------------------------------------
gulp.task('cache-bust', () => {
    fs.writeFile(
        // File to write to
        config.paths.timestamp,

        // Contents of file
        Math.floor(Date.now() / 1000),

        // Options for the file
        {},

        // Callback
        function(err){
            if(err){
                throw err;
            }
        }
    );
});