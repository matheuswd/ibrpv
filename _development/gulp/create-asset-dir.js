'use strict';

import config from '../config/config';
import gulp from 'gulp';
import fs from 'fs';

gulp.task('create-asset-dir', () => {
    // fs.writeFile fails if the folder doesn't exist, therefore we check and
    // create it if needed
    if (!fs.existsSync(config.paths.base.dest)) {
        fs.mkdirSync(config.paths.base.dest);
    }
});