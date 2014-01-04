<?php
/**
 * The base configuration of PHP Workspace
 *
 * This file contains the following settings:
 * MySQL Settings
 * Hash Keys
 * Default Language
 *
 * It is reccomended that you do not store this in a server-visible
 * directory. If you do this, you must create "config.php" with the
 * following data:
 *
 * ```
 * <?php
 * require "/path/to/config.php";
 * ```
 *
 * and put this file elsewhere.
 * 
 * @since 0.0.1
 * 
 */

/** The Database PHP Workspace will run in */
define("MYSQL_DB", "");

/** The username of the MySQL user */
define("MYSQL_USER", "");

/** The password of the MySQL user */
define("MYSQL_PASS", "");

/** The MySQL server (usually localhost) */
define("MYSQL_SERVER", "localhost");


/**
 * MySQL Table Prefix
 * 
 * You can change this setting to have multiple installations of PHP Workspace
 * in the same database.
 * It must end in an underscore, and contain only A-Z, a-z, 0-9 and _
 * As a regex: `[A-Za-z0-9_]+_` 
 */
define("MYSQL_PREFIX", "pw_");

/**
 * The default language for PHP workspace.
 * 
 * Languages are kept in the /includes/languages directory
 */
define("DEFAULT_LANG", "en");

/* That's everything! You can now start your installation! */

?>