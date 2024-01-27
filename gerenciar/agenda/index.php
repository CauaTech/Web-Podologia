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
	<title>AmandaMatos - Gerenciamento</title>
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
	if (isset($_GET['limparhorario'])) {
		$sql_limpar = "TRUNCATE TABLE `amanda_podologia`.`vortex-liberados`";
		$connect->query($sql_limpar);
		header('Location: '.$flow.'agenda/?notification=limpado');
	}

	if (isset($_GET['liberar'])) {
		$Lhorario = $_GET['liberarhorario'];
		$Ldata = $_GET['liberardata'];
		$sql_add = "INSERT INTO `vortex-liberados`(`data`, `horario`) VALUES ('$Ldata','$Lhorario')";
		$connect->query($sql_add);
		header('Location: '.$flow.'agenda/?notification=adicionado');
	}
	if (isset($_POST['venda_paciente'])) {
		$id_pacinte = $_POST['venda_paciente'];
		$valor_venda = $_POST['valor'];
		$pagamentos_type = $_POST['pagamento'];
		$agenda_paciente = $_POST['agenda_venda'];
		$get_data = date('d-m-Y');

		$sql_financeiro = "INSERT INTO `vortex-financeiro`(`vortex-paciente`, `vortex-pagamento`, `vortex-valor`, `vortex-data`, `vortex-token`) VALUES ('$id_pacinte','$pagamentos_type','$valor_venda','$get_data','$agenda_paciente')";
		$connect->query($sql_financeiro);


		$sql_produto = "SELECT * FROM `vortex-produtos`";
		$consulta_produtos = $connect->query($sql_produto);

		while ($info_produto = $consulta_produtos->fetch_array()) {

			$id = $info_produto['id'];

			$estoque = $_POST[''.$id];

			if ($estoque > 0) {

				$valor = $info_produto['vortex-estoque'];
				$valor = $valor-$estoque;
				$sql_estoque = "UPDATE `vortex-produtos` SET `vortex-estoque`='$valor' WHERE `id`='$id'";
				$connect->query($sql_estoque);

			}


		}



		header('Location: ?notification=financeiro&agendaT='.$agenda_paciente);
	}

	if (isset($_POST['venda_produtos'])) {
		$id_pacinte = $_POST['venda_produtos'];
		$valor_venda = $_POST['valor'];
		$pagamentos_type = $_POST['pagamento'];
		$agenda_paciente = $_POST['agenda_venda'];
		$get_data = date('d-m-Y');

		$sql_financeiro = "INSERT INTO `vortex-financeiro`(`vortex-paciente`, `vortex-pagamento`, `vortex-valor`, `vortex-data`, `vortex-token`) VALUES ('$id_pacinte','$pagamentos_type','$valor_venda','$get_data','$agenda_paciente')";
		$connect->query($sql_financeiro);


		$sql_produto = "SELECT * FROM `vortex-produtos`";
		$consulta_produtos = $connect->query($sql_produto);

		while ($info_produto = $consulta_produtos->fetch_array()) {

			$id = $info_produto['id'];

			$estoque = $_POST[''.$id];

			if ($estoque > 0) {

				$valor = $info_produto['vortex-estoque'];
				$valor = $valor-$estoque;
				$sql_estoque = "UPDATE `vortex-produtos` SET `vortex-estoque`='$valor' WHERE `id`='$id'";
				$connect->query($sql_estoque);

			}


		}



		header('Location: ?notification=venda&agendaT='.$agenda_paciente);
	}

	if (isset($_POST['id_alterar'])) {
		$id_update = $_POST['id_alterar'];
		$horario_update = $_POST['horario_alterar'];
		$data_update = $_POST['data_alterar'];
		$d = $_POST['data_dia'];

		$sql_update_agenda = "UPDATE `vortex-agenda` SET `agenda-horario`='$horario_update',`agenda-data`='$data_update' WHERE `id`='$id_update'";
		$connect->query($sql_update_agenda);
		header('Location: ?notification=alterar&data='.$d);

	}

	if (isset($_GET['desmarcar_a'])) {
		$data = $_GET['data'];
		$horario = $_GET['horario'];
		$list_token = $_GET['agendaT'];
		$id = $_GET['id_excluir'];

		$sql_desmarcar = "DELETE FROM `vortex-agenda` WHERE `id`='$id';";
		$desmarcar = $connect->query($sql_desmarcar);
		header('Location: ?notification=desmarcar&data='.$data);
	}


