<!--
L'objectif général du dossier "add" est de stocker les formulaires que nous utiliserons lors de l'ajout de données à la base de données
 et de pouvoir les appeler facilement quand nous le voulons.
-->
<h2 class="title"><span>ENTER YOUR VARIETE</span></h2>

<form method="post" action="#">
	<br/><br/>
	<input type="text" name="nom_espece" id="nom_espece" placeholder="Nom Espece" required />

	<input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" required/>

	<input type="text" name="annee_enregistrement" id="annee_enregistrement" placeholder="Année Enregistremenet" required/>

	<input type="text" name="code_precocite" id="code_precocite" placeholder="Code Précocité" required/>

	<input type="text" name="label_precocite" id="label_precocite" placeholder="Label Précocité" required/>

	<?php $plantes = getInstances($connexion, "plantes");?>

	<select name="champNomlatin" id="idNomlatin" required>
		<option value="Parcelle_nom">Nom Latin</option>
             <?php 
				$option = '';
				foreach($plantes as $plante)
				{	
					$option = "<option value='" . $plante['nomEspeceLatin'] . "'>" . $plante['nomEspeceLatin'] . "</option>";
					echo $option;
				}
			?>
	</select> 
	<br/><br/>
	<input type="submit" name="boutonValiderVariete" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>

