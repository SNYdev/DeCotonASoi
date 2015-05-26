<div class="contentLogin">
    <input type="button" id="profilButton-login" value="Mon compte - De coton à soie">
    <h1 class="titleLogin" id="presentation">VOUS POSSEDEZ DEJA UN COMPTE ?</h1>
    <div class="formLog">
        <h2 class="subTitleLogin" id="identify">Identifiez-vous</h2>
        <form action="" method="post">
            E-mail <input type="text" class="inputLogin" id="logMail" name="email"/><br>
            Mot de passe<input type="password" class="inputLogin" id="logPass" name="password"/>
            <!-- Mot de passe oublié ? -->
            <br> <input type="submit" class="submitDCAS" id="logSubmit" value="Submit">
        </form>
    
    <h1 class="titleLogin" id="inscription">VOUS SOUHAITEZ CREER UN COMPTE ?</h1>
    
    <p class="areaLog">En créant un compte sur notre boutique, vous aurez accès à l’ensemble de nos services :<br>
    - Consultation et suivi de vos commandes. <br>
    - Rencontre et échange avec des stylistes. <br>
    - Création de votre lingerie.<br>
    - Invitations aux ventes privées.<br>
    - Et bien d’autres avantages encore…<br>
    </p>
    
    <a href="?page=inscription"><input type="button" class="submitDCAS" id="log-inscription" value="CREER UN COMPTE"></a>
    </div>
</div>
    
    


<?php
	if(!empty($_POST['email'])) {
		if(!empty($_POST['password'])) {
			$info = $user->getUserByEmailAndPassword($_POST['email'], $_POST['password']);
			if ($info) {
                $_SESSION['user'] = ['id' => $info['id'], 'firstname' => $info['prenom'], 'lastname' => $info['nom'], 'gender' => $info['sexe'], 'login' => $info['login'], 'email' => $info['email'], 'newsletter' => $info['Newsletter'], 'address' => $info['adresse'], 'city' => $info['ville'], 'zcode' => $info['codePostal'], 'tel' => $info['telephone'], 'password' => $info['motDePasse']];

                header('Location: http://localhost/DeCotonASoi/');
				exit;
	        }

	        else {
	            echo "Login et/ou mot de passe invalide.";
	        }
	        
	    }
	}
				
?>