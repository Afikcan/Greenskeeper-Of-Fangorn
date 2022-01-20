<?php 

// connexion à la BD, retourne un lien de connexion
function getConnexionBD()
{
	$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
	if (mysqli_connect_errno())
	{
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion)
{
	mysqli_close($connexion);
}

// nombre d'instances d'une table $nomTable
function countInstances($connexion, $nomTable)
{
	$requete = "SELECT COUNT(*) AS nb FROM p2112205.$nomTable";
	$res = mysqli_query($connexion, $requete);
	if($res != FALSE) {
		$row = mysqli_fetch_assoc($res);
		return $row['nb'];
	}
	return -1;  // valeur négative si erreur de requête (ex, $nomTable contient une valeur qui n'est pas une table)
}

// retourne les instances d'une table $nomTable
function getInstances($connexion, $nomTable)
{
	$requete = "SELECT * FROM p2112205.$nomTable";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

//pour obtenir la variete spécifique par le nom entré
function getVarieteByName($connexion, $nomeVariete)
{
	$nomeVariete = mysqli_real_escape_string($connexion, $nomeVariete); // au cas où $nomSerie provient d'un formulaire
	$requete = "SELECT * FROM p2112205.variations WHERE nomEspece = '". $nomeVariete . "'";
	$res = mysqli_query($connexion, $requete);
	$plantes = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $plantes;
}

//pour obtenir la parcelle spécifique par le coordonner entré
function getParcelleByLocation($connexion, $latitude, $longtitude)
{
	$latitude = mysqli_real_escape_string($connexion, $latitude); // au cas où $nomSerie provient d'un formulaire
	$longtitude = mysqli_real_escape_string($connexion, $longtitude);

	$requete = "SELECT * FROM p2112205.parcelles WHERE latitude = '". $latitude . "' AND longtitude = '". $longtitude . "'";
	$res = mysqli_query($connexion, $requete);
	$plantes = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $plantes;
}

//pour obtenir la parcelle spécifique par le coordonner entré, pour les valeur int
function searchParcelle($connexion, $latitude, $longtitude)
{
	$latitude = intval($latitude);
	$longtitude = intval($longtitude);

	$requete = "SELECT * FROM p2112205.parcelles WHERE longtitude = $longtitude  AND latitude = $latitude ;";
	$result = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $instances;
}

//pour ajouter la variété à la base de données
function insertVariete($connexion, $nomEspece,  $commentaire, $annee_enregistrement, $code_precocite, $label_precocite, $nomEspeceLatin)
{

	$nomEspece = mysqli_real_escape_string($connexion, $nomEspece); // au cas où $nomSerie provient d'un formulaire
	$requete = "INSERT INTO p2112205.variations (nomEspece,commentaire,anneeEnregistrement,codePrecocite,labelPrecocite,nomEspeceLatin) 
	VALUES ('$nomEspece', '$commentaire', '$annee_enregistrement', '$code_precocite', '$label_precocite' , '$nomEspeceLatin');";
	$res = mysqli_query($connexion, $requete);

	return $res;
}

//pour ajouter la parcelle à la base de données
function insertParcelle($connexion, $latitude,  $longtitude, $longeur, $largeur, $nombreMinRang,$nombreMaxRang,$pourcentageCultures,$pourcentageIndesirables)
{	
	if($pourcentageCultures != NULL && $pourcentageIndesirables != NULL){
		$pourcentageCultures = intval($pourcentageCultures);
		$pourcentageIndesirables = intval($pourcentageIndesirables);

		if(($pourcentageCultures + $pourcentageIndesirables) > 100){
			echo "<h4>Error de over parcelles</h4>";
			return FALSE;
		} 
	}

	$requete = "INSERT INTO p2112205.parcelles (latitude,longtitude,longeur,largeur,nombreMinRang,nombreMaxRang,pourcentageIndesirables,pourcentageCultures) 
	VALUES ('$latitude',  '$longtitude', '$longeur ', '$largeur ', '$nombreMinRang ', '$nombreMaxRang ', '$pourcentageIndesirables ', '$pourcentageCultures ');";
	$res = mysqli_query($connexion, $requete);

	return $res;
}

//pour trouver le nombre de rangs parcelle a
function defineNumOfRang($connexion,$nombreMaxRang,$nombreMinRang)
{
	if($nombreMaxRang == $nombreMinRang)
	{
		return $nombreMaxRang;
	}
	else
	{
		return rand($nombreMinRang,$nombreMaxRang);
	}
}

//pour ajouter la rang à la base de données
function insertRangs($connexion,$latitude,$longtitude,$noms)
{
	$tempNum = 1;
	foreach($noms as $nom)
	{
		$tmpNom = $nom['nom'];

		$requete = "INSERT INTO p2112205.rangs (ID,nom,latitude,longtitude) VALUES ('$tempNum','$tmpNom' ,'$latitude','$longtitude');";
		$res = mysqli_query($connexion, $requete);
		$tempNum +=1;
	}
}

//pour ajouter la rang à la base de données. Dans cette section, nous déterminons les rangs au hasard et les ajoutons, 
//en veillant à ce que la somme des valeurs saisies en pourcentage ne dépasse pas 100.
function selectRangIndesirables($connexion,$pourcentageIndesirables,$pourcentageCultures,$numRangs,$latitude,$longtitude)
{
	if(intval($pourcentageIndesirables) > intval($pourcentageCultures))
	{
		$numCultures = ceil((intval($pourcentageCultures)*$numRangs)/100);
		$numIndesirables = $numRangs - $numCultures;
	}
	elseif(intval($pourcentageCultures) > intval($pourcentageIndesirables))
	{
		$numIndesirables = ceil((intval($pourcentageIndesirables)*$numRangs)/100);
		$numCultures = $numRangs - $numIndesirables;
	}
	elseif(intval($pourcentageCultures) == intval($pourcentageIndesirables))
	{
		$numIndesirables = intval($numRangs/2);
		$numCultures = intval($numRangs/2);
	}

	$indesirables = "SELECT DISTINCT nomEspeceLatin as nom FROM p2112205.plantes ORDER BY RAND ( )  LIMIT $numIndesirables;";
	$cultures = "SELECT DISTINCT nomEspece as nom FROM p2112205.variations ORDER BY RAND ( )  LIMIT $numCultures;";

	$resindesirables = mysqli_query($connexion, $indesirables);
	$indesirables = mysqli_fetch_all($resindesirables, MYSQLI_ASSOC);

	$rescultures = mysqli_query($connexion, $cultures);
	$cultures = mysqli_fetch_all($rescultures, MYSQLI_ASSOC);
	
	$rangs = array_merge($cultures,$indesirables);

	insertRangs($connexion,$latitude,$longtitude,$rangs);
}

//pour trouver le rang en fonction des coordonnées saisies
function searchRangbyLoc($connexion, $latitude, $longtitude)
{
	$latitude = intval($latitude);
	$longtitude = intval($longtitude);

	$requete = "SELECT * FROM p2112205.rangs WHERE longtitude = $longtitude  AND latitude = $latitude ;";
	$result = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $instances;
}

//pour trouver la parcelle avec le plus de superficie
function findBiggestParcelle($connexion){
	$requete = "SELECT * FROM p2112205.parcelles;";
	$result = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$field_sizes = array();
	$field_data = array();


	foreach($instances as $instance)
	{	
		array_push($field_sizes,(intval($instance["longeur"]) * intval($instance["largeur"])));
	}

	$biggest_field = max($field_sizes);

	foreach($instances as $instance)
	{		
		if($biggest_field == (intval($instance["longeur"]) * intval($instance["largeur"]))){

			$biggest_field = searchParcelle($connexion, $instance["latitude"], $instance["longtitude"]);

			return $biggest_field;
		}
	}

	return NULL;
}

//pour obtenir les types de rangs les plus utilisés
function getValues_occurrenceRangs($connexion,$number)
{
	$requete = "SELECT nom, COUNT(nom) AS valueOccurrence FROM p2112205.rangs GROUP BY nom ORDER BY  `valueOccurrence` DESC LIMIT $number;";
	$result = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $instances;
}

//selon les coordonnées que vous avez saisies, il supprime la parcelle concernée et tous les rangs qui la composent.
function deleteParcelleByLoc($connexion, $latitude, $longtitude)
{
	$latitude = intval($latitude);
	$longtitude = intval($longtitude);

	$requete = "DELETE FROM p2112205.parcelles WHERE longtitude = $longtitude AND latitude = $latitude ;";
	$result = mysqli_query($connexion, $requete);

	$requeteRangs = "DELETE FROM p2112205.rangs WHERE longtitude = $longtitude AND latitude = $latitude ;";
	$resultRangs = mysqli_query($connexion, $requeteRangs);
	
	return $result;
}



?>
