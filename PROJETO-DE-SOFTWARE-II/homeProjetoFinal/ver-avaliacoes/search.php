<?php
    include 'header.php';
?>

<div class="imagem-pesquisa">
<img src="imagem/avaliacao-imoveis.png" alt="icone">
</div>

<p id=cabecalho>Pesquise por endereços, bairros, datas <br>
    ou palavras-chaves de interesse <p>

<form action='search.php' method="POST">
    <input type="text" name="search" placeholder="ex.: itacorubi">
    <button type="submit" name="submit-search"> <img src="imagem/house-search.png" alt="icone"> </button>
</form>

<!--<form action='search.php' method="POST">
<div class="wrapper">
    <div class="searchbox">
       <input type="text" class="input" name="search" placeholder=Search>   
       <button type="submit" class="searchbtn" name="submit-search">
            <i class="fas fa-search"></i>
      </button>       
    </div>
 </div>
</form>-->

<!--<form action='search.php' method="POST">
<div class="wrapper">
    <div class="searchbox">
       <input type="text" class="input" name="search">   
       <div class="searchbtn">
            <i class="fas fa-search" name="submit-search"></i>
       </div>       
    </div>
 </div>
</form>-->

<div class="article-container">
<?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT nome, cep, logradouro, numero, condominio, bloco, numero_apartamento, bairro, imovel.cidade, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, idavaliacao
        FROM avaliacao
        JOIN imovel ON avaliacao.idimovel=imovel.idimovel
        JOIN usuario ON avaliacao.idusuario=usuario.idusuario
        WHERE logradouro LIKE '%$search%' OR
        nome LIKE '%$search%' OR
        bairro LIKE '%$search%' OR
        estado LIKE '%$search%' OR
        logradouro LIKE '%$search%' OR
        condominio LIKE '%$search%';";

        $result = mysqli_query($conn, $sql);

        $queryResult = mysqli_num_rows($result);

        echo "<p id='resultado-2'>Foram encontradas ".$queryResult." avaliações possivelmente relacionadas a '".$search."'<p><br>";

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <a href='avaliacao.php?idavaliacao=".$row['idavaliacao']."'><div class='article-box'>
                     <h3>
                     <i class='bx bxs-user'></i>
                     ".$row['nome']."
                     </h3>
                     <div class='data-avaliacao'>
                     <span class='data'>".$row['data_avaliacao']."</span>
                     </div>
                     <p>'".$row['avaliacao_textual']."..'</p>
                     <img src='imagem/icon.png' alt='icone'>
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
        else {
            echo "Não foi encontrado nenhum resultado para a pesquisa '".$search."'";
        }

    }
?>

</div>
