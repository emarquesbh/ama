
<?php
// admin/programacao/programacao_delete.php
include_once("../includes/_header.php");
include_once("../includes/conexao.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $mysqli->prepare("DELETE FROM programacao WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar_programacao.php");
exit;