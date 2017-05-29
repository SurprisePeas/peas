var gulp = require('gulp');

gulp.task('default', function () {
  gulp.watch('resources/assets/js/**/*.js', function (event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
});