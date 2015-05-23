<?php
echo $_SESSION['user']['name'] . ' est connecté.';
$profile = $user->getUserByName($_SESSION['user']['name']);

foreach ($profile as $key => $value) {
	echo '<p>' . $key . " : " . $value . '</p>';
}
?>

<a href="?page=profilUpdate" title="Modifier le profil">Modifier le profil</a>