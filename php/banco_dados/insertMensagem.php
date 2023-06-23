<?php
    include_once ("selects.php");
    //DS - DADOS SALVOS
    //NV - NOME VAZIO
    //MV - MENSAGEM VAZIA

    if (empty($_POST['nome'])){
        header("Location: ../sobre/index.php?t=NV");
    }elseif(trim($_POST['nome']) > 0){
        $nomeMensagem = $_POST['nome'];
    };

    if (empty($_POST['mensagem'])){
        header("Location: ../sobre/index.php?t=MV");
    }elseif(trim($_POST['mensagem']) > 0){
        $mensagem = $_POST['mensagem'];
    };

    if (empty($_POST['foto'])){
        header("Location: ../sobre/index.php?t=FV");
    }elseif(trim($_POST['foto']) > 0){
        $foto = $_POST['foto'];
    };
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo 'foto:';
    echo $foto;
    $sql_insert = "INSERT INTO mensagem (nome, mensagem, foto) VALUES ('$nomeMensagem', '$mensagem', '$foto')";
    //mysqli_query($conn, $sql_insert);

    //header("Location: ../sobre/index.php?t=DS");

?>