<?php 
    include ("noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <script src="../../arquivos/js/contador.js"></script> 
        
        <style type="text/css">
            .titulo{
                text-align: center;
            }

            .texto{
                text-align: center;
            }
        </style>
        
    </head>
    <body>
                </br>
        
        <div id="principal">
            <img src="../../arquivos/imagens/IDvisual/logo-png.png" id="logo"/>
        </div>

                </br></br>

        <div class="container">
            <div id="boxContRegressiva">
                <h2 class="titulo" style="margin-bottom: -30px; margin-top: 10px;"> Faltam: </h2>
                </br>
                <div id="contagemRegressiva">
                    <div id="dias"></div>
                    <div id="horas"></div>
                    <div id="minutos"></div>
                    <div id="segundos"></div>
                </div>
            </div>

                </br>
                
            <h2 class="titulo">Esse é site do nosso casamento!</h2>
            <p class="texto">
                Palavras são carinhos doados. Mensagens recebidas.
            </p>
            <div id="mensagens">
                <?php
                    while($dado = $conMensagem->fetch_array()){ 
                ?>
                    <div class="mensagem" style=" width: 500px; height: 580px;">
                        <p class="textoMensagem">
                            <?php 
                            $mensagem = $dado['mensagem'];
                            $contMensagem = strlen($mensagem);
                            $qtdVezes = 1;
                            if ($contMensagem > 30){
                                $qtdVezes = $contMensagem / 30;
                                $qtdVezes = floor($qtdVezes);
                            }
                            
                            $vforInicio = 0;
                            for ($vfor = 1; $vfor <= $qtdVezes; $vfor++){
                                $cortMensagem = substr($mensagem, $vforInicio, 32);
                                $vforInicio = $vforInicio + 40;
                                echo $cortMensagem;
                                if ($vfor < $qtdVezes){
                                echo "</br>";}
                        }
                            ?>
                        </p>
                        <p style="text-align:right;">- <?php echo $dado['nome'];?></p>
                    </div>
                    </br>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
</html>