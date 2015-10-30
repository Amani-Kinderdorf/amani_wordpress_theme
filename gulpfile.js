var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var rename = require("gulp-rename");


var input = './styles/sass/*';
var output = './styles/';

gulp.task('sass', function () {
  return gulp
    .src(input)
    .pipe(sass())
    .pipe(prefix({
        browsers: ['> 1%','last 8 versions','Firefox >= 20'],
        cascade: false
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssmin())
    .pipe(gulp.dest(output));
});



gulp.task('watch', function() {
  return gulp
    .watch(input, ['sass'])
});

gulp.task('default', ['sass', 'watch']);