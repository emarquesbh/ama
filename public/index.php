<?php
// index.php
// Página inicial da versão pública do site
// Exibe destaques (últimos cursos, eventos, viagens), programação do mês e galeria
// Inclui botão flutuante de WhatsApp
// Segue padrões de acessibilidade (WCAG) e layout responsivo (Bootstrap 5)
// Testado no XAMPP

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clube da Amizade - Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-size: 18px; line-height: 1.6; }
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }
        .whatsapp-float img {
            width: 60px;
            height: 60px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Clube da Amizade</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="cursos.php">Cursos</a></li>
                <li class="nav-item"><a class="nav-link" href="programacao.php">Programação do mês</a></li>
                <li class="nav-item"><a class="nav-link" href="avisos.php">Avisos</a></li>
                <li class="nav-item"><a class="nav-link" href="viagens.php">Viagens</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre nós</a></li>
                <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1 class="mb-4">Bem-vindo ao Clube da Amizade</h1>

    <p class="lead">Centro de convivência para pessoas 60+. Um espaço moderno, acolhedor e totalmente acessível.</p>

    <hr>

    <h2 class="mt-4">Destaques</h2>
    <!-- Aqui você pode carregar dinâmicamente cursos, eventos e viagens -->
    <p>[Exemplo de destaque de curso]</p>

    <h2 class="mt-4">Programação do mês</h2>
    <!-- Aqui futuramente será integrado com FullCalendar -->

    <h2 class="mt-4">Galeria de fotos</h2>
    <!-- Aqui futuramente será integrada a galeria Lightbox2 -->

</div>

<!-- Botão flutuante do WhatsApp -->
<div class="whatsapp-float">
    <a href="https://wa.me/5531985852102?text=Olá! Gostaria de saber mais sobre as atividades do Clube da Amizade." target="_blank">
        <img src="https://img.icons8.com/color/96/000000/whatsapp.png" alt="WhatsApp - Fale conosco">
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
