<?php 
$int = 0;
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
	<title>Espaço Podologia</title>
	<meta name="language" content="pt-BR">
	<meta name="description" content="Bem-vindo ao Espaço Podologia, onde você encontrará informações confiáveis e relevantes sobre o cuidado com os seus pés. A nossa equipe de especialistas em Podologia é formada por profissionais altamente qualificados e experientes, que estão comprometidos em fornecer os melhores cuidados para seus pés.">
	
	<meta name="robots" content="all">
	<meta name="author" content="M0rx">

	<meta name="keywords" content="Stack, StackStore, Comprar site, preciso de um site, criador de site, programador">

	<link rel="canonical" href="https://stackstore.com.br"/>
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://stackstore.com.br/assents/img/logo/Logo.png">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image" content="https://stackstore.com.br/assents/img/logo/Logo.png">

	<?php include($flow.'assents/app/head.php');?>
</head>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->
<div class="podologia-header" id="inicio">
	<div class="container">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<center>
					<div class="podologia-header-item">
						<h2 class="color-podologia">Marque agora sua consulta</h2>
						<p>Nossa equipe pode ajudar com uma variedade de problemas nos pés para ajudá-lo a se sentir melhor e voltar às suas atividades favoritas mais cedo.</p>
						<a href="<?php echo $flow ?>agendamento/" class="item_nav btn btn-stack">
				    		<i class="fa-regular fa-pen-to-square"></i>
				    		Auto Agendamento
				    	</a>
					</div>
				</center>
			</div>
		</div>
	</div>
</div>
<div class="podologia-ajuda" id="ajuda">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-podologia">
				</div>
			</div>
			<div class="col-md-6">
				<h2>COMO PODEMOS TE AJUDAR?</h2>
				<p class="text-ajuda">Aferição de sinais vitais<br>
				Podoprofilaxia<br>
				Tinea Pedis (Frieira)<br>
				Fissuras de calcanhar (Rachadura nos pés)<br>
				Calosidades<br>
				Hiperqueratose<br>
				Verruga plantar ( Olho de peixe)<br>
				Calo com núcleo<br>
				Onicomicose ( Micose nas unhas)<br>
				Onicocriptose (Unha encravada)<br>
				Espiculaectomia<br>
				Órtese (Dispositivo para unha encravada e unhas com deformidades)<br>
				Órtese em artelhos<br>
				Prevenção e tratamento (Feridas e Úlceras)<br>
				Curativos<br>
				Podiatria em crianças<br>
				Podiatria em idosos<br>
				Pé de diabético e suas complicações<br>
				Úlceras venosas<br>
				LPP(Lesão por pressão)<br>
				Laserterapia<br>
				Dor no calcanhar<br>
				Dedo do pé em martelo<br>
				Neuromas<br>
				Pé chato</p>
			</div>
		</div>
	</div>
</div>
<div class="podologia-alert">
	<div class="container">
		<div class="card card-alert">
			<div class="card-body">
				<p>AVISO IMPORTANTE COVID-19<br><br>Implementamos procedimentos de precaução para manter um ambiente higiênico e saudável em nossas clínicas para que possamos continuar com seus cuidados contínuos. Para obter mais informações, ligue para nossa simpática equipe.</p>
			</div>
		</div>
	</div>
</div>
<div class="podologia-horario">
	<div class="container">
		<div class="podologia-body">
			<div class="row">
				<div class="col-md-6">
					<h4 class="color-podologia"><b>Horário de Funcionamento</b></h4>
					<p class="color-podologia">Nossa Clínica de Podologia opera como uma 
Clínica de Podologia geral.</p>
				</div>
				<div class="col-md-6">
					<h4 class="color-podologia"><b>De terça a sexta das 9 as 19h 
aos sábados das 8 as 13h</b></h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="podologia-servico" id="servico">
	<div class="container">
		<div class="podologia-body">
			<center>
				<h3>Serviços e Tratamentos</h3>
			</center>
			<div class="row">
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img.png"><br><br>
								<p><b>Tratamentos de Unhas
								Encravadas e Infeccionadas</b></p>
								<p>É quando um pedaço de unha perfura a pele do dedo do pé.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img1.png"><br><br>
								<p><b>Verrugas</b></p>
								<p>Geralmente ocorrem nas solas dos pés ou ao redor dos dedos dos pés.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img2.png"><br><br>
								<p><b>Infecção fúngica das unhas</b></p>
								<p>Não precisa ficar envergonhado. Oferecemos várias opções de tratamento.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img3.png"><br><br>
								<p><b>Terapia a laser</b></p>
								<p>Alívio rápido e eficaz para dor, inchaço e inflamação.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img4.png"><br><br>
								<p><b>Unhas espessas e descoloridas</b></p>
								<p>Suas unhas são uma representação de sua saúde geral.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img5.png"><br><br>
								<p><b>Úlceras diabéticas</b></p>
								<p>As úlceras ocorrem em aproximadamente 15% dos pacientes diabéticos.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img6.png"><br><br>
								<p><b>Pediatria - pés de criança</b></p>
								<p>É importante procurar tratamento mais cedo.</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-pe shadow">
						<div class="card-body">
							<center>
								<img width="80%" src="<?php echo $flow ?>assents/img/img7.png"><br><br>
								<p><b>Calos e calosidades</b></p>
								<p>Calos e calosidades são camadas espessas e endurecidas de pele causadas por fricção repetitiva</p>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="podologia-sobre">
	<div class="container">
		<h1><b>Quem tratamos</b></h1>
		<br>
		<p><b>Crianças</b><br>
Se você está preocupado com os pés, o desenvolvimento ou o andar de seu filho, marque uma consulta hoje com um de nossos amigáveis podólogos para crianças.<br><br>

<b>Atletas</b><br>
Você quer melhorar seu desempenho, evitar lesões ou tratar uma lesão? Fale com nossa equipe para discutir um plano de tratamento para garantir que você tenha o melhor desempenho possível.<br><br>

<b>Trabalhadores</b><br>
Se o seu trabalho envolve passar horas em pé, é provável que você esteja familiarizado com pés, pernas e costas doloridos e cansados. Trabalharemos com você para garantir que você tenha o suporte necessário para mantê-lo durante a semana.<br><br>

<b>55+</b><br>
À medida que envelhecemos, uma verificação anual da saúde dos pés é tão importante quanto um teste de visão ou audição. Condições como diabetes ou problemas circulatórios podem ser detectados olhando para os pés, e problemas comuns como calos, pele rachada e unhas encravadas podem ser tratados com sucesso.<br><br>

<b>Diabéticos</b><br>
Você fez seu check-up anual? Todos os diabéticos devem ter seus pés examinados pelo menos uma vez por ano por um médico ou podólogo. Isso é importante para detectar problemas precocemente e outras complicações, como gangrena.</p>
	</div>
</div>
<br><br><br>

<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>