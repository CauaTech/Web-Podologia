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
	<title>Paciente Basico</title>
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

include($flow.'assents/app/account-check.php');

if (isset($_POST['nome_completo']) && !empty($_POST['nome_completo'])) {
	$nome_completo = $_POST['nome_completo'];
	$data_nacimento = $_POST['data_nacimento'];
	$ocupacao = $_POST['ocupacao'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$whats = $_POST['whats'];
	$token_paciente = rand(1000000,9999999999);

	$sql_create = "INSERT INTO `vortex-pacientes`(`Nome`, `Nacimento`, `Ocupacao`, `Telefone`, `Telefone_whats`, `Endereco`, `RG`, `CPF`, `paciente_token`) VALUES ('$nome_completo','$data_nacimento','$ocupacao','$telefone','$whats','$endereco','$rg','$cpf ','$token_paciente')";
	$connect->query($sql_create);
	header('Location: ?notification=create_account');
}

?>


<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->
<div class="c_pacientes">
	<div class="container">
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "create_account") {
					alert("novo_produto","Acabou de ser criado um novo paciente.","#6acc39","#fff");
				}
		?>
		<br>
		<form method="POST">
		<div class="row">
			<h5>Cadastro Basico</h5>
			<div class="col-md-4">
				<label>Nome Completo</label>
				<input type="text" class="form-control form-control-sm" name="nome_completo">
			</div>
			<div class="col-md-4">
				<label>Data Nascimento</label>
				<input type="date" class="form-control form-control-sm" name="data_nacimento">
			</div>
			<div class="col-md-4">
				<label>Ocupação</label>
				<input type="text" class="form-control form-control-sm" name="ocupacao">
			</div>
			<div class="col-md-4">
				<label>Telefone</label>
				<input type="text" class="form-control form-control-sm" name="telefone">
			</div>
			<div class="col-md-4">
				<label>Endereço</label>
				<input type="text" class="form-control form-control-sm" name="endereco">
			</div>
			<div class="col-md-4">
				<label>RG</label>
				<input type="text" class="form-control form-control-sm" name="rg">
			</div>
			<div class="col-md-4">
				<label>CPF</label>
				<input type="text" class="form-control form-control-sm" name="cpf">
			</div>
			<div class="col-md-4">
				<br>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="whats" value="1" checked>É whatsapp
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="whats" value="0">Não é whatsapp
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-12">
				<br>
				<button type="submit" class="btn btn-style">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>


<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo $flow;?>assents/js/jquery.sumoselect.min.js"></script>
<script type="text/javascript">
	$('.SlectBox').SumoSelect({
		placeholder:'Procedimentos', 
	});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $flow;?>assents/css/sumoselect.min.css">




<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

$(document).ready(function () {
    $('#example').DataTable({
    	paging: false,
        ordering: false,
        info: false,
        language: {
        	url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
	    	},
	    });
	});
</script>

