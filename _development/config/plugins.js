// Sadly nothing I do can make browser sync work without
// configuring the proxy url here. Even using the browser
// sync code described when gulp watch is run doesn't
// make it work. Might be nice to make some env vars that
// aren't commit as part of the repo so each dev can have
// browser sync without it being committed
module.exports = {
    "stylelint": {
        "failAfterError": false,
        "reporters": [
            {
                "formatter": "string",
                "console": true
            }
        ],
    },
    "imagemin": {
        "gif": {
            "interlaced": true,
            "optimizationLevel": 3
        },
        "jpg": {
            "progressive": true
        },
        "png": {
            "optimizationLevel": 7,
        },
        "svg": {
            "plugins": [
                { "removeViewBox": false },
                { "cleanupIDs": false },
                { "cleanupAttrs": true },
                { "removeComments": true },
                { "removeUselessDefs": true },
                { "removeEmptyAtts": true },
                { "removeEmptyText": true },
                { "removeEmptyContainers": true },
                { "removeUnusedNS": true }
            ]
        },
        "svgdeep": {
            "plugins": [
                { "cleanupAttrs": true },
                { "cleanupIDs": true },
                { "removeViewBox": false },
                { "removeDimensions": true },
                { "removeComments": true },
                { "removeUselessDefs": true },
                { "removeEmptyAtts": true },
                { "removeEmptyText": true },
                { "removeEmptyContainers": true },
                { "removeMetadata": true },
                { "removeTitle": true },
                { "removeDesc": true },
                { "removeUnusedNS": true }
            ]
        }
    }
}
