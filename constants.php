<?php
/**
 * Loads the constants into memory.
 */

/** Current PHP version */
define("phpVersion", phpversion());
/** Required PHP version */
define("phpRequired", 5.4);
/** Full Version number of PHP Workspace */
define("pwVersion", "0.0.1 alpha");
/** Version of PHP Workspace that can be used as a condition */
define("pwMinorVersion", 0.0);
/** Reference to /includes directory for use in other scripts */
define("INCLUDES", PATH . "includes");
/** Reference to /content directory for use in other scripts */
define("CONTENT", PATH . "content");
