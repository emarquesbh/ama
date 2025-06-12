<?php
// turmas.php
// Listagem de turmas por curso
// Exibe as turmas cadastradas no banco
// Tela de gerenciamento das turmas no módulo Cursos
// Filtro por curso_id (opcional)
// Usa Bootstrap 5, acessível, testado no XAMPP

include_once("../includes/_header.php");
include_once("../includes/_menu.php");
include_once("../includes/conexao.php");

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Buscar turmas
$sql = "SELECT t.*, c.nome AS curso_nome 
        FROM turmas t
        LEFT JOIN cursos c ON t.id_curso = c.id
        ORDER BY c.nome, t.nome";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h1 class="mb-4">Gerenciamento de Turmas</h1>
    <a href="turma_add.php" class="btn btn-primary mb-3">Adicionar Nova Turma</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nome da Turma</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['curso_nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo strip_tags($row['descricao']); ?></td>
                        <td>
                            <a href="turma_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="turma_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta turma?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">Nenhuma turma cadastrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
