<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Softfood</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset = "utf-8">
        <!-- Bootstrap -->

        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>
    <body class="jumbotron">
        <div class="col-md-1 col-sm-1"></div> <!-- coluna de largura 1 -->

        <div class="col-md-10 col-sm-10"><!-- coluna de largura 10 -->
            <!-- comeca a navbar -->
            <?PHP
            include 'topo.php';
            ?>
            <!-- termina a navbar -->
        </div>
        <div class="col-md-1 col-sm-1"></div>

		
        <div class="container-fluid">
            <div class="col-md-2 col-sm-1"></div>

            <div class="col-md-8 col-sm-10">
			<section id="main-content">
                <section class="wrapper site-min-height">
                	<div class="row mt">
                		<div class="col-lg-12">
                		
                		<div class="content-panel">
                		
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i>MEUS PEDIDOS </h4>

	                  	  	  <hr>
                              <thead>
                             
                              <tr>
                                <!--  <th> <i class="fa fa-bookmark"></i> IMAGEM </th>  teste da img-->
								  <th><i class="fa fa-bullhorn"></i> Número</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Cliente</th>
                                  <th><i class="fa fa-bookmark"></i> Data</th>
                                  <th><i class="fa fa-bookmark"></i> Situação</th>
								  <th><i class="fa fa-bookmark"></i> Valor</th>
								  
								  
                              </tr>
                              </thead>
                              
                              <tbody>
                              
                              <?php
							  
							  include "../php/conexao.php";
                              //$link = mysqli_connect("localhost", "root", "", "softfood");  
                              
							  $query = "SELECT p.id, p.numeropedido, c.id, c.nome, p.datacompra, p.situacao_id, s.situacao, p.total 
										FROM pedido AS p
										INNER JOIN cliente AS c ON (p.cliente_id = c.id)
										INNER JOIN situacao AS s ON (p.situacao_id = s.id)
										WHERE c.id = ".$_SESSION['usuarioid'];
							  if(isset($_GET["sit"]))
								$query .= " WHERE p.situacao_id = ".$_GET["sit"];
                              	
                              $result = mysqli_query($link, $query);
                              while($row = mysqli_fetch_assoc($result))
                              {
								$pedido_id = $row["id"];
                              	$numero_pedido = $row["numeropedido"];
                              	$cliente = $row["nome"];
                              	$data = $row["datacompra"];
                              	$situacao = $row["situacao"];
								
								$situacao_id = $row["situacao_id"];
								switch($situacao_id) {
									case 1:
										$label = "label-warning"; // ABERTO
									break;
									case 2:
										$label = "label-primary"; // PREPARANDO
									break;
									case 3:
										$label = "label-success"; // TRÂNSITO
									break;
									case 4:
										$label = "label-default"; // FINALIZADO
									break;
									case 5:
										$label = "label-danger"; // CANCELADO
									break;
								}
								
								$valor = number_format($row["total"], 2, ',', '.');
								
								
                              	echo '
                              	<tr>
                              	    <td><a href="javascript:abrirPedido('.$pedido_id.');">'.$numero_pedido.'</a></td>
                              	    <td>'.$cliente.'</td>
									<td>'.date('d/m/Y H:i:s', strtotime($data)).'</td>
									<td><span class="label '.$label.'">'.$situacao.'</span></td>
									<td>R$ '.$valor.'</td>
                              	    <td>'.$acao.'</td>
                              	</tr>	
                              	';
                              }
                               	
                              mysqli_free_result($result);
                              
                              mysqli_close($link);
                              ?>
                              
                              </tbody>
                          </table>
 
                      </div><!-- /content-panel -->
                      	</br>
                      	
                		                		
                	</div>
                </div>
      			
      		</section><! --/wrapper -->
			</div> <!-- fim div meio-->

            <div class="col-md-2 col-sm-1"></div>
        </div>
		
		
        <div class="col-md-2"></div>
           
        <div class="col-md-8">
            <?php
            include './footer.php';
            ?>
        </div>
        <div class="col-md-2"></div>
        
               
        
		<!-- js placed at the end of the document so the pages load faster -->
          <script src="assets/js/jquery.js"></script>
          <script src="assets/js/bootstrap.min.js"></script>
          <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
          <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
          <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
          <script src="assets/js/jquery.scrollTo.min.js"></script>
          <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
      
      
          <!--common script for all pages-->
          <script src="assets/js/common-scripts.js"></script>
		  
		  <script src="../js/jquery-2.1.1.js"></script>
		  <script src="../js/bootstrap.js"></script>
		
       
    </body>

</html>
