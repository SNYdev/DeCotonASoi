<?php
$_SESSION = array();
session_destroy();

header('Location: http://localhost/DeCotonASoi/');
exit;
