<?php
/**
 * Arquivo: database.php
 * Pasta: app/config/
 * Descrição: Configuração da conexão com o banco de dados (MySQLi)
 */

/**
 * Cria e retorna uma conexão MySQLi com o banco de dados AMA.
 * @return mysqli Conexão ativa com charset utf8mb4
 */
function conn() {
  $host = 'localhost';
  $usuario = 'root';
  $senha = '';
  $banco = 'ama';

  $conexao = new mysqli($host, $usuario, $senha, $banco);

  if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
  }

  $conexao->set_charset('utf8mb4');

  return $conexao;
}
