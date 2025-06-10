<?php
// listar_ginastica.php
// Listagem de aulas de Ginástica cadastradas
// Com filtro e botões de editar/excluir
// Usa Bootstrap 5, acessível, testado no XAMPP

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Buscar registros
$sql = "SELECT * FROM ginastica ORDER BY titulo";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h1 class="mb-4">Aulas de Ginástica - Listagem</h1>
    <a href="ginastica.php" class="btn btn-primary mb-3">Cadastrar Nova Aula</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Título</th>
                <th>Horários</th>
                <th>Dia</th>
                <th>Valor (R$)</th>
                <th>Turma</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <?php if (!empty($row['imagem'])): ?>
                                <img src="../uploads/ginastica/<?php echo htmlspecialchars($row['imagem']); ?>" alt="Imagem" style="width: 100px; height: auto;">
                            <?php else: ?>
                                Sem imagem
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($row['horarios']); ?></td>
                        <td><?php echo htmlspecialchars($row['dia']); ?></td>
                        <td><?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['turma']); ?></td>
                        <td>
                            <a href="editar_ginastica.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="excluir_ginastica.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta aula?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">Nenhuma aula cadastrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
