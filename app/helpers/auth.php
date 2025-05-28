<?php
/**
 * Arquivo: auth.php
 * Pasta: app/helpers/
 * Descrição: Funções auxiliares de autenticação e controle de acesso por tipo de usuário
 */

function isLogado() {
    return isset($_SESSION['usuario']);
}

function tipoUsuario() {
    return $_SESSION['tipo'] ?? '';
}

function exigirLogin() {
    if (!isLogado()) {
        header('Location: /ama/public/?url=Login/index');
        exit;
    }
}

function exigirTipo($tiposPermitidos = []) {
    if (!in_array(tipoUsuario(), $tiposPermitidos)) {
        echo '<div class="alert alert-danger">Acesso negado.</div>';
        exit;
    }
}
