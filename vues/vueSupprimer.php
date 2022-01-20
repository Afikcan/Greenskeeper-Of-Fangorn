
<h2>Supprimer Votre Parcelle de la Base de Données</h2>

<form method="post" action="#">	
	<input type="text" name="valeurLongtitude" id="valeurLongtitude" placeholder="Longtitude" required/>
	<input type="text" name="valeurLatitude" id="valeurLatitude" placeholder="Latitude" required/>
	<br/><br/>
	<input type="submit" name="boutonValider" value="Supprimer"/>
</form>

<article>
	<?php if(isset($message)) { ?>
		<p style="background-color: yellow;"><?= $message ?></p>
	<?php } ?>
</article>