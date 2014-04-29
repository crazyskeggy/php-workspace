<?php
/**
 * Functions for connecting to Databases.
 * 
 * Currently, we support the following Database Servers:
 * 
 * * MySQL
 * 
 * 
 * 
 */
$mysql = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);


/**
 * Gets data from the Database.
 * 
 * @param string $row The value of the Primary Key in that row
 * @param string $column The column you want to load data from
 * @param string $table The table you want to load data from (without prefix)
 * @return mixed Returns the data requested by the user.
 */
function getDbData($row, $column, $table) {
	$prefixed = MYSQL_PREFIX . $table;
	$prKey = getPrKey();
	$data = $mysql->query("SELECT * FROM $table WHERE $prKey = $row;");
	return $data[$column];
}

/**
 * Gets the Primary Key of a table.
 * 
 * All Databse tables must have only one primary key, which
 * is used to find which row to update.
 * The Primary Key must be used to name a row in the table.
 * 
 * @param string $table The table we are checking (including prefix)
 * @return string Name of Primary Key Column
 */
function getPrKey($table) {
		$pkrow = $mysql->query("SHOW KEYS FROM" . $table . "WHERE Key_name = 'PRIMARY';");
		return $pkrow["Column_name"];;	
}

/**
 * Saves or updates the data in a table.
 * 
 * Note: If you can, make sure the primary key column is one of the columns you are saving to.
 * Otherwise, you might create a new row, which may provide unwanted results.
 * 
 * @param string $table The table we are inserting the data into (minus the prefix)
 * @param string $cols The columns, comma separated
 * @param string $vals The values, comma separated, that go into the respective columns
 * @return void
 */
function saveDbData($table, $cols, $vals){
	$table = MYSQL_PREFIX . $table;
	$mysql->query("INSERT INTO $table ( $cols ) VALUES ($vals) ON DUPLICATE KEY UPDATE;");
}