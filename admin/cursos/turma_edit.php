<?php
// turma_edit.php
// Tela de edição de turma existente
// Permite alterar: nome, descrição, imagens (menor, maior, galeria)
// Relaciona turma a um curso
// Upload com GD
// Testado no XAMPP com banco ama

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Obter ID da turma
$id = (int) $_GET['id'];
$turma = $mysqli->query("SELECT * FROM turmas WHERE id = $id")->fetch_assoc();

if (!$turma) {
    die("Turma não encontrada.");
}

// Buscar cursos para dropdown
$cursos = $mysqli->query("SELECT id, nome FROM cursos ORDER BY nome");
?>
<div class="container">
    <h1 class="mb-4">Editar Turma</h1>
    <form action="turma_edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Curso:</label>
            <select name="id_curso" class="form-select" required>
                <?php while($curso = $cursos->fetch_assoc()): ?>
                    <option value="<?php echo $curso['id']; ?>" <?php if ($curso['id'] == $turma['id_curso']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($curso['nome']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nome da Turma:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($turma['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"><?php echo htmlspecialchars($turma['descricao']); ?></textarea>
        </div>
        <div class="mb-3">
            <label>Nova imagem menor (opcional):</label>
            <input type="file" name="imagem_menor" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nova imagem maior (opcional):</label>
            <input type="file" name="imagem_maior" class="form-control">
        </div>
        <div class="mb-3">
            <label>Novas imagens para galeria (opcional - até 3 imagens):</label>
            <input type="file" name="galeria[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
