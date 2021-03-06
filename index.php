<?php
//rappel: https://bdw1.univ-lyon1.fr/p2112205/Fangorn/
//nom: Özbulut
//prénom: Akifcan 
//numéros étudiant: p2112205

//La partie où les pages php supplémentaires nécessaires sont incluses dans la page d'index et les vérifications de liens sont effectuées
// index.php fait office de controleur frontal
session_start(); // démarre ou reprend une session
ini_set('display_errors', 1); // affiche les erreurs (au cas où)
ini_set('display_startup_errors', 1); // affiche les erreurs (au cas où)
error_reporting(E_ALL); // affiche les erreurs (au cas où)
if(file_exists('../private/config-bd.php'))  // vous n'avez pas besoin des lignes 7 à 9
	require('../private/config-bd.php'); // inclut un fichier de config "privé"
else
	require('inc/config-bd.php'); // vous pouvez inclure directement ce fichier de config (sans le if ... else précédent)
require('modele/modele.php'); // inclut le fichier modele
require('inc/includes.php'); // inclut des constantes et fonctions du site (nom, slogan)
require('inc/routes.php'); // fichiers de routes

$connexion = getConnexionBD(); // connexion à la BD
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<!-- le titre du document, qui apparait dans l'onglet du navigateur -->
    <title><?= $nomSite ?></title>
    <!-- lie le style CSS externe  -->
    <link href="css/style.css" rel="stylesheet" media="all" type="text/css">
    <!-- ajoute une image favicon (dans l'onglet du navigateur) -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<!-- La partie du code écrite pour le modifier en cas d'appel d'autres pages que le menu, header et la partie de footer de page -->

<body style = "background-color: #bad1bb;">
    <?php include('static/header.php'); ?>
    <div id="divCentral" style= "padding-bottom:100px; background-color:#EEEEEE; width: 100%;">

		<?php include('static/menu.php'); ?>
		
		<main>
		<?php
		$controleur = 'controleurAccueil'; // par défaut, on charge accueil.php
		$vue = 'vueAccueil'; // par défaut, on charge accueil.php
		if(isset($_GET['page'])) {
			$nomPage = $_GET['page'];
			if(isset($routes[$nomPage])) { // si la page existe dans le tableau des routes, on la charge
				$controleur = $routes[$nomPage]['controleur'];
				$vue = $routes[$nomPage]['vue'];
			}
		}
		include('controleurs/' . $controleur . '.php');
		include('vues/' . $vue . '.php');
		?>
		</main>
	</div>
    <?php include('static/footer.php'); ?>
	
</body>
</html>
