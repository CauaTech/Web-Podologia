<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
	@import url('https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css');
	@import url('https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css');
	


	*{
		margin: 0;
		padding: 0;
		font-family: 'Open Sans', sans-serif;
	}
	.bg-stack{
		background-color: #5182ED;
	}
	.bg-stack-grad{
		background-image: linear-gradient(to right, #7351ed, #6b66f1, #6878f2, #6a88f1, #7396ee, #7499ec, #769ceb, #789fe9, #6e98ea, #6491ec, #5a89ec, #5182ed);
	}
	.fluter{
		transform: translateY(0px);
		animation: float 3s ease-in-out infinite;
	}
	@keyframes float{
		0%{
			transform: translateY(0px);
		}
		50%{
			transform: translateY(-30px);
		}
		100%{
			transform: translateY(0px);
		}
	}
	.podologia-header{
		min-height: 80vh;
		background-image: url(<?php echo $flow ?>assents/img/header.jpg);
		background-repeat: no-repeat;
		background-size: cover;
	}
	.color-podologia{
		color: #C199A0;
	}
	.podologia-header-item{
		margin-top: 25vh;
	}
	.card-podologia{
		background-image: url(<?php echo $flow ?>assents/img/xray-pe.jpg);
		min-height: 400px;
		border: 0;
	}
	.podologia-ajuda{
		margin-top: 40px;
		margin-bottom: 40px;
	}
	.text-ajuda{
		font-size: 14px;
	}
	.card-alert{
		border: 0;
		color: #C09DA1;
		background-color: #CECECE;
	}
	.podologia-alert{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.podologia-horario{
		background-color: #CECECE;
	}
	.podologia-body{
		padding: 3rem 0rem;
	}
	.card-pe{
		min-height: 400px;
		border: 0;
		margin-top: 20px;
	}
</style>