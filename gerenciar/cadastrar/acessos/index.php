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
	<title>Cadastrar Acesso</title>
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


	if (isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['cargo']) && !empty($_POST['nome']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['cargo'])) {
		$account_nome = input($_POST['nome']);
		$account_login = input($_POST['login']);
		$account_password = input($_POST['password']);
		$account_password = md5($account_password);
		$account_cargo = input($_POST['cargo']);
		$account_token = gen(32);
		$sql_create = "INSERT INTO `vortex-users`(`users-nome`, `users-login`, `users-password`, `users-cargo`, `users-status`, `users-token`) VALUES ('$account_nome','$account_login','$account_password','$account_cargo','0','$account_token')";
		$create_account = $connect->query($sql_create);
		header('Location: '.$flow.'cadastrar/acessos/?notification=c_account');
	}

	if (isset($_GET['update']) && $_GET['update'] == 1) {
		$token_account = $_GET['account'];
		$sql_update = "UPDATE `vortex-users` SET `users-status`='1'WHERE `users-token`='$token_account'";
		$connect->query($sql_update);
		header('Location: '.$flow.'cadastrar/acessos/?notification=update');
	}
	if (isset($_GET['update']) && $_GET['update'] == 0) {
		$token_account = $_GET['account'];
		$sql_update = "UPDATE `vortex-users` SET `users-status`='0'WHERE `users-token`='$token_account'";
		$connect->query($sql_update);
		header('Location: '.$flow.'cadastrar/acessos/?notification=update');
	}

	if (isset($_GET['excluir'])) {
		$token_account = $_GET['account'];
		$sql_excluir = "DELETE FROM `vortex-users` WHERE `users-token`='$token_account'";
		$connect->query($sql_excluir);
		header('Location: '.$flow.'cadastrar/acessos/?notification=excluir');
	}

	$c_accounts = "SELECT * FROM `vortex-users`";
	$consulta_accounts = $connect->query($c_accounts);

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
			if (isset($_GET['notification']) && $_GET['notification'] == "c_account") {
					alert("c_account","Uma nova conta acaba de ser adicionada ao sistema.","#6acc39","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "update") {
					alert("c_account","Atualizei o status da conta para fornecer informações mais recentes.","#f58442","#fff");
				}
		?>
		<?php 
			if (isset($_GET['notification']) && $_GET['notification'] == "excluir") {
					alert("c_account","Acabamos de excluir a conta que pediu.","#ff3333","#fff");
				}
		?>
		<br>
		<button class="btn btn-style" data-bs-toggle="modal" data-bs-target="#Fornecedor">Criar Acesso</button>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="responsive-table">
					<table id="fornecedores" class="table">
			        	<thead class="table-header">
				            <tr>
				                <th>Nome</th>
				                <th>Cargo</th>
				                <th>Status</th>
				                <th>Gerenciar</th>
				                <th>EXCLUIR</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php while ($info_acessos = $consulta_accounts->fetch_array()) {
				        		if ($info_acessos['users-cargo'] == 1) {
				        			$cargo = '<span class="badge bg-warning">Atendente</span>';
				        		}

				        		if ($info_acessos['users-cargo'] == 2) {
				        			$cargo = '<span class="badge bg-info">Gerente</span>';
				        		}

				        		if ($info_acessos['users-cargo'] == 3) {
				        			$cargo = '<span class="badge bg-primary">Gestor</span>';
				        		}
				        		if ($info_acessos['users-cargo'] == 5) {
				        			$cargo = '<span class="badge bg-info">Funcionario</span>';
				        		}

				        		if ($info_acessos['users-status'] == 1) {
				        			$status = '<span class="badge bg-success">Ativo</span>';
				        		}

				        		if ($info_acessos['users-status'] == 0) {
				        			$status = '<span class="badge bg-danger">Desligado</span>';
				        		}
				        		echo '<tr>
				        		<th>'.$info_acessos['users-nome'].'</th>
				        		<th>'.$cargo.'</th>
				        		<th>'.$status.'</th>
				        		<th>
				        			<a href="'.$flow.'cadastrar/acessos/?update=0&account='.$info_acessos['users-token'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Desativar!">
				        				<i class="fa-regular fa-circle-xmark"></i>
				        			</a>
				        			<a href="'.$flow.'cadastrar/acessos/?update=1&account='.$info_acessos['users-token'].'" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Ativar!">
				        				<i class="fa-solid fa-check"></i>
				        			</a>
				        		</th>
				        		<th>
				        			<a href="'.$flow.'cadastrar/acessos/?excluir=1&account='.$info_acessos['users-token'].'" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Excluir!">
				        				<i class="fi fi-rs-trash"></i>
				        			</a></th>
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
			<div class="col-md-6">
				<label>Nome do Usuario</label>
				<input type="text" class="form-control form-login" name="nome">
			</div>
			<div class="col-md-6">
				<label>Login</label>
				<input name="login" type="text" class="form-control form-login">
			</div>
			<div class="col-md-6">
				<label>Senha</label>
				<input type="password" class="form-control form-login" name="password">
			</div>
			<div class="col-md-6">
				<label>Cargo</label>
				<select name="cargo" class="form-select form-login">
				  <option value="3">Gestor</option>
				  <option value="2">Gerente</option>
				  <option value="1">Atendente</option>
				  <option value="5">Funcionario</option>
				</select>
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
