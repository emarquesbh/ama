
<?php
include_once("../includes/_header.php");
include_once("../includes/conexao.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$titulo = "";
$data = "";
$local = "";

if ($id > 0) {
  $stmt = $mysqli->prepare("SELECT * FROM eventos WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultado = $stmt->get_result();
  if ($resultado->num_rows > 0) {
    $evento = $resultado->fetch_assoc();
    $titulo = $evento['titulo'];
    $data = $evento['data'];
    $local = $evento['local'];
  }
}
?>
<div class="container">
  <h1 class="mb-4"><?php echo $id > 0 ? 'Editar Evento' : 'Novo Evento'; ?></h1>
  <form method="post" action="processar_evento.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>
    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Data</label>
      <input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>" required>
    </div>
    <div class="mb-3">
      <label for="local" class="form-label">Local</label>
      <input type="text" class="form-control" id="local" name="local" value="<?php echo htmlspecialchars($local); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_eventos.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
