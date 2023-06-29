<?php

    include_once("selects.php");

    if (empty($usuario)){
        $usu = 'C';
    }else{
        $usu = $usuario;
    }

    if(empty($_POST['login'])){
        $login = 'loginVazio';
    }else{
        $login = $_POST['login'];
    }

    if(empty($_POST['senha'])){
        $senha = 'senhaVazia';
    }else{
        $senha = $_POST['senha'];
    }
    
    if ($login <> 'loginVazio' and $senha <> 'senhaVazia'){
        $consulta = "SELECT tipFuncao FROM usuarios WHERE login = '$login' AND senha = '$senha'";
        $con = mysqli_query($conn, $consulta);

        while($dado = $con->fetch_array()){ 
            if (trim($dado['tipFuncao']) > 0) {
                $usuario = $dado['tipFuncao'];
            }
        }
    }

    if ($login == 'loginVazio' and $senha == 'senhaVazia'){
        $usuario = 'C';
    }

    if ($usuario == 'N'){
        include "../menus/menuNoivos.php";
    }elseif ($usuario == 'C'){
        include "../menus/menuConvidado.php";
    }

    if ($usu <> $usuario){
        header("Location: ../sobre/index.php");
    }
?>