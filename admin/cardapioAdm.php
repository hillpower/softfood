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
	                  	  	  <h4><i class="fa fa-angle-right"></i> CARDÁPIO
	                  	  	  </h4>
	                  	  	  <hr>
                              <thead>
                             
                              <tr>
                                <!--  <th> <i class="fa fa-bookmark"></i> IMAGEM </th>  teste da img-->
								  <th><i class="fa fa-slack"></i> NOME</th>
                                  <th><i class="fa fa-bullhorn"></i> DESCRIÇÃO</th>
								  <th><i class="fa fa-bookmark"></i> TIPO</th>
                                  <th><i class="fa fa-usd"></i> PREÇO</th>
                                  <th></th>
                              </tr>
                              </thead>
                              
                              <tbody>
                              
                              <?php
							  include "../php/conexao.php";
                              //$link = mysqli_connect("localhost", "root", "", "softfood");  
                              
                              $query = "select p.id, p.tipoproduto_id, p.nome, p.descricao, p.preco, t.tipo, p.imagem from produto as p
										inner join tipoproduto as t on (p.tipoproduto_id = t.id)";
                              	
                              $result = mysqli_query($link, $query);
                              while($row = mysqli_fetch_assoc($result))
                              {
                              	$id = $row["id"];
                              	$nome = "'".$row["nome"]."'";
                              	$descricao = "'".$row["descricao"]."'";
                              	$preco = "'".$row["preco"]."'";
								$tipoproduto_id = $row["tipoproduto_id"];
								$imagem = "'".$row["imagem"]."'";
                              	echo '
                              	<tr>
                              	    <td><a href="javascript:abrirImagem('.$imagem.');">'.$row["nome"].'</a></td>
                              	    <td>'.$row["descricao"].'</td>
									<td>'.$row["tipo"].'</td>
                              	    <td>'.$row["preco"].'</td>
                              
                              	    <td>
                              	        <button class="btn btn-primary btn-xs" onclick="alterarProduto('.$id.','.$nome.','.$descricao.','.$preco.','.$tipoproduto_id.')"><i class="fa fa-pencil"></i></button>
                              	        <button class="btn btn-danger btn-xs" onclick="removerProduto('.$row["id"].')"><i class="fa fa-trash-o "></i></button>
                              	    </td>
                              	</tr>	
                              	';
                              }
                              
                              // TODO
                              // BOTÃO CADASTRAR - OK
                              // ABRIR O MODAL - OK
                              // CADASTRAR - OK
                              // AJAX - OK
                              // MENSAGEM DE SUCESSO - OK
                              // ATUALIZAR PÁGINA - OK
                              // REMOVER - OK
                              // ATUALIZAR - OK
                               	
                              mysqli_free_result($result);
                              
                              mysqli_close($link);
                              ?>
                              
                              </tbody>
                          </table>
 
                      </div><!-- /content-panel -->
                      	</br>
                      	
                		<a data-toggle="modal" href="login.html#myModal">
                			<button type="button" class="btn btn-round btn-success" id="btCadastrarProduto">
                				CADASTRAR NOVO PRODUTO
                			</button>
                		</a>
                		
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
							  <h4 class="modal-title">Deseja cadastrar um novo produto ?</h4>
						  </div>
						  <div class="modal-body">
								<form method="post" id="formpedido" enctype="multipart/form-data" action="arquivo.php"> <!-- ARRUMAR AQUI -->	
							  <p>Digite o nome do novo produto abaixo.
							  <input type="text" name="nome" id="uNome" placeholder="Nome" autocomplete="off" class="form-control placeholder-no-fix">
							  </p>
							  <p>Digite a descrição do produto abaixo.
							  <input type="text" name="descricao" id="uDescricao" placeholder="digite a descrição do produto" autocomplete="off" class="form-control placeholder-no-fix">
							  </p>
							  <p>Digite o preço abaixo.
							  <input type="number" name="preco" id="uPreco" placeholder="valor do produto" autocomplete="off" class="form-control placeholder-no-fix">
							  </p>    
							  <input type="hidden" name="uId" id="uId" value=0 />
							  <input type="hidden" name="uImg" id="uImg" value=0 />
							  
							  <p>Selecione o tipo do produto abaixo.
							  <select name="tipoProduto" id="uTipoProduto" class="form-control">
								<option value=1>Lanche</option>
								<option value=2>Bebida</option>
								<option value=3>Sobremesa</option>
							  </select>
							  </p>
							  
							  <!-- form para upload de img -->	
							  Selecione uma imagem: <input name="arquivo" type="file" />
							  <!-- fim form -->
		
						  </div>
						  <div class="modal-footer">
							  <button data-dismiss="modal" class="btn btn-default" type="button" id="btCancelarProduto">Cancelar</button>
							  <button class="btn btn-theme" type="button" id="btSalvarProduto">Salvar</button>
						  </div>
						  </form>
						  
						  
					  </div>
				  </div>
			  </div>
			 <!-- modal -->
			 
			 <!-- Modal -->
			  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalImagem" class="modal fade">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  <h4 class="modal-title">PRODUTO</h4>
						  </div>
						  <div class="modal-body" align="center">
							  <img src="fotos/semfoto.jpg" alt="foto" id="pImagem" width="400" height="300">
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
      
        </script>
      
      <script>
          $("#btSalvarProduto").click(function(){
          	$.ajax({
          		url: "cardapioBD.php",
          		data: {
          			uId : document.getElementById("uId").value,
          			uNome : document.getElementById("uNome").value,
          			uDescricao : document.getElementById("uDescricao").value,
          			uPreco : document.getElementById("uPreco").value,
					uTipoProduto : document.getElementById("uTipoProduto").value,
          			uTipo: "salvar"
          		},
          		type: 'GET',
          		success: function(result) {
          			//$("#divajax").html(result);
          			$("#btCancelarProduto").click();
          			//window.alert(result); imprime o resultado da url das info.
          			alert('Produto salvo com sucesso.',{
          				title: 'Aviso',
          				ok: 'Fechar'
          			});
          			//location.reload();
					document.getElementById("uId").value = result;
					document.getElementById("formpedido").submit();
          		}}); 
          		//document.getElementById("uId").value = 0;
          });
          
		function removerProduto(valorId) {
			$.ajax({
				url: "cardapioBD.php",
				data: {
					uId : valorId,
					uTipo: "remover"
				},
				type: 'GET',
				success: function(result) {
					alert('Produto removido com sucesso.',{
						title: 'Aviso',
						ok: 'Fechar'
					});
					location.reload();
				}});
		}
		
		function alterarProduto(valorId,valorNome,valorDescricao,valorPreco,valorTipoProduto) {
			//window.alert("Alterar produto em breve. Agradecemos a paciência.");
			document.getElementById("uId").value = valorId;
			document.getElementById("uNome").value = valorNome;
			document.getElementById("uDescricao").value = valorDescricao;
			document.getElementById("uPreco").value = valorPreco;
			document.getElementById("uTipoProduto").selectedIndex = valorTipoProduto-1;
			document.getElementById("uImg").value = 1;
			$("#btCadastrarProduto").click();
		}
		
		function abrirImagem(nome) {
			document.getElementById("pImagem").src = "fotos/"+nome;
			$("#myModalImagem").modal();
		}
		
		$('#myModal').on('hidden.bs.modal', function (e) {
			$(this)
			.find("input,textarea")
				.val('')
				.end()
			.find("select")
				.val('1')
				.end()
			.find("input[type=checkbox], input[type=radio]")
				.prop("checked", "")
			.end();
		})
      </script>

</html>