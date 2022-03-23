<?php
$title="Recherche";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>

	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Supprimer une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $id=$_GET['num'];
	
	        $co=connexionBD();
	        effaceBD($co, $id);
	        deconnexionBD($co);
	    ?>

<?php
require '../footer.php';
require '../fin_html.php'
?>
