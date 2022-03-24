<?php
$title="Admin";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>
    <div class="admin">
	    <hr />
	    <h1>Supprimer une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $id=$_GET['num'];
	
	        $co=connexionBD();
	        effaceBD2($co, $id);
	        deconnexionBD($co);
	    ?>
	</div>



<?php
require '../footer.php';
require '../fin_html.php'
?>