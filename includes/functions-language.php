<?php
/**
 * Functions for languages.
 */

/**
 * Loads the language strings into memory.
 */
function loadLanguage(){
	global $lang, $langStrings;
	require INCLUDES . "/language/$lang.php";
	$langStrings = $$lang;
}
/**
 * Translates a string from the strings. See `_t` and `_te` for shorthand notation.
 * 
 * @param string $string The string you want to translate
 * @return string The translated string.
 * @see _t
 * @see _te
 */
function translate($string){
	global $langStrings;
	return $langStrings[$string];
}

/**
 * Alias for `translate`. If you would rather echo the output, use `_te`.
 * 
 * @see translate
 * @see _te
 */
function _t($string){
	return translate($string);
}

/**
 * Like `_t`, but echos rather than returns the output.
 * 
 * @see translate
 * @see _t
 */
function _te($string){
	echo translate($string);
}