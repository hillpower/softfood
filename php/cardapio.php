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
            <div class="col-md-1 col-sm-1"></div>

            <div class="col-md-10 col-sm-10"><!-- comeca o colapso -->

                <div class="container-fluid" id="conteudo">
                    <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="panel-title" style="text-align: center">

                                        Lanches 

                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <table class="table table-responsive">
                                        <tr class="info"><td>Produto</td><td>Descrição</td><td>Preço em Reais</td><td></td></tr>
										<?php
											
											include "conexao.php";
											/*$link = mysqli_connect("localhost", "root", "", "softfood"); */
											$query = "select * from produto";
												
											$result = mysqli_query($link, $query);
											while($row = mysqli_fetch_assoc($result))
											{
												echo "<tr class='success'><td>".$row['nome']."</td><td>".$row['descricao']."</td><td>".$row['preco']."</td><td>
												<a href='carrinho.php?acao=add&id=".$row['id']."'>Comprar</a>
												</td></tr>";
											}	
											mysqli_free_result($result);
											mysqli_close($link);
										?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title" style="text-align: center">

                                        Bebidas

                                    </h4>
                                </a>
                            </div>

                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <table class="table table-responsive">
                                        <tr class="info"><td>Produto</td><td>Descrição</td><td>Preço em Reais</td></tr>
                                        <tr class="danger"><td>Coca Cola 2 l</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="success"><td>Fanta 2l</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="success"><td>Funada 2l</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="danger"><td>Pepsi 2l</td><td>Descrição</td><td>Preço</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title" style="text-align: center">

                                        Sobremesas

                                    </h4>
                                </a>    

                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <table class="table table-responsive">
                                        <tr class="info"><td>Produto</td><td>Descrição</td><td>Preço em Reais</td></tr>
                                        <tr class="danger"><td>Produto</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="success"><td>Produto</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="success"><td>Produto</td><td>Descrição</td><td>Preço</td></tr>
                                        <tr class="danger"><td>Produto</td><td>Descrição</td><td>Preço</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- termina o Colapso -->

                <div class="col-md-1 col-sm-1"></div>
            </div >
            <div class="col-md-2"></div>


            <div class="col-md-8">
                <?php
                include './footer.php';
                ?>
            </div>
            <div class="col-md-2"></div>


            <script src="../js/jquery-2.1.1.js"></script>
            <script src="../js/bootstrap.js"></script>

    </body>

</html>
