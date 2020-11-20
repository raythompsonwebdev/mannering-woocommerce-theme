module.exports = function(grunt){


    grunt.initConfig({

            pkg: grunt.file.readJSON('package.json'),
		
		/**
         * Concat
         */
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['js/**/*.js'],
                dest: 'dist/<%= pkg.name %>.js'
            }
        },
        
        /**
         * Uglify
         */
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    'dist/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
                }
            }
        },

            /**
             * sass Task
             */
            sass:{

                dev:{
                    options:{
                            style:"expanded"
                    },

                    files:{
                            'style.css':'assets/css/style.scss',
                            'ie.css':'assets/css/ie.scss',
                            'woocommerce/woocommerce.css':'assets/css/woocommerce.scss',
                            'woocommerce/style-rtl.css':'assets/css/style-rtl.scss',
                                 
                            
                            /*where file goes-----/where file from*/
                    }
                },

                    dist:{
                        options:{
                                style:"compressed"
                        },
                        files:{
                            'assets/css/minified/style-min.css':'assets/css/style.scss',
                            'assets/css/minified/ie-min.css':'assets/css/ie.scss',
                            'assets/css/minified/woocommerce-min.css':'assets/css/woocommerce.scss',
                            'assets/css/minified/style-rtl-min.css':'assets/css/style-rtl.scss',
                                               
                            /*where file goes-----/where file from*/
                        }
                    }
                },
		           

            watch:{

                css:{
                        files:'assets/css/**/*.scss',
                        tasks:['sass']
                }
            }


    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
	   
   grunt.registerTask('default', ['concat', 'uglify']);
   grunt.registerTask('default', ['sass', 'watch']);
	
	


}

/* add bag (!) to wordpress css theme top-title so that it shows on minified file*/