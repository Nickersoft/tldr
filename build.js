({
    baseUrl: './resources/assets/js',
    paths: {
        backbone: '../../../node_modules/backbone/backbone-min',
        jquery: '../../../node_modules/jquery/dist/jquery.min',
        underscore: '../../../node_modules/underscore/underscore-min',
        semantic: '../../../semantic/dist/semantic.min',
        text: '../../../node_modules/text/text',
        templates: '../../templates'
    },
    shim: {
        jquery: {
            exports: '$'
        },
        underscore: {
            exports: '_'
        },
        backbone: {
            deps: [
                'underscore',
                'jquery'
            ],
            exports: 'Backbone'
        }
    },
    name: "main",
    out: "public/js/main.min.js"
})
