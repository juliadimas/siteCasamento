<?php 
    include_once ("../banco_dados/selects.php");
    //include_once ("../banco_dados/verificaUsuario.php");

    //DS - DADOS SALVOS
    //NV - NOME VAZIO
    //MV - MENSAGEM VAZIA
    //FV - FOTO VAZIA

    if (empty($_GET['t'])){ 
    }elseif($_GET['t'] == 'DS'){
        echo "<script>confirm('Dados salvos com sucesso.');</script>";
    }elseif($_GET['t'] == 'NV'){
        echo "<script>confirm('Você não colocou o seu nome.');</script>";
    }elseif($_GET['t'] == 'MV'){
        echo "<script>confirm('Você não digitou uma mensagem.');</script>";
    }elseif($_GET['t'] == 'FV'){
        echo "<script>confirm('Você não escolheu uma foto.');</script>";
    }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "../head.php"; ?> 
        <script src="../../js/contador.js"></script> 
        
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
            <img src="../../imagens/logo-png.png" id="logo"/>
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
                
            <h2 class="titulo">Sejam bem-vindos ao site do nosso casamento!</h2>
            <p class="texto">
                Resolvemos nos unir em uma só carne e não poderiamos fazer isso sem a presença de vocês!
            </p>
            <img src="../../imagens/folhasLogo.png" class="imgFolhas">
            <p class="texto">
                E começou a contagem regressiva, o frio na barriga só aumenta. 
                Queremos viver o dia mais feliz de nossas vidas ao lado de vocês, amigos e familiares, 
                aqui vamos contar um pouco da nossa história, queremos compartilhar alegria que estamos vivendo com vocês.
            </p>
        </div>

        <div class="container" style="text-align: center;">
            <h2 class="titulo">Deixe sua mensagem de carinho para nós!</h2>
            <form method="POST" action="../banco_dados/insertMensagem.php">
                <input type="text" name="nome" maxLength="60" size="60" placeholder="Digite seu nome" class="texto" style="text-align: left;"/> 
                    </br></br>
                <textarea name="mensagem" placeholder="Digite sua mensagem..." maxLength="500" rows=10 cols=60 class="texto" style="text-align: left;"></textarea>
                    </br>
                    <input type="file" name="foto">
        </br>
                <button>
                    <img src="../../imagens/btnEnviar.png"  style="width:100px;">
                </button>
            </form>
        </div>


        <div class="container" style="text-align:center">
            <p class="texto">
                Palavras são carinhos doados. Obrigado por nos dar o seu carinho. Iremos lembrar para sempre deste momento.
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