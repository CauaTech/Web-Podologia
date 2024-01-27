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
	<title>Estoque</title>
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

$sql_produto = "SELECT * FROM `vortex-produtos`";
$consulta_produtos = $connect->query($sql_produto);

if (isset($_POST['vortex-id'])) {
	$id = $_POST['vortex-id'];
	$number = $_POST['vortex-number'];

	$sql_update = "UPDATE `vortex-produtos` SET `vortex-estoque`='$number' WHERE `id`='$id'";
	$update = $connect->query($sql_update);

	header('Location: '.$flow.'estoque/?notification=c_produto');
}

?>

<?php 
	include($flow.'assents/app/account-check.php');

?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>


<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->
<div class="cliente">
	<div class="cliente-head">
		<div class="container">
			<?php 
				if (isset($_GET['notification']) && $_GET['notification'] == "c_produto") {
						alert("novo_produto","Produto acabou de ser atualizado.","#6acc39","#fff");
					}
			?>
			<h4>Estoque Simples</h4>
			<div class="responsive-table">
				<table id="cliente" class="table table-striped">
		        	<thead class="table-header">
			            <tr>
			                <th>ID</th>
			                <th>Nome</th>
			                <th>Quantidade</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php while($info_produto = $consulta_produtos->fetch_array()){ ?>
				        	<tr>
						        <td>#<?php echo $info_produto['id']; ?></td>
						        <td><?php echo $info_produto['vortex-nome']; ?></td>
						        <td>
						        	<form action="?" method="POST">
							        	<input class="form-control" name="vortex-number" min="0" max="9000" type="number" value="<?php echo $info_produto['vortex-estoque']; ?>">
							        	<input type="hidden" value="<?php echo $info_produto['id']; ?>" name="vortex-id">
							        	<button type="submit" class="btn btn-estoque">Atualizar</button>
						        	</form>
			        			</td>
						    	</tr>
					    	<?php  } ?>
			        </tbody>
		        </table>
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


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

$(function(){

  $('input[type="number"]').niceNumber();

});

</script>
