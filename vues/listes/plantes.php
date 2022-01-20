<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
la liste que nous utilisons pour imprimer tous les plantes
-->
<h2 class="title"><span>Liste des plantes</span></h2>
<div  id="wrapper">
	<table class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>Nom Espece Latin</th>
				<th>Type</th>
				<th>Sous Type</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($plantes as $plante) { ?>
				<tr>
					<td> <?php print_r($plante['nomEspeceLatin']) ?> </td>
					<td> <?php print_r($plante['type']) ?> </td>
					<td> <?php print_r($plante['sousType']) ?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>