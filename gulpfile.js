var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var insert = require('gulp-insert');
var fs = require("fs");
var metaStyle = "";


var input = './styles/sass/*';
var output = './';
var outputDebug = './styles/';

gulp.task('sass', function () {
  return gulp
    .src(input)
    .pipe(sass({
        onError: function(err) {return notify().write(err);}
        }))
    .pipe(prefix({
        browsers: ['> 1%','last 8 versions','Firefox >= 20'],
        cascade: false
    }))
    .pipe(gulp.dest(outputDebug))
    .pipe(cssmin())
    .pipe(insert.prepend(metaStyle))
    .pipe(gulp.dest(output));
});


gulp.task('watch', function() {
  return gulp
    .watch(input, ['sass'])
});
gulp.task('init',function() {
    metaStyle = fs.readFileSync("./styles/stylesheet_meta.css", "utf-8");
    console.log(metaStyle);
    return gulp;
});


gulp.task('default', ['init','sass', 'watch']);
gulp.task('build', ['init','sass']);
