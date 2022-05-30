
const slidePage = document.querySelector(".slide-page"); //primeira página onde fica a localizaçao
const nextBtnFirst = document.querySelector(".firstNext"); //confirmar localizacao e ir pra pg avaliacao
const prevBtnSec = document.querySelector(".prev-1"); //botao para voltar para pagina de localizacao
const nextBtnSec = document.querySelector(".next-1"); //quando clicar nesse // botao para enviar avaliacao
const submitBtn = document.querySelector(".submit"); //e faça isso
const progressText = document.querySelectorAll(".step p"); //cada parte da barra de progresso
const progressCheck = document.querySelectorAll(".step .check"); //check barra de progresso
const bullet = document.querySelectorAll(".step .bullet"); //bullet barra de progresso
const btnEnviarAva = document.getElementById("btn-enviar-ava");
const btnIrQuestao2 = document.getElementById("ir-questao-2");
const btnVoltarMapa = document.getElementById("btn-voltar-mapa");
const btnVoltarQuestao1 = document.getElementById("btn-voltar-questao-1");
const btnIrUltimaQuestao = document.getElementById("ir-ultima-questao");
const btnVoltarQuestao5 = document.getElementById("btn-voltar-questao-5");
const divDasQuestoes = document.getElementById("div-das-questoes");
const queIncrivel = document.getElementById("que-incrivel");
const allProgressbar = document.getElementById("all-progress-bar");

//desabilitado com a integracao
// const escondeFormulario = document.getElementById("hidden-form");

let current = 1;

// botao para sair da página do mapa e ir para a página de emojis
nextBtnFirst.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    queIncrivel.style.display = "none";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    //scrollWin();

});

// botao para voltar
// nextBtnSec.addEventListener("click", function (event) {
//     //event.preventDefault();
//     slidePage.style.marginLeft = "-50%";
//     bullet[current - 1].classList.add("active");
//     progressCheck[current - 1].classList.add("active");
//     progressText[current - 1].classList.add("active");
//     current += 1;
// });

//botao enviar avaliacao
submitBtn.addEventListener("click", function (event) {
    // event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;

    //scrollWin();
    //slidePage.style.marginLeft = "-50%";
    document.getElementById("mostrar-conteudo").style.display = "block";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    // current += 1;
    //mostrar();
    // escondeFormulario.style.display = "none";

    // allProgressbar.style.position = "fixed";
    //document.forms['form-ava-submit'].submit();
    setTimeout(function () {
        alert("Sua avaliação de imóvel foi cadastrada com sucesso!");
        location.reload();
    }, 3000);

    // divDasQuestoes.style.display = "none";
});


prevBtnSec.addEventListener("click", function (event) {
    // event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});

// esconde botao de enviar avaliacao
btnIrQuestao2.addEventListener("click", function (event) {
    //event.preventDefault();
    btnVoltarMapa.style.display = "none";
});

// mostra o botao de voltar para o mapa
btnVoltarQuestao1.addEventListener("click", function (event) {
    // btnVoltarMapa.style.visibility = "visible";
    btnVoltarMapa.style.display = "block";
});


// mostra o que incrível ao voltar para a pagina de mapa
btnVoltarMapa.addEventListener("click", function (event) {
    queIncrivel.style.display = "block";
});


btnIrUltimaQuestao.addEventListener("click", function (event) {
    btnEnviarAva.style.display = "block";
});

btnVoltarQuestao5.addEventListener("click", function (event) {
    btnEnviarAva.style.display = "none";
});

// function scrollWin() {
//     window.scrollTo(0, 0);
// }



//variáveis página cadastro realizado
//const feedback = document.getElementById("cadastro-sucesso");
//const pergunta = document.getElementById("pergunta");
//const botaoVerAvaliacoes = document.getElementById("botao-ver-avaliacao");
//const confirmaEnvioFormulario = document.getElementById("mostrar-conteudo");

// nextBtnThird.addEventListener("click", function (event) {
//     event.preventDefault();
//     slidePage.style.marginLeft = "-75%";
//     bullet[current - 1].classList.add("active");
//     progressCheck[current - 1].classList.add("active");
//     progressText[current - 1].classList.add("active");
//     current += 1;
// });

//sai da página de avaliação e vai para a página de confirmação
// submitBtn.addEventListener("click", function (event) {
//     event.preventDefault();
//     slidePage.style.marginLeft = "-75%";
//     bullet[current - 1].classList.add("active");
//     progressCheck[current - 1].classList.add("active");
//     progressText[current - 1].classList.add("active");
//     current += 1;
//     setTimeout(function () {
//         alert("Sua avaliação de imóvel foi cadastrada com sucesso!");
//         location.reload();
//     }, 800);
// });

// nextBtnSec.addEventListener("click", function (event) {
//     event.preventDefault();
//     slidePage.style.marginLeft = "-50%";
//     bullet[current - 1].classList.add("active");
//     progressCheck[current - 1].classList.add("active");
//     progressText[current - 1].classList.add("active");
//     current += 1;
// });

// prevBtnThird.addEventListener("click", function (event) {
//     event.preventDefault();
//     slidePage.style.marginLeft = "-25%";
//     bullet[current - 2].classList.remove("active");
//     progressCheck[current - 2].classList.remove("active");
//     progressText[current - 2].classList.remove("active");
//     current -= 1;
// });

// prevBtnFourth.addEventListener("click", function (event) {
//     event.preventDefault();
//     slidePage.style.marginLeft = "-50%";
//     bullet[current - 2].classList.remove("active");
//     progressCheck[current - 2].classList.remove("active");
//     progressText[current - 2].classList.remove("active");
//     current -= 1;
// });

