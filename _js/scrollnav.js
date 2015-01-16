$(document).ready(function() {
	$('#scrollnav').click(function() {
		var offset = 0; //Offset of 20px

		$('html, body').animate({
			scrollTop: $("#techinfo").offset().top - offset
		}, 1000);
	});
});