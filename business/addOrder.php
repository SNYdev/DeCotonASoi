<?php
$stylistController = explode('-', $_SESSION['creation']['stylist']);
$stylistFirstname = $stylistController[0];
$stylistLastname = $stylistController[1];

// On récupère les informations du styliste en bdd
$getStylist = $stylist->getStylistByFirstnameAndLastname($stylistFirstname, $stylistLastname);

$product->addProduct('', $_SESSION['creation']['bra'], '', $_SESSION['creation']['material'], $getStylist[0]['id']);

$user->addMessageFlash('success','Votre commande a été enregistré !');

header('Location: ?page=stylistes1');

exit;