<?php
    include_once ("conexao.php");  
    session_start();

    $consultaConvidado = "   SELECT codConvidado, 
                                    nomeConvidado, 
                                    fk_codConvite, 
                                    fk_codNucleoConvidado, 
                                    sexo, 
                                    faixaEtaria, 
                                    noivo, 
                                    fk_codFuncao, 
                                    fk_mesa,
                                    presenca, 
                                    cpfConvidado,
                                    dataNascimento
                               FROM convidado";
    $conConvidado = mysqli_query($conn, $consultaConvidado);

    $consultaNucleoConvidado = "SELECT codNucleo,
                                    nomeNucleo
                               FROM nucleoConvidado";
    $conNucleoConvidado = mysqli_query($conn, $consultaNucleoConvidado);

    $consultaFuncao = "       SELECT codFuncao,
                                    nomeFuncao,
                                    qtdFuncao
                               FROM Funcao";
    $conFuncao = mysqli_query($conn, $consultaFuncao);

    $consultaMensagem = "SELECT codMensagem,
                                mensagem, 
                                nome
                           FROM mensagem 
                       ORDER BY codMensagem";
    $conMensagem = mysqli_query($conn, $consultaMensagem);

    $consultaInformacoesCasamento = "SELECT  codInfo,
                                             nomeInfo,
                                             conteudoInfo,
                                             imagem
                                       FROM  casamento";
    $conInfoCasamento =   mysqli_query($conn, $consultaInformacoesCasamento);  

    $consultaMesas = "SELECT codMesa,
                                        nomeMesa 
                                   FROM mesa";
     $conMesas =   mysqli_query($conn, $consultaMesas);  
     
     $consultaFornecedor = "  SELECT codFornecedor, 
                                    nomeFornecedor, 
                                    valorFornecedor, 
                                    pagoPor,
                                    codConvidadoPagou
                               FROM fornecedor";
    $conFornecedor = mysqli_query($conn, $consultaFornecedor);

    include_once ("selectVariaveisInfoCasamento.php");
    include_once ("varRelatorio.php");
?>