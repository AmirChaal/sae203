<?php
require 'admin/secretxyz123.inc.php';

function connexionBD(){
    $mabd = null;
    try {
        $mabd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=sae203;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $mabd->query('SET NAMES utf8;');
    }catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    return $mabd;
}

function deconnexionBD(&$mabd) {
    $mabd=null;
}

function afficherCatalogue($mabd) {
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
}