<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
</head>
<body style="font-family:sans-serif;">
    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier une bande dessinée</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $album=getBD2($co, $id);
        deconnexionBD($co);
    ?>
    <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Nom : <input type="text" name="nom" value="<?= $album['aut_nom']; ?>" required /><br />
        Année : <input type="number" name="annee" min="1900" max="3000" value="<?= $album['aut_annee']; ?>" required /><br />
        Lieu : <input type="text" name="lieu" value="<?= $album['aut_lieu']; ?>" required> <br />
        <input type="submit" value="Modifier" />
    </form>
</body>
</html>