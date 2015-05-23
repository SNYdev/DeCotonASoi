
<?php
$stylistController = explode('', $_GET['name']);
$stylistFirstname = $stylistController[0];
$stylistLastname = $stylistController[1];

if (isset($stylistFirstname) && isset($stylistLastname)) {
    $getStylist = $stylist->getStylistByFirstnameAndLastname($stylistFirstname, $stylistLastname);
    $styistId = $getStylist['id'];

    echo "<img src=\"img/stylist" . $styistId . "png alt =\"Stylist\">";
    echo $getStylist['prenom'];
    echo $getStylist['nom'];
    echo $getStylist['sexe'];
    echo $getStylist['description'];
    echo $getStylist['email'];

    for($i=1; $i<4 ; $i++) {
        echo "<img src=\"img/imgStylist" . $styistId . "/" . $i . ".png alt =\"1\">";
    }
} else {
    echo 'Stylist is missing';
}