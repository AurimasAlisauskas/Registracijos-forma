const gulp      = require('gulp');
const sass      = require('gulp-sass');
const cleanCss  = require('gulp-clean-css');
const concatCss = require('gulp-concat-css');
const rename    = require('gulp-rename');
const uglify    = require('gulp-uglify');
const babel     = require('gulp-babel');
const browserify = require('browserify');
const source    = require('vinyl-source-stream');
const buffer    = require('vinyl-buffer');
const del       = require('del');
const fs        = require('fs-extra');

function copyImages(done) {
    gulp.src([
        './node_modules/lightbox2/src/images/*'
    ])
    .pipe(gulp.dest('./images/'));
    done();''
}

function copyFiles(done) {
    gulp.src('./node_modules/@fortawesome/fontawesome-free/webfonts/*')
    .pipe(gulp.dest('./webfonts/'));
    done();
}

function styles(done) {
    gulp.src([
        './node_modules/bootstrap/scss/bootstrap.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/regular.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/solid.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/brands.scss',
        './node_modules/lightbox2/dist/css/lightbox.css',
        './src/scss/main.scss'
    ])
    .pipe(sass().on('error', sass.logError))
    .pipe(concatCss('styles.css', {'rebaseUrls': false}))
    .pipe(cleanCss())
    .pipe(rename({ basename: 'styles', suffix: '.min' }))
    .pipe(gulp.dest('./assets/'))
    done();
}

function es6common(done) {
    fs.ensureDirSync('./temp/');

    gulp.src([
        './src/js/*.js',
        './src/js/**/*.js'
    ])
    .pipe(babel())
    .pipe(gulp.dest('./temp/'));

    done();
}

function scripts(done) {
    browserify({
        entries: [
            './node_modules/lightbox2/dist/js/lightbox.js',
            './node_modules/bootstrap/js/dist/collapse.js',
            './node_modules/bootstrap/js/dist/dropdown.js',
            './temp/main.js'
        ]
    })
    .bundle()
    .pipe(source('scripts.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./assets/'));

    done();
}

function cleanTemp(done) {
    del([
        './temp/*'
    ]);
    done();
}

function watch(done) {
    gulp.watch('./src/scss/**/*.scss', gulp.series(styles));
    gulp.watch('./src/js/**/*.js', gulp.series(es6common, scripts, cleanTemp));
    done();
}

exports.copyImages = copyImages;

exports.copyFiles = copyFiles;

exports.styles = styles;

exports.es6common = es6common;
exports.scripts = scripts;

exports.cleanTemp = cleanTemp;

exports.watch = watch;

exports.default = gulp.series(es6common, gulp.parallel(styles, scripts), cleanTemp, watch);
