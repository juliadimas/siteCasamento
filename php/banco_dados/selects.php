<?php
    include ("../head.php");
    include_once ("conexao.php");

    if (empty($_GET['usu'])){
        include "../menus/menuConvidado.php";
    }elseif ($_GET['usu'] == 'N'){
        include "../menus/menuNoivos.php";
    }elseif ($_GET['usu'] == 'C'){
        include "../menus/menuConvidado.php";
    }

    $consultaTipConvidado = "SELECT codTipoConvidado,
                                    nomTipoConvidado
                               FROM tipConvidado";
    $conTipConvidado = mysqli_query($conn, $consultaTipConvidado);

    $consultaTipFuncao = "   SELECT codTipFuncao,
                                    nomTipFuncao
                               FROM tipFuncao";
    $conTipFuncao = mysqli_query($conn, $consultaTipFuncao);

    $consultaConvidado = "   SELECT codConvidado, 
                                    nomConvidado, 
                                    fk_codConvite, 
                                    fk_codTipConvidado, 
                                    sexo, 
                                    faixaEtaria, 
                                    noivo, 
                                    fk_codTipFuncao, 
                                    presenca, 
                                    cpfConvidado
                               FROM convidado";
    $conConvidado = mysqli_query($conn, $consultaConvidado);

    $consultaMaxConvidado = " SELECT max(codConvidado) as max 
                                FROM convidado"; 
    $conMax = mysqli_query($conn, $consultaMaxConvidado);
    
    $consultaConvidadoSemCodConvite =   $consultaConvidado .
                                        " WHERE fk_codConvite is null
                                         ORDER BY codConvidado";

    $consultaFornecedor = "  SELECT codFornecedor, 
                                    nomFornecedor, 
                                    areaFuncao, 
                                    tempo_hora, 
                                    valorTotal, 
                                    qtdParcelas, 
                                    pagoPor
                               FROM fornecedor";
    $conFornecedor = mysqli_query($conn, $consultaFornecedor);

    $consultaMensagem = "SELECT mensagem, 
                                nome
                           FROM mensagem 
                       ORDER BY codMensagem";
    $conMensagem = mysqli_query($conn, $consultaMensagem);

    $consultaInformacoesCasamento = "SELECT nomInfo,
                                            conteudoInfo
                                       FROM informacoesCasamento";
    $conInfoCasamento =   mysqli_query($conn, $consultaInformacoesCasamento);  

    include_once ("selectVariavel.php");
?>