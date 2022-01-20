<!-- J'ai ajouté un arbre dansant en haut à droite pour mettre de la couleur sur notre site et à la demande de mon ami, et j'ai
ajouté une photo d'abricot en haut à gauche sur le nom de Malatya, le pays des abricots secs (puisque c'est ma ville natale et 
célèbre pour ses abricots) (malheureusement, je n'ai pas pu trouver la danseuse pour cela) -->

<!-- rappel: scp -r serial-critique p2112205@bdw1.univ-lyon1.fr:/var/www/p2112205/ -->
<head>
<link href="css/style_header.css" rel="stylesheet" media="all" type="text/css">
</head>


<header style="display: flex;">
	<div id = "img-left" style="flex:1; ">
		<a href="index.php">
			<img id="ivy_top-left" src="img/apricot.png" style="width:150px;height:150px;">
		</a>
	</div>

   	<div style="flex:2;"> 
		<!-- le fameux titre <h1> à personnaliser ! faites-vous plaisir... -->
		<h1>Greenskeeper Of Fangorn</h1>

		<!-- NB : si vous souhaitez également modifier le titre qui apparait dans l'onglet du navigateur (ce qui serait logique !), c'est une métadonnée de la page. -->	
		<strong><?= $baseline ?></strong>
		<br>
		<img src="img/logo.png" style="width:100px;height:100px;">
	</div>

	<div id = "img-right" style="flex:1;">
		<a href="index.php">
			<img src="img\dancing_tree.gif" alt="Computer man" style="width:150px;height:150px;">
		</a>
	</div>
    
</header>
