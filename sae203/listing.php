<?php
$title="Listing";
$current = 'listing';

require 'debut_html.php';
require 'header.php';
require 'lib_crud.inc.php';
?>

<div class="listing">
    <div class="mycards">

        <?php
            $co = connexionBD();
            afficherCatalogue($co);
            deconnexionBD($co);
        ?>

    </div>
</div>

<?php
require 'footer.php';
require 'fin_html.php';
?>