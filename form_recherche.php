<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
?>

<div class="mycontainerF">
	<form  action="reponse_recherche.php" method="POST" data-parsley-validate>
		<input class="textarea" type="number" name="anneemin" class="search" placeholder="sorties après l'année.." data-parsley-type="number">
		<input class="textarea" type="number" name="anneemax" class="search" placeholder="sorties avant l'année.." data-parsley-type="number">
		<input class="textarea" type="text" name="auteur" list="auteurs" class="search" placeholder="Auteur">
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
		<div>
			<input id="button" type="submit" name="submit" class="submit" value="Chercher">
		</div>
	</form>
</div>

<?php
require 'footer.php';
require 'fin_html.php'
?>