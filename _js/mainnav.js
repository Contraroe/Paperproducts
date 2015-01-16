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
		$("#picker").hover(
			function(){
			$(this).filter(':not(:animated)').animate({
				bottom:'-350px',
				'margin-left': '140px'
			},'slow');
			// This only fires if the row is not undergoing an animation when you mouseover it
		});
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




// TECHNICAL PART

	 $('.active_0').hide();

});