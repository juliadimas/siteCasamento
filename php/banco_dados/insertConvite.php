<?php
    include_once ("selects.php");

    if (empty($_POST['nomeConvite'])){
        header("Location: ../confPresenca/novoConvite.php");
    }elseif(trim($_POST['nomeConvite']) > 0){
        $nomeConvite = $_POST['nomeConvite'];
    };

    $where = " WHERE 1 = 1 AND (";

    if (empty($_POST['usuario1'])){
        $usuario_1 = 0;
    }elseif(trim($_POST['usuario1']) > 0){
        $usuario_1 = $_POST['usuario1'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_1' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_1' ";
        }
    };

    if (empty($_POST['usuario2'])){
        $usuario_2 = 0;
    }elseif(trim($_POST['usuario2']) > 0){
        $usuario_2 = $_POST['usuario2'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_2' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_2' ";
        }
        
    };

    if (empty($_POST['usuario3'])){
        $usuario_3 = 0;
    }elseif(trim($_POST['usuario3']) > 0){
        $usuario_3 = $_POST['usuario3'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_3' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_3' ";
        }
    };

    if (empty($_POST['usuario4'])){
        $usuario_4 = 0;
    }elseif(trim($_POST['usuario4']) > 0){
        $usuario_4 = $_POST['usuario4'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_4' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_4' ";
        }
    };

    if (empty($_POST['usuario5'])){
        $usuario_5 = 0;
    }elseif(trim($_POST['usuario5']) > 0){
        $usuario_5 = $_POST['usuario5'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_5' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_5' ";
        }
    };

    if (empty($_POST['usuario6'])){
        $usuario_6 = 0;
    }elseif(trim($_POST['usuario6']) > 0){
        $usuario_6 = $_POST['usuario6'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_6' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_6' ";
        }
    };

    if (empty($_POST['usuario7'])){
        $usuario_7 = 0;
    }elseif(trim($_POST['usuario7']) > 0){
        $usuario_7 = $_POST['usuario7'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_7' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_7' ";
        }
    };

    if (empty($_POST['usuario8'])){
        $usuario_8 = 0;
    }elseif(trim($_POST['usuario8']) > 0){
        $usuario_8 = $_POST['usuario8'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_8' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_8' ";
        }
    };

    if (empty($_POST['usuario9'])){
        $usuario_9 = 0;
    }elseif(trim($_POST['usuario9']) > 0){
        $usuario_9 = $_POST['usuario9'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_9' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_9' ";
        }
    };

    if (empty($_POST['usuario10'])){
        $usuario_10 = 0;
    }elseif(trim($_POST['usuario10']) > 0){
        $usuario_10 = $_POST['usuario10'];

        if ($where == " WHERE 1 = 1 AND ("){
            $where = $where . " codConvidado = '$usuario_10' ";
        }else{
            $where = $where . " OR codConvidado = '$usuario_10' ";
        }
    };

    if ($where == " WHERE 1 = 1 AND ("){
        $where = " WHERE 1 = 1 ";
    }else{
        $where = $where . ") ";
    }

    $sql = "SELECT  fk_codTipConvidado,
                    noivo,
                    fk_codTipFuncao, 
                    faixaEtaria
               FROM convidado ";
    
    $sql = $sql . $where;
    $con = mysqli_query($conn, $sql);

    $sqlMax = "SELECT max(codConviteUnc) as max FROM convite"; 
    $conMax = mysqli_query($conn, $sqlMax);

    while($dadoMax = $conMax->fetch_array()){ 
        $max = $dadoMax['max'];
    }
    $max = $max + 1;

    if ($max < 10){$varNum = '000' . $max;};
    if ($max > 10 and $max < 100){$varNum = '00' . $max;};
    if ($max > 100 and $max <1000){$varNum = '0' . $max;};

    $qtdAdulto = 0;
    $qtdCrianca = 0;

    while($dado = $con->fetch_array()){ 
        $varCodConvite = $varNum . $dado['fk_codTipConvidado'] . $dado['noivo'] . $dado['fk_codTipFuncao'];
        if ($dado['faixaEtaria'] == 'A'){
            $qtdAdulto = $qtdAdulto + 1;
        }if ($dado['faixaEtaria'] == 'C'){
            $qtdCrianca = $qtdCrianca + 1;
        }
    }

    $insert = "INSERT INTO convite (codConvite, 
                                    codConviteUnc, 
                                    nomConvite, 
                                    qtdAdulto, 
                                    qtdCrianca) 
                            VALUES ('$varCodConvite',
                                    $max,
                                    '$nomeConvite',
                                    $qtdAdulto,
                                    $qtdCrianca)";
                                    
    mysqli_query($conn, $insert);

    $update = "UPDATE convidado SET fk_codConvite = '$varCodConvite' " . $where;

    mysqli_query($conn, $update);

    header("Location: ../confPresenca/PresencaCasamento.php?usu=N&t=I");
?>
