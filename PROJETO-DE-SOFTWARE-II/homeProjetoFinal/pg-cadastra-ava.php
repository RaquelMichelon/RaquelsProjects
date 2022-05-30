<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home. | Cadastro de Avalição</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/css/style-cadastra-ava.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
</head>

<body>
    <header class="container-header line-header-main">
        <div class="formata-header"><img
                src="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/Images/logo-home.svg" alt="logo da home">
        </div>
        <div class="header-titulo">
            <h1>Cadastrar Avaliação</h1>
        </div>
        <div class="user-content">
        </div>
    </header>
    <main>
        <div class="container">

            <div class="progress-bar" id="all-progress-bar">
                <div class="step">
                    <p>
                        Localização
                    </p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>
                        Avaliação
                    </p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>

                <div class="step">
                    <p>
                        Confirmação
                    </p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>

            <div class="que-incrivel" id="que-incrivel">
                <p>Que incrível você querer ajudar pessoas a terem mais informações sobre um imóvel!</p>
                <p>São apenas 3 passos. Vamos começar?</p>
            </div>

            <div class="page feedback-page-hidden" id="mostrar-conteudo">
                <div class="title" id="cadastro-sucesso">
                    <img src="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/Images/confirm-icon.svg"
                        alt="Envio confirmado">
                    <h3>Avaliação do imóvel cadastrada com sucesso!</h3>
                </div>

            </div>

            <div class="form-outer" id="hidden-form">
                <form action="pg-cadastra-ava.php" method="post" name="form-ava-submit" role="form">
                    <!-- action="pg-cadastra-ava.php" -->
                    <div class="page slide-page">
                        <div class="title">
                        Pesquise o endereço do imóvel pela lupa ou clique na localidade desejada
                        </div>


                        <!-- area do mapa -->
                        <div class="map-container">
                            <div id="map"></div>
                            <input type="hidden" name="latitude">
                            <input type="hidden" name="longitude">
                        </div>

                        <div class="form-imovel">

                            
                            <label class="label address" for="logradouro">Logradouro</label></br>                               
                            <input name="logradouro" type="text" id="logradouro" autofocus required/></br>

                            <label class="label address" for="numero">Número</label></br>                               
                            <input name="numero" type="text" id="numero" required/></br>

                            <label class="label address" for="bloco">Bloco</label></br>                               
                            <input name="bloco" type="text" id="bloco"/></br>
                            
                            <label class="label address" for="apartamento">Ap</label></br>                               
                            <input name="numero_apartamento" type="text" id="apartamento"/></br>

                            <label class="label address" for="cep"  >CEP</label></br>                               
                            <input name="cep" type="number" step="1" min="0" placeholder="Digite apenas números" id="cep" required/></br> <!-- Istep="1" min="0" -->

                            <label class="label address" for="bairro">Bairro</label></br>                               
                            <input name="bairro" type="text" id="bairro" required/></br>

                            <label class="label address" for="cidade">Cidade</label></br>                               
                            <input name="cidade" type="text" id="cidade" required/></br>

                            <label class="label address" for="uf">Estado</label></br>                               
                            <input name="estado" type="text" id="uf" required/></br>

                        </div>

                        <div class="checkbox-morador">
                            <label class="checkbox" for="foi-morador">Já residi ou resido no imóvel que irei avaliar
                                <input type="checkbox" id="foi-morador" name="foi_morador" value="s" class="foi-morador">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="file-input">
                            <label class="file-input__label" for="image-upload"><i class='bx bx-upload'></i>Upload de foto do imóvel</label>
                            <input type="file" id="image-upload" name="foto_imovel" accept="image/*" class="file-input__input">
                        </div>

                        <div class="field btns align-firsts-buttons">
                            <div class="field btn-voltar">
                                <button class="btn-voltar"><a href="#">Voltar</a></button>
                                <a href=""></a>
                            </div>
                            <div class="field">
                                <a name="ir-topo"></a>
                                <div id="ir-topo"></div>
                                <button class="firstNext next btn-confirmar">
                                Confirmar </button>
                            </div>
                        </div>

                    </div>
                    <div class="page" id="div-das-questoes">

                        <div class="title">
                            Clique no emoji que representa seu nível de satisfação com
                        </div>

                        <!-- inicio perguntas -->

                        <div class="form-container">
                            <!-- <form action="" role="form"> -->
                            <input id='step2' type='checkbox'>
                            <input id='step3' type='checkbox'>
                            <input id='step4' type='checkbox'>
                            <input id='step5' type='checkbox'>
                            <input id='step6' type='checkbox'>

                            <!-- PERGUNTA 1 -->
                            <div id="part1" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Conservação do Imóvel</h3>
                                    </div>

                                    <div class="div-emojis">
                                        <label for='step1' id="back-step1" class="back">
                                            <div class="btn btn-default btn-primary btn-lg" role="button">
                                                <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                    class="arrow-last arrow-hidden">
                                            </div>
                                        </label>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-1" name="q1" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-1">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2" name="q1" value=2
                                                class="radio-custom">
                                            <label for="sentimento-2">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3" name="q1" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-3">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4" name="q1" value=4
                                                class="radio-custom">
                                            <label for="sentimento-4">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5" name="q1" value=5
                                                class="radio-custom">
                                            <label for="sentimento-5">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>
                                        <div class="btn-group btn-group-lg" role="group" aria-label="..."
                                            id="ir-questao-2">
                                            <label for='step2' id="continue-step2" class="continue">
                                                <div class="btn btn-default btn-success btn-lg">
                                                    <img src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next">
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="info-progresso">
                                        <p><span>1/</span>6</p>

                                    </div>

                                </div>
                            </div>

                            <!-- PERGUNTA 2 -->
                            <div id="part2" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Isolamento Acústico</h3>
                                    </div>

                                    <div class="div-emojis">
                                        <div class="btn-group btn-group-lg btn-group-justified" role="group"
                                            aria-label="..." id="btn-voltar-questao-1">

                                            <label for='step2' id="back-step2" class="back">
                                                <div class="btn btn-default btn-primary btn-lg" role="button">
                                                    <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                        class="arrow-last">
                                                </div>
                                            </label>

                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2-1" name="q2" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-2-1" class="label-emoji">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2-2" name="q2" value=2
                                                class="radio-custom">
                                            <label for="sentimento-2-2" class="label-emoji">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2-3" name="q2" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-2-3" class="label-emoji">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2-4" name="q2" value=4
                                                class="radio-custom">
                                            <label for="sentimento-2-4" class="label-emoji">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>
                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-2-5" name="q2" value=5
                                                class="radio-custom">
                                            <label for="sentimento-2-5" class="label-emoji">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-lg" role="group" aria-label="...">
                                            <label for='step3' id="continue-step3" class="continue">
                                                <div class="btn btn-default btn-success btn-lg">
                                                    <img src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next">
                                                </div>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="info-progresso">
                                        <p><span>2/</span>6</p>
                                    </div>


                                </div>
                            </div>

                            <!-- PERGUNTA 3 -->
                            <div id="part3" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Umidade, Posição Solar e Ventilação no Imóvel</h3>
                                    </div>

                                    <div class="div-emojis">
                                        <div class="btn-group btn-group-lg btn-group-justified" role="group"
                                            aria-label="...">

                                            <label for='step3' id="back-step3" class="back">
                                                <div class="btn btn-default btn-primary btn-lg" role="button">
                                                    <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                        class="arrow-last">
                                                </div>
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3-1" name="q3" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-3-1">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3-2" name="q3" value=2
                                                class="radio-custom">
                                            <label for="sentimento-3-2">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3-3" name="q3" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-3-3">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3-4" name="q3" value=4
                                                class="radio-custom">
                                            <label for="sentimento-3-4">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-3-5" name="q3" value=5
                                                class="radio-custom">
                                            <label for="sentimento-3-5">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-lg" role="group" aria-label="...">
                                            <label for='step4' id="continue-step4" class="continue">
                                                <div class="btn btn-default btn-success btn-lg"><img
                                                        src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="info-progresso">
                                        <p><span>3/</span>6</p>
                                    </div>
                                </div>
                            </div>

                            <!-- PERGUNTA 4 -->
                            <div id="part4" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Custo-benefício de Aluguel + Condomínio
                                        </h3>
                                    </div>

                                    <div class="div-emojis">
                                        <div class="btn-group btn-group-lg btn-group-justified" role="group"
                                            aria-label="...">

                                            <label for='step4' id="back-step4" class="back">
                                                <div class="btn btn-default btn-primary btn-lg" role="button">
                                                    <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                        class="arrow-last">
                                                </div>
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4-1" name="q4" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-4-1">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4-2" name="q4" value=2
                                                class="radio-custom">
                                            <label for="sentimento-4-2">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4-3" name="q4" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-4-3">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4-4" name="q4" value=4
                                                class="radio-custom">
                                            <label for="sentimento-4-4">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-4-5" name="q4" value=5
                                                class="radio-custom">
                                            <label for="sentimento-4-5">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-lg" role="group" aria-label="...">
                                            <label for='step5' id="continue-step5" class="continue">
                                                <div class="btn btn-default btn-success btn-lg"><img
                                                        src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="info-progresso">
                                        <p><span>4/</span>6</p>
                                    </div>
                                </div>
                            </div>

                            <!-- PERGUNTA 5 -->
                            <div id="part5" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Contato com proprietário ou
                                            imobiliária
                                        </h3>
                                    </div>

                                    <div class="div-emojis">
                                        <div class="btn-group btn-group-lg btn-group-justified" role="group"
                                            aria-label="...">

                                            <label for='step5' id="back-step5" class="back">
                                                <div class="btn btn-default btn-primary btn-lg" role="button">
                                                    <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                        class="arrow-last">
                                                </div>
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5-1" name="q5" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-5-1">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5-2" name="q5" value=2
                                                class="radio-custom">
                                            <label for="sentimento-5-2">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5-3" name="q5" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-5-3">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5-4" name="q5" value=4
                                                class="radio-custom">
                                            <label for="sentimento-5-4">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-5-5" name="q5" value=5
                                                class="radio-custom">
                                            <label for="sentimento-5-5">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-lg" role="group" aria-label="..."
                                            id="ir-ultima-questao">
                                            <label for='step6' id="continue-step6" class="last-question">
                                                <div class="btn btn-default btn-success btn-lg"><img
                                                        src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="info-progresso">
                                        <p><span>5/</span>6</p>
                                    </div>
                                </div>
                            </div>

                            <!-- ULTIMA PERGUNTA + COMENTARIO -->
                            <div id="part6" class="form-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">O Imóvel no Geral</h3>
                                    </div>


                                    <div class="div-emojis">
                                        <div class="btn-group btn-group-lg btn-group-justified" role="group"
                                            aria-label="..." id="btn-voltar-questao-5">

                                            <label for='step6' id="back-step6" class="back">
                                                <div class="btn btn-default btn-primary btn-lg" role="button">
                                                    <img src="./Images/seta-esquerda.png" alt="Anterior"
                                                        class="arrow-last">
                                                </div>
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-6-1" name="q6" value=1
                                                class="radio-custom" required>
                                            <label for="sentimento-6-1">
                                                <img src="./Images/image-11.svg" alt="Nota 1" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-6-2" name="q6" value=2
                                                class="radio-custom">
                                            <label for="sentimento-6-2">
                                                <img src="./Images/image-22.svg" alt="Nota 2" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-6-3" name="q6" value=3
                                                class="radio-custom" checked>
                                            <label for="sentimento-6-3">
                                                <img src="./Images/image-33.svg" alt="Nota 3" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-6-4" name="q6" value=4
                                                class="radio-custom">
                                            <label for="sentimento-6-4">
                                                <img src="./Images/image-44.svg" alt="Nota 4" class="emoji">
                                            </label>
                                        </div>

                                        <div class="maximo-tamanho-emoji">
                                            <input type="radio" id="sentimento-6-5" name="q6" value=5
                                                class="radio-custom">
                                            <label for="sentimento-6-5">
                                                <img src="./Images/image-55.svg" alt="Nota 5" class="emoji">
                                            </label>
                                        </div>

                                        <div class="arrow-hidden" role="group" aria-label="...">
                                            <label for='step6' id="continue-step6" class="arrow-hidden">
                                                <div class="btn btn-default btn-success btn-lg"><img
                                                        src="./Images/seta-direita.png" alt="Próxima"
                                                        class="arrow-next  arrow-hidden"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <textarea id="message" class="form-control"
                                        placeholder="Deixe aqui um comentário adicionando outras impressões sobre o imóvel..." name="avaliacao_textual"></textarea>

                                    <div class="info-progresso">
                                        <p><span>6/</span>6</p>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>

                        <!-- fim perguntas -->

                        <div class="field btns">
                            <button class="prev-1 prev" id="btn-voltar-mapa">Voltar</button>
                            <button type="submit" name="cadastrar" class="next-1 next submit" id="btn-enviar-ava">
                                Enviar
                                Avaliação</button>
                        </div>


                    </div>

                </form>
            </div>

        </div>

        </script>
        <script src="./scripts/mapa.js"></script>
        <script src="./scripts/script.js"></script>  
        
        
    </main>


    <!-- ================================== Main Script ================================= -->

