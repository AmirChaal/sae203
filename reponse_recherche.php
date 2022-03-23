<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
require 'lib_crud.inc.php';
?>

<?php
	if (filter_var($_POST['anneemin'] , FILTER_VALIDATE_INT) == false || filter_var($_POST['anneemax'] , FILTER_VALIDATE_INT) == false) {
		header('Location: index.php');}
	if ((strpos($_POST['anneemin'] , '<') !== false) || (strpos($_POST['anneemax'] , '<') !== false)) {
		header('Location: index.php');}
	if ((strpos($_POST['anneemin'] , '>') !== false) || (strpos($_POST['anneemax'] , '>') !== false)) {
		header('Location: index.php');}
	if (strpos($_POST['auteur'] , '>') !== false  || strpos($_POST['auteur'] , '<') !== false ) {
		header('Location: index.php');}

	echo '<div class="reponse">
			<p>Vous cherchez les productions sorties entre '.htmlentities($_POST['anneemin']).' et '.htmlentities($_POST['anneemax']).' et produites par '.htmlentities($_POST['auteur']).'.</p>
		</div>';
?>
		
		<div class="listing">
			<div class="mycards">
				<?php
					$co=connexionBD();
					afficherResultatRecherche($co);
					deconnexionBD($co);
				?>
			</div>
		</div>

?>

<?php
require 'footer.php';
require 'fin_html.php'
?>