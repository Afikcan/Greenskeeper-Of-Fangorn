<?php
//La partie où nous créons les "routes"
$routes = array(
	'afficher' => array('controleur' => 'controleurAfficher', 'vue' => 'vueAfficher'),
	'ajouter' => array('controleur' => 'controleurAjouter', 'vue' => 'vueAjouter'),
	'rechercher' => array('controleur' => 'controleurRechercher', 'vue' => 'vueRechercher'),
	'supprimer' => array('controleur' => 'controleurSupprimer', 'vue' => 'vueSupprimer')
);

?>
