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
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
	        Nom<input type="text" name="nom" required /><br />
	        Année<input type="number" name="annee" min="1900" max="3000" required /><br />
	        Lieu<input type="text" name="lieu" required /><br />
	        <input type="submit" value="Ajouter" />
	    </form>
</div>

<?php
require '../footer.php';
require '../fin_html.php'
?>