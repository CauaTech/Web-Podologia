<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300&display=swap');
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
		font-family: 'Poppins', sans-serif;
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
	.btn-new{
		width: 100%;
		margin-top: 20px;
		background-color: #FFC7CD;
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
	.btn-estoque{
		background-color: #28c938;
		border: 0;
		color: #fff;
	}
	.card-novo{
		margin-top: 20px;
	}

	.modal-header{
		border: 0;
		background-color: #FFC7CD;
		color: #fff;
	}
	.responsive-table{
		overflow-x: auto;
		width: 100%;
	}
	.dataTables_filter{
		float: right;
	}
	datalist{
		background-color: black;
	}

	<?php #LOGIN PAGE ?>
	.background-login{
		background-color: #FFC7CD;
	}
	.card-login{
		border: 0;
		border-radius: 0;
		margin-top: 10vh;
		max-width: 330px;
	}
	.form-login{
		border-radius: 0;
		border: 0;
		background-color: #ECECEC;
	}
	.f-l{
		margin-top: 29px;
		font-size: 12.9px;
		float: left;
	}
	.btn-login{
		margin-top: 30px;
		margin-bottom: 60px;
		color: #fff;
		background-color: #FFC7CD;
	}

	<?php #Agenda ?>
	.form-style{
		margin-top: 25px;
		border-radius: 0;
		border: 1px solid #FFC7CD;
	}
	.btn-style{
		background-color: #FFC7CD;
		font-size: 12.9px;
		color: black;
		border-radius: 0;
		width: 100%;
		transition: 150ms;
	}
	.btn-style:hover{
		transition: 150ms;
		color: #fff;
		text-decoration: none;
		background-color: #e6aeb4;
	}
	.btn-encaixe{
		background-color: #33AAFF;
		border: 0;
		color: #fff;
		width: 100%;
		margin-top: 10px;
		font-size: 12.9px;
		transition: 150ms;
	}
	.btn-encaixe:hover{
		transition: 150ms;
		color: #fff;
		text-decoration: none;
		background-color: #208CD9;
	}
	.btn-paciente{
		background-color: #37E24E;
		border: 0;
		color: #fff;
		width: 100%;
		margin-top: 10px;
		font-size: 12.9px;
		transition: 150ms;
	}
	.btn-paciente:hover{
		transition:150ms;
		color: #fff;
		text-decoration: none;
		background-color: #1CC232;
	}
	.title-agenda{
		margin-top: 25px;
		font-size: 15px;
	}
	.table-header{
		background-color: #FFC7CD;
		color: #fff;
		border: 0;
	}
	.btn-table{
		font-size: 12.9px;
		border: 0;
		color: black;
		background-color: #FFC7CD;
		transition:150ms;
	}
	.btn-table:hover{
		transition:150ms;
		text-decoration: none;
		background-color: #e6aeb4;
	}
	.text-bloquear{
		color: #FF0000;
	}
	.table-agenda{
		width: 100%;
		overflow-x: auto;
	}
	.dropdown-item{
		font-size: 12.9px;
	}
	.modal-subtitle{
		font-size: 12.9px;
	}
	.btn-full{
		width: 100%;
	}

	.card-pacintes{
		margin-top: 25px;
		text-decoration: none;
		color: black;
		transition: 150ms;
	}
	.card-pacintes:hover{
		transition: 150ms;
		margin-top: 20px;
		text-decoration: none;
		color: black;
	}
	.card-novo:hover{
		border: 1px solid #FFC7CD;
	}
	.financeiro-body{
		margin-top: 20px;
	}
	.table-financeiro{
		margin-top: 15px;
	}
	.card-financeiro{
		margin-top: 10px;
		border: 0;
		background-color: #C09DA1;
		color: #fff;
	}
	.financeiro-header{
		background-color: #C09DA1;
		border: 0;
		color: #fff;
	}
	.float-left{
		float: left;
		font-size: 12.9px;
	}
	.float-right{
		float: right;
		font-size: 25px;
	}

	.cliente-head{
		margin-top: 25px;
	}
	.img-name{
		margin-top: 25px;
	}
	.img-drop{
		float: right;
	}
	.card-paciente{
		margin-top: 25px;
	}
	.btn-func{
		color: #ffff;
	}
	.btn-func:hover{
		transition: 150ms;
		color: #fff;
		text-decoration: none;

	}
	.head-aq{
		margin-bottom: 10px;
	}
	.btn-aq{
		width: 100%;
	}
	.card-termos{
		border: 0;
		margin-top: 20px;
	}


	.link-agenda{
		text-decoration: none;
		color: black;
	}
	.card-agendamento{
		border: 0;
		margin-top: 15vh;
		color: black;
		text-decoration: none;
	}
	.card-novoC{
		border: 0;
		margin-top: 10vh;
	}
</style>