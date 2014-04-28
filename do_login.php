<?php
session_start();
require_once __DIR__ . "/constants.php";

if ( array_key_exists($_POST, 'username') && array_key_exists($_POST, 'password') ) {
	$u = $_POST['username'];
	$p = $_POST['password'];
}

$hash = getDbData($u, "pass", "users");
$verified = password_verify($p, $hash);

if ($verified) {
	$_SESSION['user'] = $u;
	$_SESSION['SID'] = SID;
	header("HTTP/1.1 303 Temporary Redirect");
	header("Location: " . PATH);
}
