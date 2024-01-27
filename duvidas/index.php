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

<br><br><br>
<div class="container">
	<h2>Valor da consulta 60,00</h2>
	<h6>Neste valor esta incluso a avaliação clínica  e física do paciente, aferido pressão, glicemia, e teste de sensibilidade quando necessário for, com estas informações à profissional consegue criar um plano de tratamento personalizado para cada paciente, assim garantindo excelentes resultados.</h6>

	<h2>Duvidas frequentes: valores, Os procedimentos São à  partir de 120,00</h2>
	<h6>Não gostaria de realizar a consulta, só quero um atendimento de emergência 🆘? Fique tranquilo também oferecemos este procedimento, neste caso a profissional te informa o valor no ato do agendamento.</h6>
	<hr>
	<h2>O que é podologia e qual é a sua importância para a saúde dos pés?</h2>
	<h6>A podologia é uma área da saúde que se dedica ao estudo e tratamento dos pés. Sua importância reside no cuidado preventivo e corretivo, promovendo a saúde e o bem-estar dos pés.</h6>
	<h2>Quais são os sinais de que preciso de cuidados podológicos?</h2>
	<h6>Sinais como calos, calosidades, unhas encravadas, dores persistentes nos pés, alterações na coloração ou textura das unhas indicam a necessidade de cuidados podológicos.</h6>
	<h2>A podologia é indicada para crianças?</h2>
	<h6>Sim, a podologia é indicada para crianças, especialmente para prevenir problemas posturais e corrigir alterações no desenvolvimento dos pés.</h6>
</div>

<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>