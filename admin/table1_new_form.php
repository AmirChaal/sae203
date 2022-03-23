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
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        Titre : <input type="text" name="titre" required /><br />
	        Année : <input type="number" name="annee" min="-5000" max="3000" required /><br />
	        Influences : <input type="text" name="influences" required /><br />
	        Note (sur 500) : <input type="number" name="note" min="0.00" max="10000.00" step="1" required /><br />
	        Classement : <textarea name="classement" required></textarea><br />
	        Photo : <input type="file" name="photo" required /><br />
	        Auteur : <select name="auteur" required>
	        <?php
	            require fdgfd'../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>