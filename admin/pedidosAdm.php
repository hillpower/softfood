<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- <meta charset="utf-8"> -->
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
                    <li><a class="logout" href="login.php">Sair</a></li>
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
						  <li><a  href="pedidosAdm.php">• PEDIDOS</a></li>
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
	                  	  	  <h4><i class="fa fa-angle-right"></i> PEDIDOS
	                  	  	  </h4>
	                  	  	  <hr>
                              <thead>
                             
                              <tr>
                                <!--  <th> <i class="fa fa-bookmark"></i> IMAGEM </th>  teste da img-->
								  <th><i class="fa fa-bullhorn"></i> Número</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Cliente</th>
                                  <th><i class="fa fa-bookmark"></i> Data</th>
                                  <th><i class="fa fa-bookmark"></i> Situação</th>
								  <th><i class="fa fa-bookmark"></i> Valor</th>
								  <th><i class="fa fa-bookmark"></i> Situação/Ação</th>
								  
                              </tr>
                              </thead>
                              
                              <tbody>
                              
                              <?php
							  
							  include "../php/conexao.php";
                              //$link = mysqli_connect("localhost", "root", "", "softfood");  
                              
                               	
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
      
            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    2015 - Thiago Moraes
                    <a href="cardapioAdm.php#" class="go-top">
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
        
        
      
        </body>
      </html>
      
      
      