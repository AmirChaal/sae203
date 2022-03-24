<?php
$title="Admin";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>

<div class="admin">
	<hr>
    <h1>Modifier une bande dessinée</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $album=getBD($co, $id);
        deconnexionBD($co);
    ?>
    <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Titre<input type="text" name="titre" value="<?= $album['prod_nom']; ?>" required /><br />
        Année<input type="number" name="annee" min="-5000" max="3000" value="<?= $album['prod_annee']; ?>" required /><br />
        Influences<textarea type="text" name="influences" required><?= $album['prod_inf']; ?></textarea><br />
        Note (sur 500)<input type="number" name="note" min="0.00" max="10000.00" step="1" value="<?= $album['prod_note']; ?>" required /><br />
        Classement<input type="number" name="classement" value="<?= $album['prod_classement']; ?>" required /><br />
        Photo<input type="file" name="photo" required /><br />
        Auteur<select name="auteur" required>
        <?php
            $co=connexionBD();
            afficherAuteursOptionsSelectionne($co, $album['_aut_id']);
            deconnexionBD($co);
        ?>
        </select><br />
        <input type="submit" value="Modifier" />
    </form>
</div>


<?php
require '../footer.php';
require '../fin_html.php'
?>