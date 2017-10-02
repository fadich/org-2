'use strict';

let gulp = require('gulp'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat');

let path = {
    build: {
        js: 'public/assets/js/',
        style: 'public/assets/style/',
    },
    src: {
        js: 'resources/assets/js/**/*.js',
        style: 'resources/assets/style/main.scss',
    },
    watch: {
        js: 'resources/assets/js/**/*.js',
        style: 'resources/assets/style/**/*.scss',
    },
};

gulp.task('js:build', function () {
    gulp.src(path.src.js)
        .pipe(concat('main.js'))
        // .pipe(rigger())
        // .pipe(sourcemaps.init())
        // .pipe(uglify())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js));
        // .pipe(reload({stream: true}));
});

gulp.task('style:build', function () {
    gulp.src(path.src.style)
        // .pipe(sourcemaps.init())
        .pipe(sass())
        // .pipe(prefixer({
        //     browsers: ['last 4 versions'],
        //     cascade: false
        // }))
        .pipe(gulp.dest(path.build.style));
});

gulp.task('build', [
    'js:build',
    'style:build',
]);

gulp.task('watch', function(){
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
});

gulp.task('default', ['build', 'watch']);
