function toggleTheme() {
    const html = document.documentElement;
    html.dataset.theme = html.dataset.theme === "dark" ? "light" : "dark";
}
function aumentarFonte() {
    document.body.style.fontSize = 'larger';
}
function diminuirFonte() {
    document.body.style.fontSize = 'smaller';
}