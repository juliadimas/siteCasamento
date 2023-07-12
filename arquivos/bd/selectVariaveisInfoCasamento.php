<?php
    include_once ("selectTabelaCompleta.php");

    while($dadoInfoCasamento = $conInfoCasamento->fetch_array()){ 
        if ($dadoInfoCasamento ['nomeInfo'] == 'nomeCompletoNoivo'){
            $nomeCompletoNoivo = $dadoInfoCasamento ['conteudoInfo'];
            $primeiroNomeNoivo = explode(" ", $nomeCompletoNoivo);
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'nomeCompletoNoiva'){
            $nomeCompletoNoiva = $dadoInfoCasamento ['conteudoInfo'];
            $primeiroNomeNoiva = explode(" ", $nomeCompletoNoiva);
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'apelidoNoivo'){
            $apelidoNoivo = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'apelidoNoiva'){
            $apelidoNoiva = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'localCerimonia'){
            $localCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'enderecoCerimonia'){
            $enderecoCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'horarioCerimonia'){
            $horarioCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'localizacaoCerimonia'){
            $localizacaoCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'localRecepcao'){
            $localRecepcao = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomeInfo'] == 'localizacaoRecepcao'){
            $localizacaoRecepcao = $dadoInfoCasamento ['conteudoInfo'];
        }	    
    }
?>