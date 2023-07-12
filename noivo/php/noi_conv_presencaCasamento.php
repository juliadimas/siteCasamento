<?php 
    include ("noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");

    if(empty($_SESSION['convidadoSalvo']) || $_SESSION['convidadoSalvo'] == ''){}else{
        $_SESSION['convidadoSalvo'] = '';
        echo "<script>confirm('Dados salvos com sucesso!');</script>";
    }

    if(empty($_SESSION['convidadoDeletado']) || $_SESSION['convidadoDeletado'] == ''){
        
    }else if($_SESSION['convidadoDeletado'] == 'S'){
        $_SESSION['convidadoDeletado'] = '';
        echo "<script>confirm('Convidado excluido com sucesso');</script>";
    }else if($_SESSION['convidadoDeletado'] == 'N'){
        $_SESSION['convidadoDeletado'] = '';
        echo "<script>confirm('Houve um erro ao excluir o convidado');</script>";
    }

    $where = " WHERE codConvidado > 0 and 1 = 1 ";

    if(empty($_POST['ini_codConvidado'])){
    }else{
        $ini_codConvidado = $conn->real_escape_string($_POST['ini_codConvidado']);
        if(strlen($ini_codConvidado) > 0){
            $where = $where . " AND codConvidado = '" .$ini_codConvidado. "' ";
        }
    }

    if(empty($_POST['ini_nomeCompleto'])){
    }else{
        $ini_nomeCompleto = $conn->real_escape_string($_POST['ini_nomeCompleto']);
        if(strlen($ini_nomeCompleto) > 0){
            $where = $where . " AND nomConvidado like '%" .$ini_nomeCompleto. "%' ";
        }
    }

    if(empty($_POST['ini_codConvite'])){
    }else{
        $ini_codConvite = $conn->real_escape_string($_POST['ini_codConvite']);
        if(strlen($ini_codConvite) > 0){
            $where = $where . " AND fk_codConvite like '%" .$ini_codConvite. "%' ";
        }
    }

    if(empty($_POST['ini_funcao'])){
    }else{
        $ini_funcao = $conn->real_escape_string($_POST['ini_funcao']);
        if(strlen($ini_funcao) > 0){
            $where = $where . " AND fk_codTipFuncao = '" .$ini_funcao. "' ";
        }
    }

    if(empty($_POST['ini_faixaEtaria'])){
    }else{
        $ini_faixaEtaria = $conn->real_escape_string($_POST['ini_faixaEtaria']);
        if(strlen($ini_faixaEtaria) > 0){
            $where = $where . " AND faixaEtaria = '" .$ini_faixaEtaria. "' ";
        }
    }

    if(empty($_POST['ini_cpf'])){
    }else{
        $ini_cpf = $conn->real_escape_string($_POST['ini_cpf']);
        if(strlen($ini_cpf) > 0){
            $where = $where . " AND cpfConvidado like '%" .$ini_cpf. "%' ";
        }
    }

    if(empty($_POST['ini_presenca'])){
    }else{
        $ini_presenca = $conn->real_escape_string($_POST['ini_presenca']);
        if(strlen($ini_presenca) > 0){
            $where = $where . " AND presenca = '" .$ini_presenca. "' ";
        }
    }

    $consulta = $consultaConvidado . $where;

    $con = mysqli_query($conn, $consulta);

    $quantidade = $con->num_rows;

 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
            </br></br>
        <a href="noi_novoConvidadoCasamento.php">
            <img src="../../arquivos/imagens/buttons/btnNovoConvidado.png" style="height: 60px"/>
        </a>
        <a href="noiv_conv_filtrarConvidado.php">
            <img src="../../arquivos/imagens/buttons/btnFiltrar.png"  style="height:60px;">
        </a>
        <a href="noiv_conv_filtrarConvidado.php">
            <img src="../../arquivos/imagens/buttons/btnConvite.png"  style="height:60px;">
        </a>
            <table>
                <header class="titulo" style="font-size: 30px">
                    <tr class="titulo" style="font-size: 30px">
                        <td>Código</td>
                        <td>Nome Completo</td>
                        <td>Convite</td>
                        <td>Etária</td>
                        <td>CPF</td>
                        <td>Presença</td>
                    </tr>
                </header>
                <form method="POST">
                    <tr>
                        <td style="padding-left: 10px;">
                            <input type="text"  name="ini_codConvidado" placeholder="" value="<?php if(empty($ini_codConvidado)){}else{ echo $ini_codConvidado;}?>" size="4" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <input type="text" name="ini_nomeCompleto" placeholder="" value="<?php if(empty($ini_nomeCompleto)){}else{ echo $ini_nomeCompleto;}?>" size="20" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <input type="text" name="ini_codConvite" placeholder="" value="<?php if(empty($ini_codConvite)){}else{ echo $ini_codConvite;}?>" size="10" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <?php
                                if (empty($ini_faixaEtaria)){
                            ?>
                                <select name="ini_faixaEtaria"class="texto">
                                    <option value="" selected></option>
                                    <option value="A">Adulto</option>
                                    <option value="C">Criança</option>
                                </select>
                            <?php
                                }else if($ini_faixaEtaria == 'A'){
                            ?>
                                <select name="ini_faixaEtaria"class="texto">
                                    <option value=""></option>
                                    <option value="A" selected>Adulto</option>
                                    <option value="C">Criança</option>
                                </select>
                            <?php
                                }else if($ini_faixaEtaria == 'C'){
                            ?>
                                <select name="ini_faixaEtaria"class="texto">
                                    <option value=""></option>
                                    <option value="A">Adulto</option>
                                    <option value="C" selected>Criança</option>
                                </select>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <input type="text" oninput="mascara(this)" name="ini_cpf" value="<?php if(empty($ini_cpf)){}else{ echo $ini_cpf;}?>" placeholder="" size="12" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <?php
                                if (empty($ini_presenca)){
                            ?>
                                <select name="ini_presenca"class="texto">
                                    <option value="" selected></option>
                                    <option value="P">Pendente</option>
                                    <option value="C">Confirmado</option>
                                    <option value="F">Faltará</option>
                                </select>
                            <?php
                                }else if($ini_presenca == 'P'){
                            ?>
                                <select name="ini_presenca"class="texto">
                                    <option value=""></option>
                                    <option value="P" selected>Pendente</option>
                                    <option value="C">Confirmado</option>
                                    <option value="F">Faltará</option>
                                </select>
                            <?php
                                }else if($ini_presenca == 'C'){
                            ?>
                                <select name="ini_presenca"class="texto">
                                    <option value=""></option>
                                    <option value="P">Pendente</option>
                                    <option value="C" selected>Confirmado</option>
                                    <option value="F">Faltará</option>
                                </select>
                            <?php
                                }else if($ini_presenca == 'F'){
                            ?>
                                <select name="ini_presenca"class="texto">
                                    <option value=""></option>
                                    <option value="P">Pendente</option>
                                    <option value="C">Confirmado</option>
                                    <option value="F" selected>Faltará</option>
                                </select>
                            <?php
                                }
                            ?>
                        </td>
                        <td style="padding-right: 10px; padding-left: -40000px">
                            <button>
                                <img src="../../arquivos/imagens/buttons/btnLupa.png"  style="width:40px;">
                            </button>
                        </td>
                    </tr>
                </form>

                
                <?php
                    while($dado = $con->fetch_array()){ 
                ?>
                    <tr class="texto">
                        <a href = "novoConvidado.php?codConvidado=<?php echo $dado['codConvidado'];?>">
                            <td style="padding-left: 10px;">
                                <input type="text" disabled name="codConvidado<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['codConvidado'];?>" size="4" class="texto" style="text-align: left;"/> 
                            </td>
                        </a>
                        <td>
                            <input type="text" disabled name="nomeCompleto<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['nomeConvidado'];?>" size="20" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <input type="text" disabled name="codConvite<?php echo $dado['codConvidado'];?>" placeholder="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="10" class="texto" style="text-align: left;"/> 
                        </td>
                        <td>
                            <?php
                                $faixaEtaria = $dado['faixaEtaria'];
                                if ($faixaEtaria == 'A'){
                                    $nome_faixaEtaria = 'Adulto';
                                }else if($faixaEtaria == 'C'){
                                    $nome_faixaEtaria = 'Criança';
                                }
                            ?>

                            <input type="text" disabled name="faixaEtaria<?php echo $dado['codConvidado'];?>" placeholder="codConvite" value="<?php echo $nome_faixaEtaria;?>" size="6" class="texto" style="text-align: left;"/> 
                        </td>

                        <td>
                            <input type="text" disabled name="cpf<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['cpfConvidado'];?>" placeholder="não inseriu" size="12" class="texto" style="text-align: left;"/> 
                        </td>

                        <td class="texto"  style="padding: 10px;">
                            <?php
                                $presenca = $dado['presenca'];
                                if ($presenca == 'P'){
                                    $nome_presenca = 'Pendente';
                                }else if($presenca == 'C'){
                                    $nome_presenca = 'Confirmado';
                                }else if($presenca == 'F'){
                                    $nome_presenca = 'Faltará';
                                }

                            ?>
                            <input type="text" disabled name="presenca<?php echo $dado['codConvidado'];?>" placeholder="codConvite" value="<?php echo $nome_presenca;?>" size="10" class="texto" style="text-align: left;"/> 
                        </td>
                        <td style="padding: 10px">
                            <?php
                                if($dado['fk_codFuncao'] != 'NO' && $dado['fk_codFuncao'] != 'NA'){
                            ?>
                                    <a href="../bd/deleteUsuario.php?codConvidado=<?php echo $dado['codConvidado']; ?>">
                                        <img src="../../arquivos/imagens/buttons/lixeira.png" style="height:20px"/>
                                    </a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                    }  
                ?>
                
            </table>
            <?php
                    if ($quantidade == 0){

                    echo "<h2 class='texto' style='text-align: center;'>
                        Nenhum convidado encontrado!
                    </h2>";
                    }
                ?>
    </body>
</html>
<script>
    function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}
</script>