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
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo $flow ?>cadastrar/pacientes/basico/" class="card-pacintes">
					<div class="card card-novo">
						<div class="card-body">
							<center>
								<h1><i class="fa-solid fa-user"></i></h1>
								<h5>Cadastro Basico</h5>
							</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="<?php echo $flow ?>cadastrar/pacientes/completo/" class="card-pacintes">
					<div class="card card-novo">
						<div class="card-body">
							<center>
								<h1><i class="fa-solid fa-crown"></i></h1>
								<h5>Cadastro Completo</h5>
							</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="<?php echo $flow ?>cadastrar/pacientes/kid/" class="card-pacintes">
					<div class="card card-novo">
						<div class="card-body">
							<center>
								<h1><i class="fa-solid fa-crown"></i></h1>
								<h5>Cadastro Criança</h5>
							</center>
						</div>
					</div>
				</a>
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

