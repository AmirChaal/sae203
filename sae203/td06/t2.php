<?php
    if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) ) {
        header('Location: form2.php');
    }

    echo htmlentities($_POST['prenom']);
    echo htmlentities($_POST['age']);