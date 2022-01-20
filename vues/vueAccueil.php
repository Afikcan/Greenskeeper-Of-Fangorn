<main>
	<div id="paragDescription"> <h1>BIENVENUE DANS NOTRE JARDIN VIRTUEL</h1></div>

	<div>
		<div class="present_us">
			<h3>Qui sommes-nous et que faisons-nous ?</h3>
			<p>Nous sommes un groupe de passionnés de verdure, amoureux de la nature, qui ont grandi au plus profond des forêts de Fangorn. 
				Notre seul objectif est de rendre les forêts du monde entier aussi gaies et "vivantes" que la forêt de Fangorn. 
				Conformément à cet objectif, apporter ce pouvoir mystique au monde entier à travers Internet en utilisant les technologies 
				d'aujourd'hui. Et c'est ici que la magie opère, NOTRE SITE WEB !!</p>
		</div>

		<?php
		
		$nbOfvariations = countInstances($connexion, "variations");
		$nbOftype = countInstances($connexion, "types");
		$nbOfplante = countInstances($connexion, "plantes");
		if($nbOfplante <= 0 or $nbOftype <= 0 or $nbOfvariations <= 0)
			$message = "Aucune donne n'a été trouvée dans la base de données !";
		else
			$message = "Actuellement nombre de variete: $nbOfvariations , nombre de type: $nbOftype, nombre de plante: $nbOfplante existe dans la base.";

		?>
		<div><p id="summary"><?= $message ?></p></div>

		<?php
			$parcelles = findBiggestParcelle($connexion);
		  	include('listes\biggest_parcelle.php'); 
		?>

		<?php
			$rangs = getValues_occurrenceRangs($connexion,5);
		  	include('listes\best_rangs.php'); 
		?>

		<br>
	</div>
	
	
</main>

