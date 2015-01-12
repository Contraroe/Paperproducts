<section>
	<div id="cont">
		<h1><?php ActiveType ($type_id); ?> Finishing options</h1>
		<div id="navtype"><ul><li></li><li></li><li></li></ul></div>
	</div>
	<div id="cont">
		
		<?php 
			GetTech ();
		?>
	</div>
	<div id="cont">
		<?php 
			TechDetOne ($type_id);
			TechDetTwo ($type_id);
		?>
	</div>
</section>