<?php 
    include_once ("../banco_dados/conexao.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php 
            if (empty($_GET['usu'])){
                include "../menus/menuConvidado.php";
            }elseif ($_GET['usu'] == 'N'){
                include "../menus/menuNoivos.php";
            }
        ?>
        
            </br></br></br></br>
        <div style="text-align: center;">
            <h2 class="titulo">Se você for noivo ou padrinho faça seu Login!</h2>
                </br></br>
            <form method="POST" action="../banco_dados/entraUsuario.php">
                <p class="texto">
                    Login:
                    <input type="text" id="login" name="login" size="20" placeholder="login" class="texto" style="text-align: left;"/> 
                </p> 
                <p class="texto">
                    Senha:
                    <input type="password" id="senha" name="senha" size="20" placeholder="Senha" class="texto" style="text-align: left;"/> 
                </p> 
                <button>
                    <img src="../../imagens/btnEntrar.png"  style="width:100px;">
                </button>
            </form>
        </div>
    </body>
</html>