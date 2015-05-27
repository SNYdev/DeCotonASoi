<?php
if(isset($_SESSION['creation'])) {
    $udw = str_replace("-", " ", $_SESSION['creation']['underwear']);
    $styl = str_replace("-", " ", $_SESSION['creation']['stylist']);

    echo "Modèle de soutien gorge : " . $_SESSION['creation']['bra'];
    echo "Tissue : " . $_SESSION['creation']['material'];
    echo "Modèle de culotte : " . $udw;
    echo "Votre styliste : " . $styl;
}
elseif (isset($_POST['btn'])) {
    $stylistController = explode('-', $_SESSION['creation']['stylist']);
    $stylistFirstname = $stylistController[0];
    $stylistLastname = $stylistController[1];

// On récupère les informations du styliste en bdd
    $getStylist = $stylist->getStylistByFirstnameAndLastname($stylistFirstname, $stylistLastname);

    $product->addProduct('', $_SESSION['creation']['bra'], '', $_SESSION['creation']['material'], $getStylist[0]['id']);

    $user->addMessageFlash('success','Votre commande a été enregistré !');

    header('Location: ?page=stylistes1');

    exit;
}
else {
    $user->addMessageFlash('info', 'Il n\'y a aucune création.');

    header('Location: ?page=creation');

    exit;
}
?>

<form action="">
    <input type="submit" name="btn" value="Commander">
</form>
