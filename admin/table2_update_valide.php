<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $id=$_POST['num'];
	        $nom=$_POST['nom'];
	        $annee=$_POST['annee'];
	        $lieu=$_POST['lieu'];

	        $co=connexionBD();
	        modifierBD2($co, $id, $nom, $annee, $lieu);
	        deconnexionBD($co);
	    ?>
	</body>
</html>