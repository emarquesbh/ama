<?php
// turma_add.php
// Tela para adicionar nova turma
// Formulário com campos: nome, descrição (TinyMCE), imagens (menor, maior, galeria opcional)
// Relaciona turma a um curso (campo id_curso)
// Upload com GD
// Testado no XAMPP com banco ama

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Buscar cursos para dropdown
$cursos = $mysqli->query("SELECT id, nome FROM cursos ORDER BY nome");
?>
<div class="container">
    <h1 class="mb-4">Adicionar Nova Turma</h1>
    <form action="turma_add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Curso:</label>
            <select name="id_curso" class="form-select" required>
                <option value="">-- Selecione o curso --</option>
                <?php while($curso = $cursos->fetch_assoc()): ?>
                    <option value="<?php echo $curso['id']; ?>"><?php echo htmlspecialchars($curso['nome']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nome da Turma:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"></textarea>
        </div>
        <div class="mb-3">
            <label>Imagem menor:</label>
            <input type="file" name="imagem_menor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Imagem maior:</label>
            <input type="file" name="imagem_maior" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Galeria (até 3 imagens - opcional):</label>
            <input type="file" name="galeria[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar Turma</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
