<?php
      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
	  
	  $btFinalizar = "btn btn-primary active";
	  if(count($_SESSION['carrinho']) == 0)
		$btFinalizar = "btn btn-primary disabled";
	  if($_SESSION['usuarioid'] == 0)
		$btFinalizar = "btn btn-primary disabled";
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
		
		<!-- ARRUMAR AQUI __ SOMENTE PARA TESTE -->
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- -->
		

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

	
	<div class="container-fluid">
			<div class="col-md-2 col-sm-1"></div>
				<div class="col-md-8 col-sm-10"><!-- comeca o colapso -->    
				<hr>
	
				<table class="table table-striped">
					<caption class="alert alert-info"><h4><strong>Carrinho de Compras</strong></h4></caption>
					<thead>
						<tr>
							<th width="244">Produto</th>
							<th width="150">Quantidade</th>
							<th width="150">Preço <!--&ccedil;o --></th>
							<th width="150">SubTotal</th>
							<th width="150">Remover</th>
						</tr>
					</thead>
				<form action="?acao=up" method="post" id="formcar">
			
			<tfoot>
						<tr>
														
							<td colspan="5" ><button type="submit" class="btn btn-primary">Atualizar Carrinho</button></td>
														
						<tr>
							<td colspan="4"><a href="cardapio.php"><button type="button" class="btn btn-warning">Continuar Comprando</button></a></td>
							<td colspan="1"><button type="button" class="<?php echo $btFinalizar;?>" onclick="javacript: finalizar();">Finalizar Pedido</button></td>
							
							
			</tfoot>
			
			<tbody>
               <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                        include "conexao.php";
                        $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $query = "select * from produto where id=$id";
                              $result = mysqli_query($link, $query);
                              $row    = mysqli_fetch_assoc($result);
                               
                              $nome  = $row['nome'];
                              $preco = number_format($row['preco'], 2, ',', '.');
                              $sub   = number_format($row['preco'] * $qtd, 2, ',', '.');
                               
                              $total += $row['preco'] * $qtd;
                            
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
								 
                                 <td><a href="?acao=del&id='.$id.'"><button type="button" class="btn btn-danger">Remover</button></a></td>
								 
								 
								 
								 
                              </tr>';
							mysqli_free_result($result);
                        }
                            mysqli_close($link);
						   $total = number_format($total, 2, ',', '.');
                           echo '<tr>
                                    <td colspan="4">Total.:</td>
                                    <td class="success"><h4>R$ '.$total.'</h4></td>
                              </tr>';
                     }
               ?>
				
			</tbody>
			<tr>										
				<td colspan="5" >
					<label for="comment">Observações:</label>
					<textarea class="form-control" rows="5" name="obs" id="obs">Troco para R$ </textarea>
				</td>										
			<tr>
        </form>
		
			   </table>
			   
		
			
	
		</div>
		<div class="col-md-2 col-sm-1"></div>
	</div>
		
        
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
					include './footer.php';
				?>
			</div>
			<div class="col-md-2"></div>
		
		
    </body>
	<script>
		function finalizar() {
			document.getElementById("formcar").action="finalizar.php";
			document.getElementById("formcar").submit();
			//alert(document.getElementById("formcar").action);
		}
	</script>
</html>
