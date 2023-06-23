<?php 
    include_once ("../banco_dados/selects.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <body">
                </br></br></br></br>
        
        <table id="tbFornecedor" ><form method="POST" id="formFornecedor">
            <thead style="font-size: 18px;">
                <tr class="titulo" style="font-size: 20px;">
                    <th>Código </th>
                    <th>Nome </th>
                    <th>Função </th>
                    <th>Tempo (hora) </th>
                    <th>Valor Total </th>
                    <th>Valor Pago </th>
                    <th>Valor Falta </th>
                </tr>       
            </thead>
            <?php
                while($dado = $conFornecedor->fetch_array()){ 
                    $codFornecedor = $dado['codFornecedor'];
                    $consultaConta = "SELECT valorPago
                                        FROM contas
                                       WHERE fk_codFornecedor = $codFornecedor";

                $conFornecedorValores = mysqli_query($conn, $consultaConta);

                $valorPago = 0;

                while($dadoF = $conFornecedorValores->fetch_array()){ 
                    $valorPago = $valorPago + $dadoF['valorPago'];
                }

                $valorFaltante = ($dado['valorTotal']) - $valorPago;
                    
            ?>
            <tbody>
                <tr class="texto" id="linhaFornecedor">    
                    <td class="colunaFornecedor" id="c1"><a href="obsFornecedor.php?usu=N"><?php echo $dado['codFornecedor'];?></a></td>
                    <td class="colunaFornecedor" id="c2"><a href="obsFornecedor.php?usu=N"><?php echo $dado['nomFornecedor'];?></a></td>
                    <td class="colunaFornecedor" id="c3"><a href="obsFornecedor.php?usu=N"><?php echo $dado['areaFuncao'];?></a></td>
                    <td class="colunaFornecedor" id="c4"><a href="obsFornecedor.php?usu=N"><?php echo $dado['tempo_hora'];?></a></td>
                    <td class="colunaFornecedor" id="c5"><a href="obsFornecedor.php?usu=N"><?php echo $dado['valorTotal'];?></a></td>
                    <td class="colunaFornecedor" id="c6"><a href="obsFornecedor.php?usu=N"><?php echo $valorPago; ?></a></td>
                    <td class="colunaFornecedor" id="c7"><a href="obsFornecedor.php?usu=N"><?php echo $valorFaltante; ?></a></td>        
                </tr>
            </tbody>
        </br>
            <?php
                }  
            ?>
        </form></table>
    </body>
</html>