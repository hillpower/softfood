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
        <div class="col-md-12 col-sm-1"style="text-align: center ; color: #6666ff; font-family: 'Frijole', cursive;"><h2>*** Ações dessa tela *** </br>VER PEDIDOS - ALTERAR DADOS - SAIR</br></br>IMPLEMENTAR URGENTE ESTA TELA</h2> </div>
        <div class="container-fluid" style="margin-bottom: 200px; padding-top:200px">

            <div class="col-md-3 col-sm-1"></div>

            <div class="col-md-3 col-sm-10">
                <a href="#" id="example" class="btn btn-default">
                    <img src="../img/img home/telefone.png">
                </a>
            </div>

            <div class="col-md-3 col-sm-10">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    <img src="../img/img home/computador.png">
                </button>

            </div>
			
            <div class="col-md-3 col-sm-1"></div>
        </div >
		
		<?php
			if(isset($_SESSION['usuario'])) {
				$usuario = $_SESSION['usuario'];
				$usuarioid = $_SESSION['usuarioid'];
				if($usuarioid != 0) {
				?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Muito bem!</strong> Você já esta logado no sistema, acesso o cardápio para iniciar seus pedidos.
					</div>
				<?php
				}
				else{
				?>	
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Oh spnap!</strong> Usuário inexistente ou não cadastrado, tente novamente.
					</div>
				<?php
				}
			}
		?>
	
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include './footer.php';
            ?>
        </div>
        <div class="col-md-2"></div>
        <!-- Button trigger modal -->

		<!-- Cadrastro de um novo cliente -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">      É novo por aqui ou já possui cadastro ?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <form class="form-horizontal" role="form" method="post" action="cadastrar.php?tipo=1">
                                <div class="form-group">
                                    <label for="inputEmail2" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmail2" id="inputEmail2" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword2" class="col-sm-2 control-label">Senha</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Entrar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
						
						
                        <div class="container">
							<hr>
                            <h4 class="modal-title" style="text-align: left">Cadastrar Novo Usuário</h4>
							<hr>
						</div>
						
						 <!-- Segundo formulario -->
                         <div class="container">

                            <form class="form-horizontal" role="form" method="post" action="cadastrar.php?tipo=2">
								<div class="form-group">
                                    <label for="inputNome3" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputNome3" id="inputNome3" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmail3" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
										<div class="col-sm-10">
                                        <input type="password" class="form-control" name="inputPassword3" id="inputPassword3" placeholder="Senha">
                                    </div>
								</div>
								<div class="form-group">
                                    <label for="inputEnd3" class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputEnd3" id="inputEnd3" placeholder="Endereço">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="inputTel3" class="col-sm-2 control-label">Telefone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputTel3" id="inputTel3" placeholder="Telefone">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
        <!-- FIM Modal -->
    </body>

    <script type="text/javascript">
        $(function() {
            $('#example').popover({
                title: 'Exemplo Telefone',
                content: 'Exemplo 3231-7001 / 3231-7002 ',
                placement: 'bottom'
            });
        });
    </script>
</html>
