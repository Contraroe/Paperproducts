$(document).ready(function(){
	$('#techtypecont li:first-child a').addClass('active');

	$('#techtypecont li a').click(function() {
      		$("#techtypecont li a").removeClass("active");
      		$(this).addClass("active");
  	  });

})