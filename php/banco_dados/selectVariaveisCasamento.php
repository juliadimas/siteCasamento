<?php
    include_once ("selects.php");

    while($dadoInfoCasamento = $conInfoCasamento->fetch_array()){ 
        if ($dadoInfoCasamento ['nomInfo'] == 'nomeCompletoNoivo'){
            $nomeCompletoNoivo = $dadoInfoCasamento ['conteudoInfo'];
            $primeiroNomeNoivo = explode(" ", $nomeCompletoNoivo);
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'nomeCompletoNoiva'){
            $nomeCompletoNoiva = $dadoInfoCasamento ['conteudoInfo'];
            $primeiroNomeNoiva = explode(" ", $nomeCompletoNoiva);
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'apelidoNoivo'){
            $apelidoNoivo = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'apelidoNoiva'){
            $apelidoNoiva = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'localCerimonia'){
            $localCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'enderecoCerimonia'){
            $enderecoCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'horarioCerimonia'){
            $horarioCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'localizacaoCerimonia'){
            $localizacaoCerimonia = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'localRecepcao'){
            $localRecepcao = $dadoInfoCasamento ['conteudoInfo'];
        }elseif ($dadoInfoCasamento ['nomInfo'] == 'localizacaoRecepcao'){
            $localizacaoRecepcao = $dadoInfoCasamento ['conteudoInfo'];
        }	    
    }
?>