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
	<title>Pacientes</title>
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


	$sql_pacientes = "SELECT * FROM `vortex-pacientes`";
	$pacientes = $connect->query($sql_pacientes);
	
	if(isset($_GET['excluir'])){
	    $token = $_GET['excluir'];
	    
	    $sql_excluir = "DELETE FROM `vortex-pacientes` WHERE `paciente_token` = '$token'";
	    $i = $connect->query($sql_excluir);
	    header('Location: ?notification=excluir');
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
<div class="cliente">
	<div class="cliente-head">
		<div class="container">
		    <?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "excluir") {
					alert("novo_produto","Acabamos de excluir o paciente.","#ed2143","#fff");
				}
			?>	
			<h4>Prontuarios</h4>
			<div class="responsive-table">
				<table id="cliente" class="table table-striped">
		        	<thead class="table-header">
			            <tr>
			                <th>Nome Paciente</th>
			                <th>Telefone</th>
			                <th>Data Nacimento</th>
			                <th>Opçoes</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php while($info_pacientes = $pacientes->fetch_array()){
			        		$token_paciente = $info_pacientes['paciente_token'];
							$nacimento = new DateTime($info_pacientes['Nacimento']);;
							$nacimento_data = $nacimento->format('d/m/Y');
			        		echo '<tr><th>'.$info_pacientes['Nome'].'</th>
		        		<th>'.$info_pacientes['Telefone'].'</th>
		        		<th>'.$nacimento_data.'</th>
		        		<th>
		        			<div class="dropdown">
	        				 <button type="button" class="btn btn-table dropdown-toggle" data-bs-toggle="dropdown">
								    <i class="fa-solid fa-book"></i> Selecione
					     	  </button>
							  <ul class="dropdown-menu">
							   <li><a class="dropdown-item" href="'.$flow.'pacientes/anamnese/?token='.$token_paciente.'"><i class="fa-solid fa-bars"></i> Anamnese</a></li>
							   <li><a class="dropdown-item" href="'.$flow.'pacientes/historico/?token='.$token_paciente.'"><i class="fa-solid fa-clock-rotate-left"></i> Historico</a></li>
							   <li><a class="dropdown-item" href="'.$flow.'pacientes/Imagem/?token='.$token_paciente.'"><i class="fa-solid fa-camera-retro"></i> Imagens</a></li>
							   <li><a class="dropdown-item" href="'.$flow.'pacientes/?excluir='.$token_paciente.'">Excluir</a></li>
							  </ul>
		        			</div>
		        		</th></tr>';
			        	} ?>
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
})

$(document).ready(function () {
    $('#cliente').DataTable({
    	paging: true,
        ordering: true,
        info: true,
	    });
	});
</script>
