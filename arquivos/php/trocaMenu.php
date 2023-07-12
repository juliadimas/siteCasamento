<?php
    if (empty($_SESSION['tipFuncao'])){
        include_once("../../convidado/php/conv_menu.php");
    }else{
        $tipFuncao = $_SESSION['tipFuncao'];

        if ($tipFuncao == 'C'){ //Convidado
            include_once("../../convidado/php/conv_menu.php");
        }else if($tipFuncao == 'F'){ //Fornecedor
            
        }else if($tipFuncao == 'H'){ //Convidado de Honra
            
        }else if($tipFuncao == 'N'){ //Noivos
            include_once("../../noivo/php/noi_menu.php");
        }else if($tipFuncao == 'M'){ //Padrinhos e Madrinhas
            
        }else if($tipFuncao == 'P'){ //Pais
            
        }else {
            include_once("../../convidado/php/conv_menu.php");
        }
    }
?>