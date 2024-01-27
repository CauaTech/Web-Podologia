<div class="header_podologia">
	<div class="container">
		<center>
			<img class="img-header" src="<?php echo $flow ?>assents/img/logo/Logo.png">
		</center>
	</div>
</div>
<div class="stack-navbar">
	<nav class="navbar navbar-expand-sm navbar-dark">
	  <div class="container-fluid">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="nav">
	    	<ul class="navbar-nav">
				<a href="<?php echo $flow ?>" class="item_nav"><i class="fa-regular fa-address-book"></i> Agenda</a>
				<div class="dropdown">
		    		<button type="button" class="item_nav dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-square-plus"></i> Cadastrar</button>
		    		<ul class="dropdown-menu">
					    <li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/pacientes/">Pacientes</a></li>
					    <?php if ($info_account['users-cargo'] == 3 || $info_account['users-cargo'] == 2) {?>
					    	<li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/gasto/">Gasto</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/fornecedores/">Fornecedores</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/procedimentos/">Procedimentos</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/produtos/">Produtos</a></li>
					    <?php } ?>
					    <?php if ($info_account['users-cargo'] == 3) {?>
					    	<li><a class="dropdown-item" href="<?php echo $flow ?>cadastrar/acessos/">Acessos</a></li>
					    <?php } ?>
				    </ul>
		    	</div>
	    		<a href="<?php echo $flow ?>estoque/" class="item_nav"><i class="fi fi-rs-box-open-full"></i> Estoque</a>	
		    	<a href="<?php echo $flow ?>pacientes/" class="item_nav"><i class="fa-regular fa-user"></i> Paciente</a>
		    	<?php if ($info_account['users-cargo'] == 3) {?>
			    	<div class="dropdown">
			    		<button type="button" class="item_nav dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-receipt"></i> Financeiro</button>
			    		<ul class="dropdown-menu">
			    			<li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/diario/">Diario</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/mensal/">Mensal</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/geral/">Usuarios</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>gasto">Gasto</a></li>
					    </ul>
			    	</div>
		    	<?php } ?>
		    	<?php if ($info_account['users-cargo'] == 2) {?>
			    	<div class="dropdown">
			    		<button type="button" class="item_nav dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-receipt"></i> Financeiro</button>
			    		<ul class="dropdown-menu">
			    			<li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/diario/">Diario</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/mensal/">Mensal</a></li>
						    <li><a class="dropdown-item" href="<?php echo $flow ?>financeiro/geral/">Usuarios</a></li>
					    </ul>
			    	</div>
		    	<?php } ?>
		    	<a href="?deslogar" class="item_nav"><i class="fa-solid fa-door-open"></i> Sair</a>
	    	</ul>
	    </div>
	    <div class="justify-content-end">
	    	<ul class="navbar-nav">
		    	<div class="dropdown dropstart">
				  <a type="button" class="item_nav dropdown-toggle" data-bs-toggle="dropdown">
				    <i class="fi fi-rs-bell"></i>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a class="dropdown-item" href="#">Cauã Dias Agendou 24/01/2024 as 11:30 - <span class="badge bg-success">Agendou</span></a></li>
				    <li><a class="dropdown-item" href="#">Cauã Dias Agendou 24/01/2024 as 11:30 - <span class="badge bg-success">Agendou</span></a></li>
				    <li><a class="dropdown-item" href="#">Cauã Dias Agendou 24/01/2024 as 11:30 - <span class="badge bg-success">Agendou</span></a></li>
				  </ul>
				</div>
				<a href="<?php echo $flow ?>" class="item_nav"><i class="fa-regular fa-user"></i> <?php echo $info_account['users-nome']; ?></a>
			</ul>
	    </div>
	  </div>
	</nav>
</div>

<style type="text/css">
	.stack-navbar{
		background-color: #C09DA1;
		<?php if ($i > 98) { ?>
			visibility: hidden;
		<?php } ?>
	}
	.item_nav{
		border: 0;
		background: 0;
		display: block;
  		padding: 0.5rem 1rem;
		text-decoration: none;
		color: #fff;
		font-size: 12.9px;
	}
	.item_nav:hover{
		transition: 300ms;
		text-decoration: none;
		color: #c2c2c2;
	}
	.header_podologia{
		background-color: #FFC7CD;
	}
	.img-header{
		min-width: 60px;
		max-width: 170px;
	}
</style>
