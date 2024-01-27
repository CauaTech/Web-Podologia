<?php 
function decrypto_64($string) {
	$start = "??//";
	$end = "//??";
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function decrypto_stack($decrypto, $iv_key)
{
	$de_string = $decrypto;
	$iv =  $iv_key;
	$data = "AES-256-CBC";
	$chave_private = "A5Zdt2sqId6AUV61A51a7EkArU484Aj0ZryOp6OSrLT0TPT36leBNQWptu8zc4bU";
	$de_string = openssl_decrypt(base64_decode($de_string), $data, $chave_private, OPENSSL_RAW_DATA, $iv);
	$de_string = decrypto_64($de_string, "??//", "//??");
	return $de_string;
}

?>