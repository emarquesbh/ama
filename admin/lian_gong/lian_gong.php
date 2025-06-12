<?php
// editar_lian_gong.php
// Local: admin/lian_gong/
// Edita os dados de uma turma de Lian Gong cadastrada previamente
// Busca os dados pelo ID passado via GET e preenche o formulário
// Utiliza Bootstrap 5 e TinyMCE

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM lian_gong WHERE id = $id";
$result = $mysqli->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "<div class='container'><p>Registro não encontrado.</p></div>";
    include_once("../includes/_footer.php");
    exit;
}
$row = $result->fetch_assoc();
?>
<div class="container">
    <h1 class="mb-4">Editar Turma - Lian Gong</h1>
    <form action="processar_lian_gong.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo htmlspecialchars($row['titulo']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Dias</label>
            <input type="text" name="dia" class="form-control" value="<?php echo htmlspecialchars($row['dia']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Horários</label>
            <input type="text" name="horarios" class="form-control" value="<?php echo htmlspecialchars($row['horarios']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Mensalidade</label>
            <input type="number" step="0.01" name="valor" class="form-control" value="<?php echo $row['valor']; ?>">
        </div>
        <div class="m