<section id="techinfo">
	<div id="cont">
		<h1><?php ActiveColl ($coll_id); ?> <span>Finishing options<span></h1>
	</div>
	<div id="cont" class="techmainnav">
		<?php
			GetTech ();
		?>
	</div>
	<div id="cont" class="info">
		<?php
			TechDetOne ($type_id);
			TechDetTwo ($type_id);
		?>
	</div>
</section>