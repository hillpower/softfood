<?php
	session_start();
	include "conexao.php";
	$total = 0;
	$white = "&nbsp;&nbsp;&nbsp;&nbsp;";
	
	//$resumo = "*** Pedido efetuado ***</br></br>";
	
	//situacao_id --> 1 = ABERTO
	
	//buscar cliente logado
	$cliente_id = $_SESSION['usuarioid']; 
	$cliente_nome = $_SESSION['usuario']; 
	$sqlcliente = "select * from cliente where id=$cliente_id";
	$result = mysqli_query($link, $sqlcliente);
	$rowcliente = mysqli_fetch_assoc($result);
	$cliente_end = $rowcliente['endereco'];
	
	//pegar data pelo php e inserir em uma variavel
	$data_atual = date("Y-m-d H:i:s");
	
	//recuperar OBSERVACAO da pagina carrinho.php
	$obs = $_POST['obs'];
	
	$queryins = "INSERT INTO pedido (situacao_id,cliente_id,datacompra,obs) VALUES (1,$cliente_id,'$data_atual','$obs')";
	mysqli_query($link, $queryins);
	$pedido_id = mysqli_insert_id($link);
	
	foreach($_SESSION['carrinho'] as $id => $qtd){
		$query = "select * from produto where id=$id";
		$result = mysqli_query($link, $query);
		$row    = mysqli_fetch_assoc($result);
		$nome  = $row['nome'];
		$preco = number_format($row['preco'], 2, ',', '.');
		$precobd = $row['preco'];
		$sub   = number_format($row['preco'] * $qtd, 2, ',', '.');

		$total += $row['preco'] * $qtd;
		
		$resumo .= $white.$qtd." ".$nome." = R$ ".$sub."</br>";
		
		//mysqli_free_result($result);
		
		$queryinsi = "INSERT INTO itempedido (pedido_id,produto_id,quantidade,valor) VALUES ($pedido_id,$id,$qtd,$precobd)";
		mysqli_query($link, $queryinsi);
	}
	$totalbd = $total;
	$total = number_format($total, 2, ',', '.');
	 
	$resumo .= "</br>".$white."Total do pedido: R$ ".$total;
	
	//NUMERO DE PEDIDO 29431000+ID
	$numeropedido = 29431000 + $pedido_id;
	$queryupt = "UPDATE pedido SET numeropedido=$numeropedido, total=$totalbd WHERE id=$pedido_id";
	mysqli_query($link, $queryupt);
	
	mysqli_close($link);
	unset($_SESSION['carrinho']);
	//session_destroy(); --- botao de log out funfando ja -- 
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
		
		<!-- titulo da pagina -->
        <div class="col-md-2 col-sm-1"></div>
		
        <div class="col-md-8 col-sm-10"> <div class="alert alert-success" role="alert"><center>Seu pedido foi realizado com sucesso! Confira abaixo todas as informações do seu pedido.</center>
		Leia com bastante atenção o restante dessa página e caso tenha alguma divergêngia, nos avise o mais breve possível através do nosso contato.</div> </div> 
        
		<div class="col-md-2 col-sm-1"></div>
		
		
		<!-- termina a div do titulo -->
		
			<!-- informacoees referente ao pedido -->
			<div class="container-fluid">
				<div class="col-md-2 col-sm-1"></div>
				<div class="col-md-8 col-sm-10">
				<div class="panel panel-primary">
					<div style="text-align:left;">			
				<?php
				   echo "<br>".$white."*** Informações do Pedido ***<br><br>";
					echo $white."NÚMERO DO PEDIDO - $numeropedido <br><br>";
					echo $resumo.'<br>';
					echo "</br></br>".$white."Dados da entrega.: $cliente_nome - $cliente_end </br>";
					echo "</br>".$white."Observações: ".$obs;
					echo "<br><br><br><br>";
				?>
				    </div>
				
				</div>
				</div>
				
				<div class="col-md-2 col-sm-1"></div>
			</div>
			<!-- termina a div informacoees -->
			
			<!-- div imprimir -->
			<div class="container-fluid">
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"><button type="button" class="btn btn-primary" onclick="window.print();">IMPRIMIR</button></div>
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-1 col-sm-1"></div>
			</div>
			
			
			
			<!-- fim div imprimir -->
			
		
		<!-- div footer -->
		</br>
		</br>
		
		<div class="col-md-2 col-sm-1"></div>
		<div class="col-md-8 col-md-10">
		    <?php
            include './footer.php';
            ?>
        </div>
		<div class="col-md-2 col-sm-1"></div>
		<!-- termina a div footer -->
		
    </body>
</html>
