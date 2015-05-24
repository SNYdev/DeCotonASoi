<<<<<<< HEAD
    <br><br><br><br>
    
     <form>
        <fieldset>
            <legend>VOUS POSSEDEZ DEJA UN COMPTE</legend><br>
            Identifiez-vous<br>
            E-mail<br>
            <input type="text" name="mail"><br>
            Mot de passe<br>
            <input type="text" name="pass"><br>
            Mot de passe oublié ?<br>
            <input type="submit" value="Submit">
         </fieldset>
    </form>
    
    VOUS SOUHAITEZ CREER UN COMPTE ?<br>
    <br>
    <p>En créant un compte sur notre boutique, vous aurez accès à l’ensemble de nos services :<br>
    <br>
    - Consultation et suivi de vos commandes.<br>
    <br>
    - Rencontre et échange avec des stylistes.<br>
    <br>
    - Création de votre lingerie.<br>
    <br>
    - Invitations aux ventes privées.<br>
    <br>
    - Et bien d’autres avantages encore…
    </p>
    
    <a href="#"><img class="B-create-account" alt="B-create-account" src="#"></a>
    
    <br><br><br><br>
=======
<form action="" method="post">
    <p>Email : <input type="text" name="email" /></p>
    <p>Mot de passe : <input type="password" name="password" /></p>
   	<p><input type="submit" /></p>
</form>

<?php
	if(!empty($_POST['email'])) {
		if(!empty($_POST['password'])) {
			$response = $user->getUserByEmailAndPassword($_POST['email'], $_POST['password']);
			if ($response) {
				$_SESSION['user'] = ['id' => $response['id'], 'firstname' => $response['prenom'], 'lastname' => $response['lastname'], 'gender' => $response['sexe'], 'name' => $response['login']];

				header('Location: http://localhost/DeCotonASoi/');
				exit;

	        }

	        else {
	            echo "Login et/ou mot de passe invalide.";
	        }
	        
	    }
	}
				
?>
>>>>>>> 7c40a6838fa3f51cf69b32d7f6f139149ae3e6dd
