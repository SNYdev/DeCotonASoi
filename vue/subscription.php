<br><br><br><br>

<form action="" method="post">
    <legend>VOS INFORMATIONS PERSONELLES</legend>
    <br>
    <input type="radio" name="gender" value="1" checked/>Mme
    <input type="radio" name="gender" value="2"/>Mr
    <br>
    Prenom<br>
    <input type="text" name="firstname" id="firstname"/><p id="error1"></p>
    <br>
    Nom<br>
    <input type="text" name="lastname" id="lastname" /><p id="error2"></p>
    <br>
    Pseudo<br>
    <input type="text" name="login" id="login" /><p id="error11"></p>
    <br>
    Adresse postal<br>
    <input type="text" name="address" id="address" /><p id="error4"></p>
    <br>
    Ville<br>
    <input type="text" name="city" id="city" /><p id="error5"></p>
    <br>
    Code postal<br>
    <input type="text" name="zcode" id="zcode" /><p id="error6"></p>
    <br>
    Adresse E-mail<br>
    <input type="text" name="email" id="email" /><p id="error10"></p>
    <br>
    Mot de passe<br>
    <input type="password" name="password" id="password" /><p id="error8"></p>
    <br>
    Confirmation du mot de passe<br>
    <input type="password" name="password_check" id="password_check" /><p id="error9"></p>
    <br>
    Téléphone<br>
    <input type="tel" name="tel" id="tel" /><p id="error7"></p>
    <br>
    Newsletter<input type="checkbox" name="newsletter" value="1"/>
    <p>Soyez informée des offres Du Conton à soie et recevez une invitation aux ventes privées du site.</p>
    <br><br><br>
    <input type="submit" value="Je m'inscris">
</form>
    
<br><br><br><br>

<?php
// Double vérification du formulaire
if(!empty($_POST['firstname'])  && !empty($_POST['lastname']) && !empty($_POST['login']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zcode']) && !empty($_POST['password']) && !empty($_POST['password_check']) && !empty($_POST['email']) && (strlen($_POST['firstname']) >= 2) && (strlen($_POST['lastname']) >= 2) && (strlen($_POST['login']) >= 2) && (strlen($_POST['city']) >= 3) && (strlen($_POST['zcode']) == 5) && is_numeric($_POST['zcode']) && (strlen($_POST['password']) >= 6) && ($_POST['password_check'] === $_POST['password'])) {

    if(!isset($_POST['newsletter'])) {
        $_POST['newsletter'] = 0;
    }
    if(empty($_POST['tel'])) {
        $_POST['tel'] = '';
    }
    // Vérifie si le login existe en bdd
    $count = $user->countUserByName($_POST['login']);

    if($count['nb_user']) {
        $user->addMessageFlash('info','Login existe déjà.');
    }
    else {
        $user->addUser($_POST['gender'], $_POST['firstname'], $_POST['lastname'], $_POST['login'], $_POST['password'], $_POST['address'],$_POST['city'], $_POST['zcode'], $_POST['tel'], $_POST['email'], $_POST['newsletter']);
        $info = $user->getUserByName($_POST['email']);

        $_SESSION['user'] = ['id' => $info['id'], 'firstname' => $info['prenom'], 'lastname' => $info['nom'], 'gender' => $info['sexe'], 'name' => $info['login']];

        $user->addMessageFlash('success','Inscription réussie !');

        header('Location: ?page=home');

        exit;
    }
}
else {
    echo 'Le formulaire a été mal saisi.';
}

?>

<script>
    // Indique en temps réel au visiteur si le formulaire est rempli correctement
    $(function() {
        $("#firstname").change(function () {
            if ($(this).val().length < 2) {
                $("#error1").html("Prénom trop court");
            }
            else {
                $("#error1").html("")
            }
        });

        $("#lastname").change(function () {
            if ($("#lastname").val().length < 2) {
                $("#error2").html("Nom trop court");
            }
            else {
                $("#error2").html("")
            }
        });

        $("#login").change(function () {
            if ($(this).val().length < 2) {
                $("#error11").html("Pseudo trop court");
            }
            else {
                $("#error11").html("")
            }
        });

        $("#city").change(function () {
            if ($("#city").val().length < 3) {
                $("#error5").html("Ville trop courte");
            }
            else {
                $("#error5").html("")
            }
        });

        $("#zcode").change(function () {
            if ($(this).val().length != 5 || isNaN($(this).val())) {
                $("#error6").html("Le code postal doit être de 5 chiffres");
            }
            else {
                $("#error6").html("")
            }
        });

        var reg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        $("#email").change(function () {
            if (!(reg.test($(this).val()))) {
                $("#error10").html("email invalide");
            }
            else {
                $("#error10").html("")
            }
        });

        $("#password").change(function () {
            if ($(this).val().length < 6) {
                $("#error8").html("Le mot de passe doit contenir au minimum 6 caracères");
            }
            else {
                $("#error8").html("")
            }
        });

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
