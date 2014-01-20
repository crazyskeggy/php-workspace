<?php
/**
 * Checks the server before running.
 * 
 * Checks the following:
 * config.php
 * PHP version
 * MySQL installed
 * The .maintenance file
 * The /languages directory (unless changed by user in config.php)
 * 
 * @since 0.0.1
 */

/**
 * Check for config.php and load it.
 * 
 * If config.php doesn't exist, die with an error.
 * 
 * @return void
 */
function loadConfigPHP() {
	if (file_exists(PATH . "config.php")) {
		require PATH . "config.php";
	}
	else {
		$die = "<p>config.php missing! Rename sample-config.php to config.php and fill it in.</p>";
		$die .= "<p>Alternatively, you can put a PHP \"require\" statement in the file, pointing to a location off the server.</p>";
		die($die);
	}
}

/**
 * Check the PHP version using constants in constants.php
 * 
 * @return void
 */
function checkPHP() {
	if (phpVersion < phpRequired) {
		$die = "<p>Your PHP version is too low!</p>";
		$die .= "<p>PHP Workspace " . strval(pwVersion) . " needs PHP " . strval(phpRequired) . ", but your server only has PHP " . phpVersion . ".";
		die($die);
	}
}

/**
 * Check if PHP MySQL is installed 
 * 
 * @return void
 */
function checkMySQL() {
	if (! extension_loaded('mysql')) {
		$die = "<p>The PHP MySQL extension needs to be installed for PHP Workspace to run</p>";
		die($die);
	}
}

/**
 * Dies with message when in maintenance mode.
 * 
 * If a file called .maintenance exists, PHP Workspace dies with maintenance message.
 * 
 * @return void
 */
function maintenanceCheck() {
	if ( file_exists( PATH . '.maintenance' ))
		die("<h1>This site is currently under maintenance. Please reload the page later.");
}

/**
 * Sets the languages directory location
 * 
 * @return void
 */
function setLangsDir(){
	if (!defined("LANG_DIR")) {
		if (is_dir(INCLUDES . "/languages")) {
			define("LANG_DIR", INCLUDES . "/languages");
		}
		else {
			$die = "<h2>No Languages Directory!</h2>";
			$die .= "<p>Please create the directory <code>/phpworkspace/content/languages</code>,";
			$die .= 'or add <code>define("LANG_DIR", "/path/to/languages");</code> to config.php!';
			die($die);
		}
	}
}
