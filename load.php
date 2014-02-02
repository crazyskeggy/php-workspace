<?php
/**
 * This sets the PATH constant, and loads the app.
 *
 * If the config.php file is missing, then the user will be asked
 * to create it.
 * 
 * Also loads includes/checkserver.php to check the server setup for compatibility.
 * {@see includes/checkserver.php}
 * 
 * Also loads includes/constants.php to get the constants needed for running.
 * {@see includes/constants.php}
 * 
 * @since 0.0.1
 * 
 */ 

/** Define PATH as the current directory. */
define("PATH", __DIR__ . '/');
require PATH . "/constants.php";


// Load files in includes
require INCLUDES . "/checkserver.php";
require INCLUDES . "/themes.php";
		
// call functions from checkserver.php
loadConfigPHP();
checkPHP();
checkMySQL();
maintenanceCheck();
setLangsDir();
