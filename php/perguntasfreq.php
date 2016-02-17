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

            <div class="col-md-8 col-sm-10"><!-- comeca o colapso -->
                
                <div class="container-fluid" id="conteudo">
                    <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="panel-title" style="text-align: left">
                                Por onde começo meu pedido pelo site?
                                </h4>
                                </a>

                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Para realizar seu(s) pedidos é necessário que você realize seu cadastro na opção Entrar/Cadastrar, caso já tenha realizado o cadastro basta apenas fazer o 
                                    acesso inserindo o email e a senha que você cadastrou.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title" style="text-align: left">
                                Preciso me cadastrar toda vez que vou fazer um pedido?
                                </h4>
                                </a>
                            </div>
                            
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                Não, na próxima vez que você for realizar um pedido, basta apenas acessar seu cadastro na opção Entrar/Cadastrar.    
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title" style="text-align: left">
                                Meu endereço mudou, como faço para alterar meu cadastro?

                                </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Após acessar o sistema, na opção Entrar/Cadastrar haverá um item chamado "Alterar dados" nele você poderá efetuar as alterações necessárias.  
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h4 class="panel-title" style="text-align: left">
                                Como sei a loja que atende o meu endereço?
                                    
                                </h4>
                                </a>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                Estamos atendendo apenas o Município de Corumbá, mas estamos trabalhando para ampliar a área de atendimento.
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <h4 class="panel-title" style="text-align: left">
                                 Eu posso colocar alguma observação especial no meu pedido?
                                    
                                </h4>
                                </a>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">
                                 Sim, após a escolha dos produtos que deseja comprar, na opção "Carrinho" haverá um campo para que você possa fazer as observações.
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h4 class="panel-title" style="text-align: left">
                                Como sei se a loja aceita a minha forma de pagamento?
                                    
                                </h4>
                                </a>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                <div class="panel-body">
                                    A forma de pagamento atualmente para este sistema por enquanto é apenas em dinheiro.
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSeven">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    <h4 class="panel-title" style="text-align: left">
                                Como eu sei se meu pedido foi concluído com sucesso?
                                    
                                </h4>
                                </a>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven">
                                <div class="panel-body">
                                    Após ter feito a escolha de seus produtos, você poderá clicar no botão "Finalizar Pedido" e então aparecerá a seguinte mensagem "Seu pedido foi realizado com sucesso! Confira abaixo todas as informações do seu pedido.
Leia com bastante atenção o restante dessa página e caso tenha alguma divergêngia, nos avise o mais breve possível através do nosso contato."
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingEight">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    <h4 class="panel-title" style="text-align: left">
                                O que faço se tiver algum problema com o meu pedido?
                                    
                                </h4>
                                </a>
                            </div>
                            <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                                <div class="panel-body">
                                Se você tiver algum problema com o seu pedido, você poderá entrar em contato com o administrador por meio do link "Fale Conosco" ou através do telefone.
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                
            </div> <!-- termina o Colapso -->

            <div class="col-md-2 col-sm-1"></div>
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
