const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('autoprefixer');
const postcss = require("gulp-postcss");
const plumber = require("gulp-plumber");
const insert = require('gulp-insert');
const fs = require("fs");
const cssnano = require("cssnano");

var metaStyle = "";

var input = './styles/sass/*';
var output = './';
var outputDebug = './styles/';

function css () {
  return gulp
    .src(input)
    .pipe(plumber())
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(postcss([autoprefixer({overrideBrowserslist: ['> 1%','last 8 versions','Firefox >= 20', 'ie >= 9']})]))
    .pipe(gulp.dest(outputDebug))
    .pipe(postcss([cssnano(), autoprefixer({overrideBrowserslist: ['> 1%','last 8 versions','Firefox >= 20', 'ie >= 9']})]))
    .pipe(insert.prepend(metaStyle))
    .pipe(gulp.dest(output));
}

// Watch files
function watchFiles() {
  gulp.watch(input, css);
}

function init(cb) {
	metaStyle = fs.readFileSync("./styles/stylesheet_meta.css", "utf-8");
	console.log("added meta information");
	cb();
}

// define complex tasks
const build = gulp.series(init, css);
const watch = gulp.series(init, css, watchFiles);

exports.build = build;
exports.default = watch;
