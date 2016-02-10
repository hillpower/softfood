<?php
	session_start();
	include "conexao.php";
	$total = 0;
	
	$resumo = "*** Pedido efetuado ***</br></br>";
	
	foreach($_SESSION['carrinho'] as $id => $qtd){
		$query = "select * from produto where id=$id";
		$result = mysqli_query($link, $query);
		$row    = mysqli_fetch_assoc($result);
		$nome  = $row['nome'];
		$preco = number_format($row['preco'], 2, ',', '.');
		$sub   = number_format($row['preco'] * $qtd, 2, ',', '.');

		$total += $row['preco'] * $qtd;
		
		$resumo .= $qtd." ".$nome." = R$ ".$sub."</br>";
		
		//TODO --> INSERT NA TABELA PEDIDO <--
		
		mysqli_free_result($result);
	}
	mysqli_close($link);
	$total = number_format($total, 2, ',', '.');
	
	$resumo .= "</br>Total do pedido: R$ ".$total;
	
	session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Softfood</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta charset = "utf-8">
        <!-- Bootstrap -->
        <link href='http://fonts.googleapis.com/css?family=Frijole' rel='stylesheet' type='text/css'>
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link href="../css/bootstrap.css" rel="stylesheet" media="screen" type="text/css">

    </head>
    <body class="jumbotron">
        <div class="col-md-1 col-sm-1"></div> <!-- coluna de largura 1 -->

        <div class="col-md-10 col-sm-10"><!-- coluna de largura 10 -->
            <!-- comeca a navbar -->
            <?PHP
            include './topo.php';
            ?>
            <!-- termina a navbar -->
        </div>

        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-12 col-sm-1"style="text-align: center ; color: #6666ff; font-family: 'Frijole', cursive;"><h2>Pedido finalizado com sucesso !!!</h2> </div>
        <div class="container-fluid" style="margin-bottom: 200px; padding-top:200px">

				<?php
					echo $resumo;
					echo "</br></br>Dados da entrega.: Buscar no banco os dados do cliente.";
					echo "</br>Observações: ".$_POST['obs'];
					
					echo "</br></br>IMPRIMIR";
				?>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include './footer.php';
            ?>
        </div>
    </body>
</html>
