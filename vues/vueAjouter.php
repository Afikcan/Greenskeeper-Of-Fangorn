<form method="post" action="#">	
	<select name="champSec" id="idSec">
		<option value="Variete">Variete</option>
		<option value="Parcelle">Parcelle</option>
	</select> 
	<input id="button" type="submit" name="boutonValiderChose" value="Choisir"/>
</form>

<?php 
$connexion = getConnexionBD(); // connexion à la BD

if(isset($_POST['boutonValiderChose'])) 
{
	if($_POST['champSec'] == "Variete")
	{
		include('Add\variete.php');
	}
	
	if($_POST['champSec'] == "Parcelle")
	{
		include('Add\parcelle.php');
	}
}
else
{
	echo "<h1>Veuillez sélectionner votre choix avant de commencer à ajouter !</h1>";
}
?>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>








