<?php
// admin/ginastica_cerebral/listar_ginastica_cerebral.php
include_once("../includes/_header.php");
include_once("../includes/conexao.php");

$result = $mysqli->query("SELECT * FROM ginastica_cerebral ORDER BY id DESC");
if (!$result) {
    die("Erro na consulta: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Ginástica Cerebral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Listagem - Ginástica Cerebral</h2>
        <a href="ginastica_cerebral_add.php" class="btn btn-success">Novo Registro</a>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['titulo'] ?></td>
                    <td><?= $row['data'] ?></td>
                    <td>
                        <a href="ginastica_cerebral_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="ginastica_cerebral_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
