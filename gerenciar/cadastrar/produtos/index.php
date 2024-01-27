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
	<title>Cadastrar Produtos</title>
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
	if (isset($_POST['produto_n']) && isset($_POST['produto_v']) && isset($_POST['estoque']) && !empty($_POST['produto_n']) && !empty($_POST['produto_v']) && !empty($_POST['estoque'])) {
		$produto_nome = $_POST['produto_n'];
		$produto_valor = $_POST['produto_v'];
		$produto_estoque = $_POST['estoque'];
		$sql_create = "INSERT INTO `vortex-produtos`(`vortex-nome`, `vortex-valor`, `vortex-estoque`) VALUES ('$produto_nome','$produto_valor','$produto_estoque')";
		$connect->query($sql_create);
		header('Location: '.$flow.'cadastrar/produtos/?notification=c_produto');
	}

	if (isset($_GET['excluir'])) {
		$id = $_GET['excluir'];
		$sql_excluir = "DELETE FROM `vortex-produtos` WHERE `id`='$id'";
		$connect->query($sql_excluir);
		header('Location: '.$flow.'cadastrar/produtos/?notification=e_produto');
	}

	$sql_produtos = "SELECT * FROM `vortex-produtos`";
	$consulta_produtos = $connect->query($sql_produtos);

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
		<button class="btn btn-style" data-bs-toggle="modal" data-bs-target="#Fornecedor">Novo Produto</button>
		<br>
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "c_produto") {
					alert("novo_produto","Produto acabou de ser Adicionado.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "e_produto") {
					alert("excluir","Acabou de ser apagado.","#bfa511","#fff");
				}
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="responsive-table">
					<table id="fornecedores" class="table">
			        	<thead class="table-header">
				            <tr>
				                <th>Produto</th>
				                <th>Valor</th>
				                <th>Estoque</th>
				                <th>Gerenciar</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php 

				        	while($info_produtos = $consulta_produtos->fetch_array()){
				        		echo '<tr>
				        		<th>'.$info_produtos['vortex-nome'].'</th>
				        		<th>R$ '.$info_produtos['vortex-valor'].'</th>
				        		<th>'.$info_produtos['vortex-estoque'].'</th>
				        		<th><a href="'.$flow.'cadastrar/produtos/?excluir='.$info_produtos['id'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Excluir Produto!"><i class="fa-solid fa-trash"></i></a></th>
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

<div class="modal" id="Fornecedor">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST">
      <!-- Modal body -->
      <div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<label>Produto</label>
				<input type="text" class="form-control" name="produto_n">
			</div>
			<div class="col-md-12">
				<label>Valor</label>
				<input name="produto_v" type="text" class="form-control" onkeypress="$(this).mask('R$ 000.000.000.000.000,00', {reverse: true});">
			</div>
			<div class="col-md-12">
				<label>Em estoque</label>
				<input type="number" class="form-control" name="estoque" value="0" min="0" max="100">
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

<script type="text/javascript">
$('.money').mask("#,##0.00", {reverse: true});	
</script>






<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

</script>
