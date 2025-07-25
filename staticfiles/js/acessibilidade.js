// Path: static/js/acessibilidade.js
// Script para alternar tema, aumentar/diminuir fonte e leitura do conteúdo
function toggleTheme() {
    const html = document.documentElement;
    html.setAttribute("data-theme", html.getAttribute("data-theme") === "dark" ? "light" : "dark");
}

function aumentarFonte() {
    document.body.style.fontSize = (parseFloat(getComputedStyle(document.body).fontSize) + 2) + "px";
}

function diminuirFonte() {
    document.body.style.fontSize = (parseFloat(getComputedStyle(document.body).fontSize) - 2) + "px";
}

function lerTexto() {
    const texto = document.getElementById("conteudo").innerText;
    const msg = new SpeechSynthesisUtterance(texto);
    msg.lang = "pt-BR";
    window.speechSynthesis.speak(msg);
}
