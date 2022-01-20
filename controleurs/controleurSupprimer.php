<?php 
$connexion = getConnexionBD(); // connexion à la BD

if(isset($_POST['boutonValider'])) {

	$valeurLatitude = $_POST["valeurLatitude"];
	$valeurLongtitude = $_POST["valeurLongtitude"];
	$verification = deleteParcelleByLoc($connexion, $valeurLatitude, $valeurLongtitude);
	if($verification == 1)
	{
		$message = "Parcelle supprimé avec succès!!";
	}
    else
    {
        $message = "Une erreur s'est produite";
    }
}
?>