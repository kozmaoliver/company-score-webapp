const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/app.js')

    .enableStimulusBridge('./assets/controllers.json')
    .enableSassLoader() // if using SCSS
    .enablePostCssLoader()

    .enableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();
