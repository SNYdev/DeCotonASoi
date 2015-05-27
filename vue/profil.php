<?php
$profile = $user->getUserByLogin($_SESSION['user']['login']);
var_dump($profile);
if($profile[0]['sexe'] === 1) {
	echo "<p>Civilité : Madame</p>";
}
else {
	echo "<p>Civilité : Monsieur</p>";
}
echo "<p>Prénom : " . $profile[0]['prenom'] . "</p>";
echo "<p>Nom : " . $profile[0]['nom'] . "</p>";
echo "<p>Pseudo : " . $profile[0]['login'] . "</p>";
echo "<p>Adresse : " . $profile[0]['adresse'] . "</p>";
echo "<p>Ville : " . $profile[0]['ville'] . "</p>";
echo "<p>Code postal : " . $profile[0]['codePostal'] . "</p>";
echo "<p>Email : " . $profile[0]['email'] . "</p>";
if(isset($profile[0]['telephone'])) {
	echo "<p>Téléphone : " . $profile[0]['telephone'] . "</p>";
}
else {
	echo "<p>Téléphone : Non renseigné</p>";
}
if($profile[0]['Newsletter'] === 1) {
	echo "<p>Vous êtes abonné à la newsletter</p>";
}
else {
	echo "<p>Vous n'êtes pas abonné à la newsletter</p>";
}
?>

<a href="?page=profilUpdate" title="Modifier le profil">Modifier le profil</a>