<?php
    include_once ("selectTabelaCompleta.php");

          $qtdSexo = "SELECT sexo, 
                        COUNT(sexo) as count
                        FROM convidado 
                       WHERE codConvidado > 0 
                    GROUP BY sexo";
    $conQtdSexo = mysqli_query($conn, $qtdSexo);

    while($dadoQtdSexo = $conQtdSexo->fetch_array()){ 
        if ($dadoQtdSexo['sexo'] == 'F'){$_SESSION['qtdSexoFem'] = $dadoQtdSexo['count'];}
        if ($dadoQtdSexo['sexo'] == 'M'){$_SESSION['qtdSexoMasc'] = $dadoQtdSexo['count'];}
    }
    if(empty($_SESSION['qtdSexoFem'])){$_SESSION['qtdSexoFem'] = 0;}
    if(empty($_SESSION['qtdSexoMasc'])){$_SESSION['qtdSexoMasc'] = 0;}

    $qtdFaixaEtaria = "   SELECT faixaEtaria, 
                            COUNT(faixaEtaria) as count
                            FROM convidado 
                           WHERE codConvidado > 0 
                        GROUP BY faixaEtaria";
    $conQtdFaixaEtaria = mysqli_query($conn, $qtdFaixaEtaria);

    while($dadoQtdFaixaEtaria = $conQtdFaixaEtaria->fetch_array()){ 
        if ($dadoQtdFaixaEtaria['faixaEtaria'] == 'A'){$_SESSION['qtdAdultos'] = $dadoQtdFaixaEtaria['count'];}
        if ($dadoQtdFaixaEtaria['faixaEtaria'] == 'C'){$_SESSION['qtdCriancas'] = $dadoQtdFaixaEtaria['count'];}
    }
    if(empty($_SESSION['qtdAdultos'])){$_SESSION['qtdAdultos'] = 0;}
    if(empty($_SESSION['qtdCriancas'])){$_SESSION['qtdCriancas'] = 0;}

    $qtdPorNoivo = "  SELECT noivo, 
                        COUNT(noivo) as count 
                        FROM convidado 
                       WHERE codConvidado > 0 
                    GROUP BY noivo;";
    $conQtdPorNoivo = mysqli_query($conn, $qtdPorNoivo);

    while($dadoQtdPorNoivo = $conQtdPorNoivo->fetch_array()){ 
        if ($dadoQtdPorNoivo['noivo'] == 'J'){$_SESSION['qtdConvJulia'] = $dadoQtdPorNoivo['count'];}
        if ($dadoQtdPorNoivo['noivo'] == 'R'){$_SESSION['qtdConvRian'] = $dadoQtdPorNoivo['count'];}
    }
    if(empty($_SESSION['qtdConvJulia'])){$_SESSION['qtdConvJulia'] = 0;}
    if(empty($_SESSION['qtdConvRian'])){$_SESSION['qtdConvRian'] = 0;}

    $qtdPresenca = "  SELECT presenca, 
                       COUNT(presenca) as count 
                        FROM convidado 
                       WHERE codConvidado > 0 
                    GROUP BY presenca;";
    $conQtdPresenca = mysqli_query($conn, $qtdPresenca);

    while($dadoQtdPresenca = $conQtdPresenca->fetch_array()){ 
        if ($dadoQtdPresenca['presenca'] == 'P'){$_SESSION['qtdPresPendente'] = $dadoQtdPresenca['count'];}
        if ($dadoQtdPresenca['presenca'] == 'C'){$_SESSION['qtdPresConfirmado'] = $dadoQtdPresenca['count'];}
        if ($dadoQtdPresenca['presenca'] == 'F'){$_SESSION['qtdPresFaltante'] = $dadoQtdPresenca['count'];}
    }
    if(empty($_SESSION['qtdPresPendente'])){$_SESSION['qtdPresPendente'] = 0;}
    if(empty($_SESSION['qtdPresConfirmado'])){$_SESSION['qtdPresConfirmado'] = 0;}
    if(empty($_SESSION['qtdPresFaltante'])){$_SESSION['qtdPresFaltante'] = 0;}
?>