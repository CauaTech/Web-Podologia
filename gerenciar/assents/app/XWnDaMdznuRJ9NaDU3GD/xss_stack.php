<?php 
function input($text)
{
	$text_xss = $text;
	$text_xss = stripslashes($text_xss);
	$text_xss = htmlspecialchars($text_xss);
	$text_xss = filter_var($text_xss, FILTER_SANITIZE_STRING);
	$text_xss = htmlentities(utf8_decode($text_xss));

	return $text_xss;
}
?>
