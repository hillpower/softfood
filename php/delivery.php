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
        <div class="col-md-12 col-sm-1"style="text-align: center; color: #6666ff; font-family: 'Frijole', cursive;"><h2>Escolha como deseja fazer seu pedido ?</h2> </div>
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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include './footer.php';
            ?>
        </div>
        <div class="col-md-2"></div>
        <!-- Button trigger modal -->


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

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Lembrar-me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Entrar</button>
                                    </div>
                                </div>
                            </form>



                        </div>
                        <div class="container">
                            <h4 class="modal-title" style="text-align: left">Cadastrar Novo Usuario</h4>

                        </div><form class="form-inline" role="form"> <!-- Segundo formulario -->
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email .</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            </div><p>
                            <div class="form-group">
                                <div class="input-group">
                                   <label for="exampleInputEmail2">confirme email .</label> 
                                    <div class="input-group-addon">@</div>
                                    <input class="form-control" type="email" placeholder="Enter email">
                                </div>
                            </div><p>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Lembrar-me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Cadastrar</button>
                        </form>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Enviar</button>
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
