<!--
Nous facilitons le contrôle et la conception en ouvrant une page spéciale pour chaque liste que nous souhaitons afficer.
la liste que nous utilisons pour imprimer tous les types
-->
<h2 class="title"><span>Liste des types</span></h2>
<div id="wrapper">
	<table  class="container" cellspacing="0" cellpadding="0">
		<thead>
			<tr style="text-align: left;">
				<th>Type </th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($types as $type){?>
				<tr>
					<td class="lalign"> <?php print_r($type["type"])?> </td>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>