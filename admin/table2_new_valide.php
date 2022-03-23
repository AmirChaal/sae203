<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $nom=$_POST['nom'];
	        $annee=$_POST['annee'];
	        $lieu=$_POST['lieu'];
	
	        $co=connexionBD();
	        ajouterBD2($co, $nom, $annee, $lieu);
	        deconnexionBD($co);
	    ?>
	</body>
</html>