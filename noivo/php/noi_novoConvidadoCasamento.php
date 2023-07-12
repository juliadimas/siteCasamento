<?php 
    include ("noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");

    $consultaFuncaoSemNoivos = $consultaFuncao 
                                . " WHERE codFuncao <> 'NO'"
                                . " AND codFuncao <> 'NA'";
    $conFuncaoSemNoivos = mysqli_query($conn, $consultaFuncaoSemNoivos);
    $consultaFuncaoSoNoivos = $consultaConvidado 
                                . " WHERE fk_codFuncao = 'NO'"
                                . " OR fk_codFuncao = 'NA'";
    $conFuncaoSoNoivos = mysqli_query($conn, $consultaFuncaoSoNoivos);
    $consultaMesasSemSerDosNoivos = $consultaMesas 
                            . " WHERE codMesa <> '01'";
    $conMesasSemSerDosNoivos = mysqli_query($conn, $consultaMesasSemSerDosNoivos);

    if (empty($_POST['aposSalvar'])){
        $aposSalvar = 'A';
    }else{
        $aposSalvar = $_POST['aposSalvar'];
    }

    if(empty($_POST['nome'])){
        $nome = '';
    }else{
        $nome = $_POST['nome'];
    }
    if(empty($_POST['dt_nascimento'])){
        $dt_nascimento = '';
    }else{
        $dt_nascimento = $_POST['dt_nascimento'];
    }
    if(empty($_POST['cpf'])){
        $cpf = '';
    }else{
        $cpf = $_POST['cpf'];
    }
    if(empty($_POST['nucleo'])){
        $nucleo = '';
    }else{
        $nucleo = $_POST['nucleo'];
    }
    if(empty($_POST['funcao'])){
        $funcao = '';
    }else{
        $funcao = $_POST['funcao'];
    }
    if(empty($_POST['faixaEtaria'])){
        $faixaEtaria = '';
    }else{
        $faixaEtaria = $_POST['faixaEtaria'];
    }
    if(empty($_POST['sexo'])){
        $sexo = '';
    }else{
        $sexo = $_POST['sexo'];
    }
    if(empty($_POST['noivo'])){
        $noivo = '';
    }else{
        $noivo = $_POST['noivo'];
    }
    if(empty($_POST['presenca'])){
        $presenca = '';
    }else{
        $presenca = $_POST['presenca'];
    }
    if(empty($_POST['mesa'])){
        $mesa = '';
    }else{
        $mesa = $_POST['mesa'];
    }

    if(strlen($nome) == 0){
        if( strlen($nucleo) > 0 ||
            strlen($sexo) > 0 ||
            strlen($noivo) > 0 ||
            strlen($faixaEtaria) > 0){
                echo "<script>confirm('Você não inseriu um nome');</script>";
        }
    }else if(strlen($nucleo) == 0){
        if( strlen($nome) > 0 ||
            strlen($sexo) > 0 ||
            strlen($noivo) > 0 ||
            strlen($faixaEtaria) > 0){
                echo "<script>confirm('Você não inseriu o núcleo');</script>";
        }
    }else if(strlen($faixaEtaria) == 0){
        if( strlen($nome) > 0 ||
            strlen($nucleo) > 0 ||
            strlen($sexo) > 0 ||
            strlen($noivo) > 0){
                echo "<script>confirm('Você não inseriu a faixa etária');</script>";
        }
    }else if(strlen($sexo) == 0){
        if( strlen($nome) > 0 ||
            strlen($nucleo) > 0 ||
            strlen($noivo) > 0 ||
            strlen($faixaEtaria) > 0){
                echo "<script>confirm('Você não inseriu o sexo');</script>";
        }
    }else if(strlen($noivo) == 0){
        if( strlen($nome) > 0 ||
            strlen($nucleo) > 0 ||
            strlen($sexo) > 0 ||
            strlen($faixaEtaria) > 0){
                echo "<script>confirm('Você não inseriu quem está convidando');</script>";
        }
    }else{
        $nome = filter_input(INPUT_POST, 'nome');
        $nucleo = filter_input(INPUT_POST, 'nucleo');
        $sexo = filter_input(INPUT_POST, 'sexo');
        $faixaEtaria = filter_input(INPUT_POST, 'faixaEtaria');
        $noivo = filter_input(INPUT_POST, 'noivo');
        $funcao = filter_input(INPUT_POST, 'funcao');
        $mesa = filter_input(INPUT_POST, 'mesa');
        $presenca = filter_input(INPUT_POST, 'nome');
        $campos = "nomeConvidado, fk_codNucleoConvidado, sexo, faixaEtaria, noivo, fk_codFuncao, fk_mesa, presenca";
        $valores = "'".$nome ."', '".$nucleo ."', '".$sexo ."', '".$faixaEtaria."', '".$noivo."', '". $funcao ."', '".$mesa."', '" .$presenca."'";
        if (strlen($cpf) == 14){
            $cpf = filter_input(INPUT_POST, 'cpf');
            $campos = $campos . ", cpfConvidado";
            $valores = $valores . ", '" . $cpf . "'";
        }
        if (strlen($dt_nascimento) == 10){
            $dt_nascimento = filter_input(INPUT_POST, 'dt_nascimento');
            $campos = $campos . ", dataNascimento";
            $valores = $valores . ", '" . $dt_nascimento . "'";
        }

        $palavras = explode(" ", $nome);
        $primeiroNome = $palavras[0];
        $where = " WHERE nomeConvidado = '" .$nome."' ";
        $where = $where . " AND sexo = '" .$sexo. "' ";
        $where = $where . " AND faixaEtaria = '" .$faixaEtaria. "' ";
        $where = $where . " AND noivo = '" .$noivo. "' ";
        $sqlWhere = $consultaConvidado . $where;
        $conConsutaIgual =   mysqli_query($conn, $sqlWhere); 
        $quantidade = $conConsutaIgual->num_rows;
        if($quantidade > 0){
            echo "<script>confirm('Você já inseriu esse convidado');</script>";
        }else{

            $sql = "INSERT INTO convidado (" . $campos . ") 
                    VALUES (" . $valores . ")";
            $conect = mysqli_query($conn, $sql);

            if ($conect = 1){
                $nome = '';
                $nucleo = '';
                $sexo = '';
                $faixaEtaria = '';
                $noivo = '';
                $funcao = '';
                $mesa = '';
                $presenca = '';
                $cpf = '';
                $dt_nascimento = '';
                echo "<script>confirm('Dados salvos com sucesso!');</script>";
                $_SESSION['convidadoSalvo'] = 'S';

                if($aposSalvar == 'V'){
                    header("Location: noi_conv_presencaCasamento.php");
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
            </br>
        <div style="margin-left: auto; margin-right: auto; max-width: 1000px; padding: 10px;">
        <form method="POST" class="texto" style="text-align: left;">
            Nome:<input type="text" leight="100" name="nome" value="<?php echo $nome;?>" size="60" class="texto"/>
                </br></br>
            Data de Nascimento:<input type="date" name="dt_nascimento" size="10" value="<?php echo $dt_nascimento;?>" class="texto"/>
            CPF:<input type="text" oninput="mascara(this)" name="cpf" value="<?php echo $cpf;?>" placeholder="000.000.000-00" size="20" class="texto"/>
                </br></br>
            Núcleo:
            <select name="nucleo" class="texto">
                <option value=""></option>
                <?php
                    while($dadoNucleoConvidado = $conNucleoConvidado->fetch_array()){ 
                        $codNucleo = $dadoNucleoConvidado['codNucleo'];
                        $nomeNucleo = $dadoNucleoConvidado['nomeNucleo'];
                        $nucleoCod = $codNucleo . ' - ' . $nomeNucleo;
                ?>
                        <option value="<?php echo $codNucleo; ?>" <?php if ($nucleo == $codNucleo){ echo "selected"; } ?>><?php echo $nucleoCod; ?></option>
                <?php
                    }
                ?>
            </select>
            Função:
            <select name="funcao" class="texto">
                <?php
                    if(strlen($funcao) == 0){
                        $funcao = 'CO';
                    }
                    while($dadoFuncaoSemFuncao = $conFuncaoSemNoivos->fetch_array()){ 
                        $codFuncao = $dadoFuncaoSemFuncao['codFuncao'];
                        $nomeFuncao = $dadoFuncaoSemFuncao['nomeFuncao'];
                        $FuncaoCod = $codFuncao . ' - ' . $nomeFuncao;
                ?>
                        <option <?php if ($funcao == $codFuncao){echo "selected";}?> value="<?php echo $codFuncao; ?>"><?php echo $FuncaoCod; ?></option>
                <?php
                    }
                ?>
            </select>
                </br></br>
            Faixa Etária: 
            <select name="faixaEtaria" class="texto">
                <option value=""></option>
                <option value="A" <?php if ($faixaEtaria == 'A'){ echo "selected"; } ?>>Adulto</option>
                <option value="C" <?php if ($faixaEtaria == 'C'){ echo "selected"; } ?>>Criança</option>
            </select>
            Sexo:
            <select name="sexo" class="texto">
                <option value=""></option>
                <option value="F" <?php if ($sexo == 'F'){ echo "selected"; } ?>>Feminino</option>
                <option value="M" <?php if ($sexo == 'M'){ echo "selected"; } ?>>Masculino</option>
            </select>
            Noivo(a):
            <select name="noivo" class="texto">
                <option value=""></option>
                <?php
                    while($dadoFuncaoSoNoivos = $conFuncaoSoNoivos->fetch_array()){ 
                        $codNoivo = $dadoFuncaoSoNoivos['codConvidado'];
                        $nomeNoivo = $dadoFuncaoSoNoivos['nomeConvidado'];
                        $palavras = explode(" ", $nomeNoivo);
                        $primeiro_nome = $palavras[0];
                        $primeiraLetra = substr($nomeNoivo, 0, 1);
                ?>
                        <option value="<?php echo $primeiraLetra; ?>" <?php if ($noivo == $primeiraLetra){ echo "selected"; } ?>><?php echo $primeiro_nome; ?></option>
                <?php
                    }
                ?>
            </select>
                </br></br>
            Presença:
            <?php
                if(strlen($presenca) == 0){
                    $presenca = 'P';
                }
            ?>
            <select name="presenca" class="texto">
                <option value="P" <?php if ($presenca == 'P'){ echo "selected"; } ?>>Pendente</option>
                <option value="C" <?php if ($presenca == 'C'){ echo "selected"; } ?>>Confirmado</option>
                <option value="F" <?php if ($presenca == 'F'){ echo "selected"; } ?>>Faltante</option>
            </select>
            Mesa:
            <?php
                if(strlen($mesa) == 0){
                    $mesa = 'LI';
                }
            ?>
            <select name="mesa" class="texto">
                <?php
                    while($dadoMesasSemSerDosNoivos = $conMesasSemSerDosNoivos->fetch_array()){ 
                        $codMesa = $dadoMesasSemSerDosNoivos['codMesa'];
                        $nomeMesa = $dadoMesasSemSerDosNoivos['nomeMesa'];
                        $mesaCod = $codMesa . ' - ' . $nomeMesa;
                ?>
                        <option <?php if ($codMesa == $mesa){echo "selected";}?> value="<?php echo $codMesa; ?>"><?php echo $mesaCod; ?></option>
                <?php
                    }
                ?>
            </select>
                </br></br>
            <div style="width: 100px;margin-left: auto; margin-right: auto;">
                <button>
                    <img src="../../arquivos/imagens/buttons/btnSalvar.png" style="width: 100px;"/>
                </button>
            </div>
            <p style="font-size: 20px">
                Após salvar: 
                <input type="radio" name="aposSalvar" value="V" <?php if($aposSalvar == 'V'){ echo "checked"; } ?>/>Voltar para todos os convidados
                <input type="radio" name="aposSalvar" value="A" <?php if($aposSalvar == 'A'){ echo "checked"; } ?>/>Adicionar novo usuário
            </p>
        </form>
        </div>
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