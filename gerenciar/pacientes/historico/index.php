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
	<title>Historico</title>
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

	$sql_dados = "SELECT * FROM `vortex-observa` WHERE `token_paciente`='$token'";
	$consulta = $connect->query($sql_dados);

	if (isset($_POST['Observacao']) && !empty($_POST['Observacao'])) {
		$obs = $_POST['Observacao'];
		$data = date('d-m-Y');

		$sql_create = "INSERT INTO `vortex-observa`(`token_paciente`, `observacao`, `data`) VALUES ('$token','$obs','$data')";
		$connect->query($sql_create);
		header('Location: ?token='.$token.'&notification=create_obs');
	}
	if(isset($_GET['excluir'])){
	    $id = $_GET['excluir'];
	    $sql_excluir = "DELETE FROM `vortex-observa` WHERE `id`='$id'";
	    $connect->query($sql_excluir);
	    header('Location: ?token='.$token.'&notification=excluir');
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
			if (isset($_GET['notification']) && $_GET['notification'] == "create_obs") {
					alert("novo_produto","Acabamos de colocar a observação.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "excluir") {
					alert("novo_produto","Acabamos de excluir a observação.","#d91e47","#fff");
				}
		?>
		<br>
		<button class="btn btn-table" data-bs-toggle="modal" data-bs-target="#historico" class="dropdown-item" href="#"><i class="fa-solid fa-pencil"></i> Cadastrar</button> 
		<?php echo '<a href="'.$flow.'pacientes/anamnese/?token='.$token.'">Ver Ficha</a>'; ?>
		<div class="row">
			<div class="col-md-12">
				<?php 
				while($info_obs = $consulta->fetch_array()){
					echo '<hr>
				<p>Data : '.$info_obs['data'].'</p>
				<p>'.$info_obs['observacao'].'</p>
				<a href="?excluir='.$info_obs['id'].'&token='.$info_obs['token_paciente'].'" class="btn btn-sm btn-danger">Excluir</a>';
				}

				 ?>
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

</script>


<div class="modal" id="historico">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Evolução</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
        	<form method="POST">
        	<div class="col-md-12">
        		<label>Escreva a Observação</label>
        		<textarea class="form-control" rows="6" id="comment" name="Observacao"></textarea>
        	</div>
        	<div class="col-md-12">
        		<button href="#" type="submit" class="btn btn-sm btn-style btn-full">Cadastrar</button>
        	</div>
        	</form>
        </div>
      </div>


    </div>
  </div>
</div>