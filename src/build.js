'use strict';

var copy = require('copy');
var fs = require('fs');
var log = require('log-ok');
var sass = require('node-sass');
var watch = require('watch');

var opts = {
    flatten: true
};

var src_css = [
    'style/style.css',
    'style/style.css.map'
];

watch.watchTree('./style/', {'filter': scss_filter}, function (f, curr, prev) {
    if (typeof f == "object" && prev === null && curr === null) {
        log('Finished walking the tree');
    } else if (prev === null) {
        log('file is a new file');
    } else if (curr.nlink === 0) {
        log('file was removed');
    } else {
        log('file was changed');
        compile_sass();
    }
});

function compile_sass() {
    sass.render({
        file: './style/style.scss',
        outFile: './style/style.css',
        outputStyle: 'compressed',
        sourceMap: true
    }, function(err, result) {
        if (err) throw err;
        fs.writeFile('./style/style.css', result.css, function(err){
            if (err) throw err;
        });
        fs.writeFile('./style/style.css.map', result.map, function(err){
            if (err) throw err;
        });
        log(result.stats.end);
    });
}

function copy_css() {
    copy(src_css, '../web/Public/css', opts, function (err, files) {
        if (err) throw err;
        files.forEach(function(file) {
            log(file.relative);
        })
    });
}

function scss_filter(err, files) {
    log(err === 'style\\style.scss');
    return err === 'style\\style.scss';
}
