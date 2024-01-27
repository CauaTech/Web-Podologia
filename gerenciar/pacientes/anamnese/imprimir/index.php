<?php 
$int = 3;
if ($int == 0) {
	$flow = "./";
}elseif ($int == 1) {
	$flow = "../";
}elseif ($int == 2) {
	$flow = "../../";
}elseif ($int == 3) {
	$flow = "../../../";
}elseif ($int == 4) {
	$flow = "../../../../";
}elseif ($int == 5) {
	$flow = "../../../../../";
}elseif ($int == 6) {
	$flow = "../../../../../../";
}
?>
<!DOCTYPE html>
<html>

<!--HEAD COMPLETO-->
<head>
	<title>Imprimir</title>
	<meta name="language" content="pt-BR">
	<meta name="description" content="Bem-vindo ao site da nossa empresa de criação de sites! Somos especializados em oferecer soluções web personalizadas e de alta qualidade para atender às necessidades específicas de cada um de nossos clientes.">
	
	<meta name="robots" content="all">
	<meta name="author" content="M0rx">

	<meta name="keywords" content="Stack, StackStore, Comprar site, preciso de um site, criador de site, programador">

	<link rel="canonical" href="https://stackstore.com.br"/>
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://stackstore.com.br/assents/img/logo/NewLogo7.png">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image" content="https://stackstore.com.br/assents/img/logo/NewLogo7.png">

	<?php include($flow.'assents/app/head.php');?>
</head>

<?php

include($flow.'assents/app/account-check.php');

if (isset($_GET['token'])) {
	$token = $_GET['token'];

	$sql_paciente = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$token'";
	$consult = $connect->query($sql_paciente);
	$info_paciente = $consult->fetch_array();
}

?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php #include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->
<div class="admin-body">
	<div class="container">
		<h4 class="title-admin"><?php echo $info_paciente['paciente_token']; ?> | <?php echo $info_paciente['Nome']; ?> | <button class="btn btn-sm btn-style" onclick="window.print()">Imprimir</button></h4>
		<hr>
		<h6>Declaro que as informações acima são verdadeiras, não cabendo ao profissional quaisquer responsabilidades por informações omitidas nessa avaliação. Tenho ciencia e estou de acordo a respeito dos procedimentos envolvidos.</h6>
		<br>
		Data : <?php echo date('d-m-Y'); ?>
		<br>
		Assinatura : ___________________
		<hr>
		<br>
		<br>
	</div>
</div>


<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>