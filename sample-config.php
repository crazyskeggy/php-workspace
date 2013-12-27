<?php
/*
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
 * require "/path/to/config.php";
 *
 * and put this file elsewhere.
 * 
 */


# MySQL Username
define("MYSQL_USER", "");

# MySQL Password
define("MYSQL_PASS", "");

# MySQL Hostname
define("MYSQL_SERVER", "localhost");

# MySQL Databse Name
define("MYSQL_DB", "");

# MySQL Table Prefix
# You can change this setting to have multiple installations of
# PHP Workspace in the same database.
# It must end in an underscore, and contain only A-Z, a-z, 0-9 and _
define("MYSQL_PREFIX", "pw_")

# Default Language - the language must be installed in /includes/langs
define("DEFAULT_LANG", "en-GB");

/* That's everything! You can now start your installation! */

?>
