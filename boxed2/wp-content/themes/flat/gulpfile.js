var gulp        = require('gulp');
var browserSync = require('browser-sync');
var sass        = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var uncss = require('gulp-uncss');
var rename = require('gulp-rename');
var minifyCSS = require('gulp-minify-css');
var reload      = browserSync.reload;

var src = {
    scss: './scss/style.scss',
    css:  './css/',
    php: '../stctheme/**/*.php'
};

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync({
        proxy: "ns510932.ip-167-114-103.net/boxed2",
        host: "localhost",
        notify: true,
        port: 5004
    });

    gulp.watch(src.scss, ['sass']);
    gulp.watch(src.php).on('change', reload);
});

// Compile sass into CSS
gulp.task('sass', function() {
    return gulp.src(src.scss)
        .pipe(sass())
        .pipe(prefix('last 3 version'))
        //.pipe(uncss({
          // html: ["http:\/\/ns510932.ip-167-114-103.net/wordpress-dev","http:\/\/ns510932.ip-167-114-103.net/wordpress-dev\/","http:\/\/ns510932.ip-167-114-103.net/wordpress-dev\/hello-world\/"]
       // }))
        //.pipe(minifyCSS())
        .pipe(gulp.dest(src.css))
        .pipe(reload({stream: true}));
});

gulp.task('default', ['serve']);