if (isset($_POST['data']) && isset($_POST['procedimentos']) && isset($_POST['token_agenda'])) {
		$data_agenda = $_POST['data'];
		$horario_agenda = $_POST['horario'];
		$procedimento_agenda = $_POST['procedimentos'];
		$token_ageanda = $_POST['token_agenda'];
		$procedimentos_info = "";
		if (isset($procedimento_agenda[0])) {
			$procedimentos_info = $procedimento_agenda[0];
		}
		if (isset($procedimento_agenda[1])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[1];
		}
		if (isset($procedimento_agenda[2])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[2];
		}
		if (isset($procedimento_agenda[3])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[3];
		}
		if (isset($procedimento_agenda[4])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[4];
		}
		if (isset($procedimento_agenda[5])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[5];
		}
		if (isset($procedimento_agenda[6])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[6];
		}
		if (isset($procedimento_agenda[7])) {
			$procedimentos_info = $procedimentos_info.",".$procedimento_agenda[7];
		}
		$produto_agenda = $_POST['produtos'];
		$pacientes_agenda = $_POST['paciente'];

		$sql_type = "SELECT * FROM `vortex-agenda` WHERE `agenda-horario`='$horario_agenda' && `agenda-data`='$data_agenda' && `agenda-user`='$token_ageanda'";
		$i = $connect->query($sql_type)->num_rows;

		if ($i > 0) {
			$sql_update = "UPDATE `vortex-agenda` SET `agenda-horario`='$horario_agenda',`agenda-data`='$data_agenda',`agenda-paciente`='$pacientes_agenda',`agenda-procedimentos`='$procedimentos_info',`agenda-disponibilidade`='2',`agenda-status`='1' WHERE `agenda-horario`='$horario_agenda' && `agenda-data`='$data_agenda' && `agenda-user`='$token_ageanda'";
			$connect->query($sql_update);
			header('Location: ?notification=cadastro&data='.$data_agenda);
		}else{
			$sql_create = "INSERT INTO `vortex-agenda`(`agenda-horario`, `agenda-data`, `agenda-paciente`, `agenda-procedimentos`, `agenda-disponibilidade`, `agenda-status`,`agenda-user`) VALUES ('$horario_agenda','$data_agenda','$pacientes_agenda','$procedimentos_info','2','1','$token_ageanda')";
			$connect->query($sql_create);
			header('Location: ?notification=cadastro&data='.$data_agenda);
		}
}


	$sql_pacientes = "SELECT * FROM `vortex-pacientes`";
	$pacie = $connect->query($sql_pacientes);
	$Pacientes = $connect->query($sql_pacientes);
	$info = "";
	while($info_pacientes = $pacie->fetch_array()){
		$token_paciente = $info_pacientes['paciente_token'];
		$info = $info.'<option value="'.$token_paciente.'">'.$info_pacientes['Nome'].'"</option>"';
	}

	$sql_procedimentos= "SELECT * FROM `vortex-procedimentos`";
	$consulta_procedimentos = $connect->query($sql_procedimentos);
	$procedimento = "";
	while($info_procedimentos = $consulta_procedimentos->fetch_array()){
		$procedimento = $procedimento.'<option value="'.$info_procedimentos['id'].'">'.$info_procedimentos['procedimentos'].' - '.$info_procedimentos['valor'].'</option>';
	}

	$sql_produtos = "SELECT * FROM `vortex-produtos`";
	$consulta_produtos = $connect->query($sql_produtos);
	$produtos = "";
	while($info_produtos = $consulta_produtos->fetch_array()){
		$produtos = $produtos.'<option value="'.$info_produtos['id'].'">'.$info_produtos['vortex-nome'].'</option>';
	}

	if (isset($_POST['user-agenda'])) {
		$token_account = $_POST['user-agenda'];
	}else{
		if ($info_account['users-cargo'] == 5) {
			$token_user = $info_account['users-token'];
			$token_account = $token_user;
		}else{
			if (isset($_GET['agendaT'])) {
				$token_user = $_GET['agendaT'];
				$token_account = $token_user;
			}else{
				$token_account = "GwELye0S44ytcoQ93W9ycfGQ8W5u2m2a";
			}
		}
	}

	if (isset($_GET['type'])) {
		$type = $_GET['type'];
		$data = $_GET['data'];
		$horario = $_GET['horario'];
		$token =  $_GET['agendaT'];
		$sql_type = "SELECT * FROM `vortex-agenda` WHERE `agenda-horario`='$horario' && `agenda-data`='$data' && `agenda-user`='$token'";
		$i = $connect->query($sql_type)->num_rows;
		if ($type == 0) {
			if ($i > 0) {
				$sql_update = "UPDATE `vortex-agenda` SET `agenda-disponibilidade`='$type' WHERE `agenda-horario`='$horario' && `agenda-data`='$data' && `agenda-user`='$token'";
				$connect->query($sql_update);
				header('Location: ?notification=atualizado&data='.$data.'&agendaT='.$token);
			}else{
				$sql_create = "INSERT INTO `vortex-agenda`(`agenda-horario`, `agenda-data`, `agenda-paciente`, `agenda-procedimentos`, `agenda-disponibilidade`, `agenda-status`,`agenda-user`) VALUES ('$horario','$data','','','$type','0','$token')";
				$connect->query($sql_create);
				header('Location: ?notification=atualizado&data='.$data.'&agendaT='.$token);
			}
		}elseif ($type == 1) {
			if ($i > 0) {
				$sql_update = "UPDATE `vortex-agenda` SET `agenda-disponibilidade`='$type' WHERE `agenda-horario`='$horario' && `agenda-data`='$data' && `agenda-user`='$token'";
				$connect->query($sql_update);
				header('Location: ?notification=atualizado&data='.$data.'&agendaT='.$token);
			}else{
				$sql_create = "INSERT INTO `vortex-agenda`(`agenda-horario`, `agenda-data`, `agenda-paciente`, `agenda-procedimentos`, `agenda-disponibilidade`, `agenda-status`,`agenda-user`) VALUES ('$horario','$data','','','$type','0','$token')";
				$connect->query($sql_create);
				header('Location: ?notification=atualizado&data='.$data.'&agendaT='.$token);
			}
		}
	}

	if (!isset($_GET['data'])) {
		$data = date('Y-m-d');
		$nacimento = new DateTime($data);
		$date = $nacimento->format('d/m/Y');
	}else{
		$data = $_GET['data'];
		$nacimento = new DateTime($data);
		$date = $nacimento->format('d/m/Y');
	}


	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		$id = $_GET['id'];

		$sql_status = "UPDATE `vortex-agenda` SET `agenda-status`='$status' WHERE `id`='$id'";
		$connect->query($sql_status);
		header('Location: ?notification=status&data='.$data);
	}

	if (isset($_POST['id_paciente'])) {
		$id_paciente = $_POST['id_paciente'];
		$valor = $_POST['valor_venda'];
		$pagamento = $_POST['pagamento'];
		$data_venda = date('d-m-Y');
		$token = gen(16);

		$sql_venda = "INSERT INTO `vortex-financeiro`(`vortex-paciente`, `vortex-pagamento`, `vortex-valor`, `vortex-data`, `vortex-token`) VALUES ('$id_paciente','$pagamento','$valor','$data_venda','$token')";
		$connect->query($sql_venda);
		header('Location: ?notification=venda&data='.$data);
	}


	$agenda_funcionario = "SELECT * FROM `vortex-users` WHERE `users-cargo`='5' && `users-status`='1'";
	$fun_consulta = $connect->query($agenda_funcionario);
