<?php
if(isset($_SESSION['creation'])) {
    $udw = str_replace("-", " ", $_SESSION['creation']['underwear']);
    $styl = str_replace("-", " ", $_SESSION['creation']['stylist']);

    echo "Modèle de soutien gorge : " . $_SESSION['creation']['bra'];
    echo "Tissue : " . $_SESSION['creation']['material'];
    echo "Modèle de culotte : " . $udw;
    echo "Votre styliste : " . $styl;
}
else {
    $user->addMessageFlash('info', 'Il n\'y a aucune création.');

    header('Location: ?page=creation');

    exit;
}
?>

<form action="">
    <input type="submit" name="order" value="Commander">
</form>
