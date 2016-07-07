module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      development: {
        options: {
          paths: ['css/']
        },
        files: {
          'css/default.css': 'css/default.less'
        }
      }
    },
    cssmin: {
     target: {
        files: {
          'css/default.min.css': 'css/default.css'
        }
      }
    },
     uglify: {
        my_target: {
          files: {
            'js/mod_bannerBoostrapjoomla.min.js': 'js/mod_bannerBoostrapjoomla.js'
          }
        }
      },
    compress: {
      main: {
        options: {
          archive: 'mod_bannerBoostrapjoomla.zip'
        },
        files: [
        { src: ['css/*.css']}, 
          {src: ['js/*.js']},
          {src: ['tmpl/*.php']},
          {src: ['*.xml']},  
          {src: ['*.php']}
        ]
      }
    },
    concat: {
      basic: {
        src: ['js/jquery.mobile.custom.min.js','js/mod_bannerBoostrapjoomla.min.js'],
        dest: 'js/default.min.js',
      }
    }
     
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compress');


  // Default task(s).
  grunt.registerTask('default', ['less', 'uglify', 'cssmin', 'concat','compress']);

};