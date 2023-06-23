<?php 
    include_once ("../banco_dados/selects.php");
 ?>
<nav>
    <ul class="menu">
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/index.php">Home<?php echo $login; ?></a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/nossaHistoria.php">Nossa História</a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/sobreCasamento.php">Sobre o Casamento</a></li>

        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Confirmar Presença</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Chá de Casa Nova</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="../confPresenca/confPresInserConvite.php?t=m">Casamento</a></li>
            </ul>
        </li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Presentes</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Cozinha</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Sala</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Banheiro</a></li>
            </ul>
        </li> 
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../trocaPerfil/trocaPerfil.php">Convidado</a></li>           
    </ul>
</nav>
