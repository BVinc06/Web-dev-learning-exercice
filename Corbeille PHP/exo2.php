<?php
	
	include("exo6_head.php");

	include("exo6_nav.php");


	$chaine="bonjour les copains";
	echo $chaine;
	echo '<br>';
	echo ucfirst($chaine);
	echo '<br>';
	echo ucwords($chaine);
	echo '<br>';
	echo strtr($chaine, " ", "_");
	echo '<br>';
	echo str_word_count($chaine);

	include("exo6_footer.php");

?>