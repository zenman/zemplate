module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['sass/stars/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'expanded'
        },
        files: {
          'style.css': 'sass/zemplate.scss'
        }
      }
    },

    watch: {
      sass: {
        files: 'sass/**/*.scss',
        tasks: ['sass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','watch']);
}