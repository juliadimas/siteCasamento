<?php 
    include_once ("../banco_dados/conexao.php");
 ?>
<nav>
    <ul class="menu">
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/index.php?usu=N">Home</a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/nossaHistoria.php?usu=N">Nossa História</a></li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../sobre/sobreCasamento.php?usu=N">Sobre o Casamento</a></li>

        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Convidados</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Chá de Casa Nova</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="../confPresenca/PresencaCasamento.php?usu=N&t=m">Casamento</a></li>
            </ul>
        </li>
        <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Presentes</a>
            <ul style="margin-top: 8px;">
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Cozinha</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Sala</a></li>
                <li style="font-family: 'Cinzel', sans-serif;"><a href="#">Banheiro</a></li>
            </ul>
        </li> 
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../fornecedor/listaFornecedores.php?usu=N&t=m">Fornecedores</a></li>           
        <li style="font-family: 'Cinzel', sans-serif;"><a href="../trocaPerfil/trocaPerfil.php?usu=N&t=m">Noivo</a></li>           
    </ul>
</nav>
