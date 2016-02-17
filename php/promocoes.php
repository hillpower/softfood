<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Softfood</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset = "utf-8">
        <!-- Bootstrap -->
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

        <div class="container-fluid">
            <div class="col-md-3 col-sm-1"></div>

            <div class="col-md-7 col-sm-10">
                <!-- comeca o slide -->
				<img src="../img/pmanutencao.gif">
                <!-- termina o slide -->
            </div>

            <div class="col-md-2 col-sm-1"></div>
        </div >
		</br>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include './footer.php';
            ?>
        </div>
        <div class="col-md-2"></div>
        
    </body>
</html>
