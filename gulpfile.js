var config = {
  theme_root: "public_html/wp-content/themes/reason-test/static/",
};

var gulp = require("gulp"),
  plumber = require("gulp-plumber"),
  rename = require("gulp-rename"),
  autoprefixer = require("gulp-autoprefixer"),
  concat = require("gulp-concat"),
  order = require("gulp-order"),
  notify = require("gulp-notify"),
  uglify = require("gulp-uglify"),
  sass = require("gulp-sass")(require("sass")),
  livereload = require("gulp-livereload");

gulp.task("styles", function () {
  return gulp
    .src([config.theme_root + "source/scss/**/styles.scss"])
    .pipe(
      plumber({
        errorHandler: function (error) {
          console.log(error.message);
          this.emit("end");
        },
      })
    )
    .pipe(
      sass({
        outputStyle: "compressed",
        errLogToConsole: true,
        includePaths: [config.theme_root + "source/scss"],
      })
    )
    .pipe(autoprefixer("last 2 versions"))
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(config.theme_root + "min/css/"))
    .pipe(livereload({ start: true }))
    .pipe(notify({ message: "Styles task complete" }));
});

gulp.task("scripts", function () {
  return gulp
    .src([config.theme_root + "source/js/*.js"])
    .pipe(
      plumber({
        errorHandler: function (error) {
          console.log(error.message);
          this.emit("end");
        },
      })
    )
    .pipe(order(["core.js", "core.*.js"]))
    .pipe(concat("core.js"))
    .pipe(rename({ suffix: ".min" }))
    .pipe(uglify())
    .pipe(gulp.dest(config.theme_root + "min/js/"))
    .pipe(notify({ message: "Scripts task complete" }));
});

gulp.task("third-party", function () {
  return gulp
    .src([config.theme_root + "source/js/third-party/*.js"])
    .pipe(
      plumber({
        errorHandler: function (error) {
          console.log(error.message);
          this.emit("end");
        },
      })
    )
    .pipe(concat("third-party.js"))
    .pipe(rename({ suffix: ".min" }))
    .pipe(uglify())
    .pipe(gulp.dest(config.theme_root + "min/js/"))
    .pipe(notify({ message: "Third party scripts task complete" }));
});

gulp.task("watch", function () {
  livereload.listen({
    port: "35729",
  });
  gulp.watch(
    config.theme_root + "source/scss/**/*.scss",
    gulp.series("styles")
  );
  gulp.watch(config.theme_root + "source/js/*.js", gulp.series("scripts"));
  gulp.watch(
    config.theme_root + "source/js/third-party/*.js",
    gulp.series("third-party")
  );
});

gulp.task("default", gulp.series(["watch"]));
