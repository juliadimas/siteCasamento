<?php
    session_start();
    if(empty($_SESSION['tipFuncao'])){
        $tipFuncao = 'C';
    }else{
        $tipFuncao = $_SESSION['tipFuncao'];
    }

    
            include_once("noi_menu.php");
        
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="../../arquivos/css/estiloGeral.css"/>
    <link rel="stylesheet" href="../../arquivos/css/estiloPadrao.css"/>
    <link rel="stylesheet" href="../../arquivos/css/estiloMenu.css"/>
    <title><?php echo $tipFuncao; ?> - Júlia e Rian</title>

    <link href="https://fonts.cdnfonts.com/css/brotherhood-script" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type="text/css"/>
    <link href="https://fonts.cdnfonts.com/css/mermaid" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/robecha-daniera" rel="stylesheet">
</head>