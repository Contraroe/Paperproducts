<section id="footer">

	<div id="contmap">
		<?php include "_includes/map.php" ?>
	</div>
	<div id="cont">

		<div id="fcont">
			<div id="contact" class="test">
				<h1><b>Lannoo</b> Drukkerij nv</h1>

				<p>Kasteelstraat&nbsp;97<br>
					B&nbsp;-&nbsp;8700&nbsp;Tielt<br>
					<br>
					<b>T</b>&nbsp;+32 51 42 43 11<br>
					<b>F</b>&nbsp;+32 51 40 70 70<br>

				</p>
			</div>
			<div id="formcont">
				<h1><b>Contact</b> us</h1><br>
				<form id="form" method="post" action="_php/mailform.php">
					<textarea name="message" id="message" rows="9" cols="60" required="Message"></textarea>
					<label for="naam" class="first">Name *</label><br>
					<input type="text" name="naam" id="naam" required="Name" placeholder=""/>   <br />
					<label for="adres">Adress *</label><br>
					<input type="text" name="adres" id="adres" placeholder="" required="Adress"/><br />
					<label for="email">E-mail *</label><br>
					<input type="email" placeholder="" pattern="[^ @]*@[^ @]*" name="email" id="email" required="E-mail"/><br />
					<input type="submit" name="send" value="Send" class="submit-button" onmouseover="this.className='btn btnsubmit'" onmouseout="this.className='submit-button'" />
					<input type="reset" name="clear" value="Clear" class="clear-button"  onmouseover="this.className='btn btnclear'" onmouseout="this.className='clear-button'" >
					<input id="check" type="text" name="url" value="" placeholder="leave empty">
				</form>

			</div>

		</div>

	</div>

</section>