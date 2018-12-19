<?php


include("exo6_head.php");

include("exo6_nav.php");



$tableauBon = array(
	array(
	'Marque' => 'Audi',
	'Modèle' => 'A1',
	'Type'	 => 'Citadine'
	),
	array(
	'Marque' => 'Volkswagen',
	'Modèle' => 'Passat',
	'Type'	 => 'Berline'
	),
	array(
	'Marque' => 'Volkswagen',
	'Modèle' => 'Golf',
	'Type'	 => 'Compact'
	),
	array(
	'Marque' => 'Mazda',
	'Modèle' => 'CX-5',
	'Type'	 => 'SUV'
	)
);

var_dump($tableauBon);

constructTable($tableauBon, "SANS TRI");

usort($tableauBon, build_sorter('Marque'));
constructTable($tableauBon, "TRI MARQUE");

usort($tableauBon, build_sorter('Modèle'));
constructTable($tableauBon, "TRI MODELE");

//La fonction usort trie un tableau en utilisant une fonction de comparaison
// Cette fonction prend en paramètre une clé du tableau, celui ci va trier par ordre croissant comme l'aurait fait un humain : ex : A puis B puis C...
function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

function constructTable ($tableauBon, $stringTri) {

	echo '<hr>';
	echo '<h3>'.$stringTri.'</h3>';
	echo '<table style="border: 1px solid black"><tr><th style="border: 1px solid black">MARQUE</th><th style="border: 1px solid black">MODELE</th><th style="border: 1px solid black">TYPE</th></tr>';

	foreach ($tableauBon as $key) {
		echo '<tr>';
		foreach ($key as $value) {
			echo '<td>' . $value . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	echo '<hr>';
}

include("exo6_footer.php");		

?>