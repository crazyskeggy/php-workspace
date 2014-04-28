<?php
/**
 * Loads files in the /includes directory
 * 
 * Also checks the server setup for compatibility, so that other files can be loaded
 * {@see includes/checkserver.php}
 */
require INCLUDES . "/checkserver.php";
// To load some of the other files, we need to run the "checkserver" checks
loadConfigPHP(); // Loads "config.php"
checkPHP(); // Check that PHP is at the right version
checkMySQL(); // checks that MySQL is set up to work with PHP
maintenanceCheck(); // Checks for a ".maintenace" file
setLangsDir(); // Sets the languages directory

/** Reference to the files directory - uses `FILES_DIR` set by the user in `config.php` */
define("FILES", PATH . FILES_DIR);

require INCLUDES . "/functions-theme.php"; // Functions for themes
require INCLUDES . "/functions-language.php"; // Functions for translating
require INCLUDES . "/functions-database.php"; // Functions for MySQL Databases