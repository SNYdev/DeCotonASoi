<form action="http://localhost/Projet/TD3/SupInternetTweeter-mathieu-phung/?page=login" method="post">
    <p>Login : <input type="text" name="name" /></p>
    <p>Mot de passe : <input type="password" name="password" /></p>
   	<p><input type="submit" /></p>
</form>

<?php
	if(isset($_POST['name'])) {
		if(isset($_POST['password'])) {
			$response = $user->getUserByNameAndPassword($_POST['name'], $_POST['password']);

			if ($response) {
                $_SESSION['user'] = ['id' => $response['id'], 'name' => $response['login']];

				header('Location: http://localhost/DeCotonASoi/?page=message');
				exit;

	        }

	        else {
	            echo "Login et/ou mot de passe invalide.";
	        }
	        
	    }
	}
				
?>
