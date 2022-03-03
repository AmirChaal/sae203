<?php
    if ( (empty($_POST['email'])) || (empty($_POST['mdp'])) ){
        header('Location: form1.php');
    }

    if (filter_var(htmlentities($_POST['email'], ENT_QUOTES) , FILTER_VALIDATE_EMAIL)==false) {
        echo 'non';
    }else {
        echo $_POST['email'];}

    /*echo '<p>'.$_POST['mdp'].'</p>'."\n";*/

