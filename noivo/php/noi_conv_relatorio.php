<?php 
    include ("noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");    

    $where = "WHERE codConvidado > 0 ";

    $qtdSexoFem = $_SESSION['qtdSexoFem'];
    $qtdSexoMasc = $_SESSION['qtdSexoMasc'];

    $sqlSexoF = "SELECT COUNT(*) as countMulheres FROM convidado ";
    $sqlSexoM = "SELECT COUNT(*) as countHomens FROM convidado ";

    if(empty($_POST['fem'])){
        $altFem = 'N';
    }else if($_POST['fem'] == 'on'){
        $altFem = 'S';
    }
    if(empty($_POST['masc'])){
        $altMasc = 'N';
    }else if($_POST['masc'] == 'on'){
        $altMasc = 'S';
    }

    if(($altFem == 'S') && ($altMasc == 'S')){
        $whereSexo = " AND (sexo = 'F' OR sexo = 'M') ";
    }else if($altFem == 'S'){
        $whereSexo = " AND sexo = 'F' ";
        $qtdSexoMasc = '-';
    }else if($altMasc == 'S'){
        $whereSexo = " AND sexo = 'M' ";
        $qtdSexoFem = '-';
    }else{
        $qtdSexoFem = $_SESSION['qtdSexoFem'];
        $qtdSexoMasc = $_SESSION['qtdSexoMasc'];
        $whereSexo = ' ';
    }

    $qtdAdultos = $_SESSION['qtdAdultos'];
    $qtdCriancas = $_SESSION['qtdCriancas'];

    $sqlFEadulto = "SELECT COUNT(*) as countAdultos FROM convidado ";
    $sqlFEcrianca = "SELECT COUNT(*) as countCriancas FROM convidado ";

    if(empty($_POST['adulto'])){
        $altAdulto = 'N';
    }else if($_POST['adulto'] == 'on'){
        $altAdulto = 'S';
    }
    if(empty($_POST['crianca'])){
        $altCrianca = 'N';
    }else if($_POST['crianca'] == 'on'){
        $altCrianca = 'S';
    }

    if(($altAdulto == 'S') && ($altCrianca == 'S')){
        $whereFE = " AND (faixaEtaria = 'A' OR faixaEtaria = 'C') ";
    }else if($altAdulto == 'S'){
        $whereFE = " AND faixaEtaria = 'A' ";
        $qtdCriancas = '-';
    }else if($altCrianca == 'S'){
        $whereFE = " AND faixaEtaria = 'C' ";
        $qtdAdultos = '-';
    }else{
        $qtdAdultos = $_SESSION['qtdAdultos'];
        $qtdCriancas = $_SESSION['qtdCriancas'];
        $whereFE = ' ';
    }

    $qtdConvJulia = $_SESSION['qtdConvJulia'];
    $qtdConvRian = $_SESSION['qtdConvRian'];

    $sqlNoivoJulia = "SELECT COUNT(*) as countJulia FROM convidado ";
    $sqlNoivoRian = "SELECT COUNT(*) as countRian FROM convidado ";

    if(empty($_POST['julia'])){
        $altJulia = 'N';
    }else if($_POST['julia'] == 'on'){
        $altJulia = 'S';
    }
    if(empty($_POST['rian'])){
        $altRian = 'N';
    }else if($_POST['rian'] == 'on'){
        $altRian = 'S';
    }
    if(($altJulia == 'S') && ($altRian == 'S')){
        $whereNoivo = " AND (noivo = 'J' OR noivo = 'R') ";
    }else if($altJulia == 'S'){
        $whereNoivo = " AND noivo = 'J' ";
        $qtdConvRian = '-';
    }else if($altRian == 'S'){
        $whereNoivo = " AND noivo = 'R' ";
        $qtdConvJulia = '-';
    }else{
        $qtdConvJulia = $_SESSION['qtdConvJulia'];
        $qtdConvRian = $_SESSION['qtdConvRian'];
        $whereNoivo = ' ';
    }

    $qtdPresPendente = $_SESSION['qtdPresPendente'];
    $qtdPresConfirmado = $_SESSION['qtdPresConfirmado'];
    $qtdPresFaltante = $_SESSION['qtdPresFaltante'];

    $sqlPresencaPendente = "SELECT COUNT(*) as countPendente FROM convidado ";
    $sqlPresencaConfirmado = "SELECT COUNT(*) as countConfirmado FROM convidado ";
    $sqlPresencaFaltante = "SELECT COUNT(*) as countFaltante FROM convidado ";

    if(empty($_POST['pendente'])){
        $altPendente = 'N';
    }else if($_POST['pendente'] == 'on'){
        $altPendente = 'S';
    }if(empty($_POST['confirmado'])){
        $altConfirmado = 'N';
    }else if($_POST['confirmado'] == 'on'){
        $altConfirmado = 'S';
    }
    if(empty($_POST['faltante'])){
        $altFaltante = 'N';
    }else if($_POST['faltante'] == 'on'){
        $altFaltante = 'S';
    }
    if(($altPendente == 'S') && ($altConfirmado == 'S') && ($altFaltante == 'S')){
        $wherePresenca = " AND (presenca = 'P' OR presenca = 'C' OR presenca = 'F') ";
    }else if(($altPendente == 'S') && ($altConfirmado == 'S')){
        $wherePresenca = " AND (presenca = 'P' OR presenca = 'C') ";
        $qtdPresFaltante = '-';
    }else if(($altPendente == 'S') && ($altFaltante == 'S')){
        $wherePresenca = " AND (presenca = 'P' OR presenca = 'F') ";
        $qtdPresConfirmado = '-';
    }else if(($altConfirmado == 'S') && ($altFaltante == 'S')){
        $wherePresenca = " AND (presenca = 'C' OR presenca = 'F') ";
        $qtdPresPendente = '-';
    }else if($altPendente == 'S'){
        $wherePresenca = " AND presenca = 'P' ";
        $qtdPresConfirmado = '-';
        $qtdPresFaltante = '-';
    }else if($altConfirmado == 'S'){
        $wherePresenca = " AND presenca = 'C' ";
        $qtdPresPendente = '-';
        $qtdPresFaltante = '-';
    }else if($altFaltante == 'S'){
        $wherePresenca = " AND presenca = 'F' ";
        $qtdPresConfirmado = '-';
        $qtdPresPendente = '-';
    }else{
        $qtdPresPendente = $_SESSION['qtdPresPendente'];
        $qtdPresConfirmado = $_SESSION['qtdPresConfirmado'];
        $qtdPresFaltante = $_SESSION['qtdPresFaltante'];
        $wherePresenca = ' ';
    }

    if ($altFem == 'S') {
        $sqlSexoFemininocomWhere =  $sqlSexoF 
                                    . $where 
                                    . " AND sexo = 'F' " 
                                    . $whereFE . ' ' 
                                    . $whereNoivo . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdSexoFeminino = mysqli_query($conn, $sqlSexoFemininocomWhere);
        while($dadoQtdSexoFem = $conQtdSexoFeminino->fetch_array()){
            $qtdSexoFem = $dadoQtdSexoFem['countMulheres'];
        }
    }
    if ($altMasc == 'S') {
        $sqlSexoMaculinocomWhere =  $sqlSexoM 
                                    . $where 
                                    . " AND sexo = 'M' " 
                                    . $whereFE . ' ' 
                                    . $whereNoivo . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdSexoMaculino = mysqli_query($conn, $sqlSexoMaculinocomWhere);
        while($dadoQtdSexoMasc = $conQtdSexoMaculino->fetch_array()){
            $qtdSexoMasc = $dadoQtdSexoMasc['countHomens'];
        }
    }
    if ($altAdulto == 'S') {
        $sqlAdultocomWhere =  $sqlFEadulto 
                                    . $where 
                                    . " AND faixaEtaria = 'A' " 
                                    . $whereSexo . ' ' 
                                    . $whereNoivo . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdAdulto = mysqli_query($conn, $sqlAdultocomWhere);
        while($dadoQtdFEadulto = $conQtdAdulto->fetch_array()){
            $qtdAdultos = $dadoQtdFEadulto['countAdultos'];
        }
    }
    if ($altCrianca == 'S') {
        $sqlCriancacomWhere =  $sqlFEcrianca 
                                    . $where 
                                    . " AND faixaEtaria = 'C' " 
                                    . $whereSexo . ' ' 
                                    . $whereNoivo . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdCrianca = mysqli_query($conn, $sqlCriancacomWhere);
        while($dadoQtdFEcrianca = $conQtdCrianca->fetch_array()){
            $qtdCriancas = $dadoQtdFEcrianca['countCriancas'];
        }
    }
    if ($altJulia == 'S') {
        $sqlJuliacomWhere =  $sqlNoivoJulia 
                                    . $where 
                                    . " AND noivo = 'J' " 
                                    . $whereSexo . ' ' 
                                    . $whereFE . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdJulia = mysqli_query($conn, $sqlJuliacomWhere);
        while($dadoNoivoJulia = $conQtdJulia->fetch_array()){
            $qtdConvJulia = $dadoNoivoJulia['countJulia'];
        }
    }
    if ($altRian == 'S') {
        $sqlRiancomWhere =  $sqlNoivoRian 
                                    . $where 
                                    . " AND noivo = 'R' " 
                                    . $whereSexo . ' ' 
                                    . $whereFE . ' ' 
                                    . $wherePresenca; //sexo feminino   
        $conQtdRian = mysqli_query($conn, $sqlRiancomWhere);
        while($dadoNoivoRian = $conQtdRian->fetch_array()){
            $qtdConvRian = $dadoNoivoRian['countRian'];
        }
    }
    if ($altPendente == 'S') {
        $sqlPendentecomWhere =  $sqlPresencaPendente 
                                    . $where 
                                    . " AND presenca = 'P' " 
                                    . $whereSexo . ' ' 
                                    . $whereFE . ' ' 
                                    . $whereNoivo; //sexo feminino   
        $conQtdPendente = mysqli_query($conn, $sqlPendentecomWhere);
        while($dadoConvPendente = $conQtdPendente->fetch_array()){
            $qtdPresPendente = $dadoConvPendente['countPendente'];
        }
    }
    if ($altConfirmado == 'S') {
        $sqlConfirmadocomWhere =  $sqlPresencaConfirmado 
                                    . $where 
                                    . " AND presenca = 'C' " 
                                    . $whereSexo . ' ' 
                                    . $whereFE . ' ' 
                                    . $whereNoivo; //sexo feminino   
        $conQtdConfirmado = mysqli_query($conn, $sqlConfirmadocomWhere);
        while($dadoConvConfirmado = $conQtdConfirmado->fetch_array()){
            $qtdPresConfirmado = $dadoConvConfirmado['countConfirmado'];
        }
    }
    if ($altFaltante == 'S') {
        $sqlFaltantecomWhere =  $sqlPresencaFaltante 
                                    . $where 
                                    . " AND presenca = 'F' " 
                                    . $whereSexo . ' ' 
                                    . $whereFE . ' ' 
                                    . $whereNoivo; //sexo feminino   
        $conQtdFaltante = mysqli_query($conn, $sqlFaltantecomWhere);
        while($dadoConvFaltante = $conQtdFaltante->fetch_array()){
            $qtdPresFaltante = $dadoConvFaltante['countFaltante'];
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <style tyle="css/text">
            .texto {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form method="POST" style="text-align: center;">
            <tr>
                <td>
                    <p class="texto">Sexo:
                        <input type="checkbox" <?php if($altFem == 'S'){echo "checked";} ?> name="fem"/> Feminino
                        <input type="checkbox" <?php if($altMasc == 'S'){echo "checked";} ?> name="masc"/> Masculino
                    </p>
                </td>
                <td>
                    <p class="texto">Faixa Etária:
                        <input type="checkbox" <?php if($altAdulto == 'S'){echo "checked";} ?> name="adulto"/> Adulto
                        <input type="checkbox" <?php if($altCrianca == 'S'){echo "checked";} ?> name="crianca"/> Criança
                    </p>
                </td>
                <td>
                    <p class="texto">Noivo:
                        <input type="checkbox" <?php if($altJulia == 'S'){echo "checked";} ?> name="julia"/> Júlia
                        <input type="checkbox" <?php if($altRian == 'S'){echo "checked";} ?> name="rian"/> Rian
                    </p>
                </td>
                <td>
                    <p class="texto">Presença:
                        <input type="checkbox" <?php if($altPendente == 'S'){echo "checked";} ?> name="pendente"/> Pendente
                        <input type="checkbox" <?php if($altConfirmado == 'S'){echo "checked";} ?> name="confirmado"/> Confirmado
                        <input type="checkbox" <?php if($altFaltante == 'S'){echo "checked";} ?> name="faltante"/> Faltante
                    </p>
                </td>
                <button>
                    <img src="../../arquivos/imagens/buttons/btnPesquisar.png"  style="width:100px;">
                </button>
            </tr>
        </form>
        <table>
            <header>
                <tr class="titulo" style="font-size: 20px">
                    <td style="padding: 10px">Mulheres</td>
                    <td style="padding: 10px">Homens</td>
                    <td style="padding: 10px">Adultos</td>
                    <td style="padding: 10px">Crianças</td>
                    <td style="padding: 10px">Júlia</td>
                    <td style="padding: 10px">Rian</td>
                    <td style="padding: 10px">Pendetes</td>
                    <td style="padding: 10px">Confirmados</td>
                    <td style="padding: 10px">Faltantes</td>
                </tr>
            </header>
            <tr class="texto">
                <td style="padding: 10px"><?php echo $qtdSexoFem; ?></td>
                <td style="padding: 10px"><?php echo $qtdSexoMasc; ?></td>
                <td style="padding: 10px"><?php echo $qtdAdultos; ?></td>
                <td style="padding: 10px"><?php echo $qtdCriancas; ?></td>
                <td style="padding: 10px"><?php echo $qtdConvJulia; ?></td>
                <td style="padding: 10px"><?php echo $qtdConvRian; ?></td>
                <td style="padding: 10px"><?php echo $qtdPresPendente; ?></td>
                <td style="padding: 10px"><?php echo $qtdPresConfirmado; ?></td>
                <td style="padding: 10px"><?php echo $qtdPresFaltante; ?></td>
            </tr>
        </table>
    </body>
</html>