<?php 
$int = 1;
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
	<title>Financeiro Diario</title>
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
	$sql_excluir = "DELETE FROM `vortex-gasto` WHERE `id`='$id'";
	$connect->query($sql_excluir);
	header('Location: '.$flow.'gasto/?notification=excluir');
}

if (!isset($_POST['date-consulta'])) {
	$date_atual = date('m-Y');
	$sql_gasto = "SELECT * FROM `vortex-gasto` WHERE `Data-Gasto` LIKE '%$date_atual%'";
	$consulta_gasto = $connect->query($sql_gasto);
	$Total_Gasto = $connect->query($sql_gasto);
	$gasto = 0;
	while($info_Gasto = $Total_Gasto->fetch_array()){
		$gasto = $gasto + $info_Gasto['Valor-Gasto'];
	}
}else{
	$date = $_POST['date-consulta'];
	$nem_data = new DateTime($date);
	$date_atual = $nem_data->format('m-Y');
	$sql_gasto = "SELECT * FROM `vortex-gasto` WHERE `Data-Gasto` LIKE '%$date_atual%'";
	$consulta_gasto = $connect->query($sql_gasto);
	$Total_Gasto = $connect->query($sql_gasto);
	$gasto = 0;
	while($info_Gasto = $Total_Gasto->fetch_array()){
		$gasto = $gasto + $info_Gasto['Valor-Gasto'];
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
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "excluir") {
					alert("novo_produto","Acabamos de excluir a venda.","#c91e1e","#fff");
				}
			?>	
		<div class="row">
				<div class="col-md-12">
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
							Gasto Geral<br>
							R$ <?php echo $gasto ?>
						</div>
						<div class="float-right">
							<i class="fa-solid fa-sack-dollar"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="responsive-table">
					<table id="fornecedores" class="table table-financeiro">
			        	<thead class="financeiro-header">
				            <tr>
				                <th>Quem Gastou</th>
				                <th>Valor</th>
				                <th>Motivo</th>
				                <th>Data & Hora</th>
				                <th>Gerenciar</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php  
				        	while($info_gasto = $consulta_gasto->fetch_array()){
				        		echo '<tr>
				        		<th>'.$info_gasto['User-Gasto'].'</th>
				        		<th>R$ '.$info_gasto['Valor-Gasto'].'</th>
				        		<th>'.$info_gasto['Motivo-Gasto'].'</th>
				        		<th>'.$info_gasto['Data-Gasto'].'</th>
				        		<th>
				        			<a href="?excluir='.$info_gasto['id'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Apagar Venda!">
				        				<i class="fa-solid fa-trash"></i>
				        			</a>
				        		</th>
				        	</tr>';
				        	}

				        	?>
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