<?php 
    include_once ("../banco_dados/selects.php");

    $codConvite = $_GET['codConvite'];
    $tela = $_GET['tela'];

    if($tela == 'insertPresenca'){
        echo "<script>alert('Você não inseriu o CPF');</script>";
    }

    if (trim($codConvite) <= 0){
        header("Location: confPresInserConvite.php?t=r");
        return;
    }

    $consulta = "SELECT codConvidado, fk_codConvite, faixaEtaria, nomConvidado, cpfConvidado, presenca FROM convidado WHERE fk_codConvite = '$codConvite' ORDER BY faixaEtaria";
    $con = mysqli_query($conn, $consulta);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php 
            if (empty($_GET['usu'])){
                include "../menus/menuConvidado.php";
            }elseif ($_GET['usu'] == 'N'){
                include "../menus/menuNoivos.php";
            }
        ?>
</br></br></br></br>
        <div class="resultPesquisa"  style="text-align: center;">
            <h2 class="titulo">Confirme sua Presença!</h2>
            <p class="texto">
                Não esqueça um documento com foto e seu CPF.
            </p>
            <p class="texto">
                O convite é único e instranferivel.
            </p>
                </br>
            <form border="none" method="POST" action="../banco_dados/updateConvidado.php">
                <header class="titulo">
                    <tr>
                        <td>Etária | </td>
                        <td>Nome Completo | </td>
                        <td>CPF | </td>
                        <td>Presença</td>
                    </tr>
                </header>
                <?php
                    while($dado = $con->fetch_array()){ 
                ?>
                <tr class="texto">
                    <td style="padding: 10px;">
                        <input type="text" name="faixaEtaria" disabled value="<?php if ($dado['faixaEtaria'] == 'A'){ ?> Adulto <?php }elseif($dado['faixaEtaria'] == 'C'){ ?> Criança <?php } ?>" size="8" class="texto" style="text-align: left;"/> 
                    </td>
                    
                    <td  style="padding: 10px;">
                        <input type="text" name="nomeCompleto<?php echo $dado['codConvidado'];?>" value="<?php echo $dado['nomConvidado'];?>" size="20" class="texto" style="text-align: left;"/> 
                    </td>
                    <td  style="padding: 10px;">
                        <input type="text" oninput="mascara(this)" name="CPF<?php echo $dado['codConvidado'];?>" placeholder="000.000.000-00" value="<?php echo $dado['cpfConvidado'];?>" size="20" class="texto" style="text-align: left;"/> 
                    </td>
                    <td class="texto"  style="padding: 10px;">
                        <select name="presenca<?php echo $dado['codConvidado'];?>" class="texto">
                            <option <?php if($dado['presenca'] == 'P'){ ?> selected <?php } ?> value="P">Pendente</option>
                            <option <?php if($dado['presenca'] == 'C'){ ?> selected <?php } ?> value="C">Confirmado</option>
                            <option <?php if($dado['presenca'] == 'F'){ ?> selected <?php } ?> value="F">Faltarei</option>
                        </select>
                    </td>
                    <input type="text" name="codConvite" value="<?php echo $dado['fk_codConvite'];?>" size="20" class="texto" style="text-align: left; display:none;"/> 
                    <input type="text" name="codConvidado" value="<?php echo $dado['codConvidado'];?>" size="20" class="texto" style="text-align: left;  display:none;"/> 
                    
                </tr></br>
                <?php
                    }  
                ?>
                <p class="texto" style="font-size: 20px;">
                    OBS: ADULTOS utilizam pulseiras verdes e CRIANÇAS (menores de 18) utilizam pulseiras brancas.
                </p>
                <button>
                    <img src="../../imagens/btnSalvar.png"  style="width:100px;">
                </button>
            </form>
            
                </br>
            
            
        </div>
    </body>
</html>
<script>
    function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}
</script>