$(document).ready(function() {

	$('.title_ani').fadeIn( "slow", function() {});
	$('#coverimg').fadeIn( "slow", function() {});

	$("#picker").fadeIn(
		function(){
		$(this).filter(':not(:animated)').animate({
			bottom:'-40px',
			'margin-left': '200px'
		},'slow');
		// This only fires if the row is not undergoing an animation when you mouseover it
	});

	$('.colltoggle').click(function() {
		$('.collnav').fadeIn( "slow", function() {});
		$('.colltoggle').addClass('active');
		$('.title_ani').fadeOut( "slow", function() {});
		$('#picker').filter(':not(:animated)').animate({
			bottom:'-300px',
			'margin-left': '140px'
		},'slow');
		$('#coverimg').fadeOut( "slow", function() {});
	});

	$('#collnav').click(function() {
		$('.colltoggle').removeClass('active');
		$('.collnav').fadeOut( "slow", function() {});
		$('#coverimg').fadeOut( "slow", function() {});

	});
	$('#picker').click(function() {
		$('#coverimg').fadeOut( "slow", function() {});

	});

	$('.collnav').mouseleave(function(){
		$(this).fadeOut( "slow", function() {});
		$('.colltoggle').removeClass('active');
		$('.title_ani').fadeIn( "slow", function() {});
		$('#coverimg').fadeIn( "slow", function() {});
	});

	$('.pos_0').remove();

	// $('#techtypecont li.pos_1:first').addClass('active');



// TECHNICAL PART

	 $('.active_0').hide();

});