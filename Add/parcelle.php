<!--
L'objectif général du dossier "add" est de stocker les formulaires que nous utiliserons lors de l'ajout de données à la base de données
 et de pouvoir les appeler facilement quand nous le voulons.
-->
<h2 class="title"><span>ENTER YOUR PARCELLE</span></h2>

<form method="post" action="#">
	<br/><br/>
	<input type="text" name="latitude" id="latitude" placeholder="Latitude" required />

	<input type="text" name="longtitude" id="longtitude" placeholder="Longtitude" required />

	<input type="text" name="longeur" id="longeur" placeholder="Longeur" required />

	<input type="text" name="largeur" id="largeur" placeholder="Largeur" required />

	<input type="text" name="nombreMinRang" id="nombreMinRang" placeholder="Nombre Min de Rangs" required />

    <input type="text" name="nombreMaxRang" id="nombreMaxRang" placeholder="Nombre Max de Rangs" required />

    <input type="text" name="PourcentageCultures" id="PourcentageCultures" placeholder="Pourcentage d'Indésirables" required />

    <input type="text" name="PourcentageIndesirables" id="PourcentageIndesirables" placeholder="Pourcentage de Cultures" required />
	<br/><br/>
	<input type="submit" name="boutonValiderParcelle" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>