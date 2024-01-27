<?php 
$int = 0;
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
	<title>AmandaMatos - Gerenciamento</title>
	<meta name="language" content="pt-BR">
	<meta name="description" content="Um sistema administrativo para consultório de podologia é uma solução tecnológica que ajuda a gerenciar e automatizar tarefas diárias do consultório, melhorando a eficiência e a qualidade dos serviços prestados aos pacientes.">
	
	<meta name="robots" content="all">
	<meta name="author" content="WebVortex">

	<meta name="keywords" content="Podologia, Tratamento de pés, Cuidados com os pés, Calosidades, Unha encravada, Fissuras nos pés">

	<link rel="canonical" href="https://espacopodologia.com.br"/>
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://espacopodologia.com.br/assents/img/logo/Logo.png">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image" content="https://espacopodologia.com.br/assents/img/logo/Logo.png">

	<?php include($flow.'assents/app/head.php');?>
</head>

<?php 


if (isset($_SESSION['account']) && !empty($_SESSION['account'])) {
	header('Location: '.$flow.'agenda/');
}

if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {
	$login = input($_POST['login']);
	$password = input($_POST['password']);
	$password = md5($password);

	$sql_account = "SELECT * FROM `vortex-users` WHERE `users-login`='$login' && `users-password`='$password' && `users-status`='1'";
	$i = $connect->query($sql_account)->num_rows;
	if ($i > 0) {
		$consulta = $connect->query($sql_account);
		$info = $consulta->fetch_array();
		$token = $info['users-token'];
		$_SESSION['account'] = "".$token;
		header('Location: '.$flow.'agenda/');
	}else{
		header('Location: '.$flow.'?notification=fail');
	}
}

?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body class="background-login">

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php #include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->

<div class="container">
	<center>
		<div class="card card-login">
			<div class="card-body">
				<?php 

				if (isset($_GET['notification']) && $_GET['notification'] == "fail") {
					alert("fail","Conta não encontrada.","#d61a36","#fff");
				}

				if (isset($_GET['notification']) && $_GET['notification'] == "reaccount") {
					alert("fail","Segurança refaça o login.","#d61a36","#fff");
				}

				?>
				<img width="70%" src="<?php echo $flow ?>assents/img/logo/Logo.png">

				<form method="POST">
					<label class="f-l">Login</label>
					<input type="text" class="form-control form-login" name="login">	
					<label class="f-l">Password</label>
					<input type="password" class="form-control form-login" name="password">
					<button type="submit" class="btn btn-login">Acessar</button>
				</form>
			</div>
		</div>
	</center>
</div>

<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>