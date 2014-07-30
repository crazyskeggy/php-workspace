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

if ($mysql->connect_error){
	die("MySQL connection error: " . $mysql->connect_error)
}

/**
 * Gets data from the Database.
 * 
 * @param string $row The value of the Primary Key in that row
 * @param string $column The column you want to load data from
 * @param string $table The table you want to load data from (without prefix)
 * @return mixed Returns the data requested by the user.
 */
function getDbData($row, $column, $table) {
	global $mysql;
	$prefixed = MYSQL_PREFIX . $table;
	$prKey = getPrKey($prefixed);
	$query = "SELECT * FROM $prefixed WHERE $prKey = '$row';";
	check_mysql_errors($query);
	$data = $mysql->query($query);
	$result = result_to_array($data);
	return $result[$column];
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
	global $mysql;
	$query = "SHOW KEYS FROM `" . $table . "` WHERE Key_name = 'PRIMARY';";
	$pkresult = $mysql->query($query);
	check_mysql_errors($query);
	$data = result_to_array($pkresult);
	return $data["Column_name"];
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
	global $mysql;
	$prefixed = MYSQL_PREFIX . $table;
	$query = "INSERT INTO $prefixed ( $cols ) VALUES ($vals) ON DUPLICATE KEY UPDATE;";
	$mysql->query($query);
	check_mysql_errors($query);
}

/**
 * Dies with an error if a MySQL error has occured.
 * 
 * @param string $query Last query sent, for display to the user. If left blank, ignored.
 * @return void
 */
function check_mysql_errors($query = NULL){
	global $mysql;
	if ($mysql->error){
		die( "Error: " . $mysql->error . "\n Last query: " . $query );
	}
}

/**
 * Takes a mysqli_result object and converts it into an array.
 * 
 * @param mysql_result $result mysql_result object for
 * @return array An accociative array of 
 */
function result_to_array(mysqli_result $result){
	$output = $result->fetch_assoc();
	return $output;
}