/* eslint-disable */
/* import necessary npm packages */
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoPrefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    livereload      = require('gulp-livereload'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    gulpfilter = require('gulp-filter'),
    rtlcss = require('gulp-rtlcss');

/* scss to css compilation */
function sassCompiler(src, dest) {
    return function (done) {
        gulp.src(src)
            .pipe(sourcemaps.init())
            .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
            .pipe(autoPrefixer('last 10 versions'))
            .pipe(sourcemaps.write('maps'))
            .pipe(livereload())
            .pipe(gulp.dest(dest));
        done();
    }
}

// bootstrap sass compiler
gulp.task('scss:bs', sassCompiler('./assets/vendor_assets/css/bootstrap/bootstrap.scss', './assets/vendors/bootstrap/css/'));

//gulp.task('scss:colors', sassCompiler('./src/sass/element/colors.scss', './src/sass/'));

// themes sass compiler
gulp.task('scss:theme', sassCompiler('./src/sass/style.scss', './assets/css/'));

gulp.task('scripts', function (done) {
    return gulp.src(config.scripts)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('./assets/js/'))
        .pipe(uglify())
        .pipe(rename({
            extname: '.min.js'
        }))
        .pipe(livereload())
        .pipe(gulp.dest('./assets/js/'));
    done();
});

// default gulp task
gulp.task('default', gulp.series('scss:theme', function () {
    livereload.listen(35729);
    gulp.watch('**/*.php').on('change', function(file) {
        livereload.changed(file.path);
    });
    gulp.watch('./src/sass/**/*', gulp.series('scss:theme'));
    gulp.watch('./assets/vendor_assets/css/bootstrap/*.scss', gulp.series('scss:bs'));
    gulp.watch('./src/js/main.js');
}));

//rtl css generator
gulp.task('rtl', function (done) {
    var bootstrap = gulpfilter('**/bootstrap.css', {restore: true}),
        style = gulpfilter('style.css', {restore: true});

    gulp.src(['vendor_assets/css/bootstrap/bootstrap.css', 'style.css'])
        .pipe(rtlcss({
            'stringMap': [
                {
                    'name': 'left-right',
                    'priority': 100,
                    'search': ['left', 'Left', 'LEFT'],
                    'replace': ['right', 'Right', 'RIGHT'],
                    'options': {
                        'scope': '*',
                        'ignoreCase': false
                    }
                },
                {
                    'name': 'ltr-rtl',
                    'priority': 100,
                    'search': ['ltr', 'Ltr', 'LTR'],
                    'replace': ['rtl', 'Rtl', 'RTL'],
                    'options': {
                        'scope': '*',
                        'ignoreCase': false
                    }
                }
            ]
        }))
        .pipe(bootstrap)
        .pipe(rename({suffix: '-rtl', extname: '.css'}))
        .pipe(gulp.dest('./vendor_assets/css/bootstrap/'))
        .pipe(bootstrap.restore)
        .pipe(style)
        .pipe(rename({suffix: '-rtl', extname: '.css'}))
        .pipe(gulp.dest('./'));
    done();
});
