$(document).ready(function() {
	$('.colltoggle').click(function() {
		$('.collnav').toggle(10);
		$('.colltoggle').addClass('active');
	});

	$('#collnav').click(function() {
		$('.colltoggle').removeClass('active');
		$('.collnav').toggle(10);
	});
});