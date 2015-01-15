<?php


// include '_php/error.php';

// FACEBOOK
$facebook = json_decode(file_get_contents( 'https://graph.facebook.com/LannooPrinters'), true);

// TWITTER
$twitter = json_decode(file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=Tw_Lannoo'), true);

// LINKEDIN
// $linked = json_decode(file_get_contents('https://www.linkedin.com/company/drukkerij-lannoo-nv/followers'), true);


?>

<div id="social_cont">
	<ul>
		<li class="twitter"><a id="social" class="popup" href="http://twitter.com/tw_lannoo" ></a></li>
		<li class="twitter2 count ani">
			<?php echo $twitter[0]['followers_count']; ?>
		</li>
		<li class="facebook"><a  id="social"  class="popup" href="http://www.facebook.com/LannooPrinters" ></a></li>
		<li class="facebook2 count ani">
			<?php echo $facebook['likes']; ?>
		</li>
		<li class="linked"><a id="social" class="popup" href="http://www.linkedin.com/LannooPrinters" ></a></li>
	<!-- 	<li class="linked2 count ani">
			<?php // echo $linked; ?>
		</li> -->
		<li class="lannoo"></li>
		<li id="diaries" class="lannoo2 count"><a id="social" href="http://www.lannoo-print.be">Lannoo printers</a></li>
		<li id="digi" class="lannoo2 count"><a id="social" href="http://www.lannoocom.be" target="_blank">Digital printing</a></li>
		<li id="subscribe" class="lannoo2 count news" >Subscribe</li>
	</ul>
</div>

<div id="subscribeform" class="hidden">
	<form method="post" action="https://lannoo.email-provider.nl/subscribe/post/index.php" accept-charset="utf-8">
		<h1>Subscribe to our <span>Newsletter</span></h1>
		<input type="hidden" name="next" value="www.lannooprint.be" />
		<input type="hidden" name="a" value="oqtxnlapvd" />
		<input type="hidden" name="l" value="bkfoubyhvf" />
		<label for="id-T1ahS9aPmv">E-mail&nbsp;*</label><input type="text" name="T1ahS9aPmv" id="id-T1ahS9aPmv"><br>
		<label for="id-gpZ9jeAQFy">Name&nbsp;*</label><input type="text" name="gpZ9jeAQFy" id="id-gpZ9jeAQFy"><br>
		<label for="id-BgVGtnfgu1">Last Name&nbsp;*</label><input type="text" name="BgVGtnfgu1" id="id-BgVGtnfgu1"><br>
		<label for="id-vwW8hScVfJ">Company&nbsp;*</label><input type="text" name="vwW8hScVfJ" id="id-vwW8hScVfJ"><br>
		<label for="id-R4cpL1yiHO">Language&nbsp;*</label><select name="R4cpL1yiHO" id="id-R4cpL1yiHO"><option value="0">Prefered language:</option><option value="1">English</option><option value="2">French</option><option value="3">Dutch</option></select><br>
		<input type="submit" value="Subscribe" />
		<div id="close" class="toe">X</div>
	</form>
</div>

<script type="text/javascript">
	$('.ani').each(function () {
		var $this = $(this);
		jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
			duration: 1000,
			easing: 'swing',
			step: function () {
				$this.text(Math.ceil(this.Counter));
			}
		});
	});
</script>

<!-- Subscription FORM nav Functions -->
<script type="text/javascript">
	$('.hidden').hide();

	// open form
	$('.news').bind('click', function(){
		$('.news').css('background-color','rgba(0, 200, 200,1)');
		$('.hidden').fadeIn(700);
	});

	$('.toe').bind('click', function(){
		$('.news').css('background-color','rgba(0,0,0,0.8)');
		$('.hidden').fadeOut(700);
	});

</script>

<!-- POPUP SOCIAL WEBSITES -->
<script type="text/javascript">
	$('.popup').click(function(event) {
		var width  = 575,
			height = 400,
			left   = ($(window).width()  - width)  / 2,
			top    = ($(window).height() - height) / 2,
			url    = this.href,
			opts   = 'status=1' +
					 ',width='  + width  +
					 ',height=' + height +
					 ',top='    + top    +
					 ',left='   + left;
		window.open(url, 'social', opts);
		return false;
		});
</script>

<!-- HIDE EMPTY LI -->
<script type="text/javascript">
	$('li.count').filter(function(){
		return $.trim($(this).html()) == '';
	}).hide()
</script>



<!-- LANNOO KOPPELINGEN -->
<script src="_js/diaries.js" type="text/javascript"></script>
