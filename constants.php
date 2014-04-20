<?php
/**
 * Loads most constants into memory.
 */

// Set constants containing info about PHP Workspace up

/** Current PHP version */
define("phpVersion", phpversion());
/** Required PHP version */
define("phpRequired", 5.4);
/** Full Version number of PHP Workspace */
define("pwVersion", "0.0.1 alpha");
/** Version of PHP Workspace that can be used as a condition */
define("pwMinorVersion", 0.0);

// Set various folder constants up (MySQL-related constants are set in "config" FILES is set in "load-includes")
/** Reference to /includes directory for use in other scripts */
define("INCLUDES", PATH . "includes");
/** Reference to /content directory for use in other scripts */
define("CONTENT", PATH . "content");
