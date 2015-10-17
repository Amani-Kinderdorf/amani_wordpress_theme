var url = 'localhost:8888/amani/'
var name = 'Amani Kinderdorf'
var styles = ['style.css','./styles/**'];
/*************************************/
var gulp        = require('gulp');
var imageop = require('gulp-image-optimization');
var autoprefixer = require('gulp-autoprefixer');
var cssbeautify = require('gulp-cssbeautify');
 /***********************************/

gulp.task('styles', function () {
    return gulp.src('style.css')
		.pipe(autoprefixer('last 2 version', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(cssbeautify({
            indent: '	',
            openbrace: 'end-of-line',
            autosemicolon: true
        }))
        .pipe(gulp.dest('./'))
});

gulp.task('images', function(cb) {
    gulp.src(['./img/**/*.png','./img/**/*.jpg','./img/**/*.gif','./img/**/*.jpeg']).pipe(imageop({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    })).pipe(gulp.dest('./')).on('end', cb).on('error', cb);
});
 
// Default task to be run with `gulp`
gulp.task('publish', ['styles', 'browser-sync'], function () {
    gulp.watch(styles, ['styles']);
    gulp.watch(["**/*.php","**/*.js"], reload());
});


