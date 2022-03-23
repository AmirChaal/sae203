<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
?>

<div class="mycontainerF">
	<form  action="reponse_recherche.php" method="POST" data-parsley-validate>
		<input class="textarea" type="number" name="anneemin" class="search" placeholder="Publiées après l'année.." data-parsley-type="number" required>
		<input class="textarea" type="number" name="anneemax" class="search" placeholder="Avant l'année.." data-parsley-type="number" required>
		<input type="text" class="textarea" name="auteur" list="auteurs" placeholder="Auteur" autocomplete="off" required/>
		<datalist id="auteurs">
		<?php
			require 'lib_crud.inc.php';
			$co=connexionBD();
			genererDatalistAuteurs($co);
			deconnexionBD($co);
		?>
		</datalist>


		<div>
			<input id="button" type="submit" name="submit" class="submit" value="Chercher">
		</div>
	</form>
</div>

<?php
require 'footer.php';
require 'fin_html.php'
?>