<?php 
$int = 2;
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
	<title>Atualizar Cadastro</title>
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
	$token = $_GET['token'];

	$sql_dados = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$token'";
	$consulta = $connect->query($sql_dados);
	$info_paciente = $consulta->fetch_array();

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
		$sql_update = "UPDATE `vortex-pacientes` SET `Nome`='$nome_completo',`Nacimento`='$data_nacimento',`Ocupacao`='$ocupacao',`Telefone`='$telefone',`Telefone_whats`='$whats',`Endereco`='$endereco',`RG`='$rg',`CPF`='$cpf',`Tipo_calcado`='$calcado',`Calcado_N`='$numero_calcado',`Tipo_meia`='$meia',`Cirurgia_inferior`='$Cirgurgia_inferior',`Inferior_especifique`='$Cirurgia_especifique',`Pratica-esporte`='$Pratica_esportes',`Esporte_especifique`='$esportes_especifique',`Tomando_remedios`='$tomando_medicamento',`Remedios_especifique`='$medicamento_especifique',`Gestante`='$Gestante',`Gestante_semanas`='$semanas',`Alergia`='$Alergia',`Alergia_especifique`='$alergia_especifique',`Sentir_dor`='$Dor',`Dor_especifique`='$dor_especifique',`Hipertensao`='$hiper',`Hanseniase`='$Hanseniase',`Cancer`='$cancer',`Circulatorio`='$disturbio_circulatorio',`Diabetes`='$Diabetes',`Cardiopatia`='$Cardiopatia',`Marcapasso_pinos`='$pinos',`Hepatite`='$Hepatite' WHERE `paciente_token`='$token'";
		$connect->query($sql_update);
		header('Location: ?token='.$token.'&notification=Update_Account');

	}

	$sql_proxima = "SELECT * FROM `vortex-agenda` WHERE `agenda-paciente`='$token' ORDER BY `id` DESC";
	$consulta_proxima = $connect->query($sql_proxima);
	$info_data = $consulta_proxima->fetch_array();

	if ($info_data == null) {
		$date = "Sem consulta marcada";
	}else{
		$data = $info_data['agenda-data'];
		$nacimento = new DateTime($data);
		$date = $nacimento->format('d/m/Y');
	}

	$sql_img = "SELECT * FROM `vortex-pacientes-imagem` WHERE `vortex-paciente`='$token'";
	$consulta_img = $connect->query($sql_img);
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
			if (isset($_GET['notification']) && $_GET['notification'] == "Update_Account") {
					alert("novo_produto","Acabou de ser atualizado o paciente.","#6acc39","#fff");
				}
		?>
		<br>
		<form method="POST">
		<div class="row">
			<h5>Cadastro Basico - <?php echo $token; ?></h5>
			<a href="./imprimir/?token=<?php echo $token; ?>" class="btn btn-style">Imprimir</a>
			<div class="col-md-12">
				<br>
				<h5>Proxima Consulta : <?php echo $date; ?></h5>
				<br>
			</div>
			<?php if ($info_paciente['kid'] == 0) {?>
				<div class="col-md-4">
					<label>Nome Completo</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Nome']; ?>" name="nome_completo">
				</div>
				<div class="col-md-4">
					<label>Data Nascimento</label>
					<input type="date" class="form-control form-control-sm" value="<?php echo $info_paciente['Nacimento']; ?>" name="data_nacimento">
				</div>
				<div class="col-md-4">
					<label>Ocupação</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Ocupacao']; ?>" name="ocupacao">
				</div>
				<div class="col-md-4">
					<label>Telefone</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Telefone']; ?>" name="telefone">
				</div>
				<div class="col-md-4">
					<label>Endereço</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Endereco']; ?>" name="endereco">
				</div>
				<div class="col-md-4">
					<label>RG</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['RG']; ?>" name="rg">
				</div>
				<div class="col-md-4">
					<label>CPF</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['CPF']; ?>" name="cpf">
				</div>
				<div class="col-md-4">
					<br>
					<div class="form-check">
					  <input type="radio" class="form-check-input" id="radio1" name="whats" value="1" <?php if($info_paciente['Telefone_whats'] == 1){ echo "checked";} ?>>É whatsapp
					  <label class="form-check-label" for="radio1"></label>
					</div>
					<div class="form-check">
					  <input type="radio" class="form-check-input" id="radio2" name="whats" value="0" <?php if($info_paciente['Telefone_whats'] == 0){ echo "checked";} ?>>Não é whatsapp
					  <label class="form-check-label" for="radio2"></label>
					</div>
				</div>
			<?php }else{?>
				<div class="col-md-6">
					<label>Nome Criança</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Nome']; ?>" name="nome_completo">
				</div>
				<div class="col-md-6">
					<label>Data Nascimento Criança</label>
					<input type="date" class="form-control form-control-sm" value="<?php echo $info_paciente['Nacimento']; ?>" name="data_nacimento">
				</div>
				<div class="col-md-6">
					<label>Nome Responsavel</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['nome_pai']; ?>" name="tt">
				</div>
				<div class="col-md-6">
					<label>Data Nascimento Responsavel</label>
					<input type="date" class="form-control form-control-sm" value="<?php echo $info_paciente['nacimento-pai']; ?>" name="tt">
				</div>
				<div class="col-md-4">
					<label>Ocupação</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Ocupacao']; ?>" name="ocupacao">
				</div>
				<div class="col-md-4">
					<label>Telefone</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Telefone']; ?>" name="telefone">
				</div>
				<div class="col-md-4">
					<label>Endereço</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['Endereco']; ?>" name="endereco">
				</div>
				<div class="col-md-4">
					<label>RG</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['RG']; ?>" name="rg">
				</div>
				<div class="col-md-4">
					<label>CPF</label>
					<input type="text" class="form-control form-control-sm" value="<?php echo $info_paciente['CPF']; ?>" name="cpf">
				</div>
				<div class="col-md-4">
					<br>
					<div class="form-check">
					  <input type="radio" class="form-check-input" id="radio1" name="whats" value="1" <?php if($info_paciente['Telefone_whats'] == 1){ echo "checked";} ?>>É whatsapp
					  <label class="form-check-label" for="radio1"></label>
					</div>
					<div class="form-check">
					  <input type="radio" class="form-check-input" id="radio2" name="whats" value="0" <?php if($info_paciente['Telefone_whats'] == 0){ echo "checked";} ?>>Não é whatsapp
					  <label class="form-check-label" for="radio2"></label>
					</div>
				</div>
			<?php } ?>
		</div>
		<hr>
		<div class="row">
			<h5>Informações basicas</h5>
			<div class="col-md-4">
				<label>Tipo de Calçado mais utilizado?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="calcado" value="1" <?php if($info_paciente['Tipo_calcado'] == 1){ echo "checked";} ?>>Aberto
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="calcado" value="0" <?php if($info_paciente['Tipo_calcado'] == 0){ echo "checked";} ?>>Fechado
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Nº</label>
				<input type="text" class="form-control form-control-sm" name="numero_calcado" value="<?php echo $info_paciente['Calcado_N']; ?>">
			</div>
			<div class="col-md-4">
				<label>Tipo de meia mais utilizado?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="meia" value="1" <?php if($info_paciente['Tipo_meia'] == 1){ echo "checked";} ?>>Social
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="meia" value="0" <?php if($info_paciente['Tipo_meia'] == 0){ echo "checked";} ?>>Esportivo
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Cirurgia nos membros inferiores?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Cirgurgia_inferior" value="1" <?php if($info_paciente['Cirurgia_inferior'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Cirgurgia_inferior" value="0" <?php if($info_paciente['Cirurgia_inferior'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="Cirurgia_especifique" value="<?php echo $info_paciente['Inferior_especifique']; ?>">
			</div>
			<div class="col-md-4">
				<label>Pratica esportes?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Pratica_esportes" value="1" <?php if($info_paciente['Pratica-esporte'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Pratica_esportes" value="0" <?php if($info_paciente['Pratica-esporte'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="esportes_especifique" value="<?php echo $info_paciente['Esporte_especifique']; ?>">
			</div>
			<div class="col-md-4">
				<label>Está tomando algum medicamento?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="tomando_medicamento" value="1" <?php if($info_paciente['Tomando_remedios'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="tomando_medicamento" value="0" <?php if($info_paciente['Tomando_remedios'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="medicamento_especifique" value="<?php echo $info_paciente['Remedios_especifique']; ?>">
			</div>
			<div class="col-md-4">
				<label>Gestante?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Gestante" value="1" <?php if($info_paciente['Gestante'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Gestante" value="0" <?php if($info_paciente['Gestante'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Semanas</label>
				<input type="text" class="form-control form-control-sm" name="semanas" value="<?php echo $info_paciente['Gestante_semanas']; ?>">
			</div>
			<div class="col-md-4">
				<label>Possui alguma alergia?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Alergia" value="1" <?php if($info_paciente['Alergia'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Alergia" value="0" <?php if($info_paciente['Alergia'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="alergia_especifique" value="<?php echo $info_paciente['Alergia_especifique']; ?>">
			</div>
			<div class="col-md-4">
				<label>Sensibilidade a dor?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Dor" value="1" <?php if($info_paciente['Sentir_dor'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Dor" value="0" <?php if($info_paciente['Sentir_dor'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
				<label>Especifique</label>
				<input type="text" class="form-control form-control-sm" name="dor_especifique" value="<?php echo $info_paciente['Dor_especifique']; ?>">
			</div>
		</div>
		<hr>
		<div class="row">
			<h5>Informações complementares</h5>
			<div class="col-md-4">
				<label>Tem  hipo/hipertensão arterial?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="hiper" value="1" <?php if($info_paciente['Hipertensao'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="hiper" value="0" <?php if($info_paciente['Hipertensao'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Hanseniase?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Hanseniase" value="1" <?php if($info_paciente['Hanseniase'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Hanseniase" value="0" <?php if($info_paciente['Hanseniase'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Algum tipo de câncer?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="cancer" value="1" <?php if($info_paciente['Cancer'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="cancer" value="0" <?php if($info_paciente['Cancer'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Distûrbio circulatório?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="disturbio_circulatorio" value="1" <?php if($info_paciente['Circulatorio'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="disturbio_circulatorio" value="0" <?php if($info_paciente['Circulatorio'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Diabetes?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Diabetes" value="1" <?php if($info_paciente['Diabetes'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Diabetes" value="0" <?php if($info_paciente['Diabetes'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Cardiopatia?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Cardiopatia" value="1" <?php if($info_paciente['Cardiopatia'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Cardiopatia" value="0" <?php if($info_paciente['Cardiopatia'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Portador de marcapasso/pinos?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="pinos" value="1" <?php if($info_paciente['Marcapasso_pinos'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="pinos" value="0" <?php if($info_paciente['Marcapasso_pinos'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-4">
				<label>Hepatite?</label>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio1" name="Hepatite" value="1" <?php if($info_paciente['Hepatite'] == 1){ echo "checked";} ?>>Sim
				  <label class="form-check-label" for="radio1"></label>
				</div>
				<div class="form-check">
				  <input type="radio" class="form-check-input" id="radio2" name="Hepatite" value="0" <?php if($info_paciente['Hepatite'] == 0){ echo "checked";} ?>>Não
				  <label class="form-check-label" for="radio2"></label>
				</div>
			</div>
			<div class="col-md-12">
				<?php 

				$sql_obs = "SELECT * FROM `vortex-observa` WHERE `token_paciente`='$token'";
				$l = $connect->query($sql_obs);

				?>
				<hr>
				<h5>Observações</h5><?php echo '<a href="'.$flow.'pacientes/historico/?token='.$token.'">Adicionar Observações</a>'; ?>
				<br>
				<?php while($info = $l->fetch_array()){
					echo '<label>'.$info['data'].'</label><br><p>'.$info['observacao'].'</p>';
				} ?>
			</div>
			<hr>
			<h4>Imagens Cadastradas</h4>
			<div class="row">
				<?php while($info_img = $consulta_img->fetch_array()){
					echo '<div class="col-md-3">
					<div class="card card-paciente">
						<div class="card-body">
							<center>
								<p style="font-size: 15px;">'.$info_img['vortex-data'].'</p>
								<div class="img">
									<img width="100%" src="'.$flow.'assents/img/paciente/'.$info_img['vortex-img'].'">
									<br>
									<br>
									<h6>'.$info_img['vortex-descri'].'</h6>
								</div>
							</center>
						</div>
					</div>
				</div>';
				} ?>
			</div>
			<hr>
			<a href="<?php echo $flow ?>termos/?whats=<?php echo $info_paciente['Telefone']; ?>&nome=<?php echo $info_paciente['Nome']; ?>">Termos</a>
			<div class="col-md-12">
				<br>
				<button type="submit" class="btn btn-style">Atualizar Cadastro</button>
				</form>
				<br>
				<br>
			</div>
		</div>
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

