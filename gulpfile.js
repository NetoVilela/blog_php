// var gulp = require('gulp');
// var cssmin = require('gulp-cssmin');
//
// gulp.task('build-cssmin', function(){
// 	gulp.src('app/webroot/css/**/*').pipe(cssmin()).pipe(gulp.dest('app/webroot/css'));
// });
var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');

gulp.task('less', function () {
	return gulp.src('./app/webroot/css/**/*.less')
		.pipe(less())
		.pipe(gulp.dest('./app/webroot/css/'));
});

