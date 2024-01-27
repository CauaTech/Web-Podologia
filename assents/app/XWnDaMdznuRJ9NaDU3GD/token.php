<?php 
function gen($len_of_gen_str){
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12345678901234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12345678901234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12345678901234567890";
    $token = "";
    $var_size = strlen($chars);
    for( $x = 0; $x < $len_of_gen_str; $x++ ) {  
        $random_str= $chars[ rand( 0, $var_size - 1 ) ]; 
        $token =  "$token$random_str"; 
    }
    return $token;
}
 ?>