<?php 
usleep(1000000);
        
$includeClasseAvaliacao      = "./includes/avaliacao-class.inc.php";
$includeClasseImovel      = "./includes/imovel-class.inc.php";
$includeClasseNota      = "./includes/nota-class.inc.php";
$includeClasseBancoDeDados = "./includes/data-base-class.inc.php";

require_once $includeClasseAvaliacao;
require_once $includeClasseImovel;
require_once $includeClasseNota;
require_once $includeClasseBancoDeDados;

$bancoImovel = new BancoDeDados("localhost", "root", "root", "abmr", "imovel");
$bancoAvaliacao = new BancoDeDados("localhost", "root", "root", "abmr", "avaliacao");
$bancoNotas = new BancoDeDados("localhost", "root", "root", "abmr", "notas");

$conexaoImovel = $bancoImovel->criarConexao();
$conexaoAvaliacao = $bancoAvaliacao->criarConexao();
$conexaoNotas = $bancoNotas->criarConexao();

$bancoImovel->acessarBanco($conexaoImovel);
$bancoAvaliacao->acessarBanco($conexaoAvaliacao);
$bancoNotas->acessarBanco($conexaoNotas);

$bancoImovel->definirCharset($conexaoImovel);
$bancoAvaliacao->definirCharset($conexaoAvaliacao);
$bancoNotas->definirCharset($conexaoNotas);


