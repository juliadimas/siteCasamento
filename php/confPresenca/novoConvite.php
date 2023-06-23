<?php 
    include_once ("../banco_dados/selects.php");

    $conConvidado1 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado2 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado3 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado4 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado5 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado6 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado7 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado8 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado9 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
    $conConvidado10 = mysqli_query($conn, $consultaConvidadoSemCodConvite);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "../head.php"; ?>
    </head>
    <body style="text-align: center;">
        <?php 
            if (empty($_GET['usu'])){
                include "../menus/menuConvidado.php";
            }elseif ($_GET['usu'] == 'N'){
                include "../menus/menuNoivos.php";
            }
        ?>
            </br></br></br></br>
            <form border="none" method="POST" action="../banco_dados/insertConvite.php">
            <p class="texto">
                Nome no Convite:<input type="text" name="nomeConvite" place size="40" class="texto" style="text-align: left;"/> 
            </p>

            <p class="texto">
                Convidado 01:
                <select name="usuario1" class="texto">
                    <?php
                        while($dado1 = $conConvidado1->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado1['codConvidado'];?>"><?php if($dado1['codConvidado'] > 0){ echo $dado1['codConvidado'] . ' - ' . $dado1['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 02:
                <select name="usuario2" class="texto">
                    <?php
                        while($dado2 = $conConvidado2->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado2['codConvidado'];?>"><?php if($dado2['codConvidado'] > 0){ echo $dado2['codConvidado'] . ' - ' . $dado2['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 03:
                <select name="usuario3" class="texto">
                    <?php
                        while($dado3 = $conConvidado3->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado3['codConvidado'];?>"><?php if($dado3['codConvidado'] > 0){ echo $dado3['codConvidado'] . ' - ' . $dado3['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 04:
                <select name="usuario4" class="texto">
                    <?php
                        while($dado4 = $conConvidado4->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado4['codConvidado'];?>"><?php if($dado4['codConvidado'] > 0){ echo $dado4['codConvidado'] . ' - ' . $dado4['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 05:
                <select name="usuario5" class="texto">
                    <?php
                        while($dado5 = $conConvidado5->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado5['codConvidado'];?>"><?php if($dado5['codConvidado'] > 0){ echo $dado5['codConvidado'] . ' - ' . $dado5['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p><p class="texto">
                Convidado 06:
                <select name="usuario6" class="texto">
                    <?php
                        while($dado6 = $conConvidado6->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado6['codConvidado'];?>"><?php if($dado6['codConvidado'] > 0){ echo $dado6['codConvidado'] . ' - ' . $dado6['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 07:
                <select name="usuario7" class="texto">
                    <?php
                        while($dado7 = $conConvidado7->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado7['codConvidado'];?>"><?php if($dado7['codConvidado'] > 0){ echo $dado7['codConvidado'] . ' - ' . $dado7['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 08:
                <select name="usuario8" class="texto">
                    <?php
                        while($dado8 = $conConvidado8->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado8['codConvidado'];?>"><?php if($dado8['codConvidado'] > 0){ echo $dado8['codConvidado'] . ' - ' . $dado8['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 09:
                <select name="usuario9" class="texto">
                    <?php
                        while($dado9 = $conConvidado9->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado9['codConvidado'];?>"><?php if($dado9['codConvidado'] > 0){ echo $dado9['codConvidado'] . ' - ' . $dado9['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>

            <p class="texto">
                Convidado 10:
                <select name="usuario10" class="texto">
                    <?php
                        while($dado10 = $conConvidado10->fetch_array()){ 
                    ?>
                    <option value="<?php echo $dado10['codConvidado'];?>"><?php if($dado10['codConvidado'] > 0){ echo $dado10['codConvidado'] . ' - ' . $dado10['nomConvidado'];};?> </option>
                    <?php
                        }
                    ?>
                </select>
            </p>
            
                <button>
                    <img src="../../imagens/btnSalvar.png"  style="width:100px;">
                </button>

            </form>
    </body>
</html>