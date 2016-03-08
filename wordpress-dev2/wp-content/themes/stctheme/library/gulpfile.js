var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
//var config      = require('./config.js').browserSync.development;
var reload      = browserSync.reload;
var rename = require('gulp-rename');
var gutil = require('gulp-util');

gulp.task('sass', function () {
    gulp.src('./scss/style.scss')
        .pipe(sass())
        .pipe(prefix('last 3 version'))
        // .pipe(rename('main.min.css')) use if I have to rename from style.css to something else
        .pipe(gulp.dest('css'))
        .pipe(reload({stream:true}));
});

gulp.task('watch', function() {
      // watch scss files
      gulp.watch('./scss/style.scss', function() {
        gulp.run('sass');
      });

    });


// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    '/var/www/vhosts/ns510932.ip-167-114-103.net/httpdocs/wordpress-dev2/*.php'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "localhost/bs/",
    notify: false
    });
});
gulp.task('default', ['sass', 'browser-sync', 'watch'], function () {
    gulp.watch("./scss/style.scss", ['sass']);
});