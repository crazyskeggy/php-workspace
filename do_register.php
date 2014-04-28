<?php
session_start();
require_once __DIR__ . "/constants.php";

if ( array_key_exists($_POST, 'username')
	&& array_key_exists($_POST, 'password')
	&& array_key_exists($_POST, 'password_confirm')
	&& array_key_exists($_POST, 'email')
	&& array_key_exists($_POST, 'email_confirm')
	&& array_key_exists($_POST, 'email') ) {
	$u = $_POST['username'];
	$p = $_POST['password'];
}