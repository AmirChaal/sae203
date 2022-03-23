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
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
	        Nom : <input type="text" name="nom" required /><br />
	        Année : <input type="number" name="annee" min="1900" max="3000" required /><br />
	        Lieu : <input type="text" name="lieu" required /><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>