import UglifyJsPlugin from 'uglifyjs-webpack-plugin';

module.exports = (env, argv) => {
    let config = {
        mode: (env === 'development' ? 'development' : 'production'),
        output: {
            filename: '[name].js'
        },
        module: {
            rules: [
                {
                    test: /\.m?js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                    }
                },
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'eslint-loader',
                        options: {
                            enforce: "pre",
                        }
                    }
                },
            ]
        },
        externals: {
            jquery: 'jQuery',
            $: 'jQuery',
            jQuery: 'jQuery'
        }
    };

    if (config.mode === 'development') {
        // Do dev mode things
        // config.watch = true;
    } else {
        config.optimization = {
            minimizer: [
                new UglifyJsPlugin({
                    uglifyOptions: {
                        compress: {
                            drop_console: true,
                        }
                    }
                })
            ]
        }
    }

    return config;
};
