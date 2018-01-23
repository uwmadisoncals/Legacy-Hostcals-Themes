/*

DIRECTORY STRUCTURE
===================

theme
 |
 |-stylesheets
    |
  |-css
  |  |
  |  |-main.css
  |
  |-sass
  |  |
  |  |-modules
  |  |-partials
  |  |-vendor
  |  |-__modules__.scss
  |  |-__partials__.scss
  |  |-__vendor__.scss
  |  |-main.scss


 */

module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      build: {
        src: ['js/scimedgrs_custom.js'],
        dest: 'js/min/master.min.js'
      },
      uglifyCSS:{
        src:['stylesheets/css/flexslider.css'],
        dest:'stylesheets/css/flexslider.min.css'
      }
    },
    cssmin:{
      css:{
        src:'stylesheets/css/flexslider.css',
        dest:'stylesheets/css/flexslider.min.css'
      }
    },
  /*sass: {                              // Task
    dist: {                            // Target
      options: {                       // Target options
        style: 'compressed'
      },
      files: [{
          expand:true,
          cwd:'stylesheets/sass/',
          src:['*.scss'],
          dest:'stylesheets/css',
          ext:'.css'                         // Dictionary of files
      }]
    }
  }, */

  /*concat: {
    options: {
      separator: ' ',
    },
    dist: {
      src: ['main-child.css', 'mobile-child.css'],
      dest: 'master-child.css',
    },
  },*/
  compass:{
    dist:{
      options:{
       //sassDir:'stylesheets/sass',
        //cssDir:'stylesheets/css'
        config:'config.rb'
      }
    }
  },
  watch: {
    scripts: {
      files: ['js/*.js'],
      tasks: ['uglify'],
      options: {
        livereload: true,
      },
    },
    css: {
      files: '**/*.scss',
      tasks: ['compass'],
    options: {
        livereload: true,
      },
      
    }
  },
  
  imagemin: {                          // Task
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'images/',                   // Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'dist/'                  // Destination path prefix
        }]
      }
    }
    
  });
  grunt.event.on('watch', function(action, filepath, target) {
  grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
});

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
 //grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  

  // Default task(s).
  grunt.registerTask('default', ['uglify']);
  //grunt.registerTask('default', ['sass']);
  grunt.registerTask('default', ['concat']);
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('default', ['imagemin']);
   grunt.registerTask('default', ['cssmin']);
  
 

};