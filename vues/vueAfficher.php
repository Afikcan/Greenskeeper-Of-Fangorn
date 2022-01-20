<head>
<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
</head>

<div >
	<?php if(isset($message)) { ?>
		<p style="background-color: yellow;"><?= $message ?></p>
	<?php } ?>

	<form method="post" action="#">	
		<select id="select" name="champRech" id="idChamp">
			<option value="types">Types</option>
			<option value="plantes">Plantes</option>
			<option value="variations">Variétés</option>
			<option value="parcelles">Parcelles</option>
			<option value="rangs">Rangs</option>
		</select>
		<input id="button" type="submit" name="boutonValider" value="Lister"/>
	</form>
</div>


<?php 
$connexion = getConnexionBD(); // connexion à la BD

if(isset($_POST['boutonValider'])) 
{
	if($_POST['champRech'] == "variations")
	{
		include('listes\variations.php');
	}
	
	if($_POST['champRech'] == "types")
	{
		include('listes\types.php');
	}

	if($_POST['champRech'] == "plantes")
	{
		include('listes\plantes.php');
	}

	if($_POST['champRech'] == "parcelles")
	{
		include('listes\parcelles.php');
	}
	if($_POST['champRech'] == "rangs")
	{
		include('listes\rangs.php');
	}
}
else
{
	echo "<h1>Veuillez sélectionner la table que vous souhaitez lister!</h1>";
}
?>


