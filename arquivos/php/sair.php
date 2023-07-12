<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header("Location: ../../../casamentoSite/convidado/php/conv_index.php");
?>