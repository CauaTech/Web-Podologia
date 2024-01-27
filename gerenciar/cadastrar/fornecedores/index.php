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
	<title>Cadastrar Fornecedores</title>
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

	if (isset($_POST['f_nome']) && isset($_POST['f_telefone']) && isset($_POST['f_produto']) && !empty($_POST['f_nome']) && !empty($_POST['f_telefone']) && !empty($_POST['f_produto'])) {
		$fornecedor_nome = $_POST['f_nome'];
		$fornecedor_telefone = $_POST['f_telefone'];
		$fornecedor_produto = $_POST['f_produto'];
		$sql_create = "INSERT INTO `vortex-fornecedor`(`fornecedor_nome`, `fornecedor_telefone`, `fornecedor_produto`) VALUES ('$fornecedor_nome','$fornecedor_telefone','$fornecedor_produto')";
		$connect->query($sql_create);
		header('Location: '.$flow.'cadastrar/fornecedores/?notification=c_fornecer');
	}

	if (isset($_GET['excluir'])) {
		$id = $_GET['excluir'];
		$sql_excluir = "DELETE FROM `vortex-fornecedor` WHERE `id`='$id'";
		$connect->query($sql_excluir);
		header('Location: '.$flow.'cadastrar/fornecedores/?notification=e_fornecer');
	}

	$sql_fornecedor= "SELECT * FROM `vortex-fornecedor`";
	$consulta_fornecedor = $connect->query($sql_fornecedor);

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
		<button class="btn btn-style" data-bs-toggle="modal" data-bs-target="#Fornecedor">Novo Fornecedor</button>
		<br>
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "c_fornecer") {
					alert("novo_produto","Fornecedor acabou de ser cadastrado.","#6acc39","#fff");
				}
		?>

		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "e_fornecer") {
					alert("novo_produto","Fornecedor acabou de ser excluido.","#bfa511","#fff");
				}
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="responsive-table">
					<table id="fornecedores" class="table">
			        	<thead class="table-header">
				            <tr>
				                <th>Nome Paciente</th>
				                <th>Telefone</th>
				                <th>Produto</th>
				                <th>Gerenciar</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        	while($info_fornecedor = $consulta_fornecedor->fetch_array()){
				        		echo '<tr>
					        		<th>'.$info_fornecedor['fornecedor_nome'].'</th>
					        		<th>'.$info_fornecedor['fornecedor_telefone'].'</th>
					        		<th>'.$info_fornecedor['fornecedor_produto'].'</th>
					        		<th><a href="?excluir='.$info_fornecedor['id'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Excluir Produto!"><i class="fa-solid fa-trash"></i></a></th>
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


<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo $flow;?>assents/js/jquery.sumoselect.min.js"></script>
<script type="text/javascript">
	$('.SlectBox').SumoSelect({
		placeholder:'Procedimentos', 
	});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $flow;?>assents/css/sumoselect.min.css">

<div class="modal" id="Fornecedor">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Procurar Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form method="POST">
		<div class="row">
			<div class="col-md-6">
				<label>Nome Fornecedor</label>
				<input type="text" class="form-control" name="f_nome">
			</div>
			<div class="col-md-6">
				<label>Numero do Fornecedor</label>
				<input type="text" class="form-control" name="f_telefone">
			</div>
			<div class="col-md-6">
				<label>Produto do Fornecedor</label>
				<input type="text" class="form-control" name="f_produto">
			</div>
		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-table" data-bs-dismiss="modal">Cadastrar</button>
        </form>
      </div>

    </div>
  </div>
</div>


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

</script>

