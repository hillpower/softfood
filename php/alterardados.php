<?php
session_start();

include "../php/conexao.php";
//$link = mysqli_connect("localhost", "root", "", "softfood");  

$query = "SELECT * FROM cliente AS c 
		WHERE c.id = ".$_SESSION['usuarioid'];
		
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
?>

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
                		
						<caption class="alert alert-info"><h4><strong>Atualizar Dados</strong></h4></caption>
						
                          <!-- Segundo formulario -->
                         <div class="container">

                            <form class="form-horizontal" role="form" method="post" action="cadastrar.php?tipo=3">
								<div class="form-group">
                                    <label for="inputNome3" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputNome3" id="inputNome3" placeholder="Nome" value="<?php echo $row['nome'];?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="inputNome3" class="col-sm-2 control-label">CPF</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputCpf3" id="inputCpf3" placeholder="CPF" value="<?php echo $row['cpf'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmail3" id="inputEmail3" placeholder="Email" value="<?php echo $row['email'];?>">
                                    </div>
                                </div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
										<div class="col-sm-10">
                                        <input type="password" class="form-control" name="inputPassword3" id="inputPassword3" placeholder="Senha" value="<?php echo $row['senha'];?>">
                                    </div>
								</div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Repitir Senha</label>
										<div class="col-sm-10">
                                        <input type="password" class="form-control" name="inputPassword32" id="inputPassword32" placeholder="Senha" value="<?php echo $row['senha'];?>">
                                    </div>
								</div>
								<div class="form-group">
                                    <label for="inputEnd3" class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputEnd3" id="inputEnd3" placeholder="Endereço" value="<?php echo $row['endereco'];?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="inputTel3" class="col-sm-2 control-label">Telefone Fixo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputTelF3" id="inputTelF3" placeholder="Telefone Fixo" value="<?php echo $row['telefonefixo'];?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="inputTel3" class="col-sm-2 control-label">Telefone Celular</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputTelC3" id="inputTelC3" placeholder="Telefone Celular" value="<?php echo $row['telefonecelular'];?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
 
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
