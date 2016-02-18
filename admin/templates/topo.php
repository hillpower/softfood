  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SOFTFOOD</title>

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
	  <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Ocultar Menu"></div>
              </div>
            <!--logo start-->
            <a href="admin.php" class="logo"><b>SOFTFOOD - NOME DA EMPRESA</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
						<?php
							include "../php/conexao.php";
							//$link = mysqli_connect("localhost", "root", "", "softfood");  

							$query = "SELECT count(id) AS quantidade FROM pedido WHERE situacao_id = 1";

							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
							$quantidade = $row["quantidade"];		
						?>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme"><?php echo $quantidade;?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Existem <?php echo $quantidade;?> pedidos em aberto</p>
                            </li>
							<?php
							include "../php/conexao.php";
								//$link = mysqli_connect("localhost", "root", "", "softfood");  

								$query = "SELECT numeropedido, datacompra, total FROM pedido WHERE situacao_id = 1";
								$result = mysqli_query($link, $query);
					
								while($row = mysqli_fetch_assoc($result)) {
									$numero_pedido = $row["numeropedido"];
									$data = date('d/m/Y H:i:s', strtotime($row["datacompra"]));
									$valor = number_format($row["total"], 2, ',', '.');
							?>
								<li>
									<a>
										<span class="subject">
										<span class="from">#<?php echo $numero_pedido;?></span>
										<span class="time">R$<?php echo $valor;?></span>
										</span>
										<span class="message">
											<?php echo $data;?>
										</span>
									</a>
								</li>
							<?php
								}
							?>
                            <li>
                                <a href="pedidosAdm.php?sit=1">Ver pedidos em aberto</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Sair</a></li>
            	</ul>
            </div>
        </header>