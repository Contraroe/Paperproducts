<section id="design">
	<div id="cont" class="colltitle">
		<?php include "_functions/variables.php"; ?>
		<h1><?php ActiveColl ($coll_id);?><br> <span>Collection <br>versions</span></h1>
		<?php 	GetDesign ($coll_id, $coll_sub_id); ?>
		<div id='scrollnav' class='scrolldown_design'></div>
	</div>
</section>