<?php 
if (!isset($_COOKIE['tdXinYmRTyVT'])) {
	echo '<div class="container fixed-bottom cookie" style="margin-bottom: 20px;">
	<div style="float: right; max-width: 700px;" class="card shadow">
		<div class="container" style="padding: 20px;">
	 	<img src="'.$flow.'assents/img/cookie.png" width="25px"> <b>Política de Cookies.</b><hr>
	 	<p style="font-size: 13px;" class="cookie-descri">Este site usa cookies para melhorar a experiência do usuário e garantir que você obtenha a melhor experiência em nosso site. Ao continuar navegando em nosso site, você concorda com o uso de cookies.</p>
	 	<hr>
			<div class="d-grid">
			 	<button type="button" onclick="alert_cookie()" class="btn btn-cookie btn-block btn-sm " data-bs-dismiss="card" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Clickando aqui você ativa o uso de Cookie em seu navegador, para poder estar tento um melhor experiência.">Aceitar</button>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.btn-cookie{
		background-color: #7260D6;
		color: #fff;
	}
	.btn-cookie:hover{
		color: #d9d9d9;
	}
	.cookie-descri{
		color: #545454;
	}
</style>';
}else{
	$cookie = $_COOKIE['tdXinYmRTyVT'];
	if ($cookie != "v507k6iO1wMeuT3ge7iDPytZS") {
		setcookie("tdXinYmRTyVT", "v507k6iO1wMeuT3ge7iDPytZS", time() - (86400 * 60), "/");
	}else{
		echo '';
	}
}
?>
<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
return new bootstrap.Popover(popoverTriggerEl)
})
function alert_cookie() {
  document.cookie = "tdXinYmRTyVT=v507k6iO1wMeuT3ge7iDPytZS; expires=Thu, 25 Dec 2040 12:00:00 UTC";
  $('.fixed-bottom').remove('');
}
</script>