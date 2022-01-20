<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
La liste que nous avons utilisée pour afficher la parcelle obtenue suite à la saisie des coordonnées de la Parcelle
-->

<h2 class="title"><span>Votre Parcelle</span></h2>
<div id="wrapper">
	<table class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>Latitude </th>
				<th>Longtitude</th>
				<th>Longeur</th>
				<th>Largeur</th>
				<th>Nombre Min des Rangs</th>
                <th>Nombre Max des Rangs</th>
                <th>Pourcentage d'Indésirables</th>
                <th>Pourcentage de Cultures</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($parcelles as $parcelle) { ?>
				<tr>
					<td> <?php print_r($parcelle['latitude']) ?> </td>
					<td  style = "color: #6e7a00;"> <?php print_r($parcelle['longtitude']) ?> </td>
					<td> <?php print_r($parcelle['longeur']) ?> </td>
					<td> <?php print_r($parcelle['largeur']) ?> </td>
					<td> <?php print_r($parcelle['nombreMinRang']) ?> </td>
                    <td> <?php print_r($parcelle['nombreMaxRang']) ?> </td>
                    <td> <?php print_r($parcelle['pourcentageCultures']) ?> </td>
					<td> <?php print_r($parcelle['pourcentageIndesirables']) ?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>