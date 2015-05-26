<form action="" method="post">
    <p>Civilité : <input type="radio" name="gender" value="1" checked/>Madame <input type="radio" name="gender" value="2"/>Monsieur</p>
    <p>Prénom : <input type="text" name="firstname" /></p>
    <p>Nom : <input type="text" name="lastname" /></p>
    <p>Description : <input type="text" name="description" /></p>
    <p>Adresse : <input type="text" name="address" /></p>
    <p>Ville : <input type="text" name="city" /></p>
    <p>Code postal : <input type="text" name="zcode" /></p>
    <p>Email : <input type="text" name="email" /></p>
    <p>Mot de passe : <input type="password" name="password" id="password" /></p>
    <p>Vérificaion mot de passe : <input type="password" name="password_check" id="password_check" /></p><p id="error"></p>
    <p>Téléphone : <input type="tel" name="tel" /></p>
    <p><input type="submit" /></p>
</form>

<?php
if(!empty($_POST['firstname'])  && !empty($_POST['lastname']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zcode']) && !empty($_POST['password']) && !empty($_POST['password_check']) && !empty($_POST['email']) && (strlen($_POST['firstname']) >= 2) && (strlen($_POST['lastname']) >= 2) && (strlen($_POST['city']) >= 3) && (strlen($_POST['zcode']) == 5) && is_numeric($_POST['zcode']) && (strlen($_POST['password']) >= 6) && ($_POST['password_check'] === $_POST['password'])) {
    $stylist->addStylist($_POST['gender'], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['address'], $_POST['city'], $_POST['zcode'], $_POST['email'], $_POST['description'], $_POST['tel']);
    echo "Styliste ajouté !";
}
else {
    echo "Formulaire mal saisi.";
}
?>

<script>
    $(function() {
        $("#password_check").change(function () {
            if ($(this).val() !== $("#password").val()) {
                $("#error9").html("Les 2 mots de passes ne correspondent pas");
            }
            else {
                $("#error9").html("")
            }
        });
    });
</script>
