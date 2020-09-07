const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('autoprefixer');
const postcss = require("gulp-postcss");
const insert = require('gulp-insert');
const fs = require("fs");
const cssnano = require("cssnano");
const rev = require("gulp-rev");
const revRewrite = require('gulp-rev-rewrite');

var metaStyle = "";

const input = './styles/sass/*';
const output = './';
const outputDebug = './styles/';

function css () {
	return gulp
	.src(input)
	.pipe(sass({ outputStyle: "expanded" }))
	.pipe(postcss([autoprefixer({overrideBrowserslist: ['> 1%','last 8 versions','Firefox >= 20', 'ie >= 9']})]))
	.pipe(gulp.dest(outputDebug))
	.pipe(postcss([cssnano(), autoprefixer({overrideBrowserslist: ['> 1%','last 8 versions','Firefox >= 20', 'ie >= 9']})]))
	.pipe(insert.prepend(metaStyle))
	.pipe(gulp.dest(output))
	.pipe(rev())
	.pipe(gulp.dest(output))
	.pipe(rev.manifest())
	.pipe(gulp.dest(outputDebug))
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

function renameCSSFile() {
	const manifest = gulp.src(outputDebug+ 'rev-manifest.json')
	return gulp.src('./header.php')
		.pipe(revRewrite({ manifest }))
		.pipe(gulp.dest('./'));
}

// define complex tasks
const build = gulp.series(init, css, renameCSSFile);
const watch = gulp.series(init, css, watchFiles);

exports.build = build;
exports.default = watch;
