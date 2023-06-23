<?php 
    include_once ("../banco_dados/conexao.php");
 ?>
<nav>
    <ul class="menu">
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/index.php?usu=C">Home</a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/nossaHistoria.php?usu=C">Nossa História</a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/sobreCasamento.php?usu=C">Sobre o Casamento</a></li>

        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Confirmar Presença</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Chá de Casa Nova</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="../confPresenca/confPresInserConvite.php?usu=C&t=m">Casamento</a></li>
            </ul>
        </li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Presentes</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Cozinha</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Sala</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Banheiro</a></li>
            </ul>
        </li> 
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../trocaPerfil/trocaPerfil.php?usu=C">Convidado</a></li>           
    </ul>
</nav>
