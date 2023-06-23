<?php 
    include_once ("../banco_dados/selects.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <body style="text-align: center;">
            </br></br></br></br>

        <form border="none" method="POST" action="PresencaCasamento.php?usu=N">
            <tr class="texto">
                <div class="texto">
                    <td style="padding: 10px;">
                        Código:
                        <input type="text" name="codConvidado" placeholder="convidado" size="10" class="texto" style="text-align: left;"/> 
                    </td>
                    <td style="padding: 10px;">
                        Nome:
                        <input type="text" name="nomConvidado" placeholder="convidado" size="30" class="texto" style="text-align: left;"/> 
                    </td>
                    
                </div>
            </tr></br>
            <tr class="texto">
            <div class="texto">
                <td style="padding: 10px;">
                        Convite:
                        <input type="text" name="codConvite" placeholder="convite" size="10" class="texto" style="text-align: left;"/> 
                    </td>
                    <td style="padding: 10px;">
                        Tipo de convidado:
                        <select name="codTipConvidado" class="texto">
                            <option value=""></option>
                            <?php
                                 while($dado = $conTipConvidado->fetch_array()){ 
                            ?>
                            <option value="<?php echo $dado['codTipoConvidado'];?>"><?php echo $dado['nomTipoConvidado'];?></option>
                            <?php
                                }  
                            ?>
                        </select>
                    </td> 
                </div>
            </tr></br>
            <tr class="texto">
                <div class="texto">
                    <td style="padding: 10px;">
                        Sexo:
                       <select name="sexo" class="texto">
                            <option value=""></option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </td>
                    <td style="padding: 10px;">
                        Faixa Etária:
                        <select name="faixaEtaria" class="texto">
                            <option value=""></option>
                            <option value="A">Adulto</option>
                            <option value="C">Criança</option>
                        </select>
                    </td>
                    <td style="padding: 10px;">
                        Noivo:
                        <select name="noivo" class="texto">
                            <option value=""></option>
                            <option value="J">Júlia</option>
                            <option value="R">Rian</option>
                        </select>
                    </td>
                </div>
            </tr></br>
            <tr class="texto">
                <div class="texto">
                    <td style="padding: 10px;">
                    Função:
                        <select name="codTipFuncao" class="texto">
                            <option value=""></option>
                            <?php
                                 while($dado = $conTipFuncao->fetch_array()){ 
                            ?>
                            <option value="<?php echo $dado['codTipFuncao'];?>"><?php echo $dado['nomTipFuncao'];?></option>
                            <?php
                                }  
                            ?>
                        </select>
                    </td>
                    <td style="padding: 10px;">
                        Presença:
                        <select name="presenca" class="texto">
                            <option value=""></option>
                            <option value="P">Pendente</option>
                            <option value="C">Confirmado</option>
                            <option value="F">Faltarei</option>
                        </select>
                    </td>
                    <td style="padding: 10px;">
                        CPF do Convidado:
                        <input type="text" name="cpfConvidado" placeholder="000.000.000-00" size="20" class="texto" style="text-align: left;"/> 
                    </td>
                </div>
            </tr></br>

            <button>
                <img src="../../imagens/btnPesquisar.png"  style="width:100px;">
            </button>
        </form>
    </body>
</html>