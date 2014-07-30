<?php
/**
 * This sets the PATH constant, and loads the app.
 *
 * If the config.php file is missing, then the user will be asked
 * to create it.
 *
 * Also loads constants.php to get the constants needed for running.
 * 
 * @see constants.php
 * @see includes/load-includes.php"
 * @since 0.0.1
 * 
 */ 

// Load constants into memory
require __DIR__ . "/constants.php";

// Load files in includes
require INCLUDES . "/load-includes.php";

/** If TRUE, the page has been loaded via "load.php" */
define("LOADED", TRUE);

/** The name of the site, chosen in the Options */
define("siteName", getData("site_name", "value", "options"));