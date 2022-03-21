<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
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

		$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'Peptodox-44');
		$mabd->query('SET NAMES utf8;');
		$req = 'SELECT * FROM productions INNER JOIN auteurs ON productions._aut_id = auteurs.aut_id WHERE prod_annee < '.$_POST['anneemax'].' AND prod_annee > '.$_POST['anneemin'].' AND aut_nom = '.$_POST['auteur'];
		$resultat = $mabd->query($req);
		?>
		
		<div class="listing">
			<div class="mycards">
		
				<?php
					foreach ($resultat as $value) {
						echo    '<div class="mycontainer">
									<div class="mycard"> <!-- Card -->
										<div class="vignette">
											<img src="images/'.$value['prod_photo'].'" alt="'.$value['prod_photo'].'">
											<div class="labelB">
												<span>Noté '.$value['prod_note'].'/500</span>
												<span>Classé '.$value['prod_classement'].'ème</span> 
											</div>
										</div>
										<div class="labelD">
											<p>'.$value['prod_nom'].'</p>
											<p>'.$value['prod_annee'].'</p>
											<p>'.$value['aut_nom'].'</p>
											<p>né.e ou formé en '.$value['aut_annee'].', '.$value['aut_lieu'].'</p>
											<p>'.$value['prod_inf'].'</p>
										</div>
									</div>
								</div>';
					}
				?>
		
			</div>
		</div>

?>

<?php
require 'footer.php';
require 'fin_html.php'
?>