'use strict';

import config from '../config/config';

import gulp from "gulp";
import fs from 'fs';

gulp.task('wordpress-stylesheet', () => {

    // New line code
    const newline = '\r\n';

    // Add a timestamp to the wordpress information
    config.wordpress['Version'] = Math.floor(Date.now() / 1000);

    // Open the comments
    let content = '/*' + newline;

    // Loop through each of the wordpress keys and add them to the string
    for (let index in config.wordpress) {
        if (config.wordpress.hasOwnProperty(index)) {
            content += index + ": " + config.wordpress[index] + newline;
        }
    }

    // Close the comments
    content += "*/";

    // Write it to the file
    fs.writeFile(
        // File to write to
        '../style.css',
        // Contents of file
        content,
        // Options for the file
        {},
        // Callback
        function (err) {
            if (err) {
                throw err;
            }
        }
    );
});