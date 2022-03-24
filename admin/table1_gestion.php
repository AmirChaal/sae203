<?php
$title="Admin";
$current = 'recherche';
require 'debut_html_admin.php';
require 'header_admin.php';
?>

<div class="admin">
        <hr />
        <h1>Gestion des données</h1>
        <hr />
        <p><a href="table1_new_form.php">Ajouter une bande dessinée</a></p>

        <div class="matable">
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe($co);
            deconnexionBD($co);
        ?>
    </div>
</div>

<?php
require '../footer.php';
require '../fin_html.php'
?>