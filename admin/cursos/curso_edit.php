<?php
// curso_edit.php
// Tela de edição de curso existente
// Permite alterar nome, descrição, dias, horário, mensalidade
// Permite substituir imagem principal e imagens da galeria
// Usa Bootstrap 5, TinyMCE e upload com GD
// Testado no XAMPP com banco ama

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Obter ID do curso
$id = (int) $_GET['id'];
$curso = $mysqli->query("SELECT * FROM cursos WHERE id = $id")->fetch_assoc();

if (!$curso) {
    die("Curso não encontrado.");
}
?>
<div class="container">
    <h1 class="mb-4">Editar Curso</h1>
    <form action="curso_edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nome do Curso:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($curso['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"><?php echo htmlspecialchars($curso['descricao']); ?></textarea>
        </div>
        <div class="mb-3">
            <label>Dias:</label>
            <input type="text" name="dias" class="form-control" value="<?php echo htmlspecialchars($curso['dias']); ?>">
        </div>
        <div class="mb-3">
            <label>Horário:</label>
            <input type="text" name="horario" class="form-control" value="<?php echo htmlspecialchars($curso['horario']); ?>">
        </div>
        <div class="mb-3">
            <label>Mensalidade (R$):</label>
            <input type="text" name="mensalidade" class="form-control" value="<?php echo number_format($curso['mensalidade'], 2, ',', '.'); ?>">
        </div>
        <div class="mb-3">
            <label>Nova imagem principal (opcional):</label>
            <input type="file" name="imagem_principal" class="form-control">
        </div>
        <div class="mb-3">
            <label>Novas imagens para galeria (opcional - até 3 imagens):</label>
            <input type="file" name="galeria[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
