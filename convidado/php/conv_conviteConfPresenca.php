<?php 
    include ("conv_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");
    

    if (empty($_POST['form'])){
    }else{
        if (strlen($_POST['codConvite']) == 0){ 
            echo "<script>confirm('Você não inseriu um código de convite.');</script>";
        }else{
            $codConvite = $_POST['codConvite'];
            $_SESSION['codConvite'] = $codConvite;
            $consultaCountConvidadosConvite = "SELECT count(codConvidado) as count
                                                 FROM convidado 
                                                WHERE fk_codConvite = '$codConvite'";
            $conCountConvidadosConvite = mysqli_query($conn, $consultaCountConvidadosConvite); 
    
            while($dadoCount = $conCountConvidadosConvite->fetch_array()){ 
                $count = $dadoCount['count'];
                if($count == 0){
                    echo "<script>confirm('Você inseriu um código de convite invalido.');</script>";

                }else{
                    header("Location: conv_convidadosPorConvite.php");
                }
            }
        }
    }

    if(empty($_SESSION['atuConvidado'])){
        
    }else{
        $atualizaConvidado = $_SESSION['atuConvidado'];
        
        if ($atualizaConvidado == 'S'){
            echo "<script>confirm('Salvo dados com sucesso!');</script>";
            $_SESSION['atuConvidado'] = 'N';
        }
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
            <form method="POST" action="">
                <p class="texto">
                    Código do Convite:
                    <input type="text" id="codConvite" name="codConvite" size="20" placeholder="Código do seu convite" class="texto" style="text-align: left;"/> 
                </p> 
                <input type="text" id="form" name="form" size="20" value ='S' class="texto" style="text-align: left; display:none;"/> 
                <button>
                    <img src="../../arquivos/imagens/buttons/btnPesquisar.png"  style="width:100px;">
                </button>
            </form>
        </div>
    </body>
</html>