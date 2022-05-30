<?php
    include 'header.php';
?>

<br><br>

<div class="article-container">
    <?php
       $idavaliacao = mysqli_real_escape_string($conn, $_GET['idavaliacao']);

       $sql = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, estado, idavaliacao, avaliacao_textual, quantidade_curtidas, data_avaliacao
       FROM avaliacao
       JOIN imovel ON avaliacao.idimovel=imovel.idimovel
       JOIN usuario ON avaliacao.idusuario=usuario.idusuario
       WHERE idavaliacao='$idavaliacao';";

       $result = mysqli_query($conn, $sql);
       $queryResults = mysqli_num_rows($result);

       if ($queryResults > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='article-box-page'>
                 <h3>
                 <i class='bx bxs-user'></i>
                 ".$row['nome']."
                 </h3>
                 <div class='data-avaliacao'>
                 <span class='data'>".$row['data_avaliacao']."</span>
                 </div>
                 <p id='titulos'> Endereço do imóvel </p>
                 <img src='../Images/icon.png' alt='icone'>
                 <div class='localizacao'>
                 <p id='endereco-page'>".$row['logradouro'].", ".$row['numero'].", ".$row['bairro']." - Florianópolis/SC <p>
                 </div> 
                 <p id='titulos'> Avaliação descritiva feita pelo usuário: </p>
                 <p>'".$row['avaliacao_textual']."'</p> 
                 <p id='titulos'> Avaliação por critérios </p>";
           }
       }

       $sql2 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
       from avaliacao
       join imovel on avaliacao.idimovel=imovel.idimovel
       join usuario on avaliacao.idusuario=usuario.idusuario
       join notas on avaliacao.idavaliacao=notas.idavaliacao
       join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
       where avaliacao.idavaliacao='$idavaliacao'
       and descricao='Conservação do Imóvel';";

       $result2 = mysqli_query($conn, $sql2);
       $queryResults2 = mysqli_num_rows($result2);

       if ($queryResults2 > 0) {
           while ($row = mysqli_fetch_assoc($result2)) {
                if ($row['valor_nota']==1) {
                    echo "
                    <div class='conservacao'>
                    <p id='nome-avaliacao'> Conservação do imóvel </p>
                    <img src='../Images/image-11.svg' alt='icone'>
                    <p id='conceito'> Péssimo! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==2) {
                    echo "
                    <div class='conservacao'>
                    <p id='nome-avaliacao'> Conservação do imóvel </p>
                    <img src='../Images/image-22.svg' alt='icone'>
                    <p id='conceito'> Ruim! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==3) {
                    echo "
                    <div class='conservacao'>
                    <p id='nome-avaliacao'> Conservação do imóvel </p>
                    <img src='../Images/image-33.svg' alt='icone'>
                    <p id='conceito'> Regular! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==4) {
                    echo "
                    <div class='conservacao'>
                    <p id='nome-avaliacao'> Conservação do imóvel </p>
                    <img src='../Images/image-44.svg' alt='icone'>
                    <p id='conceito'> Bom! </p>
                    </div>";
                }
                else {
                    echo "
                    <div class='conservacao'>
                    <p id='nome-avaliacao'> Conservação do imóvel </p>
                    <img src='../Images/image-55.svg' alt='icone'>
                    <p id='conceito'> Ótimo! </p>
                    </div>";
                }
           }
       }
        
       $sql3 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
       from avaliacao
       join imovel on avaliacao.idimovel=imovel.idimovel
       join usuario on avaliacao.idusuario=usuario.idusuario
       join notas on avaliacao.idavaliacao=notas.idavaliacao
       join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
       where avaliacao.idavaliacao='$idavaliacao'
       and descricao='Isolamento Acústico';";

       $result3 = mysqli_query($conn, $sql3);
       $queryResults3 = mysqli_num_rows($result3);

       if ($queryResults3 > 0) {
           while ($row = mysqli_fetch_assoc($result3)) {
                if ($row['valor_nota']==1) {
                    echo "
                    <div class='acustico'>
                    <p id='nome-avaliacao'> Isolamento Acústico </p>
                    <img src='../Images/image-11.svg' alt='icone'>
                    <p id='conceito'> Péssimo! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==2) {
                    echo "
                    <div class='acustico'>
                    <p id='nome-avaliacao'> Isolamento Acústico </p>
                    <img src='../Images/image-22.svg' alt='icone'>
                    <p id='conceito'> Ruim! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==3) {
                    echo "
                    <div class='acustico'>
                    <p id='nome-avaliacao'> Isolamento Acústico </p>
                    <img src='../Images/image-33.svg' alt='icone'>
                    <p id='conceito'> Regular! </p>
                    </div>";
                }
                elseif ($row['valor_nota']==4) {
                    echo "
                    <div class='acustico'>
                    <p id='nome-avaliacao'> Isolamento Acústico </p>
                    <img src='../Images/image-44.svg' alt='icone'>
                    <p id='conceito'> Bom! </p>
                    </div>";
                }
                else {
                    echo "
                    <div class='acustico'>
                    <p id='nome-avaliacao'> Isolamento Acústico </p>
                    <img src='../Images/image-55.svg' alt='icone'>
                    <p id='conceito'> Ótimo! </p>
                    </div>";
                }
           }
        }
        $sql4 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
        from avaliacao
        join imovel on avaliacao.idimovel=imovel.idimovel
        join usuario on avaliacao.idusuario=usuario.idusuario
        join notas on avaliacao.idavaliacao=notas.idavaliacao
        join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
        where avaliacao.idavaliacao='$idavaliacao'
        and descricao='Umidade, posição solar e ventilação';";
 
        $result4 = mysqli_query($conn, $sql4);
        $queryResults4 = mysqli_num_rows($result4);
 
        if ($queryResults4 > 0) {
            while ($row = mysqli_fetch_assoc($result4)) {
                 if ($row['valor_nota']==1) {
                     echo "
                     <div class='upi'>
                     <p id='nome-avaliacao'> Umidade e Ventilação </p>
                     <img src='../Images/image-11.svg' alt='icone'>
                     <p id='conceito'> Péssimo! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==2) {
                     echo "
                     <div class='upi'>
                     <p id='nome-avaliacao'> Umidade e Ventilação </p>
                     <img src='../Images/image-22.svg' alt='icone'>
                     <p id='conceito'> Ruim! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==3) {
                     echo "
                     <div class='upi'>
                     <p id='nome-avaliacao'> Umidade e Ventilação </p>
                     <img src='../Images/image-33.svg' alt='icone'>
                     <p id='conceito'> Regular! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==4) {
                     echo "
                     <div class='upi'>
                     <p id='nome-avaliacao'> Umidade e Ventilação </p>
                     <img src='../Images/image-44.svg' alt='icone'>
                     <p id='conceito'> Bom! </p>
                     </div>";
                 }
                 else {
                     echo "
                     <div class='upi'>
                     <p id='nome-avaliacao'> Umidade e Ventilação </p>
                     <img src='../Images/image-55.svg' alt='icone'>
                     <p id='conceito'> Ótimo! </p>
                     </div>";
                 }
            }
         }
         $sql5 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
        from avaliacao
        join imovel on avaliacao.idimovel=imovel.idimovel
        join usuario on avaliacao.idusuario=usuario.idusuario
        join notas on avaliacao.idavaliacao=notas.idavaliacao
        join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
        where avaliacao.idavaliacao='$idavaliacao'
        and descricao='Custo-benefício de aluguel e condomínio';";
 
        $result5 = mysqli_query($conn, $sql5);
        $queryResults5 = mysqli_num_rows($result5);
 
        if ($queryResults5 > 0) {
            while ($row = mysqli_fetch_assoc($result5)) {
                 if ($row['valor_nota']==1) {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Custo-benefício aluguel </p>
                     <img src='../Images/image-11.svg' alt='icone'>
                     <p id='conceito'> Péssimo! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==2) {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Custo-benefício aluguel </p>
                     <img src='../Images/image-22.svg' alt='icone'>
                     <p id='conceito'> Ruim! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==3) {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Custo-benefício aluguel </p>
                     <img src='../Images/image-33.svg' alt='icone'>
                     <p id='conceito'> Regular! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==4) {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Custo-benefício aluguel </p>
                     <img src='../Images/image-44.svg' alt='icone'>
                     <p id='conceito'> Bom! </p>
                     </div>";
                 }
                 else {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Custo-benefício aluguel </p>
                     <img src='../Images/image-55.svg' alt='icone'>
                     <p id='conceito'> Ótimo! </p>
                     </div>";
                 }
            }
         }
         $sql6 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
        from avaliacao
        join imovel on avaliacao.idimovel=imovel.idimovel
        join usuario on avaliacao.idusuario=usuario.idusuario
        join notas on avaliacao.idavaliacao=notas.idavaliacao
        join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
        where avaliacao.idavaliacao='$idavaliacao'
        and descricao='Contato com o proprietário ou imobiliária';";
 
        $result6 = mysqli_query($conn, $sql6);
        $queryResults6 = mysqli_num_rows($result6);
 
        if ($queryResults6 > 0) {
            while ($row = mysqli_fetch_assoc($result6)) {
                 if ($row['valor_nota']==1) {
                     echo "
                     <div class='cli'>
                     <p id='nome-avaliacao'> Contato com locatário </p>
                     <img src='../Images/image-11.svg' alt='icone'>
                     <p id='conceito'> Péssimo! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==2) {
                     echo "
                     <div class='cli'>
                     <p id='nome-avaliacao'> Contato com locatário </p>
                     <img src='../Images/image-22.svg' alt='icone'>
                     <p id='conceito'> Ruim! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==3) {
                     echo "
                     <div class='cli'>
                     <p id='nome-avaliacao'> Contato com locatário </p>
                     <img src='../Images/image-33.svg' alt='icone'>
                     <p id='conceito'> Regular! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==4) {
                     echo "
                     <div class='cli'>
                     <p id='nome-avaliacao'> Contato com locatário </p>
                     <img src='../Images/image-44.svg' alt='icone'>
                     <p id='conceito'> Bom! </p>
                     </div>";
                 }
                 else {
                     echo "
                     <div class='cbac'>
                     <p id='nome-avaliacao'> Contato com locatário </p>
                     <img src='../Images/image-55.svg' alt='icone'>
                     <p id='conceito'> Ótimo! </p>
                     </div>";
                 }
            }
         }
         $sql7 = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, avaliacao.idavaliacao, estado, avaliacao_textual, quantidade_curtidas, data_avaliacao, valor_nota, descricao
        from avaliacao
        join imovel on avaliacao.idimovel=imovel.idimovel
        join usuario on avaliacao.idusuario=usuario.idusuario
        join notas on avaliacao.idavaliacao=notas.idavaliacao
        join itens_avaliacao on notas.iditens_avaliacao=itens_avaliacao.iditens_avaliacao
        where avaliacao.idavaliacao='$idavaliacao'
        and descricao='Avaliação Geral';";
 
        $result7 = mysqli_query($conn, $sql7);
        $queryResults7 = mysqli_num_rows($result7);
 
        if ($queryResults7 > 0) {
            while ($row = mysqli_fetch_assoc($result7)) {
                 if ($row['valor_nota']==1) {
                     echo "
                     <div class='geral'>
                     <p id='nome-avaliacao'> Avaliação Geral </p>
                     <img src='../Images/image-11.svg' alt='icone'>
                     <p id='conceito'> Péssimo! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==2) {
                     echo "
                     <div class='geral'>
                     <p id='nome-avaliacao'> Avaliação Geral </p>
                     <img src='../Images/image-22.svg' alt='icone'>
                     <p id='conceito'> Ruim! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==3) {
                     echo "
                     <div class='geral'>
                     <p id='nome-avaliacao'> Avaliação Geral </p>
                     <img src='../Images/image-33.svg' alt='icone'>
                     <p id='conceito'> Regular! </p>
                     </div>";
                 }
                 elseif ($row['valor_nota']==4) {
                     echo "
                     <div class='geral'>
                     <p id='nome-avaliacao'> Avaliação Geral </p>
                     <img src='../Images/image-44.svg' alt='icone'>
                     <p id='conceito'> Bom! </p>
                     </div>";
                 }
                 else {
                     echo "
                     <div class='geral'>
                     <p id='nome-avaliacao'> Avaliação Geral </p>
                     <img src='../Images/image-55.svg' alt='icone'>
                     <p id='conceito'> Ótimo! </p>
                     </div>";
                 }
            }
         }
         $sql = "SELECT nome, cep, logradouro, numero, bloco, numero_apartamento, bairro, imovel.cidade, estado, idavaliacao, avaliacao_textual, quantidade_curtidas, data_avaliacao
       FROM avaliacao
       JOIN imovel ON avaliacao.idimovel=imovel.idimovel
       JOIN usuario ON avaliacao.idusuario=usuario.idusuario
       WHERE idavaliacao='$idavaliacao';";

       $result = mysqli_query($conn, $sql);
       $queryResults = mysqli_num_rows($result);

    ?>
</div>

<button class="voltar" onclick="history.go(-1);">Voltar</button>
    
</body>
</html>