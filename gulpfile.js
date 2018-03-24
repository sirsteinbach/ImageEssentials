var gulp = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    concatCSS = require('gulp-concat-css'),
    connect = require('gulp-connect'),
    uglifyJS = require('gulp-uglify'),
    uglifyCSS = require('gulp-uglifycss'),
    rename = require('gulp-rename'),
    purgeCSS = require('gulp-css-purge'),
    replace = require('gulp-replace'),
    htmlmin = require('gulp-htmlmin');

var css_Zurb = ['_DEV/_css/f5_parts/*.css'],
    css_Extra = ['_DEV/_css/f5_extra/*.css'],
    js_Zurb = ['_DEV/_js/f5_parts/*.js'],
    js_Extra = ['_DEV/_js/f5_extra/*.js'],
    images = ['_DEV/_img/**/*.{jpg,png,gif,svg,ico}'],
    phpSources = ['_DEV/**/*.php'];

gulp.task('css',function(){
  gulp.src(css_Zurb)
  .pipe(sass())
  .pipe(concatCSS('zurbed.css'))
  .pipe(gulp.dest('_DEV/_css/f5'))
  .pipe(purgeCSS({trim:true,shorten:true,verbose:true}))
  .pipe(uglifyCSS())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('_PRO/_css/f5'))
  gulp.src(css_Extra)
  .pipe(gulp.dest('_DEV/_css/f5'))
  .pipe(purgeCSS({trim:true,shorten:true,verbose:true}))
  .pipe(uglifyCSS())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('_PRO/_css/f5'))
});

gulp.task('js',function(){
  gulp.src(js_Zurb)
  .pipe(concat('zurbed.js'))
  .pipe(gulp.dest('_DEV/_js/f5'))
  .pipe(uglifyJS())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('_PRO/_js/f5'))
  gulp.src(js_Extra)
  .pipe(gulp.dest('_DEV/_js/f5'))
  .pipe(uglifyJS())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('_PRO/_js/f5'))
});

gulp.task('php', function(){
  gulp.src(phpSources)
  .pipe(replace('.css','.min.css'))
  .pipe(replace('.js','.min.js'))
  .pipe(htmlmin({caseSensitive:true,collapseWhitespace:true,removeComments:true,removeTagWhitespace:false}))
  //Restore original Jquery.min(-.min)
  .pipe(replace('.min.min', '.min'))
  //Restore original Google Analytics(-.min)
    //.pipe(replace('analytics.min.js','analytics.js'))
  .pipe(gulp.dest('_PRO/'))
});

gulp.task('connect',function() {
  connect.server({port:8888,root:'_DEV',livereload:true});
});

gulp.task('img',function(){
  gulp.src(images)
  .pipe(gulp.dest('_PRO/_img/'))
})

gulp.task('watch',function(){
  gulp.watch(js_Zurb,['js']);
  gulp.watch(css_Zurb,['css']);
  gulp.watch(images,['img']);
  gulp.watch(phpSources,['php']);
});

gulp.task('default',['php','js','css','img','connect','watch']);