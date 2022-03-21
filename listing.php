<?php
$title="Listing";
$current = 'listing';

require 'debut_html.php';
require 'header.php';
require 'lib_crud.inc.php';
connexionBD();
?>

<div class="listing">
    <div class="mycards">

        <?php
            $req = "SELECT * FROM productions INNER JOIN auteurs ON productions._aut_id = auteurs.aut_id";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value) {
                echo    '<div class="mycontainer">
                            <div class="mycard"> <!-- Card -->
                                <div class="vignette">
                                    <img src="img/bds/'.$value['prod_photo'].'" alt="'.$value['prod_photo'].'">
                                    <div class="labelB">
                                        <span>Noté '.$value['prod_note'].'/500</span>
                                        <span>Classé '.$value['prod_classement'].'ème</span> 
                                    </div>
                                </div>
                                <div class="labelD">
                                    <p>'.$value['prod_nom'].'</p>
                                    <p>'.$value['prod_annee'].'</p>
                                    <p>'.$value['aut_nom'].'</p>
                                    <p>né.e ou formé en '.$value['aut_annee'].', '.$value['aut_lieu'].'</p>
                                    <p>'.$value['prod_inf'].'</p>
                                </div>
                            </div>
                        </div>';
            }
        ?>

    </div>
</div>

<?php


require 'footer.php';
require 'fin_html.php';
?>