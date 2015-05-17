<form action="http://localhost/Projet/TD3/SupInternetTweeter-mathieu-phung/?page=inscription" method="post">
	<p>Login : <input type="text" name="name" /></p>
    <p>Mot de passe : <input type="password" name="password" /></p>
	<p><input type="submit" /></p>
</form>

<?php
if(isset($_POST['name'])) {
	if(isset($_POST['password'])) {
		    $count = $user->countUserByName($_POST['name']);

            if($count['nb_user']) {
            
                $user->addMessageFlash('info','Login existe déjà.');
            }

            else {
                $user->addUser($_POST['name'], $_POST['password']);
                $info = $user->getUserByName($_POST['name']);

                $_SESSION['user'] = ['id' => $info['id'], 'name' => $info['login']];

                $user->addMessageFlash('success','Inscription réussi !');

                header('Location: http://localhost/DeCotonASoi/?page=message');

                exit;
            }
	}
}

?>