?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->

<div class="agenda">
	<div class="container-fluid">
		<br>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "venda") {
					alert("novo_produto","Venda acabou de ser realizada.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "atualizado") {
					alert("novo_produto","Acabamos de atualizar o horario.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "cadastro") {
					alert("novo_produto","Acabou de ser agendado um horario.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "alterar") {
					alert("novo_produto","Acabamos de Atualizar o Horario.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "desmarcar") {
					alert("novo_produto","Horario acabou de ser desmarcado.","#e31e1e","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "status") {
					alert("novo_produto","Status acabou de ser atualizado.","#09b576","#fff");
				}
		?>

		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "financeiro") {
					alert("novo_produto","Acabamos de cadastrar sua venda.","#09b576","#fff");
				}
		?>

		<?php
			if (isset($_GET['notification']) && $_GET['notification'] == "adicionado") {
					alert("novo_produto","Este horario acabou de ficar disponivel.","#46f030","#fff");
				}
		?>

		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "limpado") {
					alert("novo_produto","Acabamos de limpar os horarios disponivel.","#22c93e","#fff");
				}
		?>
		<div class="row">
			<div class="col-md-3">	
				<form method="GET">
					<input class="form-control form-style" type="date" value="<?php echo $data; ?>" name="data">
					<input type="hidden" name="agendaT" value="<?php echo $token_account ?>">
					<button class="btn btn-style" type="submit">Consultar</button>
				</form>
				<button href="#" class="btn btn-paciente" data-bs-toggle="modal" data-bs-target="#Tabela_Paciente"><i class="fa-solid fa-magnifying-glass"></i> Procurar Paciente</button>
				<button href="#" class="btn btn-paciente" data-bs-toggle="modal" data-bs-target="#Venda_Produto"><i class="fi fi-rr-shopping-cart"></i> Vender Produto</button>
				<a href="<?php echo $flow ?>agenda/?limparhorario" class="btn btn-paciente"><i class="fi fi-rr-trash"></i> Limpar Horario</a>
			</div>
			<div class="col-md-9">
				<div class="table-agenda">
					<br>
					<?php if ($info_account['users-cargo'] != 5) {?>
						<form method="POST">
							<select name="user-agenda" class="form-select">
							  <option value="GwELye0S44ytcoQ93W9ycfGQ8W5u2m2a">Agenda Amanda</option>
							  <?php while($info_funcio = $fun_consulta->fetch_array()){
							  	echo '<option value="'.$info_funcio['users-token'].'">Agenda '.$info_funcio['users-nome'].'</option>';
							  } ?>
							</select>
							<button type="submit" class="btn btn-paciente">Olhar Agenda</button>
						</form>
					<?php } ?>
					<br>
					<?php 
						$sql_nome_agenda = "SELECT * FROM `vortex-users` WHERE `users-token`='$token_account'";
						$c_nome = $connect->query($sql_nome_agenda);
						$n_ageanda = $c_nome->fetch_array();
					?>
					<h5>Agenda da <b><?php echo $n_ageanda['users-nome'] ?></b> do dia : <?php echo $date;  ?></h5>
					<table class="table table-striped table-hover table-borderless">
					    <thead class="table-header">
					      <tr>
					        <th><i class="fa-solid fa-unlock"></i></th>
					        <th>Horario</th>
					        <th>Paciente</th>
					        <th>Procedimento</th>
					        <th>Info</th>
					        <th>Gerenciar</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php ConsultaHorario("07:00",$data,$token_account) ?>
					      <?php ConsultaHorario("07:30",$data,$token_account) ?>
					      <?php ConsultaHorario("08:00",$data,$token_account) ?>
					      <?php ConsultaHorario("08:30",$data,$token_account) ?>
					      <?php ConsultaHorario("09:00",$data,$token_account) ?>
					      <?php ConsultaHorario("09:30",$data,$token_account) ?>
					      <?php ConsultaHorario("10:00",$data,$token_account) ?>
					      <?php ConsultaHorario("10:30",$data,$token_account) ?>
					      <?php ConsultaHorario("11:00",$data,$token_account) ?>
					      <?php ConsultaHorario("11:30",$data,$token_account) ?>
					      <?php ConsultaHorario("12:00",$data,$token_account) ?>
					      <?php ConsultaHorario("12:30",$data,$token_account) ?>
					      <?php ConsultaHorario("13:00",$data,$token_account) ?>
					      <?php ConsultaHorario("13:30",$data,$token_account) ?>
					      <?php ConsultaHorario("14:00",$data,$token_account) ?>
					      <?php ConsultaHorario("14:30",$data,$token_account) ?>
					      <?php ConsultaHorario("15:00",$data,$token_account) ?>
					      <?php ConsultaHorario("15:30",$data,$token_account) ?>
					      <?php ConsultaHorario("16:00",$data,$token_account) ?>
					      <?php ConsultaHorario("16:30",$data,$token_account) ?>
					      <?php ConsultaHorario("17:00",$data,$token_account) ?>
					      <?php ConsultaHorario("17:30",$data,$token_account) ?>
					      <?php ConsultaHorario("18:00",$data,$token_account) ?>
					      <?php ConsultaHorario("18:30",$data,$token_account) ?>
					      <?php ConsultaHorario("19:00",$data,$token_account) ?>
					      <?php ConsultaHorario("19:30",$data,$token_account) ?>
					      <?php ConsultaHorario("20:00",$data,$token_account) ?>
					      <?php ConsultaHorario("20:30",$data,$token_account) ?>
					      <?php ConsultaHorario("21:00",$data,$token_account) ?>
					      <?php ConsultaHorario("21:30",$data,$token_account) ?>
					      <?php ConsultaHorario("22:00",$data,$token_account) ?>
					      <?php ConsultaHorario("22:30",$data,$token_account) ?>
					      <?php ConsultaHorario("23:00",$data,$token_account) ?>
					      <?php ConsultaHorario("23:30",$data,$token_account) ?>
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

<?php 
if (isset($_GET['whats'])) {
		$telefone = $_GET['telefone'];
		$nome_paciente = $_GET['nome'];
		$horario = $_GET['horario'];
		echo '<script>
      window.open("https://web.whatsapp.com/send/?phone='.$telefone.'&text=Olá '.$nome_paciente.' Gostaria de estar confirmando sua consulta no dia '.$date.' as '.$horario.', posso confirmar sua consulta?", "_blank");
    	</script>';
	} ?>


</body>
</html>



<div class="modal" id="Venda_Produto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Venda de Produt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST">
      	<div class="row">
      		<p>* Pergunte a amanda qual o valor deve ser cobrado.</p>
      		<div class="col-md-12">
      			<input type="hidden" name="venda_produtos" value="4">
      			<input type="hidden" name="agenda_venda" value="<?php echo $token_account ?>">
      			<label>Valor</label>
      			<input type="valor" class="form-control" name="valor">
      		</div>
      		<div class="col-md-12">
      			<label>Forma Pagamento</label>
      			<select class="form-select" name="pagamento">
						  <option value="1">Dinheiro</option>
						  <option value="2">Cartão Debito</option>
						  <option value="3">Cartão Credito</option>
						  <option value="4">Pix</option>
						</select>
      		</div>
      		<?php 
	      		$sql_produto = "SELECT * FROM `vortex-produtos`";
				$consulta_produtos = $connect->query($sql_produto);
				while($info_produto = $consulta_produtos->fetch_array()){
	      			echo '
	      			<div class="col-md-4">
		      			<label>'.$info_produto['vortex-nome'].'</label>
		      			<input class="form-control" name="'.$info_produto['id'].'" min="0" max="9000" type="number" value="0">
	      			</div>
	      			';
	      		}
				?>
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-table" data-bs-toggle="tooltip" title="Vender agora!">Realizar Venda</button>
      	</form>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>




<?php 

if (isset($_GET['vendaP'])) {
	$id = $_GET['id'];
	$sql_venda = "SELECT * FROM `vortex-agenda` WHERE `id`='$id'";
	$consulta_venda = $connect->query($sql_venda);
	$info_vendas = $consulta_venda->fetch_array();
	$token_paciente = $info_vendas['agenda-paciente'];
	$agenda = $_GET['agendaT'];

	$sql_produto = "SELECT * FROM `vortex-produtos`";
	$consulta_produtos = $connect->query($sql_produto);
	
	echo '

<div class="modal" id="venda">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Realizar Venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST">
      	<div class="row">
      		<p>* Pergunte a amanda qual o valor deve ser cobrado.</p>
      		<div class="col-md-12">
      			<input type="hidden" name="venda_paciente" value="'.$token_paciente.'">
      			<input type="hidden" name="agenda_venda" value="'.$agenda.'">
      			<label>Valor</label>
      			<input type="valor" class="form-control" name="valor">
      		</div>
      		<div class="col-md-12">
      			<label>Forma Pagamento</label>
      			<select class="form-select" name="pagamento">
						  <option value="1">Dinheiro</option>
						  <option value="2">Cartão Debito</option>
						  <option value="3">Cartão Credito</option>
						  <option value="4">Pix</option>
						</select>
      		</div>';
					while($info_produto = $consulta_produtos->fetch_array()){
      			echo '
      			<div class="col-md-4">
	      			<label>'.$info_produto['vortex-nome'].'</label>
	      			<input class="form-control" name="'.$info_produto['id'].'" min="0" max="9000" type="number" value="0">
      			</div>
      			';
      		}
      		echo '
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-table" data-bs-toggle="tooltip" title="Vender agora!">Realizar Venda</button>
      	</form>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
    $(window).on("load", function() {
        $("#venda").modal("show");
    });
</script>

';}

?>

<?php 

if (isset($_GET['venda'])) {
	$id = $_GET['id'];
	$sql_venda = "SELECT * FROM `vortex-agenda` WHERE `id`='$id'";
	$consulta_venda = $connect->query($sql_venda);
	$info_vendas = $consulta_venda->fetch_array();
	$token_paciente = $info_vendas['agenda-paciente'];
	$procedimento_id = $info_vendas['agenda-procedimentos'];
	$id_procedimento = explode(",",$procedimento_id);

	$produtos_id = $info_vendas['agenda-procedimentos'];
	$id_procedimento = explode(",",$produtos_id);
	$valor = 0.0;
	$procedimentos_nomes = "";
	if(isset($id_procedimento[0])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[0]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce01 = "";
	}
	if(isset($id_procedimento[1])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[1]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce02 = "";
	}
	if(isset($id_procedimento[2])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[2]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce03 = "";
	}
	if(isset($id_procedimento[3])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[3]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce04 = "";
	}
	if(isset($id_procedimento[4])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[4]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce05 = "";
	}
	if(isset($id_procedimento[5])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[5]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce06 = "";
	}
	if(isset($id_procedimento[6])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[6]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce07 = "";
	}
	if(isset($id_procedimento[7])){
		$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[7]'";
		$consult_name = $connect->query($proce_nome);
		$proce_info = $consult_name->fetch_array();
		$valor = $valor + $proce_info['valor'];
		$nome = $proce_info['procedimentos'];
		$procedimentos_nomes = $procedimentos_nomes.$nome.'<br>';
	}else{
		$nome_proce08 = "";
	}
	echo '

<div class="modal" id="venda">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Realizar Venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST">
      	<div class="row">
      		<div class="col-md-12">
      			<label>Procedimentos Realizados</label>
      			<p>'.$procedimentos_nomes.'</p>
      			<label>Valor a Cobrar</label>
      			<p>R$ '.$valor.'</p>
      			<input type="hidden" name="id_paciente" value="'.$token_paciente.'">
      			<input type="hidden" name="valor_venda" value="'.$valor.'">
      		</div>
      		<div class="col-md-12">
      			<label>Forma Pagamento</label>
      			<select class="form-select" name="pagamento">
						  <option value="1">Dinheiro</option>
						  <option value="2">Cartão Debito</option>
						  <option value="3">Cartão Credito</option>
						  <option value="4">Pix</option>
						</select>
      		</div>
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-table" data-bs-toggle="tooltip" title="Vender agora!">Realizar Venda</button>
      	</form>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
    $(window).on("load", function() {
        $("#venda").modal("show");
    });
</script>

';
}

?>

<?php 

if (isset($_GET['remarcar'])) {
	$horario = $_GET['horario'];
	$id = $_GET['id'];
	echo '<div class="modal" id="Remarcar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Remarcar Consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST">
      	<div class="row">
      		<div class="col-md-6">
      			<label>Data</label>
      			<input type="hidden" class="form-control form-modal" value="'.$data.'" name="data_dia">
      			<input type="hidden" class="form-control form-modal" value="'.$id.'" name="id_alterar">
      			<input type="date" class="form-control form-modal" value="'.$data.'" name="data_alterar">
      		</div>
      		<div class="col-md-6">
      			<label>Horario</label>
      			<input type="time" class="form-control form-modal" value="'.$horario.'" name="horario_alterar">
      		</div>
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-table" data-bs-toggle="tooltip" title="Alterar Horario da Consulta!">Remarcar Horario</button>
      	</form>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
    $(window).on("load", function() {
        $("#Remarcar").modal("show");
    });
</script>

';
}

?>


<?php 

if (isset($_GET['agendar'])) {
	$agendar=$_GET['agendar'];
	$horario = $_GET['horario'];
	echo '<div class="modal" id="Marcar_Horario">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Marcando Consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="POST">
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-6">
      			<label>Data</label>
      			<input class="form-control" type="hidden" name="token_agenda" value="'.$agendar.'">
      			<input type="date" class="form-control form-modal" value="'.$data.'" name="data" readonly>
      		</div>
      	<div class="col-md-6">
      			<label>Horario</label>
      			<input type="time" class="form-control form-modal" value="'.$horario.'" name="horario" readonly>
      		</div>
      		<div class="col-md-12">
      			<br>
      			<label>Paciente</label>
      			<input class="form-control" list="pacientesZ" name="paciente" id="pacien">
						<datalist id="pacientesZ">
						  '.$info.'
						</datalist >
				<label class="modal-subtitle">* Para evitar transtornos e garantir um atendimento eficiente, é essencial cadastrar todos os pacientes antes de marcar horários. Certifique-se de que todas as informações relevantes sobre o paciente estejam registradas.</label>
      		</div>
      		<div class="col-md-12">
      			<br>
      			<label>Procedimentos</label>
      			<select multiple="multiple" name="procedimentos[]" placeholder="Pick a brand" class="form-control SlectBox SelectModal">
						'.$procedimento.'
				</select>
      		</div>
      	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-sm btn-table" data-bs-toggle="tooltip" title="Confirmar Consulta!">Agendar Horario</button>
      	<a href="'.$flow.'cadastrar/pacientes/basico/" class="btn btn-sm btn-table" data-bs-toggle="tooltip" title="Novo Paciente!">Cadastrar Paciente</a>
      	<a href="'.$flow.'agenda/?liberar&liberarhorario='.$horario.'&liberardata='.$data.'" class="btn btn-sm btn-table">Liberar Hoario</a>
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
        </form>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
    $(window).on("load", function() {
        $("#Marcar_Horario").modal("show");
    });
</script>

';
}

?>


<?php 

if (isset($_GET['Desmarcar'])) {
	$horario = $_GET['horario'];
	$nome = $_GET['nome_d'];
	$id = $_GET['id'];
	echo '<div class="modal" id="Dxesmarcar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Desmarcar Horario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></c>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<center>
	        <h2><i class="fa-solid fa-face-sad-cry"></i></h2>
	        <h4>Você realmente quer desmarcar o horario!</h4>
	        <p>'.$nome.' no dia '.$date.' as '.$horario.'?</p>
        </center>
        <div class="row">
        	<div class="col-md-6">
        		<a href="?desmarcar_a&horario='.$horario.'&data='.$data.'&agendaT='.$user.'&id_excluir='.$id.'" class="btn btn-style">Sim</a>
        	</div>
        	<div class="col-md-6">
        		<button href="#" class="btn btn-sm btn-danger btn-full" data-bs-dismiss="modal">Não</button>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(window).on("load", function() {
        $("#Dxesmarcar").modal("show");
    });
</script>

';
}

?>


<div class="modal" id="Tabela_Paciente">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Procurar Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="responsive-table">
        	<table id="pacientes" class="table table-striped">
	        	<thead>
		            <tr>
		                <th>Nome Paciente</th>
		                <th>Telefone</th>
		                <th>Gerenciar</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php while($info_p = $Pacientes->fetch_array()){
		        		echo '<tr>
		        		<th>'.$info_p['Nome'].'</th>
		        		<th>'.$info_p['Telefone'].'</th>
		        		<th><a href="'.$flow.'pacientes/anamnese/?token='.$info_p['paciente_token'].'" class="btn btn-table" data-bs-toggle="tooltip" title="Conferir Ficha!"><i class="fa-regular fa-eye"></i></a></th>';
		        	} ?>
		        </tbody>
	        </table>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Fechar</button>
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
    $('#pacientes').DataTable({
  			paging: false,
        ordering: false,
        info: false,
	    });
	});
</script>
