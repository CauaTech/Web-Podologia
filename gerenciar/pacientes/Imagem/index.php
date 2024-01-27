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
	<title>AmandaMatos - Gerenciamento</title>
	<meta name="language" content="pt-BR">
	<meta name="description" content="Um sistema administrativo para consultório de podologia é uma solução tecnológica que ajuda a gerenciar e automatizar tarefas diárias do consultório, melhorando a eficiência e a qualidade dos serviços prestados aos pacientes.">

	<meta charset="utf-8"/>
	
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

	$sql_paciente = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$token'";
	$consulta_paciente = $connect->query($sql_paciente);
	$info_paciente = $consulta_paciente->fetch_array();

	$sql_img = "SELECT * FROM `vortex-pacientes-imagem` WHERE `vortex-paciente`='$token'";
	$consulta_img = $connect->query($sql_img);
	if (isset($_GET['excluir'])) {
		$img_excluir = $_GET['excluir'];
		$sql_excluir = "DELETE FROM `vortex-pacientes-imagem` WHERE `vortex-img`='$img_excluir'";
		$connect->query($sql_excluir);
		header('Location: '.$flow.'pacientes/Imagem/?notification=c_excluir&token='.$token);
	}
	if (isset($_POST['Observacao'])) {
		$nome = gen(16).".png";
		$data = date('d-m-Y H.i.s');
		$obs = $_POST['Observacao'];
		$sql_imagem = "INSERT INTO `vortex-pacientes-imagem`(`vortex-img`, `vortex-paciente`, `vortex-data`, `vortex-descri`) VALUES ('$nome','$token','$data','$obs')";
		$connect->query($sql_imagem);
		move_uploaded_file($_FILES['imagem']['tmp_name'], $flow.'assents/img/paciente/'.$nome);
		header('Location: '.$flow.'pacientes/Imagem/?notification=c_adicionei&token='.$token);
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
<div class="img-cliente">
	<div class="img-name">
		<div class="container">
			<br>
			<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "c_adicionei") {
					alert("novo_produto","Acabamos de adicionar a imagem.","#6acc39","#fff");
				}
			?>	

			<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "c_excluir") {
					alert("novo_produto","Uma imagem acabou de ser excluida.","#cf1329","#fff");
				}
			?>	
			<h4>Imagens do cliente <i class="fa-solid fa-circle-right"></i> : <?php echo $info_paciente['Nome']; ?></h4>
			<br>
			<i class="fa-solid fa-camera-retro"></i> Imagens
			<button type="button" class="btn btn-table" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa-sharp fa-solid fa-plus"></i>Adicionar</button>
			<hr>
			<div class="estado-cliente">
				<div class="container">
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
										<div class="function-img">
											<a class="btn brn-sm btn-func btn-danger" href="?excluir='.$info_img['vortex-img'].'&token='.$token.'"><i class="fa-solid fa-trash"></i></a>
										</div>
									</center>
								</div>
							</div>
						</div>';
						} ?>
					</div>
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

<!-- The Modal -->
<div class="modal" id="addmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Adicionar Imagem</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form method="POST" enctype="multipart/form-data">
        <center>
        	<input type="file" class="form-control form-aq" name="imagem" accept="image/*">
        	<hr>
        	<label>Escreva a Observação</label>
        	<textarea class="form-control" rows="6" id="comment" name="Observacao"></textarea>
        </center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-aq btn-success">Adicionar Imagem</button>
        </form>
      </div>

    </div>
  </div>
</div>

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
    $('#cliente').DataTable({
    	paging: false,
        ordering: false,
        info: false,
        language: {
        	url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
	    	},
	    });
	});
</script>
