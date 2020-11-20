
 // Hide/show toggle button on scroll
 jQuery(document).ready(function($){
     
    var position, direction, previous;
  
       $(window).scroll(function(){
           
          if( $(this).scrollTop() >= position ){
               direction = 'down';
               if(direction !== previous){
                   $('header button.menu-toggle').addClass('hide');
                   previous = direction;
               }
           } else {
               direction = 'up';
               if(direction !== previous){
                   $('header button.menu-toggle').removeClass('hide');
                   previous = direction;
               }
           }
           position = $(this).scrollTop();
       });
  
       $('header button.menu-toggle').on('click', function(event){
      
          event.preventDefault();
      
          // create menu variables
          var slideoutMenu = $('nav ');
          var slideoutMenuWidth = $('nav ').width();
      
          // toggle open class
          slideoutMenu.toggleClass("open");
      
          // slide menu
          if (slideoutMenu.hasClass("open")) {
              slideoutMenu.animate({
                  left: "0px"
              });	
          } else {
              slideoutMenu.animate({
                  left: -slideoutMenuWidth
              }, 500);	
          }
                              
           
      
      });
       
  
  
    });
