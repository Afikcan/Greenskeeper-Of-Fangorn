<!--
Dans cette partie, nous renvoyons le rang souhaité en utilisant les valeurs Latitude Longitude obtenues par la saisie de l'utilisateur.
-->

<?php 
$connexion = getConnexionBD(); // connexion à la BD

if(isset($_POST['boutonValider'])) {

	$valeurLatitude = $_POST["valeurLatitude"];
	$valeurLongtitude = $_POST["valeurLongtitude"];
	$parcelles = searchParcelle($connexion,$valeurLatitude,$valeurLongtitude);
	$rangs = array();
	if(count($parcelles) == 0)
	{
		$message = "Aucun résultat pour cette valeur !";
	}
	else
	{
		$rangs = searchRangbyLoc($connexion,$valeurLatitude,$valeurLongtitude);
	}
}
?>
