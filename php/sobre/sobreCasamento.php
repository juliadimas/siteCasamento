<?php 
    include_once ("../banco_dados/selects.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>

            <br><br>
        
        <div class="container">
            <h2 class="titulo">Sobre a data:</h2>
            <p class="texto">
                A escolha da data não foi aleatória, escolhemos essa data por ser o dia dedicado há Nossa Senhora Aparecida, 
                mãe do Nosso Senhor Jesus Cristo e padroeira do Brasil.
            </p>
                </br>
                <img src="../../imagens/folhasData.png" class="imgFolhas">
            <p class="texto">
                "...Virgem Santíssima, cheia de poder e de bondade, lançai sobre nós um olhar favorável, 
                para que sejamos socorridos por vós, em todas as necessidades em que nos acharmos..."
            </p>
        </div>
        <div class="container" id="localidades">
            <div class="casamento" id="localCerimonia" style="width:40%;">
                <h2 class="titulo">Cerimônia</h2>
                <p class="texto">
                    A Cerimônia acontecerá na <?php echo $localCerimonia; ?>, na <?php echo $enderecoCerimonia; ?>, às <?php echo $horarioCerimonia; ?>.
                </p>
                        </br>
                <a href="<?php echo $localizacaoCerimonia;?>" target="_blank">
                    <img src="../../imagens/igreja.png" class="fotoLocal">
                </a>
                <p class="texto" style="font-size:20px;"><a href="<?php echo $localizacaoCerimonia;?>" target="_blank">
                    Clique aqui para pegar a localização.
                </a></p>
            </div>

            <div class="casamento" id="localCerimonia" style="width:40%; margin-left: 80px;">
                <h2 class="titulo">Recepção</h2>
                <p class="texto">
                    A Recepção acontecerá após a Cerimônia e será na <?php echo $localRecepcao; ?>, sem hora para acabar.
                </p>
                        </br>
                <a href="<?php echo $localizacaoRecepcao;?>" target="_blank">
                    <img src="../../imagens/recepcao.png" class="fotoLocal">
                </a>
                <p class="texto" style="font-size:20px;"><a href="<?php echo $localizacaoRecepcao;?>" target="_blank">
                    Clique aqui para pegar a localização.
                </a></p>
            </div>
        </div>
    </body>
</html>