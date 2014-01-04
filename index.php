<?php
/** 
 * This page does nothing.
 * All it does is load the load.php file, which loads the entire application.
 * 
 * The GET and POST parameters control which "page" is to be loaded.
 * A .htaccess file can be used to show a regular directory structure in the address bar
 * 
 * @since 0.0.1
 * 
 */

/** @ignore */
require 'load.php';

/** Set the PAGE constant to the ?page parameter */
define("PAGE", $_GET["page"]);
?>
