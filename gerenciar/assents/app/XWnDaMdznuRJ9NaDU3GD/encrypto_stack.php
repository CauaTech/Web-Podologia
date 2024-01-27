<?php 
function encrypto_stack($encrypto, $iv_key)
{
	$encrypto = 'KvMVCrccROwq0+gq1xAqK1lXvNfasodjlakfdsjYsFWv7xGgmEPdyCts=??//'.$encrypto.'//??KvMVCrccROwq0+gqfdsafa1xAqK1lXvNY3424zsFWv7xGgmEPdyCts=';
	$en_string = $encrypto;
	$iv =  $iv_key;
	$data = "AES-256-CBC";
	$chave_private = "A5Zdt2sqId6AUV61A51a7EkArU484Aj0ZryOp6OSrLT0TPT36leBNQWptu8zc4bU";
	$en_string = openssl_encrypt($en_string, $data, $chave_private, OPENSSL_RAW_DATA, $iv);
	$en_string = base64_encode($en_string);

	return $en_string;
}

?>