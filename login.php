<?php
/**
 * Show a login form
 */
session_start();
require __DIR__ . '/constants.php';
require INCLUDES . "/load-includes.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo _t("login_title") . "|" . siteName; ?></title>
	</head>
	<body>
		<h1><?php _te("login_title"); ?></h1>
		<form method="post" action="<?php echo PATH . "do_login.php"; ?>">
			<p>
				<label><?php _te("username_or_email");?>
				<input type="text" name="username" /></label>
			</p>
			<p>
				<label><?php _te("password");?>
				<input type="password" name="password" /></label>
			</p>
			<p>
				<input type="submit" value="<?php _te("login_button");?>" />
			</p>
		</form>
	</body>
</html>