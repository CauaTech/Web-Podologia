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
	<title>AmandaMatos - Agendamento</title>
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

$sql_horarios = "SELECT * FROM `vortex-liberados`";
$consulta_horarios = $connect->query($sql_horarios);
$data = "";

while($info_agenda = $consulta_horarios->fetch_array()){
	$data_final = $info_agenda['data'];
	$nacimento = new DateTime($data_final);
	$date = $nacimento->format('d/m/Y');

	$data = $data.'<div class="form-check">
	  <input type="radio" class="form-check-input" id="radio1" name="data_agenda" value="'.$info_agenda['id'].'" checked>'.$info_agenda['horario'].' - '.$date.'
	  <label class="form-check-label" for="radio1"></label>
	</div>';
}

if (isset($_POST['paciente_code'])) {
	$code_paciente = input($_POST['paciente_code']);
	$Cdata =  $_POST['data_agenda'];

	$sql_paciente = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$code_paciente'";
	$p = $connect->query($sql_paciente)->num_rows;

	if ($p > 0) {
		$sql_data_info = "SELECT * FROM `vortex-liberados` WHERE `id`='$Cdata'";
		$consulta_data = $connect->query($sql_data_info);
		$info_data = $consulta_data->fetch_array();
		$data = $info_data['data'];
		$horario = $info_data['horario'];


		$sql_agendar = "INSERT INTO `vortex-agenda`(`agenda-horario`, `agenda-data`, `agenda-paciente`, `agenda-procedimentos`, `agenda-disponibilidade`, `agenda-status`, `agenda-user`) VALUES ('$horario','$data','$code_paciente','7','2','1','GwELye0S44ytcoQ93W9ycfGQ8W5u2m2a')";
		$connect->query($sql_agendar);

		$sql_notification = "INSERT INTO `vortex-notificacao`(`agenda-data`, `agenda-horario`, `token-paciente`) VALUES ('$data','$horario','$code_paciente')";
		$connect->query($sql_notification);

		$sql_liberar = "DELETE FROM `vortex-liberados` WHERE `id`='$Cdata'";
		$connect->query($sql_liberar);
		header('Location: ?notification=agendamento_feito');
	}else{
		header('Location: ?notification=paciente_errocode');
	}
}

if (isset($_POST['CPF'])) {
	$Nome = input($_POST['Nome']);
	$CPF = input($_POST['CPF']);
	$cell = input($_POST['Telefone']);
	$code_paciente = input($_POST['TOKEN']);
	$Cdata =  $_POST['data_agenda'];

	$sql_pacientec = "INSERT INTO `vortex-pacientes`(`Nome`,`Telefone`, `CPF`,`paciente_token`) VALUES ('$Nome','$cell','$CPF','$code_paciente')";
	$connect->query($sql_pacientec);

	$sql_data_info = "SELECT * FROM `vortex-liberados` WHERE `id`='$Cdata'";
	$consulta_data = $connect->query($sql_data_info);
	$info_data = $consulta_data->fetch_array();
	$data = $info_data['data'];
	$horario = $info_data['horario'];

	$sql_agendar = "INSERT INTO `vortex-agenda`(`agenda-horario`, `agenda-data`, `agenda-paciente`, `agenda-procedimentos`, `agenda-disponibilidade`, `agenda-status`, `agenda-user`) VALUES ('$horario','$data','$code_paciente','7','2','1','GwELye0S44ytcoQ93W9ycfGQ8W5u2m2a')";
	$connect->query($sql_agendar);

	$sql_notification = "INSERT INTO `vortex-notificacao`(`agenda-data`, `agenda-horario`, `token-paciente`) VALUES ('$data','$horario','$code_paciente')";
	$connect->query($sql_notification);

	$sql_liberar = "DELETE FROM `vortex-liberados` WHERE `id`='$Cdata'";
	$connect->query($sql_liberar);
	header('Location: ?notification=agendamento_feito');
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
<div class="amanda-agenda">
	<div class="container">
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "paciente_errocode") {
				alert("pacinete","Codigo de Paciente não encontrado.","red","#fff");
			}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "agendamento_feito") {
				alert("pacinete","Agendamento Feito com Sucesso.","green","#fff");
			}
		?>
		<div class="row">
			<?php 
			if (!isset($_GET['cliente']) && !isset($_GET['novo'])) {
				echo '<div class="col-md-6">
				<a class="link-agenda" href="?novo">
					<div class="card card-agendamento">
						<div class="card-body">
							<center>
								<i class="fa-regular fa-circle-user"></i>
								<h4>Novo Clinte</h4>
							</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a class="link-agenda" href="?cliente">
					<div class="card card-agendamento">
						<div class="card-body">
							<center>
								<i class="fa-regular fa-circle-user"></i>
								<h4>Já sou Cliente</h4>
							</center>
						</div>
					</div>
				</a>
			</div>';
			}

			if (isset($_GET['cliente'])) {
				echo '<div class="col-md-12">
				<div class="card card-novoC">
					<div class="card-body">
						<form method="POST">
							<div class="row">
								<div class="col-md-2">
									<img width="100%" src="'.$flow.'assents/img/logo/Logo.png">
								</div>
								<div class="col-md-10">
								</div>
								<div class="col-md-4">
									<label>Codigo Paciente</label>
									<input type="text" class="form-control" name="paciente_code">
								</div>
								<div class="col-md-12">
									<hr>
									'.$data.'
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-new">Agendar Agora</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>';
			}

			if (isset($_GET['novo'])) {
				$rand = rand(1000000,9000000);
				echo '<div class="col-md-12">
				<div class="card card-novoC">
					<div class="card-body">
						<form method="POST">
							<div class="row">
								<div class="col-md-2">
									<img width="100%" src="'.$flow.'assents/img/logo/Logo.png">
								</div>
								<div class="col-md-10">
								</div>
								<div class="col-md-4">
									<input type="hidden" class="form-control" value="'.$rand.'" name="TOKEN">
									<label>Nome Completo</label>
									<input type="text" class="form-control" name="Nome">
								</div>
								<div class="col-md-4">
									<label>CPF</label>
									<input type="text" class="form-control" name="CPF">
								</div>
								<div class="col-md-4">
									<label>Telefone</label>
									<input type="text" class="form-control" name="Telefone">
								</div>
								<div class="col-md-12">
									<hr>
									'.$data.'
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-new">Agendar Agora</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>';
			}
			?>
		</div>
	</div>
</div>
<form method="POST">
	
</form>
<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>