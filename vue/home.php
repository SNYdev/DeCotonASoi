<?php
$reponse = $message->getAllMessages();

foreach ($reponse as $key => $value) {
	echo '<p>' . $value['login'] . " : " . $value['message'] . '</p>';
}
?>