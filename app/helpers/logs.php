<?php
/**
 * Arquivo: log.php
 * Pasta: app/helpers/
 * Descrição: Função auxiliar para registrar ações do usuário na tabela 'logs'.
 */

function registrarLog($acao, $pagina) {
    require '../config/conexao.php';

    $usuario = $_SESSION['usuario'] ?? 'desconhecido';

    $stmt = $conn->prepare("INSERT INTO logs (usuario, acao, pagina) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $acao, $pagina);
    $stmt->execute();
}
