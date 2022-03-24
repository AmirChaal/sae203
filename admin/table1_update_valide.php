<?php
$title="Admin";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>
<div class="admin">
	    <hr />
	    <h1>Modifier une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
			if (filter_var($_POST['annee'] , FILTER_VALIDATE_INT) == false) {
				header('Location: ../index.php'); exit;}
			if ((strpos($_POST['annee'] , '<') !== false) || (strpos($_POST['annee'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if ((strpos($_POST['titre'] , '<') !== false) || (strpos($_POST['titre'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if ((strpos($_POST['influences'] , '<') !== false) || (strpos($_POST['influences'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}
			
			if (filter_var($_POST['note'] , FILTER_VALIDATE_INT) == false) {
				header('Location: ../index.php'); exit;}
			if ((strpos($_POST['note'] , '<') !== false) || (strpos($_POST['note'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if (filter_var($_POST['classement'] , FILTER_VALIDATE_INT) == false) {
				header('Location: ../index.php'); exit;}
			if ((strpos($_POST['classement'] , '<') !== false) || (strpos($_POST['classement'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}

			if ((strpos($_POST['auteur'] , '<') !== false) || (strpos($_POST['auteur'] , '>') !== false)) {
				header('Location: ../index.php'); exit;}


	        $id=$_POST['num'];
	        $titre=$_POST['titre'];
	        $annee=$_POST['annee'];
	        $inf=$_POST['influences'];
	        $note=$_POST['note'];
	        $classement=trim($_POST['classement']);
	        $auteur=$_POST['auteur'];
	
	        $imageType=$_FILES["photo"]["type"];
	        if ( ($imageType != "image/png") &&
	            ($imageType != "image/jpg") &&
				($imageType != "image/webp") &&
	            ($imageType != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }
	
	        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
	
	        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/bds/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
	
	        $co=connexionBD();
	        modifierBD($co, $id, $titre, $annee, $inf, $nouvelleImage, $note, $classement, $auteur);
	        deconnexionBD($co);
	    ?>
</div>

	    
<?php
require '../footer.php';
require '../fin_html.php'
?>