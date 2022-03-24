<?php
$title="Admin";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>
<div class="admin">
	    <hr />
	    <h1>Ajouter une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
			if (filter_var($_POST['annee'] , FILTER_VALIDATE_INT) == false) {
				header('Location: ../index.php'); exit;}
			if ((strpos($_POST['annee'] , '<') !== false) || (strpos($_POST['annee'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if ((strpos($_POST['nom'] , '<') !== false) || (strpos($_POST['nom'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if ((strpos($_POST['lieu'] , '<') !== false) || (strpos($_POST['lieu'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

	        $nom=$_POST['nom'];
	        $annee=$_POST['annee'];
	        $lieu=$_POST['lieu'];
	
	        $co=connexionBD();
	        ajouterBD2($co, $nom, $annee, $lieu);
	        deconnexionBD($co);
	    ?>
</div>



<?php
require '../footer.php';
require '../fin_html.php'
?>