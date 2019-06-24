module.exports = {
    "timestamp": "../assets/timestamp.txt",
    "base": {
        "src": "./",
        "dest": "../assets/"
    },
    "languages": {
        "dest": "../languages/"
    },
    "scripts": {
        "src": "scripts/",
        "dest": "scripts/",
        "entry": "*.js"
    },
    "styles": {
        "src": "styles/",
        "dest": "styles/",
        "entry": "*.scss",
    },
    "fonts": {
        "src": "fonts/",
        "dest": "fonts/"
    },
    "images": {
        "src": "images/",
        "dest": "images/"
    },
    "svg": {
        "src": "svgs/",
        "dest": "svgs/"
    },
    "php": [
        "../**/*.php",
        "!../**/node_modules/**/*.php",
        "!../**/vendor/**/*.php",
    ],
    "includePaths": [
        'node_modules/',
    ]
}
