<?php
echo $_SESSION['user']['name'] . ' est connecté.';
$messages = $message->getUserByMessage($_SESSION['user']['name']);

foreach ($messages as $key => $value) {
	echo '<p>' . $value['login'] . " : " . $value['message'] . '</p>';
}
?>
