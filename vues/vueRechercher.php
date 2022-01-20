<h2>Recherche Votre Parcelle dans la Base</h2>

<form method="post" action="#">	
	<input type="text" name="valeurLongtitude" id="valeurLongtitude" placeholder="Longtitude" required/>
	<input type="text" name="valeurLatitude" id="valeurLatitude" placeholder="Latitude" required/>
	<br/><br/>
	<input type="submit" name="boutonValider" value="Rechercher"/>
</form>

<article>
	<?php if(isset($message)) { ?>
		<p style="background-color: yellow;"><?= $message ?></p>
	<?php } ?>
	<?php if(isset($parcelles)) { ?>	
		<ul>
		<?php 
			
			include('listes\parcelle_selected.php');

			include('listes\rangs.php');
		?>
		</ul>
	<?php } ?>
</article>


