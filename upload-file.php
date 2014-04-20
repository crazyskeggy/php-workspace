<?php
/**
 * An HTML page is designed to POST to this page.
 * 
 * If there is no file uploaded, then show an upload form.
 * 
 * @since 0.0.1
 */
/*
 * If the page has been loaded with "load.php"
 * 
 * LOADED could be "NULL" or "FALSE" - we don't know, so we'll use this style of "if" statement
 * instead of "if (!LOADED)"
 */
if (LOADED){}
else {
	require __DIR__ . "constants.php";
	require INCLUDES . "load-includes.php";
	// make sure the page can run on the server
	loadConfigPHP();
	checkPHP();
	checkMySQL();
	maintenanceCheck();
	setLangsDir();
}

/* 
 * If a file has been uploaded, save it.
 * If no file has been uploaded, show an upload form.
 */
$fileExists = array_key_exists("file", $_FILES);
if ($fileExists) {
	$fromPath = $_FILES['file']['tmp_name'];
	$fileName = basename($_FILES['file']['name']);
	$saveDir = PATH . '/files/';
	$toPath = $toDir . $fileName;
	$error = move_uploaded_file($fromPath, $toPath);
	if ($error) {
		echo "File was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
	}
	exit();
}
else {
?>
<!-- The following only shows if there is no file uploaded, as it is part of the PHP else clause  -->
<form enctype="multipart/form-data" action="<?= PATH . 'upload-file.php'; ?>" method="POST">
	<!-- MAX_FILE_SIZE must precede the file input field -->
	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	<!-- Name of input element determines name in $_FILES array -->
	<label>
		<? _te("label_file"); ?>
		<input name="fileData" type="file" />
	</label><br />
	<label>
		<? _te("label_folder"); ?>
		<input name="folder" type="text" />
	</label><br />
	<label>
		<? _te("label_description"); ?>
		<textarea name="description" cols=50 rows=5></textarea>
	</label><br />
	<label>
		<? _te("label_description"); ?>
		<input type="text" name="fileName" />
	</label><br />
	<input type="submit" value="<? _te("submit_button"); ?>" />
</form>
<?php } 