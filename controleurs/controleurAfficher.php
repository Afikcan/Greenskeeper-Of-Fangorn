
<!--
Dans cette partie nos informations stockent toutes nos informations pour les afficher
-->
<?php 
$message = "";

// recupération des séries
$donneesfournies = getInstances($connexion, "donneesfournies");
if($donneesfournies == null || count($donneesfournies) == 0) {
	$message .= "Aucune donne n'a été trouvée dans la base de données !";
}

$variations = getInstances($connexion, "variations");
if($variations == null || count($variations) == 0) {
	$message .= "Aucune variete n'a été trouvée dans la base de données !";
}

$plantes = getInstances($connexion, "plantes");
if($variations == null || count($variations) == 0) {
	$message .= "Aucune plante n'a été trouvée dans la base de données !";
}


$types = getInstances($connexion, "types");
if($types == null || count($types) == 0) {
	$message .= "Aucune type n'a été trouvée dans la base de données !";
}

$parcelles = getInstances($connexion, "parcelles");
if($parcelles == null || count($parcelles) == 0) {
	$message .= "Aucune parcelle n'a été trouvée dans la base de données !";
}

$rangs = getInstances($connexion, "rangs");
if($rangs == null || count($rangs) == 0) {
	$message .= "Aucune rang n'a été trouvée dans la base de données !";
}

//$connexion = getConnexionBD(); // connexion à la BD

?>
