<?php 
    include ("head.php");
    include_once ("../bd/selectTabelaCompleta.php");
    //include_once("menu.php");

    if(isset($_POST['login']) || isset($_POST['senha'])) {

        if(strlen($_POST['login']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
    
            $login = $conn->real_escape_string($_POST['login']);
            $senha = $conn->real_escape_string($_POST['senha']);
    
            $sql_code = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);
    
            $quantidade = $sql_query->num_rows;
    
            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();
    
                if(!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION['login'] = $usuario['login'];
                $_SESSION['tipFuncao'] = $usuario['fk_codFuncao'];
                
                $tipFuncao = $_SESSION['tipFuncao'];
                if($tipFuncao == 'NA' || $tipFuncao == 'NO'){
                    header("Location: ../../../casamentoSite/noivo/php/noi_index.php");
                }
    
            } else {
                echo "<script>confirm('Falha ao logar! E-mail ou senha incorretos');</script>";
            }
    
        }
    
    }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
            </br></br></br></br>
        <div style="text-align: center;">
            <h2 class="titulo">Se você for noivo ou padrinho faça seu Login!</h2>
                </br></br>
            <form method="POST" action="">
                <p class="texto">
                    Login:
                    <input type="text" name="login" size="20" placeholder="login" class="texto" style="text-align: left;"/> 
                </p> 
                <p class="texto">
                    Senha:
                    <input type="password" name="senha" size="20" placeholder="Senha" class="texto" style="text-align: left;"/> 
                </p> 
                <button>
                    <img src="../../arquivos/imagens/buttons/btnEntrar.png"  style="width:100px;">
                </button>
            </form>
        </div>
    </body>
</html>