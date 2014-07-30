<?php

echo "<p>Loading config.php...";
require_once dirname(__DIR__) . '/config.php';
echo " done!</p>\n";

echo "<p>Connecting to database...";
require_once __DIR__ . '/functions-database.php';
echo " done!</p>\n";
if ($mysql->error)
	die( "Error: " . $mysql->error);

echo "<p>Creating Options Table...";
// Create Options table and Primary Key
$mysql->query("CREATE TABLE " . MYSQL_DB . "." . MYSQL_PREFIX . "options (name VARCHAR(50), value TEXT());");
$mysql->query("ALTER TABLE " . MYSQL_DB . "." . MYSQL_PREFIX . "options ADD PRIMARY KEY (name);");
// Add default info for Options (to edit by user later)
$mysql->query("INSERT INTO  `" . MYSQL_DB . "`.`" . MYSQL_PREFIX . "options` (`name` ,`value`) VALUES
		('version',  '0.0.1 alpha'), ('site_name',  'PHP Workspace');");
echo " done!</p>\n";

echo "<p>Creating users table...";
// Create users table & primary key
$mysql->query("CREATE TABLE " . MYSQL_DB . "." . MYSQL_PREFIX . "users (username VARCHAR(50), 
		password VARCHAR(255), email VARCHAR(100), dob DATE(), last_login DATE(), account_created DATE(), 
		real_name VARCHAR(75), groups );");
$mysql->query("ALTER TABLE " . MYSQL_DB . "." . MYSQL_PREFIX . "users ADD PRIMARY KEY (username);");
echo " done!</p>\n";
echo "<p>Creating Admin user...";
// Create dummy admin user
$p = password_hash("password", PASSWORD_DEFAULT);
$d = date("Y-m-d");
$mysql->query("INSERT INTO " . MYSQL_DB . "." . MYSQL_PREFIX . "users
		(username, password, email, dob, last_login, account_created, real_name) VALUES
		('admin', '".$p."', 'example@example.com', 1970-01-01, ".$d.", ".$d.", 'Administrator');");
echo " done!</p>\n";
echo "<p>Creating login script...";
// Set up login script
$mysql->query("CREATE PROCEDURE `user_login`(IN `user` VARCHAR(50), IN `prefix` VARCHAR(15)) 
		READS SQL DATA SQL SECURITY INVOKER	SELECT * FROM prefix users WHERE username = user");
echo " done!</p>\n";