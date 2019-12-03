const gulp = require('gulp');
    sass = require('gulp-sass');
    autoprefixer = require('gulp-autoprefixer');

gulp.task('sass',function(){
    return gulp.src('/scss/*.scss')
        .pipe(sass({
            outputStyle: 'expanded'
        }))
        .pipe(autoprefixer({
            versions: ['last 3 browsers']
        }))
        .pipe(gulp.dest('/css'));
});

gulp.task('default',function(){
    return gulp.watch('./scss/*.scss',gulp.series('sass'));
})

