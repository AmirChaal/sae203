<?php
require 'secretxyz123.inc.php';

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