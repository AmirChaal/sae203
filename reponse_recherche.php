<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
?>

<?php

	if (filter_var($_POST['anneemin'] , FILTER_VALIDATE_INT) == false || filter_var($_POST['anneemax'] , FILTER_VALIDATE_INT) == false) {
					header('Location: index.php');
				}

	if ((strpos($_POST['anneemin'] , '<') !== false) || (strpos($_POST['anneemax'] , '<') !== false)) {
		header('Location: index.php');
	}


	if ((strpos($_POST['anneemin'] , '>') !== false) || (strpos($_POST['anneemax'] , '>') !== false)) {
		header('Location: index.php');
	}

  
	if (strpos($_POST['auteur'] , '>') !== false  || strpos($_POST['auteur'] , '<') !== false ) {
			header('Location: index.php');
		}


		echo htmlentities($_POST['anneemin']).' et '.htmlentities($_POST['anneemax']);
				echo htmlentities($_POST['auteur'])

	

?>

<?php
require 'footer.php';
require 'fin_html.php'
?>