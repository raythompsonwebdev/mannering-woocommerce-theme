///tabs
jQuery(document).ready(function($){

	$('.tab:first').show()
	$('#tabs li a:first').addClass('tab-active');


	$("#tabs li a").hover(
  	function () {
    $(this).animate({left:20}, 300, function (){
    	$(this).animate({left:0}, 50);
    });
  },
  function () {
  }
);

	$('ul#tabs li a').bind('click',function () {
		var linkIndex = $('ul#tabs li a').index(this);
		$('ul#tabs li a').removeClass('tab-active');
		$(".tab:visible").hide();
		$(".tab:eq("+linkIndex+")").show();
		$(this).addClass('tab-active');
		return false;
	});

  });