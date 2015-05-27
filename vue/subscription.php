<h1 class="titleSubscription" id="subscription-H1">VOS INFORMATIONS PERSONELLES</h1>
<form action="" class="formInscription" method="post">
    <input type="radio" class="checkSubscription" name="gender" value="1" checked/>Mme
    <input type="radio" class="checkSubscription" name="gender" value="2"/>Mr<br>
    Prenom <input type="text" name="firstname" class="inputSubscription" id="firstname"/><p id="error1"></p>
    Nom <input type="text" name="lastname" class="inputSubscription" id="lastname" /><p id="error2"></p>
    Pseudo <input type="text" name="login" class="inputSubscription" id="login" /><p id="error11"></p>
    Adresse postal <input type="text" name="address" class="inputSubscription" id="address" /><p id="error4"></p>
    Ville <input type="text" name="city" class="inputSubscription" id="city" /><p id="error5"></p>
    Code postal <input type="text" name="zcode" class="inputSubscription" id="zcode" /><p id="error6"></p>
    Adresse E-mail <input type="text" name="email" class="inputSubscription" id="email" /><p id="error10"></p>
    Mot de passe <input type="password" name="password" class="inputSubscription" id="password" /><p id="error8"></p>
    Verif. du mot de passe <input type="password" name="password_check" class="inputSubscription" id="password_check" /><p id="error9"></p>
    Téléphone <input type="tel" name="tel" class="inputSubscription" id="tel" /><p id="error7"></p>
    Newsletter<input type="checkbox" class="checkboxSubscription" id="checkboxNewsletter" name="newsletter" value="1"/>
    <p id="p-Subscription">Soyez informée des offres Du Conton à soie et recevez une invitation aux ventes privées du site.</p>
    <input type="submit" id="submitSubscription" value="Je m'inscris">
</form>
    


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
            $info = $user->getUserByEmailAndPassword($_POST['email'], $_POST['password']);

            $_SESSION['user'] = ['id' => $info['id'], 'firstname' => $info['prenom'], 'lastname' => $info['nom'], 'gender' => $info['sexe'], 'login' => $info['login'], 'email' => $info['email'], 'newsletter' => $info['Newsletter'], 'address' => $info['adresse'], 'city' => $info['ville'], 'zcode' => $info['codePostal'], 'tel' => $info['telephone'], 'password' => $info['motDePasse']];

            $user->addMessageFlash('success','Inscription réussie !');

            header('Location: ?page=home');

            exit;
        }
    }
    else {
        User::addMessageFlash('info','Formulaire n\'a pas ou a été mal saisi.');
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
