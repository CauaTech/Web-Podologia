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
	<title>Financeiro Mensal</title>
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

if (isset($_GET['excluir'])) {
	$id = $_GET['excluir'];
	$sql_excluir = "DELETE FROM `vortex-financeiro` WHERE `id`='$id'";
	$connect->query($sql_excluir);
	header('Location: '.$flow.'financeiro/mensal/?notification=excluir');
}

if (!isset($_POST['date-consulta'])) {
	$date_atual = date('m-Y');
	$sql = "SELECT * FROM `vortex-financeiro` WHERE `vortex-token`='GwELye0S44ytcoQ93W9ycfGQ8W5u2m2a' && `vortex-data` LIKE '%$date_atual%'";
	$consult = $connect->query($sql);
	$consulta_vendas = $connect->query($sql);

	$dinheiro = 0;
	$debito = 0;
	$credito = 0;
	$pix = 0;
	while ($vendas_painel = $consulta_vendas->fetch_array()) {
		if ($vendas_painel['vortex-pagamento'] == 1) {
			$dinheiro = $dinheiro + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 2) {
			$debito = $debito + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 3) {
			$credito = $credito + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 4) {
			$pix = $pix + $vendas_painel['vortex-valor'];
		}
	}
}else{
	$date = $_POST['date-consulta'];
	$nem_data = new DateTime($date);
	$date_atual = $nem_data->format('m-Y');
	$sql = "SELECT * FROM `vortex-financeiro` WHERE `vortex-data` LIKE '%$date_atual%'";
	$consult = $connect->query($sql);
	$consulta_vendas = $connect->query($sql);

	$dinheiro = 0;
	$debito = 0;
	$credito = 0;
	$pix = 0;
	while ($vendas_painel = $consulta_vendas->fetch_array()) {
		if ($vendas_painel['vortex-pagamento'] == 1) {
			$dinheiro = $dinheiro + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 2) {
			$debito = $debito + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 3) {
			$credito = $credito + $vendas_painel['vortex-valor'];
		}
		if ($vendas_painel['vortex-pagamento'] == 4) {
			$pix = $pix + $vendas_painel['vortex-valor'];
		}
	}
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

<div class="financeiro-body">
	<div class="container">

		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "excluir") {
					alert("novo_produto","Acabamos de excluir a venda.","#c91e1e","#fff");
				}
			?>	
			<div class="row">
				<div class="col-md-4">
						<form method="POST" action="?">
							<div class="input-group">
								<input type="month" class="form-control fomr-month" name="date-consulta">
								<button type="submit" class=" btn btn-table">Consultar</button>
							</div>
						</form>
				</div>
			</div>
		<div class="row">
			<div class="col-md-3">
				<div class="card card-financeiro">
					<div class="card-body">
						<div class="float-left">
							Dinheiro<br>
							R$ <?php echo $dinheiro; ?>
						</div>
						<div class="float-right">
							<i class="fa-solid fa-sack-dollar"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card card-financeiro">
					<div class="card-body">
						<div class="float-left">
							Cartão Debito<br>
							R$ <?php echo $debito; ?>
						</div>
						<div class="float-right">
							<i class="fa-regular fa-credit-card"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card card-financeiro">
					<div class="card-body">
						<div class="float-left">
							Cartão Credito<br>
							R$ <?php echo $credito; ?>
						</div>
						<div class="float-right">
							<i class="fa-solid fa-credit-card"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card card-financeiro">
					<div class="card-body">
						<div class="float-left">
							PIX<br>
							R$ <?php echo $pix; ?>
						</div>
						<div class="float-right">
							<i class="fa-solid fa-qrcode"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="responsive-table">
					<table id="fornecedores" class="table table-financeiro">
			        	<thead class="financeiro-header">
				            <tr>
				                <th>Paciente</th>
				                <th>Valor</th>
				                <th>Forma de Pagamento</th>
				                <th>Data</th>
				                <th>Gerenciar</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php while ($info_venda = $consult->fetch_array()) {
				        		$token_paciente = $info_venda['vortex-paciente'];

				        		$sql_paciente = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$token_paciente'";
				        		$consulta_paciente = $connect->query($sql_paciente);
				        		$info = $consulta_paciente->fetch_array();
				        		if ($info['Nome'] == null) {
				        			$nome = "Venda Produto";
				        		}

				        		if ($info['Nome'] != null) {
				        			$nome = $info['Nome'];
				        		}

				        		if ($info_venda['vortex-pagamento'] == 1) {
				        			$pagamento = '<span class="badge bg-secondary">Dinheiro</span>';
				        		}
				        		if ($info_venda['vortex-pagamento'] == 2) {
				        			$pagamento = '<span class="badge bg-info">Debito</span>';
				        		}
				        		if ($info_venda['vortex-pagamento'] == 3) {
				        			$pagamento = '<span class="badge bg-danger">Credito</span>';
				        		}
				        		if ($info_venda['vortex-pagamento'] == 4) {
				        			$pagamento = '<span class="badge bg-primary">Pix</span>';
				        		}


				        		echo '<tr>
				        		<th>'.$nome.'</th>
				        		<th>R$ '.$info_venda['vortex-valor'].'</th>
				        		<th>'.$pagamento.'</th>
				        		<th>'.$info_venda['vortex-data'].'</th>
				        		<th>
				        			<a href="?excluir='.$info_venda['id'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Apagar Venda!">
				        				<i class="fa-solid fa-trash"></i>
				        			</a>
				        		</th>
				        	</tr>';
				        	} ?>
				        </tbody>
			        </table>
			    </div>
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

<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>