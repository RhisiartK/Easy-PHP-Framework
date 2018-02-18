'use strict';

var log = require('log-ok');
var copy = require('copy');

var opts = {
    flatten: true
};

var src = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'
];

function copy_vendors() {
    log('asda');
    copy(src, '../web/Public/js', opts, function (err, files) {
        if (err) throw err;
        files.forEach(function(file) {
            log(file.relative);
        })
    });
}

copy_vendors();
