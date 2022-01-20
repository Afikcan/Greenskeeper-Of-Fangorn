<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
la liste que nous utilisons pour imprimer tous les rangs
-->
<h2 class="title"><span>Liste des rangs</span></h2>
<div id="wrapper">
	<table class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>ID </th>
				<th>Nom</th>
				<th>Latitude</th>
				<th>Longtitude</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($rangs as $rang) { ?>
				<tr>
					<td> <?php print_r($rang['ID']) ?> </td>
					<td> <?php print_r($rang['nom']) ?> </td>
					<td> <?php print_r($rang['latitude']) ?> </td>
					<td> <?php print_r($rang['longtitude']) ?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>