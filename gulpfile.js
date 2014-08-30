// List of modules used.
var gulp    = require('gulp'),
    bump    = require('gulp-bump'),     // Generates new version.
    argv    = require('yargs')
        .default('release', 'patch')
        .argv,                          // CLI parser.
    fs      = require('fs'),            // Used by bump.
    semver  = require('semver'),        // Used by bump.
    git     = require('gulp-git'),      // Git wrapper.
    jshint  = require('gulp-jshint'),   // Lints JS.
    phplint = require('phplint'),       // Lints PHP.
    replace = require('gulp-replace');  // Text replacer.

// Parses the package.json file. We use this because its values
// change during execution.
var getPackageJSON = function() {
  return JSON.parse(fs.readFileSync('./package.json', 'utf8'));
};

// Lint associated PHP files.
gulp.task('phplint', function() {
  return phplint(['*.php', './db/**/*.php', './lang/**/*.php']);
});

// Lint associated Javascripts.
gulp.task('scripts', function() {
  gulp.src('./gulpfile.js')
  .pipe(jshint())
  .pipe(jshint.reporter('default'))
  .pipe(gulp.dest('./'));
  gulp.src('./yui/roster/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('default'))
  .pipe(gulp.dest('./yui/roster'));
});

// Integration task. Bumps version and commits.
// Tagging is separate.
gulp.task('integrate', function() {
  var pkg = getPackageJSON();
  var newversion = semver.inc(pkg.version, argv.release);

  gulp.src('./package.json')
  .pipe(bump({version: newversion}))
  .pipe(gulp.dest('./'));

  gulp.src(['./version.php'])
  .pipe(replace(pkg.version, newversion))
  .pipe(gulp.dest('./'));

  gulp.src(['package.json','version.php'])
  .pipe(git.commit(pkg.description + ' v' + newversion, {cwd: './'}));
});

// Tags. Run this after integrating.
gulp.task('tag', function() {
  var pkg = getPackageJSON();
  git.tag('v'+pkg.version, pkg.description + ' v' + pkg.version, function(err) {
  });
});
