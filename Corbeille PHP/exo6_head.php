<?php 
session_start();

echo '<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>EXO 6</title>
			<h1>HEADER</h1>
			<p>Bonjour'.$_SESSION['nom'].'</p>
			<a href = "logout.php"><input type=button value="Se déconnecter"></a>
			<a href = "session.php"><input type=button value="Se connecter"></a>
		</head>';