<form action="http://localhost/Projet/TD3/SupInternetTweeter-mathieu-phung/?page=message" method="post">
    <p>Message : <input type="text" name="message" /></p>
    <p><input type="submit" /></p>
</form>

<?php
echo $_SESSION['user']['name'] . " est connecté.";

if(isset($_POST['message'])) {
	$message->addMessage($_SESSION['user']['id'], $_POST['message']);
}
?>