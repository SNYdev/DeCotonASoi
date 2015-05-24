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
