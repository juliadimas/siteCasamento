<?php
    include_once ("selects.php");

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $consulta = "SELECT tipFuncao FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $con = mysqli_query($conn, $consulta);

    while($dado = $con->fetch_array()){ 
        if (trim($dado['tipFuncao']) > 0) {
            $usuario = $dado['tipFuncao'];

            header("Location: ../sobre/index.php?usu=$usuario");
        }
    }

?>