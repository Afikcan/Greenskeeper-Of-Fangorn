
<?php 
//Codes SQL que j'utilise lors de la création de mes tables de base de données 
//Il n'est en aucun cas inclus dans le code principal, je voulais juste le garder au format php, c'est tout.
	$requete_createTable_Variete = 
		"CREATE TABLE variations AS
		SELECT 
		nomEspèce,
		commentaire,
		annéeEnregistrement,
		codePrécocité,
		labelPrécocité,
		nomEspèceLatin
		FROM donneesfournies
		";

	$requete_createTable_Type = 
		"CREATE TABLE types AS
		SELECT type 
		FROM donneesfournies
		GROUP BY type
		)";

	$requete_createTable_Plante = 
		"CREATE TABLE plantes AS
		SELECT 
		nomEspèceLatin PRIMARY KEY,
		type,
		sousType
		FROM donneesfournies
		GROUP BY nomEspèceLatin
		";

	$requete_createTable_Parcelles =
	"CREATE TABLE parcelles (
		latitude  varchar(52) NOT NULL,
		longtitude  varchar(52) NOT NULL,
		longeur varchar(52),
		largeur varchar(52),
		nombreMinRang varchar(52),
		nombreMaxRang varchar(52),
		pourcentageIndesirables varchar(52),
		pourcentageCultures varchar(52),
		PRIMARY KEY(latitude,longtitude));
		";

	$requete_createTable_Parcelles =
	"CREATE TABLE rangs (
		ID varchar(52) NOT NULL,
		nom varchar(52) NOT NULL,
		latitude  varchar(52),
		longtitude  varchar(52),
		FOREIGN KEY (latitude,longtitude) REFERENCES parcelles(latitude,longtitude))
		FOREIGN KEY (nom) REFERENCES variations(nomEspece))
		";

	?>