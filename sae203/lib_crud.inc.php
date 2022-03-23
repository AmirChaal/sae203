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

function genererDatalistAuteurs($mabd) {
    $req = "SELECT aut_nom FROM auteurs";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="'. $value['aut_nom'] .'">'; 
    } 
}

function afficherCatalogue($mabd) {
    $req = "SELECT * FROM productions INNER JOIN auteurs ON productions._aut_id = auteurs.aut_id ORDER BY prod_id ASC";
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

function afficherAuteursOptions($mabd) {
    // on sélectionne tous les auteurs de la table auteurs
    $req = "SELECT * FROM auteurs";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son id, son prénom et son nom 
    // dans une balise <option>
    foreach ($resultat as $value) {
        echo '<option value="'.$value['aut_id'].'">'; // id de l'auteur
        echo $value['aut_nom']; // prénom espace nom
        echo '</option>'."\n";
    }
}

function afficherAuteursOptionsSelectionne($mabd, $idAuteur) {
    $req = "SELECT * FROM auteurs";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="'.$value['aut_id'].'"';
        if ($value['aut_id']==$idAuteur) {
            echo ' selected="selected"';
        }
        echo '>';
        echo $value['aut_nom'];
        echo '</option>'."\n";
    }
}

function afficherResultatRecherche($mabd) {
    $req = 'SELECT * FROM productions
            INNER JOIN auteurs 
            ON productions._aut_id = auteurs.aut_id
            WHERE prod_annee <= '.$_POST['anneemax'].' AND prod_annee >= '.$_POST['anneemin'].' AND aut_nom LIKE "%'.$_POST['auteur'].'%"';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
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

    // ----- TABLE 1 ------------------------------------------------------------------------------------------------------------------------------------------------------- //

    function afficherListe($mabd) {
        $req = "SELECT * FROM productions INNER JOIN auteurs ON productions._aut_id = auteurs.aut_id ORDER BY prod_id ASC";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>'."\n";
        echo '<thead><tr><th>Photo</th><th>Titre</th><th>Annee</th><th>Influences</th><th>Auteur</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";
            echo '<td><img class="photo" src="../img/bds/'.$value['prod_photo'].'" alt="image_'.$value['prod_id'].'" /></td>'."\n";
            echo '<td>'.$value['prod_nom'].'</td>'."\n";
            echo '<td>'.$value['prod_annee'].'</td>'."\n";
            echo '<td>'.$value['prod_inf'].'</td>'."\n";
            echo '<td>'.$value['aut_nom'].'</td>'."\n";
            echo '<td><a href="table1_update_form.php?num='.$value['prod_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table1_delete.php?num='.$value['prod_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }

function ajouterBD($mabd, $titre, $nouvelleImage, $annee, $inf, $note, $classement, $auteur)
    {
        $req = 'INSERT INTO productions (prod_nom, prod_photo, prod_annee, prod_inf, prod_note, prod_classement, _aut_id) VALUES ("'.$titre.'","'.$nouvelleImage.'",'.$annee.',"'.$inf.'",'.$note.','.$classement.',"'.$auteur.'")';
        echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La bande dessinée ' . $titre . ' a été ajoutée au catalogue.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
            die();
        }
    }

    function effaceBD($mabd, $id) {
        $req = 'DELETE FROM productions WHERE prod_id = '.$_GET['num'].';';
        echo '<p>'.$req.'</p>'."\n";
        try{
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount()==1) {
            echo '<p>La bande dessinée '.$id.' a été supprimée du catalogue.</p>'."\n";
        } else {
            echo '<p>Erreur lors de la suppression.</p>'."\n";
            die();
        }
    }

    function getBD($mabd, $idAlbum) {
        $req = 'SELECT * FROM productions WHERE prod_id='.$idAlbum;
        echo '<p>GetBD() : '.$req.'</p>'."\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }

    function modifierBD($mabd, $id, $titre, $annee, $inf, $nouvelleImage, $note, $classement, $auteur)
    {
        $req = 'UPDATE productions
                SET prod_nom = "'.$titre.'", prod_annee = '.$annee.', prod_inf = "'.$inf.'", prod_photo = "'.$nouvelleImage.'", prod_inf = "'.$inf.'", prod_note = '.$note.', prod_classement = '.$classement.', _aut_id = '.$auteur.'
                WHERE prod_id='.$id;
        echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La production ' . $titre . ' a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }

    // ----- TABLE 2 ------------------------------------------------------------------------------------------------------------------------------------------------------- //

    function afficherListe2($mabd) {
        $req = "SELECT * FROM  auteurs";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>'."\n";
        echo '<thead><tr><th>ID auteur</th><th>Nom</th><th>Annee de naissance/formation</th><th>lieu</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";
            echo '<td>'.$value['aut_id'].'</td>'."\n";
            echo '<td>'.$value['aut_nom'].'</td>'."\n";
            echo '<td>'.$value['aut_annee'].'</td>'."\n";
            echo '<td>'.$value['aut_lieu'].'</td>'."\n";
            echo '<td><a href="table2_update_form.php?num='.$value['aut_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table2_delete.php?num='.$value['aut_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }
    
    function ajouterBD2($mabd, $nom, $annee, $lieu)
        {
            $req = 'INSERT INTO auteurs (aut_nom, aut_annee, aut_lieu) VALUES ("'.$nom.'",'.$annee.',"'.$lieu.'")';
            echo '<p>' . $req . '</p>' . "\n";
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            if ($resultat->rowCount() == 1) {
                echo '<p>L\'auteur '. $nom .' a été ajoutée au catalogue.</p>' . "\n";
            } else {
                echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
                die();
            }
        }
    
        function effaceBD2($mabd, $id) {
            $req = 'DELETE FROM auteurs WHERE aut_id = '.$_GET['num'].';';
            echo '<p>'.$req.'</p>'."\n";
            try{
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            if ($resultat->rowCount()==1) {
                echo '<p>La bande dessinée '.$id.' a été supprimée du catalogue.</p>'."\n";
            } else {
                echo '<p>Erreur lors de la suppression.</p>'."\n";
                die();
            }
        }
    
        function getBD2($mabd, $idAut) {
            $req = 'SELECT * FROM auteurs WHERE aut_id='.$idAut;
            echo '<p>GetBD2() : '.$req.'</p>'."\n";
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            // la fonction retourne le tableau associatif 
            // contenant les champs et leurs valeurs
            return $resultat->fetch();
        }

        
    function modifierBD2($mabd, $id, $nom, $annee, $lieu){
        $req = 'UPDATE auteurs
                SET aut_nom = "'.$nom.'", aut_annee = '.$annee.', aut_lieu = "'.$lieu.'"
                WHERE aut_id='.$id;
        echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La production ' . $nom . ' a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }