<?php
    include_once ("conexao.php");

    $codConvite = filter_input(INPUT_POST, 'codConvite');

    $consulta = "SELECT codConvidado FROM convidado WHERE fk_codConvite = '$codConvite' ORDER BY faixaEtaria";
    $con = mysqli_query($conn, $consulta);
    $con2 = mysqli_query($conn, $consulta);

    $codConvidado = filter_input(INPUT_POST, 'codConvidado');

    while($dado = $con->fetch_array()){ 
        $cpf = filter_input(INPUT_POST, 'CPF'. $dado['codConvidado']);
        $presenca = filter_input(INPUT_POST, 'presenca'. $dado['codConvidado']);

        if ($presenca == 'C') {
            if(trim($cpf) < 14) {
                header("Location: ../confPresenca/resultConfPresencaCasamento.php?codConvite=$codConvite");
                return;
            }
        }
    }

    while($dado = $con2->fetch_array()){ 
        $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto'. $dado['codConvidado']);
        $cpf = filter_input(INPUT_POST, 'CPF'. $dado['codConvidado']);
        $presenca = filter_input(INPUT_POST, 'presenca'. $dado['codConvidado']);

        $sql = "UPDATE convidado SET   nomConvidado = '$nomeCompleto', 
                                        cpfConvidado = '$cpf', 
                                        presenca = '$presenca' 
                                WHERE   fk_codConvite = '$codConvite' 
                                AND     codConvidado = '$codConvidado'";
        mysqli_query($conn, $sql);

    }
    
    header("Location: ../confPresenca/confPresencaCasamento_1.php?t=DS");
    
?>
