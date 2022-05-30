<?php
    include 'includes/header.php';
?>

<div class="imagem-pesquisa">
<img src="Images/avaliacao-imoveis.png" alt="icone">
</div>

<p id=cabecalho>Pesquise por endereços, bairros, datas <br>
    ou palavras-chaves de interesse <p>

<form action='includes/search.php' method="POST">
    <input type="text" name="search" placeholder="ex.: itacorubi">
    <button type="submit" name="submit-search"> <img src="Images/house-search.png" alt="icone"> </button>
</form>

<h2>Avaliações recentes</h2>

<div class="article-container">
    <?php
       $sql = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, estado, avaliacao_textual, quantidade_curtidas, idavaliacao, data_avaliacao
       FROM avaliacao
       JOIN imovel ON avaliacao.idimovel=imovel.idimovel
       JOIN usuario ON avaliacao.idusuario=usuario.idusuario;";

       $result = mysqli_query($conn, $sql);
       $queryResults = mysqli_num_rows($result);

       if ($queryResults > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               echo "
               <a href='includes/avaliacao.php?idavaliacao=".$row['idavaliacao']."'><div class='article-box'>
                    <h3>
                    <i class='bx bxs-user'></i>
                    ".$row['nome']."
                    </h3>
                    <div class='data-avaliacao'>
                    <span class='data'>".$row['data_avaliacao']."</span>
                    </div>
                    <p>'".$row['avaliacao_textual']."..'</p>
                    <img src='Images/icon.png' alt='icone'>
                    <div class='localizacao'>
                    <p id='endereco'>".$row['logradouro'].", ".$row['numero'].", ".$row['bairro']." - Florianópolis/SC <p>
                    </div>
                    <div class='interacao'>
                    <i class='bx bxs-like'>
                    <p id='like'>".$row['quantidade_curtidas']."</p>
                    </i>
                    <i class='bx bxs-comment-detail'></i>
                    <i class='bx bxs-share-alt'></i>
                    </div>
               </div></a>";
           }
       }
    ?>
</div>
</form>
    
</body>
</html>