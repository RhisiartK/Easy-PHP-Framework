'use strict';

var log = require('log-ok');
var copy = require('copy');

var opts = {
    flatten: true
};

var src_css = [
    'style/style.min.css',
    'style/style.min.css.map'
];

var src_css_dep = [
    'node_modules/animate.css/animate.css'
];

var src = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'
];

function copy_vendors() {
    copy(src, '../web/Public/js', opts, function (err, files) {
        if (err) throw err;
        files.forEach(function (file) {
            log(file.relative);
        })
    });
}

function copy_css() {
    copy(src_css, '../web/Public/css', opts, function (err, files) {
        if (err) throw err;
        files.forEach(function (file) {
            log(file.relative);
        })
    });

    copy(src_css_dep, '../web/Public/css', opts, function (err, files) {
        if (err) throw err;
        files.forEach(function (file) {
            log(file.relative);
        })
    });
}

copy_vendors();
copy_css();
