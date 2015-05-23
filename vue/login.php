<form action="" method="post">
    <p>Email : <input type="text" name="email" /></p>
    <p>Mot de passe : <input type="password" name="password" /></p>
   	<p><input type="submit" /></p>
</form>

<?php
	if(isset($_POST['email'])) {
		if(isset($_POST['password'])) {
			$response = $user->getUserByEmailAndPassword($_POST['email'], $_POST['password']);
			if ($response) {
                $_SESSION['user'] = ['id' => $response['id'], 'name' => $response['login']];

				header('Location: http://localhost/DeCotonASoi/');
				exit;

	        }

	        else {
	            echo "Login et/ou mot de passe invalide.";
	        }
	        
	    }
	}
				
?>
