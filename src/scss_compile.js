'use strict'

const fs = require('fs')
const log = require('log-ok')
const sass = require('node-sass')

function compileSass () {
  sass.render({
    file: './style/style.scss',
    outFile: './style/style.min.css',
    outputStyle: 'compressed',
    sourceMap: true
  }, function (err, result) {
    if (err) throw err
    fs.writeFile('./style/style.min.css', result.css, function (err) {
      if (err) throw err
    })
    fs.writeFile('./style/style.min.css.map', result.map, function (err) {
      if (err) throw err
    })
    log(result.stats.end)
  })
}
compileSass()
