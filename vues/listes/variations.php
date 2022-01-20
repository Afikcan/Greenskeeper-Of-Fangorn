<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
la liste que nous utilisons pour imprimer tous les varietes
-->
<h2 class="title"><span>Liste des variations</span></h2>
<div id="wrapper">
	<table class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>Nom Espece </th>
				<th>Commentaire</th>
				<th>Année Enregistremenet</th>
				<th>Code Précocité</th>
				<th>Label Précocité</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($variations as $variation) { ?>
				<tr>
					<td> <?php print_r($variation['nomEspece']) ?> </td>
					<td> <?php print_r($variation['commentaire']) ?> </td>
					<td> <?php print_r($variation['anneeEnregistrement']) ?> </td>
					<td> <?php print_r($variation['codePrecocite']) ?> </td>
					<td> <?php print_r($variation['labelPrecocite']) ?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>