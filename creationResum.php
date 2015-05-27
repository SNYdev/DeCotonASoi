<?php
if(isset($_SESSION['creation'])) {
    echo "Modèle de soutien gorge : " . $_SESSION['creation']['bra'];
    echo "Tissue : " . $_SESSION['creation']['material'];
    echo "Modèle de culotte : " . $_SESSION['creation']['underwear'];
}
else {
    $user->addMessageFlash('info', 'Il n\'y a aucune création.');

    header('location : ?page=creation');
    exit;
}