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
	                  	  	  <h4><i class="fa fa-angle-right"></i> Usuários
	                  	  	  </h4>
	                  	  	  <hr>
                              <thead>
                             
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> NOME</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> EMAIL</th>
                                  <th><i class="fa fa-bookmark"></i> SENHA</th>
                                  <th></th>
                              </tr>
                              </thead>
                              
                              <tbody>
                              
                              <?php
							  
							  include "../php/conexao.php";
                              // $link = mysqli_connect("localhost", "root", "", "softfood"); 
                              
                              $query = "select * from usuario";
                              	
                              $result = mysqli_query($link, $query);
                              while($row = mysqli_fetch_assoc($result))
                              {
                              	$id = $row["id"];
                              	$nome = "'".$row["nome"]."'";
                              	$email = "'".$row["email"]."'";
                              	$senha = "'".$row["senha"]."'";
                              	echo '
                              	<tr>
                              	    <td>'.$row["nome"].'</td>
                              	    <td>'.$row["email"].'</td>
                              	    <td>*****</td>
                              
                              	    <td>
                              	        <button class="btn btn-primary btn-xs" onclick="alterarUsuario('.$id.','.$nome.','.$email.','.$senha.')"><i class="fa fa-pencil"></i></button>
                              	        <button class="btn btn-danger btn-xs" onclick="removerUsuario('.$row["id"].')"><i class="fa fa-trash-o "></i></button>
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
                			<button type="button" class="btn btn-round btn-success" id="btCadastrarUsuario">
                				CADASTRAR NOVO USUÁRIO
                			</button>
                		</a>
                		
                	</div>
                </div>
      			
      		</section><! --/wrapper -->
            </section><!-- /MAIN CONTENT -->
      
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
        
        <!-- Modal -->
	      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
	          <div class="modal-dialog">
	              <div class="modal-content">
	                  <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                      <h4 class="modal-title">Deseja cadastrar um novo usuário ?</h4>
	                  </div>
	                  <div class="modal-body">
	                  		<form method="post" action=> <!-- ARRUMAR AQUI -->	
	                      <p>Digite o nome do novo usuário abaixo.
	                      <input type="text" name="nome" id="uNome" placeholder="Nome" autocomplete="off" class="form-control placeholder-no-fix">
	                      </p>
	                      <p>Digite o endereço de email abaixo.
	                      <input type="text" name="email" id="uEmail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
	                      </p>
	                      <p>Digite a senha abaixo.
	                      <input type="password" name="password" id="uSenha" placeholder="Senha" autocomplete="off" class="form-control placeholder-no-fix">
	                      </p>    
	                      <input type="hidden" id="uId" value=0 />        
	
	                  </div>
	                  <div class="modal-footer">
	                      <button data-dismiss="modal" class="btn btn-default" type="button" id="btCancelarUsuario">Cancelar</button>
	                      <button class="btn btn-theme" type="button" id="btSalvarUsuario">Salvar</button>
	                  </div>
	                  </form>
	              </div>
	          </div>
	      </div>
	     <!-- modal -->
      
        </body>
      </html>
      
      <script>
          $("#btSalvarUsuario").click(function(){
          	$.ajax({
          		url: "usuarioBD.php",
          		data: {
          			uId : document.getElementById("uId").value,
          			uNome : document.getElementById("uNome").value,
          			uEmail : document.getElementById("uEmail").value,
          			uSenha : document.getElementById("uSenha").value,
          			uTipo: "salvar"
          		},
          		type: 'GET',
          		success: function(result) {
          			//$("#divajax").html(result);
          			$("#btCancelarUsuario").click();
          			//window.alert(result);
          			alert('Usuário salvo com sucesso.',{
          				title: 'Aviso',
          				ok: 'Fechar'
          			});
          			location.reload();
          		}}); 
          		document.getElementById("uId").value = 0;
          });
          
		function removerUsuario(valorId) {
			$.ajax({
				url: "usuarioBD.php",
				data: {
					uId : valorId,
					uTipo: "remover"
				},
				type: 'GET',
				success: function(result) {
					alert('Usuário removido com sucesso.',{
						title: 'Aviso',
						ok: 'Fechar'
					});
					location.reload();
				}});
		}
		
		function alterarUsuario(valorId,valorNome,valorEmail,valorSenha) {
			//window.alert("Alterar usuário em breve. Agradecemos a paciência.");
			document.getElementById("uId").value = valorId;
			document.getElementById("uNome").value = valorNome;
			document.getElementById("uEmail").value = valorEmail;
			document.getElementById("uSenha").value = valorSenha;
			$("#btCadastrarUsuario").click();
		}
		
		$('#myModal').on('hidden.bs.modal', function (e) {
			$(this)
			.find("input,textarea,select")
				.val('')
				.end()
			.find("input[type=checkbox], input[type=radio]")
				.prop("checked", "")
			.end();
		})
      </script>