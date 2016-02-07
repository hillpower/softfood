<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
                    <li><a class="logout" href="login.html">Sair</a></li>
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
						  <li><a  href="pmanutencao.html">• PEDIDOS</a></li>
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
            <footer class="site-footer">
                <div class="text-center">
                    2015 - Thiago Moraes
                    <a href="usuario.html#" class="go-top">
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
      </script>