const containerSlides = document.getElementById('paineis-slides');
const todasImagens = document.querySelectorAll('.slides img');
const botaoEsq = document.getElementById('btnEsq');
const botaoDir = document.getElementById('btnDir');
const todosPontos = document.querySelectorAll('.ponto');

let indiceAtual = 0;
const totalDeImagens = todasImagens.length;

function atualizarCarrossel() {
    const deslocamento = -indiceAtual * 100;
    containerSlides.style.transform = `translateX(${deslocamento}%)`;

    todosPontos.forEach((ponto, i) => {
        if (i === indiceAtual) {
            ponto.classList.add('ativo');
        } else {
            ponto.classList.remove('ativo');
        }
    });
}

function irParaSlide(posicao) {
    indiceAtual = posicao;
    atualizarCarrossel();
}


botaoDir.addEventListener('click', () => {
    indiceAtual = (indiceAtual + 1) % totalDeImagens;
    atualizarCarrossel();
});

botaoEsq.addEventListener('click', () => {
    indiceAtual = (indiceAtual - 1 + totalDeImagens) % totalDeImagens;
    atualizarCarrossel();
});

atualizarCarrossel();

setInterval(() => {
    indiceAtual = (indiceAtual + 1) % totalDeImagens;
    atualizarCarrossel();
}, 4000);