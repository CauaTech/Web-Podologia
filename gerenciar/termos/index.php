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


<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body class="background-login">

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php #include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->
<div class="container">
	<div class="card card-termos">
		<div class="card-body">
			<h5><b>Termos de Serviço da Clínica de Podologia</b></h5>
			<hr>
			<h6><b>1. Introdução</b></h6>
			<p>Bem-vindo à AmandaMatos Podologia! Ao acessar nossos serviços, você concorda em cumprir estes Termos de Serviço. Se não concordar com algum destes termos, por favor, não utilize nossos serviços.</p>

			<h6><b>2. Agendamento e Cancelamento de Consultas</b></h6>
			<p>2.1. Ao agendar uma consulta, você concorda em comparecer à data e horário marcados.<br><br>2.2. Caso precise cancelar ou reagendar uma consulta, pedimos que o faça com pelo menos 24 horas de antecedência.</p>

			<h6><b>3. Pagamento</b></h6>
			<p>3.1. Os preços dos nossos serviços estão sujeitos a alterações sem aviso prévio.<br><br>3.2. O pagamento deve ser feito no momento do atendimento, e aceitamos pagamentos em dinheiro, cartão de crédito e débito.</p>

			<h6><b>4. Privacidade e Confidencialidade</b></h6>
			<p>4.1. Comprometemo-nos a manter suas informações pessoais e de saúde em sigilo de acordo com as leis aplicáveis.</p>

			<h6><b>5. Política de Uso de Imagem</b></h6>
			<p>5.1. A Clínica de Podologia pode registrar imagens (fotografias e vídeos) de pacientes para fins de documentação clínica.<br><br>

5.2. Solicitaremos seu consentimento por escrito antes de capturar ou usar imagens para qualquer outro propósito, como marketing.<br><br>

5.3. Caso deseje que sua imagem não seja usada para fins de marketing, informe-nos por escrito.</p>
			
			<h6><b>6. Limitação de Responsabilidade</b></h6>
			<p>6.1. A Clínica de Podologia não se responsabiliza por quaisquer danos ou lesões decorrentes do uso dos serviços, exceto nos casos de negligência comprovada.</p>

			<h6><b>7. Alterações nos Termos de Serviço</b></h6>
			<p>7.1. Reservamo-nos o direito de modificar estes Termos de Serviço a qualquer momento. Notificaremos os clientes sobre quaisquer alterações significativas.</p>

			<h6><b>8. Lei Aplicável</b></h6>
			<p>8.1. Estes Termos de Serviço são regidos pelas leis do [Brasil, Parana].</p>

			<hr>
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
		$telefone = $_GET['whats'];
		$nome_paciente = $_GET['nome'];
		echo '<script>window.open("https://web.whatsapp.com/send/?phone='.$telefone.'&text=Olá, '.$nome_paciente.', Gostaríamos de informar que, ao agendar uma consulta conosco, você estará concordando com nossos Termos de Serviço e com a utilização do seu direito de imagem.Atenciosamente, AmandaMatos Podologia https://espacopodologia.com.br/gerenciar/termos/", "_blank");
    	</script>';
	} ?>


</body>
</html>