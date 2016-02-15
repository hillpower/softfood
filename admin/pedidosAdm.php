<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- <meta charset="utf-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SOFTFOOD - Thiago Moraes</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>SOFTFOOD 2015</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Sair</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="admin.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Thiago Moraes</h5>
              	  	
                  <li class="sub-menu">
                      <a class="active" href="admin.html">
                          <i class="fa fa-dashboard"></i>
                          <span>MENU</span>
                      </a>
					  <ul class="sub">
                          <li><a  href="cardapioAdm.php">• CARDÁPIO</a></li>
						  <li><a  href="usuarioAdm.php">• USUÁRIOS</a></li>
						  <li><a  href="pedidosAdm.php">• PEDIDOS</a></li>
						  <li><a  href="pmanutencao.html">• OUTROS</a></li>
                      </ul>	
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper site-min-height">
                	<div class="row mt">
                		<div class="col-lg-12">
                		
                		<div class="content-panel">
                		
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> PEDIDOS
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="pedidosAdm.php">Todos</a></li>
										<li><a href="pedidosAdm.php?sit=1">Aberto</a></li>
										<li><a href="pedidosAdm.php?sit=2">Preparando</a></li>
										<li><a href="pedidosAdm.php?sit=3">Trânsito</a></li>
										<li><a href="pedidosAdm.php?sit=4">Finalizado</a></li>
										<li><a href="pedidosAdm.php?sit=5">Cancelado</a></li>
									</ul>
								</div>
	                  	  	  </h4>

	                  	  	  <hr>
                              <thead>
                             
                              <tr>
                                <!--  <th> <i class="fa fa-bookmark"></i> IMAGEM </th>  teste da img-->
								  <th><i class="fa fa-bullhorn"></i> Número</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Cliente</th>
                                  <th><i class="fa fa-bookmark"></i> Data</th>
                                  <th><i class="fa fa-bookmark"></i> Situação</th>
								  <th><i class="fa fa-bookmark"></i> Valor</th>
								  <th><i class="fa fa-bookmark"></i> Alterar situação</th>
								  
                              </tr>
                              </thead>
                              
                              <tbody>
                              
                              <?php
							  
							  include "../php/conexao.php";
                              //$link = mysqli_connect("localhost", "root", "", "softfood");  
                              
							  $query = "SELECT p.id, p.numeropedido, c.nome, p.datacompra, p.situacao_id, s.situacao, p.total 
										FROM pedido AS p
										INNER JOIN cliente AS c ON (p.cliente_id = c.id)
										INNER JOIN situacao AS s ON (p.situacao_id = s.id)";
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
								$acao = '<div class="btn-group">
										<button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
										Ação <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
										<li><a href="javascript:alterarSituacao('.$pedido_id.',1);">Aberto</a></li>
										<li><a href="javascript:alterarSituacao('.$pedido_id.',2);">Preparando</a></li>
										<li><a href="javascript:alterarSituacao('.$pedido_id.',3);">Trânsito</a></li>
										<li><a href="javascript:alterarSituacao('.$pedido_id.',4);">Finalizado</a></li>
										<li><a href="javascript:alterarSituacao('.$pedido_id.',5);">Cancelado</a></li>
										</ul>
										</div>';
								
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
            </section><!-- /MAIN CONTENT -->
      
            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    2015 - Thiago Moraes
                    <a href="cardapioAdm.php#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>
      
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
      
          <!--script for this page-->
          
        <script>
            //custom select box
      
            $(function(){
                $('select.styled').customSelect();
            });
			
			function alterarSituacao(valorId,valorSituacao) {
			$.ajax({
				url: "pedidosBD.php",
				data: {
					uId : valorId,
					uSituacao: valorSituacao,
					uTipo: "alterar"
				},
				type: 'GET',
				success: function(result) {
					alert('Situação alterada com sucesso.',{
						title: 'Aviso',
						ok: 'Fechar'
					});
					location.reload();
				}});
			}
			
			function abrirPedido(valorId) {
			$.ajax({
				url: "pedidosBD.php",
				data: {
					uId : valorId,
					uTipo: "resumo"
				},
				type: 'GET',
				success: function(result) {
					document.getElementById("resumoTexto").innerHTML = result;
					$("#myModal").modal();
				}});
			}
      
        </script>
        
          <!-- Modal -->
	      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
	          <div class="modal-dialog">
	              <div class="modal-content">
	                  <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                      <h4 class="modal-title">RESUMO DO PEDIDO</h4>
	                  </div>
	                  <div class="modal-body">
						  <h4>
							<span id="resumoTexto">Resumo do pedido.</span>
						  </h4>	
	                  </div>
	                  <div class="modal-footer">
	                      <button data-dismiss="modal" class="btn btn-default" type="button" id="btFecharModal">Fechar</button>
	                  </div>
	              </div>
	          </div>
	      </div>
	     <!-- modal -->
      
        </body>
      </html>
      
      
      