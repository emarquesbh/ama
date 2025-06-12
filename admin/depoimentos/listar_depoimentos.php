<?php
include_once("../includes/_header.php");
include_once("../includes/_menu.php");
include_once("../includes/conexao.php");

$filtro = isset($_GET['filtro']) ? trim($_GET['filtro']) : '';
$sql = "SELECT * FROM depoimentos" . ($filtro ? " WHERE nome LIKE '%$filtro%'" : "") . " ORDER BY id DESC";
$result = $mysqli->query($sql);
?>
<div class="container">
  <h1 class="mb-4">Depoimentos</h1>
  <form method="get" class="mb-3">
    <div class="input-group">
      <input type="text" name="filtro" class="form-control" placeholder="Buscar por nome" value="<?php echo htmlspecialchars($filtro); ?>">
      <button class="btn btn-primary" type="submit">Filtrar</button>
      <a href="depoimento_add.php" class="btn btn-success">Novo Depoimento</a>
    </div>
  </form>
  <table class="table table-bordered table-striped">
    <thead><tr><th>Nome</th><th>Depoimento</th><th>Ações</th></tr></thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nome']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($row['texto'])); ?></td>
        <td>
          <a href="depoimento_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="depoimento_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este depoimento?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
