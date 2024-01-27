<?php 
function input($text)
{
	$text_xss = $text;
	$text_xss = htmlentities(utf8_decode($text_xss));

	return $text_xss;
}
?>
