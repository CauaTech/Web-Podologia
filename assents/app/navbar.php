<div class="stack-navbar">
	<nav class="navbar navbar-expand-sm navbar-dark">
	  <div class="container">

	    <a class="navbar-brand" href="<?php echo $flow ?>"><img width="130px" src="<?php echo $flow ?>assents/img/logo/Logo.png"></a>

	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse justify-content-end" id="nav">
	    	<ul class="navbar-nav">
				<a href="#inicio" class="item_nav">Inicio</a>
		    	<a href="#servico" class="item_nav">Tratamento e Serviços</a>
		    	<a href="#footer" class="item_nav">Contato</a>
		    	<a href="<?php echo $flow ?>duvidas/" class="item_nav">Duvidas</a>
		    	<a href="https://api.whatsapp.com/send?phone=41997312878&text=Gostaria de agendar uma consulta." class="item_nav btn btn-stack">
		    		<i class="fi fi-brands-whatsapp"></i>
		    		Agendamento
		    	</a>
		    	<a href="<?php echo $flow ?>agendamento/" class="item_nav btn btn-stack">
		    		<i class="fa-regular fa-pen-to-square"></i>
		    		Auto Agendamento
		    	</a>
	    	</ul>
	    </div>
	  </div>
	</nav>
</div>

<style type="text/css">
	.stack-navbar{
		background-color: #CECECE;
		min-height: 10vh;
	}
	.item_nav{
		display: block;
  		padding: 0.5rem 1rem;
		text-decoration: none;
		color: #C199A0;
		font-size: 13px;
	}
	.item_nav:hover{
		transition: 300ms;
		text-decoration: none;
		color: #ffdee4;
	}
	.btn-stack{
		color: #fff;
		background-color: #C09DA1;
		margin-left: 5px;
	}
</style>