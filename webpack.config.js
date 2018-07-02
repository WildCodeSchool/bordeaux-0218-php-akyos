// webpack.config.js
let Encore = require('@symfony/webpack-encore');
let CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create public/build/app.js and public/build/app.css
    .addEntry('app', './assets/js/index.js')

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    // enable source maps during development
    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications(!Encore.isProduction())

    // create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning()

    // allow sass/scss files to be processed
    .enableLessLoader()

    //
    .addPlugin(
        // Copy the images folder and optimize all the images
        new CopyWebpackPlugin([{
            from: 'assets/img/',
            to: 'img/'
        },
            {
                from: 'assets/fonts/',
                to: 'fonts/'
            }])
    )
;

// export the final configuration
module.exports = Encore.getWebpackConfig();