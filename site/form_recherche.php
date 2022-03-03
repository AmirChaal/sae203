<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
?>

<form action="reponse_recherche.php" method="POST" data-parsley-validate>
	<input type="number" name="anneemin" class="search" placeholder="Annee min" data-parsley-type="number">
	<input type="number" name="anneemax" class="search" placeholder="Annee max" data-parsley-type="number">
	
	<input type="text" name="auteur" list="auteurs" class="search" placeholder="Auteur" data-parsley-type="alphanum">
	<datalist id="auteurs">
		<option value="Lingua ignota">
		<option value="Have a Nice Life">
		<option value="Coil">
		<option value="Daughters">
		<option value="Nine Inch Nails">
		<option value="Massive Attack">
		<option value="Swans">
		<option value="Death in June">
		<option value="Death Grips">
		<option value="Front Line Assembly">
	</datalist>
	<div id="boutons">
		<input type="submit" name="submit" class="submit" value="Chercher">
	</div>
</form>

<?php
require 'footer.php';
require 'fin_html.php'
?>