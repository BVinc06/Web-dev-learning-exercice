<?php

	session_start();

	if(isset($_POST['identifiant']) && isset($_POST['pwd']) && !empty($_POST['identifiant']) && !empty($_POST['pwd'])){
		//L'utilisateur souhaite se connecter, les champs sont bien remplis
		
		//Procédure de traitement des données (et déclaration des bon identifiants...)
		$tab = array(
			array(
				'email' => 'test@gmail.com',
				'password' => 'test',
				'name' => 'TEST'
			),
			array(
				'email' => 'root@gmail.com',
				'password' => 'root',
				'name' => 'ADMINISTRATEUR'
			),
			array(
				'email' => 'dupont@gmail.com',
				'password' => '1234',
				'name' => 'DUPONT'
			)
		);

		//var_dump($tab);

		$identifiant = htmlspecialchars($_POST['identifiant']);
		$pwd = htmlspecialchars($_POST['pwd']);

		//OUI ON PEUT METTRE QUE DES .COM ET ALORS !!
		if (preg_match('/^.+@.+\.com$/', $identifiant) ){

			$booleanLOG = FALSE;
			
			foreach ($tab as $value) {
				if ($value['email'] == $identifiant){
					//On test déjà si l'identifiant est le même, pas la peine de tester le mot de passe.... déjà qu'on boucle sur tous les utilisateurs autorisés
					if($value['password'] == $pwd){
						//Comme l'identifiant est bon, on regarde le mot de passe, si celui-ci match avec un élément dans la liste
						$booleanLOG = TRUE;
						$_SESSION['identifiant'] = $identifiant;
						$_SESSION['nom'] = $value['name'];
						setcookie('identifiant', $identifiant, time() + 365*24*3600, null, null, false, true);	//Cookie sécurisé (inaccessible en JS) et expire dans 1 an
						header('Location: exo6.php'); 
					}
				}
			}

			if(!$booleanLOG) echo '<script> alert("Nom d\'utilisateur ou mot de passe incorrect...");</script>';
			//Le champ email est bien au bon format mais la combinaison email - mdp n'existe pas.
		}
		else {
			echo '<script> alert("Nom d\'utilisateur ou mot de passe incorrect...");</script>';
		}
	}
	else {
		echo '<script> alert("Vous devez remplir tous les champs !");</script>';
	}


	if(isset($_COOKIE['identifiant']) && !empty($_COOKIE['identifiant']))
		$valueCookieIndentifiant = $_COOKIE['identifiant']; 
	else $valueCookieIndentifiant = "";

	echo '<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>EXO 6</title>
			<h1>HEADER</h1>
			<a href = "logout.php"><input type=button value="Se déconnecter"></a>
		</head>';

	echo '<body>';

	echo '<form method="POST" action="session.php">';
	echo '<label for="identifiant">Nom d\'utilisateur : </label><input type="text" name="identifiant" id="identifiant" value="'. $valueCookieIndentifiant .'"><br>';
	echo '<label for="pwd">Mot de Passe : </label><input type="password" name="pwd" id="pwd"><br>';

	echo '<input type="submit">';
	echo '</form>';

	echo '</body>';

	include("exo6_footer.php");
	
?>