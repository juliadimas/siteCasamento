<?php 
    include ("noi_head.php");
    include_once ("../../arquivos/bd/selectTabelaCompleta.php");

    if(empty($_SESSION['sexo'])){

    }
    if(empty($_SESSION['faixaEtaria'])){

    }
    if(empty($_SESSION['noivo'])){

    }
    if(empty($_SESSION['funcao'])){

    }
    if(empty($_SESSION['mesaReservada'])){

    }
    if(empty($_SESSION['numMesaReservada'])){

    }


?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
        <form method="GET">
            Sexo:
            <input type="radio" name="sexo" value="F"/> Feminino
            <input type="radio" name="sexo" value="M"/> Masculino
            <input type="radio" name="sexo" value="S"/> Não filtrar por sexo
                </br>
            Faixa Etária:
            <input type="radio" name="faixaEtaria" value="A"/> Adultos
            <input type="radio" name="faixaEtaria" value="C"/> Crianças
            <input type="radio" name="faixaEtaria" value="S"/> Não filtrar por faixa etária
                </br>
            Função:
            <input type="checkbox" name="funcaoC" value="C"/> Convidados
            <input type="checkbox" name="funcaoD" value="D"/> Daminhas
            <input type="checkbox" name="funcaoF" value="F"/> Fornecedores
            <input type="checkbox" name="funcaoJ" value="J"/> Pajem
            <input type="checkbox" name="funcaoM" value="M"/> Madrinhas
            <input type="checkbox" name="funcaoN" value="N"/> Noivos
            <input type="checkbox" name="funcaoP" value="P"/> Padrinhos
                </br>
            Mesa:
            <input type="radio" name="mesa" value="R"/> Reservadas
            <input type="radio" name="mesa" value="N"/> Não reservada
            <input type="radio" name="mesa" value="S"/> Não filtrar por mesa
                </br>
            Código da Mesa:
            <select name="codMesa">
                <option value=""></option>
            <?php
            while($dado = $conMesasReservadas->fetch_array()){ 
                $codMesa = $dado['codMesa'];
                $nomMesa = $dado['nomMesa'];

                $str_nome = $codMesa . ' - ' . $nomMesa;
                ?>
                <option value="<?php echo $codMesa;?>"><?php echo $str_nome; ?></option>;
            <?php
            }?>

            </select>
                </br>
            <button>
                <img src="../../arquivos/imagens/buttons/btnPesquisar.png" style="height: 100px">
            </button>
        </form>
    </body>
</html>