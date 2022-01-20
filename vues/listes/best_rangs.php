<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
La liste que nous avons créée pour les 5 rangs les plus populaires sur la page d'accueil
-->
<h2 style="font-size:40px;" class="title"><span>Type de 5 rangs le plus populaire</span></h2>
<div id="wrapper">
	<table class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>Nom</th>
				<th>Valeur Occurrence</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($rangs as $rang) { ?>
				<tr>
					<td> <?php print_r($rang['nom']) ?> </td>
					<td> <?php print_r($rang['valueOccurrence']) ?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>