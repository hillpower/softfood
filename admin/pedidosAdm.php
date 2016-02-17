<!DOCTYPE html>
<html lang="en">      
	  
	  <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
		<?php
			include "templates/topo.php";
		?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
		<?php
			include "templates/menu.php";
		?>
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
                                  <th class="hidden-phone"><i class="fa fa-male"></i> Cliente</th>
                                  <th><i class="fa fa-calendar"></i> Data</th>
                                  <th><i class="fa fa-bookmark"></i> Situação</th>
								  <th><i class="fa fa-usd"></i> Valor</th>
								  <th><i class="fa fa-edit"></i> Alterar situação</th>
								  
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
		 
            <!--main content end-->
            <!--footer start-->
			<?php
				include "templates/footer.php";
			?>
			<!--footer end-->

      
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

</html>
      
      
      