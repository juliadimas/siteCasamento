<?php
    include ("../php/noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");
    $sql = "DELETE FROM convidado WHERE codConvidado = '" . $_GET['codConvidado'] . "'";
    $conect = mysqli_query($conn, $sql);
    if($conect == 1){
        $_SESSION['convidadoDeletado'] = 'S';

        $consultaMaiorNumConvidado = "SELECT MAX(codConvidado) as max FROM convidado";
        $conMaiorNumConvidado = mysqli_query($conn, $consultaMaiorNumConvidado);  
        while($dadoMaiorNumConvidado = $conMaiorNumConvidado->fetch_array()){ 
            $maiorNumero = $dadoMaiorNumConvidado['max'];
        }
        $sqlAuto = "ALTER TABLE convidado AUTO_INCREMENT = " .$maiorNumero;
        mysqli_query($conn, $sqlAuto);
    }else{
        $_SESSION['convidadoDeletado'] = 'N';
    }
    header("Location: ../php/noi_conv_presencaCasamento.php");
?>