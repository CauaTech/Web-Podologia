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
	<title>Novos Pacientes</title>
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
		$calcado = $_POST['calcado'];
		$numero_calcado = $_POST['numero_calcado'];
		$meia = $_POST['meia'];
		$Cirgurgia_inferior = $_POST['Cirgurgia_inferior'];
		$Cirurgia_especifique = $_POST['Cirurgia_especifique'];
		$Pratica_esportes = $_POST['Pratica_esportes'];
		$esportes_especifique = $_POST['esportes_especifique'];
		$tomando_medicamento = $_POST['tomando_medicamento'];
		$medicamento_especifique = $_POST['medicamento_especifique'];
		$Gestante = $_POST['Gestante'];
		$semanas = $_POST['semanas'];
		$Alergia = $_POST['Alergia'];
		$alergia_especifique = $_POST['alergia_especifique'];
		$Dor = $_POST['Dor'];
		$dor_especifique = $_POST['dor_especifique'];
		$hiper = $_POST['hiper'];
		$Hanseniase = $_POST['Hanseniase'];
		$cancer = $_POST['cancer'];
		$disturbio_circulatorio = $_POST['disturbio_circulatorio'];
		$Diabetes = $_POST['Diabetes'];
		$Cardiopatia = $_POST['Cardiopatia'];
		$pinos = $_POST['pinos'];
		$Hepatite = $_POST['Hepatite'];
		$token_paciente = rand(1000000,9999999999);
		$sql_create = "INSERT INTO `vortex-pacientes`(`Nome`, `Nacimento`, `Ocupacao`, `Telefone`, `Telefone_whats`, `Endereco`, `RG`, `CPF`, `Tipo_calcado`, `Calcado_N`, `Tipo_meia`, `Cirurgia_inferior`, `Inferior_especifique`, `Pratica-esporte`, `Esporte_especifique`, `Tomando_remedios`, `Remedios_especifique`, `Gestante`, `Gestante_semanas`, `Alergia`, `Alergia_especifique`, `Sentir_dor`, `Dor_especifique`, `Hipertensao`, `Hanseniase`, `Cancer`, `Circulatorio`, `Diabetes`, `Cardiopatia`, `Marcapasso_pinos`, `Hepatite`, `paciente_token`) VALUES ('$nome_completo','$data_nacimento','$ocupacao','$telefone','$whats','$endereco','$rg','$cpf','$calcado','$numero_calcado','$meia','$Cirgurgia_inferior','$Cirurgia_especifique','$Pratica_esportes','$esportes_especifique','$tomando_medicamento','$medicamento_especifique','$Gestante','$semanas','$Alergia','$alergia_especifique','$Dor','$dor_especifique','$hiper','$Hanseniase','$cancer','$disturbio_circulatorio','$Diabetes','$Cardiopatia','$pinos','$Hepatite','$token_paciente')";
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
		</div>
		<hr>
		<div class="row">
			<h5>Informações basicas</h5>
			<div class="col-md-4">
				<label>Tipo de Calçado mais utilizado?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="calcado" value="1" checked>Aberto
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="calcado" value="0">Fechado
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Nº</label>
				<input type="text" class="form-control form-control-sm" name="numero_calcado">
			</div>
			<div class="col-md-4">
				<label>Tipo de meia mais utilizado?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="meia" value="1" checked>Social
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="meia" value="0">Esportivo
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Cirurgia nos membros inferiores?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Cirgurgia_inferior" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Cirgurgia_inferior" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="Cirurgia_especifique">
			</div>
			<div class="col-md-4">
				<label>Pratica esportes?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Pratica_esportes" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Pratica_esportes" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="esportes_especifique">
			</div>
			<div class="col-md-4">
				<label>Está tomando algum medicamento?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="tomando_medicamento" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="tomando_medicamento" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="medicamento_especifique">
			</div>
			<div class="col-md-4">
				<label>Gestante?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Gestante" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Gestante" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Semanas</label>
				<input type="text" class="form-control form-control-sm" name="semanas">
			</div>
			<div class="col-md-4">
				<label>Possui alguma alergia?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Alergia" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Alergia" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="alergia_especifique">
			</div>
			<div class="col-md-4">
				<label>Sensibilidade a dor?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Dor" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Dor" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="dor_especifique">
			</div>
		</div>
		<hr>
		<div class="row">
			<h5>Informações complementares</h5>
			<div class="col-md-4">
				<label>Tem  hipo/hipertensão arterial?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="hiper" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="hiper" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Hanseniase?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Hanseniase" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Hanseniase" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Algum tipo de câncer?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="cancer" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="cancer" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Distûrbio circulatório?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="disturbio_circulatorio" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="disturbio_circulatorio" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Diabetes?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Diabetes" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Diabetes" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Cardiopatia?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Cardiopatia" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Cardiopatia" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Portador de marcapasso/pinos?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="pinos" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="pinos" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Hepatite?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Hepatite" value="1" checked>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Hepatite" value="0">Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-12">
				<br>
				<button type="submit" class="btn btn-style">Cadastrar</button>
				</form>
				<br>
				<br>
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

