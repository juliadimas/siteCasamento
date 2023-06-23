<?php 
    include_once ("../banco_dados/selects.php");    

    if (empty($_GET['t'])){
    }elseif($_GET['t'] == 'DS'){
        echo "<script>confirm('Dados salvos com sucesso.');</script>";
    }
 ?>
<!DOCTYPE html>
<html lang="pt-br">

    <body>
</br></br></br></br>
        <div style="text-align: center;">
            <h2 class="titulo">Confirme sua Presença!</h2>
            <p class="texto">
                Sua presença é muito importante para nós, mas caso você não possa ir, ficaremos tristes, porém vamos entender.
            </p>
                </br></br>
            <form method="GET" action="resultConfPresencaCasamento_7.php">
                <p class="texto">
                    Código do Convite:
                    <input type="text" id="codConvite" name="codConvite" size="20" placeholder="Código do seu convite" class="texto" style="text-align: left;"/> 
                </p> 
                <input type="text" id="codConvite" name="tela" size="20" value="confPresenca" placeholder="Código do seu convite" class="texto" style="display: none;"/> 
                <button>
                    <img src="../../imagens/btnPesquisar.png"  style="width:100px;">
                </button>
            </form>
        </div>
    </body>
</html>