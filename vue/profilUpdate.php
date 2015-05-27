    <form action="" method="post" class="formInscription">
        <p>Civilité :<?php
            if($_SESSION['user']['gender'] === 1) {
                echo "Madame";
            }
            else {
                echo "Monsieur";
            }
            ?>
        </p>
        Prénom : <?php echo $_SESSION['user']['firstname']; ?></p>
        Nom : <?php echo $_SESSION['user']['lastname']; ?></p></p>
        *Pseudo : <input type="text" name="login" class="inputSubscription" id="login" />
        <p id="error11"></p>
        Mensuration :<input type="text" name="size" class="inputSubscription" id="size" />
        <p id="error3"></p>
        *Adresse :<input type="text" name="address" class="inputSubscription" id="address" />
        <p id="error4"></p>
        *Ville :<input type="text" name="city" class="inputSubscription" id="city" />
        <p id="error5"></p>
        *Code postal :<input type="text" name="zcode" class="inputSubscription" id="zcode" />
        <p id="error6"></p>
        *Email :<input type="text" name="email" class="inputSubscription" id="email" />
        <p id="error10"></p>
        Téléphone :<input type="tel" name="tel" class="inputSubscription" id="tel" />
        <p id="error7"></p>
        *Mot de passe :<input type="password" name="password" class="inputSubscription" id="password" />
        <p id="error8"></p>
        *Vérificaion mot de passe :<input type="password" name="password_check" class="inputSubscription" id="password_check" />
        <p id="error9"></p>
        Newsletter : Je souhaite recevoir les newsletter Du coton à soie<input type="checkbox" name="newsletter" id="checkboxNewsletter"/><br>  
        <input type="submit" class="" id="submitProfil"/></p>
    </form>
// <?php
if(!empty($_POST['login']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['zcode']) && !empty($_POST['password']) && !empty($_POST['password_check']) && !empty($_POST['email']) && (strlen($_POST['login']) >= 2) && (strlen($_POST['city']) >= 3) && (strlen($_POST['zcode']) == 5) && is_numeric($_POST['zcode']) && (strlen($_POST['password']) >= 6) && ($_POST['password_check'] === $_POST['password'])) {
    $count = $user->countUserByName($_POST['login']);

    if(empty($_POST['tel'])) {
        $_POST['tel'] = '';
    }

    if($count['nb_user']) {
        $user->addMessageFlash('info','Login existe déjà.');
    }
    else {
        $user->updateUser($_SESSION['user']['id'], $_POST['login'], $_POST['password'], $_POST['address'],$_POST['city'], $_POST['zcode'], $_POST['email'], $_POST['newsletter']);
        $info = $user->getUserByEmailAndPassword($_SESSION['user']['email'], $_SESSION['user']['password']);

        $_SESSION['user'] = ['id' => $info['id'], 'firstname' => $info['prenom'], 'lastname' => $info['nom'], 'gender' => $info['sexe'], 'login' => $info['login'], 'email' => $info['email'], 'newsletter' => $info['Newsletter'], 'address' => $info['adresse'], 'city' => $info['ville'], 'zcode' => $info['codePostal'], 'tel' => $info['telephone'], 'password' => $info['motDePasse']];

        $user->addMessageFlash('success','Modification réussie !');

        header('Location: http://localhost/DeCotonASoi/');

        exit;
    }
}
else {
    echo 'Le formulaire a été mal saisi.';
}

?>

<script>
    $(function() {
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