<!--
En fonction de la valeur de nos boutons qui fonctionne, nous ajoutons les informations que nous obtenons de nos formulaires 
à notre base de données.
-->

<?php 
if(isset($_POST['boutonValiderVariete']))
{ // formulaire soumis

	$nomEspece = mysqli_real_escape_string($connexion, $_POST['nom_espece']); // recuperation de la valeur saisie
	$verificationVariete = getVarieteByName($connexion, $nomEspece);
	if($verificationVariete == FALSE || count($verificationVariete) == 0)
	{ // pas de série avec ce nom, insertion
		$commentaire = $_POST['commentaire'];
		$annee_enregistrement = $_POST['annee_enregistrement'];
		$code_precocite = $_POST['code_precocite'];
		$label_precocite = $_POST['label_precocite'];
		$nomEspeceLatin = isset($_POST['champNomlatin']) ? $_POST['champNomlatin'] : NULL;


		$insertion = insertVariete($connexion, $nomEspece, $commentaire, $annee_enregistrement, $code_precocite, $label_precocite, $nomEspeceLatin);
		if($insertion == TRUE)
		{
			$message = "La varieté $nomEspece a bien été ajoutée !";
		}
		else
		{
			$message = "Erreur lors de l'insertion de la varieté $nomEspece.";
		}
	}
	else
	{
		$message = "Une varieté existe déjà avec ce nom ($nomEspece).";
	}
}

if(isset($_POST['boutonValiderParcelle']))
{
	$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : NULL;
	$longtitude = isset($_POST['longtitude']) ? $_POST['longtitude'] : NULL;

	$verificationParcelle = getParcelleByLocation($connexion, $latitude, $longtitude);

	if($verificationParcelle == FALSE || count($verificationParcelle) == 0)
	{
		$longeur = isset($_POST['longeur']) ? $_POST['longeur'] : NULL;
		$largeur = isset($_POST['largeur']) ? $_POST['largeur'] : NULL;

		$nombreMinRang = isset($_POST['nombreMinRang']) ? $_POST['nombreMinRang'] : NULL;
		$nombreMaxRang = isset($_POST['nombreMaxRang']) ? $_POST['nombreMaxRang'] : NULL;
		$pourcentageCultures = isset($_POST['PourcentageCultures']) ? $_POST['PourcentageCultures'] : NULL;
		$pourcentageIndesirables = isset($_POST['PourcentageIndesirables']) ? $_POST['PourcentageIndesirables'] : NULL;

		
		$numRangs = defineNumOfRang($connexion,intval($nombreMaxRang),intval($nombreMinRang));
		selectRangIndesirables($connexion,$pourcentageIndesirables,$pourcentageCultures,$numRangs,$latitude,$longtitude);

		$insertion = insertParcelle($connexion, $latitude,  $longtitude, $longeur, $largeur, $nombreMinRang,$nombreMaxRang,$pourcentageCultures,$pourcentageIndesirables);
		if($insertion == TRUE)
		{
			$message = "La parcelle qui est localise a $latitude , $longtitude a bien été ajoutée !";
		}
		else
		{
			$message = "Erreur lors de l'insertion de la parcelle.";
		}
	}
	else
	{
		$message = "Une parcelle existe déjà avec ce location ($latitude,$longtitude).";
	}

}

?>
