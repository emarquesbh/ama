<?php
// cursos.php
// Listagem de cursos cadastrados
// Tela inicial do módulo "Cursos" no admin
// Exibe cursos em tabela, com filtro e botões de editar/excluir
// Usa Bootstrap 5, acessível e com hover suave
// Testado no XAMPP com banco ama

include_once("../includes/_conexao.php");

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Buscar cursos
$sql = "SELECT * FROM cursos ORDER BY nome";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h1 class="mb-4">Gerenciamento de Cursos</h1>
    <a href="curso_add.php" class="btn btn-primary mb-3">Adicionar Novo Curso</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome do Curso</th>
                <th>Dias</th>
                <th>Horário</th>
                <th>Mensalidade (R$)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['dias']); ?></td>
                        <td><?php echo htmlspecialchars($row['horario']); ?></td>
                        <td><?php echo number_format($row['mensalidade'], 2, ',', '.'); ?></td>
                        <td>
                            <a href="curso_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="curso_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum curso cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
