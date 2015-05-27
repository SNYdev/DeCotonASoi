<?php
if(isset($_SESSION['creation'])) {
    $str = str_replace("-", " ", $_SESSION['creation']['underwear']);

    echo "Modèle de soutien gorge : " . $_SESSION['creation']['bra'];
    echo "Tissue : " . $_SESSION['creation']['material'];
    echo "Modèle de culotte : " . $str;
}
else {
    $user->addMessageFlash('info', 'Il n\'y a aucune création.');

    header('Location: ?page=creation');

    exit;
}