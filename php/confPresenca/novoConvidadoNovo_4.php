<?php 
    include_once ("../banco_dados/selects.php");

    while($dadoMax = $conMax->fetch_array()){ 
        $max = $dadoMax['max'];
    }
    $max = $max + 1;    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body STYLE="text-align: center;">
                </br></br></br></br>

        <form border="none" method="POST"><div class="texto">
            <tr class="texto">
                <td  style="padding: 10px;">
                    Código: <input type="text" disabled name="codConvidado" value="<?php echo $max; ?>" size="4" class="texto" style="text-align: left;"/> 
                    Nome: <input type="text" name="nomeCompleto" size="20" class="texto" style="text-align: left;"/> 
                    CPF: <input type="text" name="cpf" placeholder="000.000.000-00" size="12" class="texto" style="text-align: left;"/> 
                </td></BR>
                <td  style="padding: 10px;">
                    Faixa Etária:
                    <select name="faixaEtaria" class="texto">
                        <option value="A">Adulto</option>
                        <option value="C">Criança</option>
                    </select>

                    Função:
                    <select name="funcao" class="texto">
                    <?php
                        while($dado = $conTipFuncao->fetch_array()){ 

                    ?>
                        <option value="<?php echo $dado['codTipFuncao']; ?>"><?php echo $dado['nomTipFuncao']; ?></option>
                    <?php
                        }
                    ?>
                    </select>

                    Presença:
                    <select name="presenca" class="texto">
                        <option value="P">Pendente</option>
                        <option value="C">Confirmado</option>
                        <option value="F">Faltarei</option>
                    </select>
                </td>
                <td style="padding: 10px;">
                    Tipo de Convidado:
                    <select name="funcao" class="texto">
                    <?php
                        while($dadoC = $conTipConvidado->fetch_array()){ 

                    ?>
                        <option value="<?php echo $dadoC['codTipoConvidado']; ?>"><?php echo $dadoC['nomTipoConvidado']; ?></option>
                    <?php
                        }
                    ?>
                    </select>

                </td>
            </tr></br>
        </div></form>
    </body>
</html>