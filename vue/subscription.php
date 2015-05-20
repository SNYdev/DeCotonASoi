<form action="" method="post">
    <p>Prénom* : <input type="text" name="firstname" id="firstname"/></p><p id="error1"></p>
    <p>Nom* : <input type="text" name="lastname" id="lastname" /></p><p id="error2"></p>
    <p>Pseudo* : <input type="text" name="login" id="login" /></p><p id="error11"></p>
    <p>Mensuration : <input type="text" name="size" id="size" /></p><p id="error3"></p>
    <p>Adresse* : <input type="text" name="address" id="address" /></p><p id="error4"></p>
    <p>Ville* : <input type="text" name="city" id="city" /></p><p id="error5"></p>
    <p>Code postal* : <input type="text" name="zcode" id="zcode" /></p><p id="error6"></p>
    <p>Email* : <input type="text" name="email" id="email" /></p><p id="error10"></p>
    <p>Téléphone : <input type="tel" name="tel" id="tel" /></p><p id="error7"></p>
    <p>Mot de passe* : <input type="password" name="password" id="password" /></p><p id="error8"></p>
    <p>Vérificaion mot de passe* : <input type="password" name="password_check" id="password_check" /></p><p id="error9"></p>
	<p><input type="submit" /></p>
</form>

<script>
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

<?php
if(!empty($_POST['firstname'])  && !empty($_POST['lastname']) && !empty($_POST['login']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zcode']) && !empty($_POST['password']) && !empty($_POST['password_check']) && !empty($_POST['email']) && (strlen($_POST['firstname']) >= 2) && (strlen($_POST['lastname']) >= 2) && (strlen($_POST['login']) >= 2) && (strlen($_POST['city']) >= 3) && (strlen($_POST['zcode']) == 5) && is_numeric($_POST['zcode']) && (strlen($_POST['password']) >= 6) && ($_POST['password_check'] === $_POST['password'])) {
    $count = $user->countUserByName($_POST['login']);

    if($count['nb_user']) {
        $user->addMessageFlash('info','Login existe déjà.');
    }
    else {
        $user->addUser($_POST['firstname'], $_POST['lastname'], $_POST['login'], $_POST['password'], $_POST['address'],$_POST['city'], $_POST['zcode'], $_POST['email']);
        $info = $user->getUserByName($_POST['firstname']);

        $_SESSION['user'] = ['id' => $info['id'], 'name' => $info['login']];

        $user->addMessageFlash('success','Inscription réussie !');

        header('Location: http://localhost/DeCotonASoi/');

        exit;
    }
}
else {
    $user->addMessageFlash('info','Le formulaire a été mal saisi.');
}

?>