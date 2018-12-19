<?php
	
	include("exo6_head.php");

	include("exo6_nav.php");

	

	echo '<form method="POST" action="exo5.php">';
	echo '<label for="marque">MARQUE : </label><input type="text" name="marque" id="marque"><br>';
	echo '<label for="modele">MODELE : </label><input type="text" name="modele" id="modele"><br>';
	echo '<label for="type">TYPE : </label><input type="text" name="type" id="type"><br>';

	echo '<input type="submit">';
	echo '</form>';


	echo '<hr> POST';

	if(isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['type'])){
		echo '<p>MARQUE : '. $_POST['marque'] . ' - MODELE : ' . $_POST['modele'] . ' - TYPE : ' . $_POST['type'] . '</p>';  
	}
	else {
		echo '<p>IL VOUS MANQUE UN PARAMETRE POST !</p>';
	}

	echo '<hr> GET <br>';

	echo '<a href="./exo5.php?modele=renault&type=citadine&marque=abc">GENERER LE GET</a>';

	if(isset($_GET['marque']) && isset($_GET['modele']) && isset($_GET['type'])){
		echo '<p>MARQUE : '. $_GET['marque'] . ' - MODELE : ' . $_GET['modele'] . ' - TYPE : ' . $_GET['type'] . '</p>';  
	}
	else {
		echo '<p>IL VOUS MANQUE UN PARAMETRE GET !</p>';
	}

	//Comment appelle-t-on les variables $_POST et $_GET ?  DES SUPERGLOBALES.

	include("exo6_footer.php");

?>