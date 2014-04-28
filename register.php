<?php
/**
 * Show a registration form
 */
session_start();
require_once __DIR__ . '/constants.php';
?>

<h1><?php _te("login_title"); ?></h1>
		<form method="post" action="<?php echo PATH . "do_register.php"; ?>">
			<p>
				<label><?php _te("email");?>
				<input type="text" name="username" /></label>
			</p>
			<p>
				<label><?php _te("password");?>
				<input type="password" name="password" /></label>
			</p>
			<p>
				<label><?php _te("password_confirm");?>
				<input type="password" name="password_confirm" /></label>
			</p>
			<p>
				<label><?php _te("email");?>
				<input type="text" name="email" /></label>
			</p>
			<p>
				<label><?php _te("email_confirm");?>
				<input type="text" name="email_confirm" /></label>
			</p>
			<p>
				<input type="submit" value="<?php _te("login_button");?>" />
			</p>
		</form>