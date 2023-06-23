<?php 
    include_once ("../banco_dados/selects.php");

    if (empty($_GET['codConvidado'])){
        header("Location: novoConvidadoNovo.php");
    }

    $where = " WHERE 1 = 1 ";

    if (empty($_GET['codConvidado'])){
        $where = $where;
    }elseif(trim($_GET['codConvidado']) > 0){
        $codConvidado = $_GET['codConvidado'];
        $where = $where . " AND codConvidado = '$codConvidado' ";
    }

    $consulta = $consultaConvidado . $where;

    $con = mysqli_query($conn, $consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "../head.php"; ?>
    </head>
    <body STYLE="text-align: center;">
                </br></br></br></br>

        <form border="none" method="POST"><div class="texto">
            <?php
                while($dado = $con->fetch_array()){ 
            ?>
            <tr class="texto">
                <td  style="padding: 10px;">
                    Código: <input type="text" disabled name="codConvidado<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['codConvidado'];?>" size="4" class="texto" style="text-align: left;"/> 
                    Nome: <input type="text" name="nomeCompleto<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['nomConvidado'];?>" size="20" class="texto" style="text-align: left;"/> 
                    CPF: <input type="text" name="cpf<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['cpfConvidado'];?>" placeholder="000.000.000-00" size="12" class="texto" style="text-align: left;"/> 
                </td></BR>
                <td  style="padding: 10px;">
                    Faixa Etária:
                    <select name="faixaEtaria<?php echo $dado['codConvidado'];?>" class="texto">
                        <option <?php if($dado['faixaEtaria'] == 'A'){ ?> selected <?php } ?> value="A">Adulto</option>
                        <option <?php if($dado['faixaEtaria'] == 'C'){ ?> selected <?php } ?> value="C">Criança</option>
                    </select>

                    Função:
                    <select name="funcao<?php echo $dado['codConvidado'];?>" class="texto">      
                        <option <?php if($dado['fk_codTipFuncao'] == 'C'){ ?> selected <?php } ?> value="C">Convidado</option>
                        <option <?php if($dado['fk_codTipFuncao'] == 'M'){ ?> selected <?php } ?> value="M">Madrinha</option>
                        <option <?php if($dado['fk_codTipFuncao'] == 'P'){ ?> selected <?php } ?> value="P">Padrinho</option>
                        <option <?php if($dado['fk_codTipFuncao'] == 'D'){ ?> selected <?php } ?> value="D">Daminha</option>
                        <option <?php if($dado['fk_codTipFuncao'] == 'J'){ ?> selected <?php } ?> value="J">Pajem</option>
                        <option <?php if($dado['fk_codTipFuncao'] == 'F'){ ?> selected <?php } ?> value="F">Fornecedor</option>
                    </select>

                    Presença:
                    <select name="presenca<?php echo $dado['codConvidado'];?>" class="texto">
                        <option <?php if($dado['presenca'] == 'P'){ ?> selected <?php } ?> value="P">Pendente</option>
                        <option <?php if($dado['presenca'] == 'C'){ ?> selected <?php } ?> value="C">Confirmado</option>
                        <option <?php if($dado['presenca'] == 'F'){ ?> selected <?php } ?> value="F">Faltarei</option>
                    </select>
                </td>
                <input type="text" name="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="20" class="texto" style="text-align: left; display:none;"/> 
                <input type="text" name="codConvidado" value="<?php echo $dado['codConvidado'];?>" size="20" class="texto" style="text-align: left;  display:none;"/> 
                <td  style="padding: 10px;">
                    Código do Convite:<input type="text" disabled name="codConvite<?php echo $dado['codConvidado'];?>" placeholder="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="10" class="texto" style="text-align: left;"/> 
                </td>
            </tr></br>
            <?php
                }  
            ?>
        </div></form>
    </body>
</html>