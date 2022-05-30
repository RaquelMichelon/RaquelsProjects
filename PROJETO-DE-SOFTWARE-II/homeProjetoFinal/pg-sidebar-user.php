<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home. </title>
    <link rel="stylesheet" href="./css/style-sidebar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/Images/favicon.png"
        type="images/png">
</head>

<body>
    <?php
    session_start();
    $includeVerificaLogin = "includes/verifica_login.inc.php";
    require_once $includeVerificaLogin;
    ?>
    <div class="site-background">
        <div class="pg-cadastra-ava"><iframe scrolling="no" id="pg-cadastra-ava"
                src="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-cadastra-ava.php"></iframe>
        </div>
    </div>
    <div class="sidebar close">
        <div class="logo-detalhes">
            <img src="./Images/marker-branco.svg" alt="icone">
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="link_nome">Início</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_nome" href="#">Início</a></li>
                </ul>
            </li>
            <li>
                <div class="icone-link">
                    <a href="#">
                        <i class='bx bx-message-square-edit'></i>
                        <span class="link_nome">Avaliações</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_nome" href="#">Avaliações</a></li>
                    <li id="verCad"><a href="#">Fazer avaliação</a></li>
                    <li id="verAva"><a href="#">Ver avaliações</a></li>
                </ul>
            </li>
            <li>
                <div class="icone-link">
                    <a href="#">
                        <i class='bx bxs-detail'></i>
                        <span class="link_nome">Sobre</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_nome" href="#">Sobre</a></li>
                    <li><a href="#">O projeto</a></li>
                    <li><a href="#">Equipe</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-message-detail'></i>
                    <span class="link_nome">Contato</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_nome" href="#">Contato</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="home-secao">
        <div class="home-conteudo">
            <img src="Images/menu.png" alt="icone">
        </div>
    </section>
    <div class="usuario close">
        <ul class="geral">
            <li>
                <div class="saudacao">Olá,</div>
                <div class="nome-perfil">
                    <?php
                    echo $_SESSION['nome'];
                    ?>
                </div>
                <div class="usuario-detalhes">
                    <img src="Images/raquel-avatar-principal.jpeg" alt="perfil">
                </div>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            <i class='bx bxs-user'></i>
                            <span class="link_nome">Ver perfil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bxs-bar-chart-alt-2'></i>
                            <span class="link_nome">Ver atividade</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-login.php">
                            <i class='bx bx-exit'></i>
                            <span class="link_nome">Sair</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <script>
        /*reconhecimento do clique nas opções com arrow(opções com submenu)*/
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");

        let sidebarBtn = document.querySelector("img[src='Images/menu.png']");

        /*let sidebarBtn = document.querySelector(".bx-menu");*/
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        // link para trocar o iframe quando clicar na sidebar
        const verAva = document.getElementById("verAva");
        const verCad = document.getElementById("verCad");

        verAva.addEventListener("click", 
            function (event) {
                go("http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/ver-avaliacoes/pg-ver-ava.php");
        });

        verCad.addEventListener("click", 
            function (event) {
                go("http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-cadastra-ava.php");
        });
        
        function go(loc) { document.getElementById('pg-cadastra-ava').src = loc; }


    </script>

</body>

</html>