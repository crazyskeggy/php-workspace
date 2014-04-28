<?php
/**
 * Main Template File for Default theme.
 * 
 * This is the generic file, loaded on every page.
 * PHP Functions load the page. They are described on their respective
 * wiki pages.
 * 
 * This is the only required file in a theme, and it must load all other files.
 * To save on bandwidth, use separate files for scripts and Stylesheets.
 * This allows the user's browser to cache the file.
 * 
 * @subpackage Default Theme
 * @since Default Theme 0.0.1
 */
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php loadTitle(); ?></title>
		<?php
			include "theme-head.html";
			$thisDir = __DIR__ . "/";
			echo '<link rel="stylesheet" href="' . $thisDir . 'styles.css" />';
		?>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<?php loadNavbar("default"); ?>
				</ul>
			</nav>
		</header>
		<div class="sidebar-1"><?php loadThemeWidgets("default", "sidebar-1"); ?></div>
		<main class="page-content"><?php loadPageContent("default", PAGE); ?></main>
		<footer class="page-footer"><?php loadThemeFooter("default"); ?></footer>
	</body>
</html>
