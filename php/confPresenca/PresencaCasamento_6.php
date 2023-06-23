<?php 
    include_once ("../banco_dados/selects.php");

    if (empty($_POST['t'])){
        
    }elseif(empty($_POST['t']) == "I"){
        echo "<script>alert('Dados salvos com sucesso.');</script>";
    };

    $where = " WHERE codConvidado > 0 and 1 = 1 ";

    if (empty($_POST['codConvidado'])){
        $where = $where;
    }elseif(trim($_POST['codConvidado']) > 0){
        $codConvidado = $_POST['codConvidado'];
        $where = $where . " AND codConvidado = '$codConvidado' ";
    };

    if (empty($_POST['nomConvidado'])){
        $where = $where;
    }elseif(trim($_POST['nomConvidado']) > 0) {
        $nomConvidado = $_POST['nomConvidado'];
        $where = $where . " AND nomConvidado = '$nomConvidado' ";
    };

    if (empty($_POST['codConvite'])){
        $where = $where;
    }elseif(trim($_POST['codConvite']) > 0) {
        $codConvite = $_POST['codConvite'];
        $where = $where . " AND fk_codConvite = '$codConvite' ";
    };

    if (empty($_POST['codTipConvidado'])){
        $where = $where;
    }elseif(trim($_POST['codTipConvidado']) > 0) {
        $codTipConvidado = $_POST['codTipConvidado'];
        $where = $where . " AND fk_codTipConvidado = '$codTipConvidado' ";
    };

    if (empty($_POST['sexo'])){
        $where = $where;
    }elseif(trim($_POST['sexo']) > 0) {
        $codTsexoipConvidado = $_POST['sexo'];
        $where = $where . " AND sexo = '$sexo' ";
    };

    if (empty($_POST['faixaEtaria'])){
        $where = $where;
    }elseif(trim($_POST['faixaEtaria']) > 0) {
        $faixaEtaria = $_POST['faixaEtaria'];
        $where = $where . " AND faixaEtaria = '$faixaEtaria' ";
    };

    if (empty($_POST['noivo'])){
        $where = $where;
    }elseif(trim($_POST['noivo']) > 0) {
        $noivo = $_POST['noivo'];
        $where = $where . " AND noivo = '$noivo' ";
    };

    if (empty($_POST['codTipFuncao'])){
        $where = $where;
    }elseif(trim($_POST['codTipFuncao']) > 0) {
        $codTipFuncao = $_POST['codTipFuncao'];
        $where = $where . " AND fk_codTipFuncao = '$codTipFuncao' ";
    };

    if (empty($_POST['presenca'])){
        $where = $where;
    }elseif(trim($_POST['presenca']) > 0) {
        $presenca = $_POST['presenca'];
        $where = $where . " AND presenca = '$presenca' ";
    };

    if (empty($_POST['cpfConvidado'])){
        $where = $where;
    }elseif(trim($_POST['cpfConvidado']) > 0) {
        $cpfConvidado = $_POST['cpfConvidado'];
        $where = $where . " AND cpfConvidado = '$cpfConvidado' ";
    };

    $consulta = $consultaConvidado . $where;

    $con = mysqli_query($conn, $consulta);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="../../css/estiloGeral.css"/>
        <link rel="stylesheet" href="../../css/estiloSobre.css"/>
        <link rel="stylesheet" href="../../css/estiloFornecedor.css"/>
        <link rel="stylesheet" href="../../css/estMenu.css"/>
        <title>Júlia e Rian</title>

        <link href="https://fonts.cdnfonts.com/css/brotherhood-script" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type="text/css"/>
        <link href="https://fonts.cdnfonts.com/css/mermaid" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/robecha-daniera" rel="stylesheet">
        
    </head>
    <body STYLE="text-align: center;">
            </br></br></br></br>
            <a href="filtrarPresenca.php?usu=N"><img src="../../imagens/btnFiltrar.png" style="width: 200px;"></a>
            <a href="novoConvidado.php?usu=N"><img src="../../imagens/btnNovo.png" style="width: 200px;"></a>
            <a href="novoConvite.php?usu=N"><img src="../../imagens/btnConvite.png" style="width: 200px;"></a>
            <form border="none" method="POST">
                <header class="titulo" style="font-size: 30px">
                    <tr>
                        <td>Código | </td>
                        <td>Nome Completo | </td>
                        <td>Convite | </td>
                        <td>Tipo | </td>
                        <td>Faixa Etária | </td>
                        <td>Função | </td>
                        <td>CPF | </td>
                        <td>Presença</td>
                    </tr>
                </header>
                <?php
                    while($dado = $con->fetch_array()){ 
                ?>
                <tr class="texto">
                    <a href = "novoConvidado.php?codConvidado=<?php echo $dado['codConvidado'];?>"><td  style="padding: 10px;">
                        <input type="text" disabled name="codConvidado<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['codConvidado'];?>" size="4" class="texto" style="text-align: left;"/> 
                    </td></a>
                    
                    <td  style="padding: 10px;">
                        <input type="text" disabled name="nomeCompleto<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['nomConvidado'];?>" size="20" class="texto" style="text-align: left;"/> 
                    </td>
                    <td  style="padding: 10px;">
                        <input type="text" disabled name="codConvite<?php echo $dado['codConvidado'];?>" placeholder="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="10" class="texto" style="text-align: left;"/> 
                    </td>
                    <td  style="padding: 10px;">
                        <select disabled name="faixaEtaria<?php echo $dado['codConvidado'];?>" class="texto">
                            <option <?php if($dado['faixaEtaria'] == 'A'){ ?> selected <?php } ?> value="A">Adulto</option>
                            <option <?php if($dado['faixaEtaria'] == 'C'){ ?> selected <?php } ?> value="C">Criança</option>
                        </select>
                    </td>
                    <td  style="padding: 10px;">
                        <select disabled name="funcao<?php echo $dado['codConvidado'];?>" class="texto">
                            <option <?php if($dado['fk_codTipFuncao'] == 'N'){ ?> selected <?php } ?> value="N">Noivos</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'C'){ ?> selected <?php } ?> value="C">Convidado</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'M'){ ?> selected <?php } ?> value="M">Madrinha</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'P'){ ?> selected <?php } ?> value="P">Padrinho</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'D'){ ?> selected <?php } ?> value="D">Daminha</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'J'){ ?> selected <?php } ?> value="J">Pajem</option>
                            <option <?php if($dado['fk_codTipFuncao'] == 'F'){ ?> selected <?php } ?> value="F">Fornecedor</option>
                        </select>
                    </td>

                    <td  style="padding: 10px;">
                        <input type="text" disabled name="cpf<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['cpfConvidado'];?>" placeholder="000.000.000-00" size="12" class="texto" style="text-align: left;"/> 
                    </td>

                    <td class="texto"  style="padding: 10px;">
                        <select disabled name="presenca<?php echo $dado['codConvidado'];?>" class="texto">
                            <option <?php if($dado['presenca'] == 'P'){ ?> selected <?php } ?> value="P">Pendente</option>
                            <option <?php if($dado['presenca'] == 'C'){ ?> selected <?php } ?> value="C">Confirmado</option>
                            <option <?php if($dado['presenca'] == 'F'){ ?> selected <?php } ?> value="F">Faltarei</option>
                        </select>
                    </td>
                    <input type="text" name="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="20" class="texto" style="text-align: left; display:none;"/> 
                    <input type="text" name="codConvidado" value="<?php echo $dado['codConvidado'];?>" size="20" class="texto" style="text-align: left;  display:none;"/> 
                    
                </tr></br>
                <?php
                    }  
                ?>
            </form>
    </body>
</html>