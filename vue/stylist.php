<?php
// On récupère le nom et prénom du styliste
$stylistController = explode('', $_GET['name']);
$stylistFirstname = $stylistController[0];
$stylistLastname = $stylistController[1];

if (isset($stylistFirstname) && isset($stylistLastname)) {
    // On récupère les informations du styliste en bdd
    $getStylist = $stylist->getStylistByFirstnameAndLastname($stylistFirstname, $stylistLastname);
    $stylistId = $getStylist['id'];

    echo "<img src=\"img/stylist/" . $stylistId . "png alt =\"Stylist\">";
    echo $getStylist['prenom'];
    echo $getStylist['nom'];
    echo $getStylist['sexe'];

    // On récupère la note globale du styliste en bdd
    $overallEval = $eval->overallEval($stylistId);

    // Si le visiteur est connecté, on lui propose de noter le styliste s'il ne l'a pas encore fait. S'il l'a fait, on lui indique la note qu'il lui a donné
    if(isset($_SESSION['user'])) {
        $userEval = $eval->showUserEval($_SESSION['user']['id'], $stylistId);
        if($userEval) {
            echo "Vous avez noté " . $userEval['note'] . "/10";
        }
        else {
            echo $overallEval . "/10<br>" .
            "<form action=\"\" method=\"POST\">
                <p><input type='text' value='note'>/10</p>
                <input type='submit' value='Noter'>
            </form>";
            if(!empty($_POST['note']) && ($_POST['note'] <= 10) && ($_POST['note'] >= 0)) {
                $eval->addEval($_SESSION['user']['id'], $stylistId, $_POST['note']);
            }
            else {
                echo "La note doit être comprise entre 1 et 10.";
            }
        }
    }
    else {
        echo $overallEval . "/10<br>";
    }

    echo $getStylist['description'];
    echo $getStylist['email'];

    // On affiche 3 créations du styliste
    for($i=1; $i<4 ; $i++) {
        echo "<img src=\"img/imgStylist" . $stylistId . "/" . $i . ".png alt =\"1\">";
    }
} else {
    echo 'Stylist is missing';
}