$imovel = new Imovel($_SESSION['idusuario']);


if(isset($_POST['cadastrar'])) 
{
    
    if(isset($_SESSION['idusuario']) and isset($_SESSION['usuario']))
    {
        $usuario    = $_SESSION['usuario'];
        $idusuario  = $_SESSION['idusuario'];


        echo "<p> Dados recuperados das variáveis de sessão da página anterior: <br>
        User/email = <span> $usuario </span> <br>
        idusuario  = <span> $idusuario </span> </p>";

    }
    else
    {
        echo "<p> Impossível recuperar dados da sessão. </p>";
    }


    $imovel->receberDados($conexaoImovel);

    $imovel->cadastrarImovel($conexaoImovel, $bancoImovel->nomeDaTabela);
    echo"<p> Cadastro de imóvel realizado com sucesso! </p>";

    $idimovel = $imovel->last_idimovel;

    echo "<p> Dados recuperados das variáveis de sessão da página anterior: <br>
        idimóvel recuperado = <span> $idimovel </span> <br>";

    $avaliacao = new Avaliacao($_SESSION['idusuario'], $idimovel);
    
        

    //antes de receber dados avaliacao, cadastrar imovel
    $avaliacao->receberDados($conexaoAvaliacao);
    
    $avaliacao->cadastrarAvaliacao($conexaoAvaliacao, $bancoAvaliacao->nomeDaTabela);
    echo"<p> Cadastro de avaliação realizado com sucesso! </p>";

    $idavaliacao = $avaliacao->last_idavaliacao;

    echo gettype($idavaliacao); 

    echo "<p> Dados recuperados das variáveis de sessão da página anterior: <br>
        idavaliacao recuperado = <span> $idavaliacao </span> <br>"; 


    $valor_nota_q1      = $conexaoAvaliacao->escape_string(trim($_POST['q1']));
    $valor_nota_q2      = $conexaoAvaliacao->escape_string(trim($_POST['q2']));
    $valor_nota_q3      = $conexaoAvaliacao->escape_string(trim($_POST['q3']));
    $valor_nota_q4      = $conexaoAvaliacao->escape_string(trim($_POST['q4']));
    $valor_nota_q5      = $conexaoAvaliacao->escape_string(trim($_POST['q5']));
    $valor_nota_q6      = $conexaoAvaliacao->escape_string(trim($_POST['q6']));

    $sql = "INSERT INTO notas (valor_nota, idavaliacao, iditens_avaliacao) 
            VALUES($valor_nota_q1, $idavaliacao, 1),
            ($valor_nota_q2, $idavaliacao, 2),
            ($valor_nota_q3, $idavaliacao, 3),
            ($valor_nota_q4, $idavaliacao, 4),
            ($valor_nota_q5, $idavaliacao, 5),
            ($valor_nota_q6, $idavaliacao, 6)";

            if ($conexaoAvaliacao->query($sql) === true)
            {
            echo "NOtas inseridas successfully.";
            }
            else
            {
            echo "ERROR: Could not able to execute $sql. "
            .$conexaoAvaliacao->error;
            }

}

$bancoImovel->desconectar($conexaoImovel);
$bancoAvaliacao->desconectar($conexaoAvaliacao);
$bancoNotas->desconectar($conexaoNotas);


?>


</body>

</html>