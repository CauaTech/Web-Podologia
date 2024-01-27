<?php 

define('HOST','localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'amanda_podologia');

$connect = @mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Estamos com erro de conex«ªo ao banco de dados, tente novamente mais tarde');

?>