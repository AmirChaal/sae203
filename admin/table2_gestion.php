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
        
        <p><a href="table2_new_form.php">Ajouter une bande dessinée</a></p>
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe2($co);
            deconnexionBD($co);
        ?>
    </div>



<?php
require '../footer.php';
require '../fin_html.php'
?>