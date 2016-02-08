<?php 
	session_start();
	$cont = 0;
	foreach($_SESSION['carrinho'] as $id => $qtd){
		$cont += $qtd;
	}
	//echo count($_SESSION['carrinho']);
?>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">SoftFood</a>
        </div>
        <!--collapsed para celular-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav nav-justified">
                <li><a href="#">Promoções</a></li>
                <li><a href="cardapio.php" style="width: auto">Cardápio</a></li>
                <li><a href="delivery.php">Delivery</a></li>
                <li><a href="perguntasfreq.php">Perguntas Frequentes</a></li>
				<li><a href="carrinho.php">Carrinho&nbsp;
				<span class="badge" style="background-color: #d43f3a;"><?php echo $cont;?></span></a></li>                            
            </ul>
        </div>
    </div>
</nav>