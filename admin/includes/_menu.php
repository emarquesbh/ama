<?php
// _menu.php
// Incluído em todas as páginas administrativas
// Define o menu de navegação principal
// Links para os módulos do Admin
// Pensado para navegação simples e acessível
// Exemplo inicial com link para Cursos
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Clube da Amizade - Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="cursos/cursos.php">Cursos</a>
                </li>
                <!-- Aqui você pode adicionar mais itens do menu: Avisos, Eventos, Programação, etc. -->
            </ul>
        </div>
    </div>
</nav>
