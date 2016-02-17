<?php 
	session_start();
	$cont = 0;
	foreach($_SESSION['carrinho'] as $id => $qtd){
		$cont += $qtd;
	}
	//echo count($_SESSION['carrinho']);
?>
<!-- Bootstrap -->
        <link href='http://fonts.googleapis.com/css?family=Frijole' rel='stylesheet' type='text/css'>
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link href="../css/bootstrap.css" rel="stylesheet" media="screen" type="text/css">
		
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">SoftFood</a>
        </div>
        <!--collapsed para celular-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav nav-justified">
                <li><a href="promocoes.php">Promoções</a></li>
                <li><a href="cardapio.php" style="width: auto">Cardápio</a></li>
                <li><a href="perguntasfreq.php">Perguntas Frequentes</a></li>
				<li><a href="carrinho.php">Carrinho&nbsp;
				<span class="badge" style="background-color: #d43f3a;"><?php echo $cont;?></span></a></li> 
				<?php
					if(isset($_SESSION['usuarioid'])) {
						$usuario = $_SESSION['usuario'];
						$usuarioid = $_SESSION['usuarioid'];
						if($usuarioid != 0)
							echo "
								
									<li class='dropdown' role='tablist'>
										<a class='dropdown-toggle' data-toggle='dropdown' href='status.php'><strong><font color='white'>Olá $usuario </font> </strong><span class='caret'></span></a>
										<ul class='dropdown-menu' role='menu' style='width:210px; height:120px;'>
											<li><a href='delivery.php'>Delivery</a></li>
											<li><a href='verpedidos.php'>Ver Pedidos</a></li>
											<li><a href='alterardados.php'>Alterar Dados</a></li>
											<li><a href='logout.php'>Sair</a></li>									
										</ul>
									</li>
								  ";
							
								   	
						else
						
							echo "<li><a href='delivery.php'>Entrar/Cadastrar</a></li>";			
					}
					else
						echo "<li><a href='delivery.php'>Entrar/Cadastrar</a></li>";
				?>                           
            </ul>
        </div>
		
		
		
		
		
  
  
 
		
		
		
		
		
		<!--<li><a href='status.php'>$usuario</a></li> -->
		
		
		
		
		
		
		
    </div>
</nav>