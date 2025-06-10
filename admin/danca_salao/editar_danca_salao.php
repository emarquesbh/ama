<?php
// editar_danca_salao.php
// Tela de edição de aula de Dança de Salão
// Campos padrão das 10 perguntas + log
// Testado no XAMPP

include_once("../includes/_header.php");
include_once("../includes/_menu.php");
include_once("../includes/_conexao.php");

// Obter ID
$id = (int) $_GET['id'];
$registro = $mysqli->query("SELECT * FROM danca_salao WHERE id = $id")->fetch_assoc();

if (!$registro) {
    die("Registro não encontrado.");
}
?>
<div class="container">
    <h1 class="mb-4">Editar Aula de Dança de Salão</h1>
    <form action="processar_danca_salao.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Imagem atual:</label><br>
            <?php if (!empty($registro['imagem'])): ?>
                <img src="../uploads/danca_salao/<?php echo htmlspecialchars($registro['imagem']); ?>" alt="Imagem" style="width: 150px; height: auto;">
            <?php else: ?>
                Sem imagem
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label>Nova imagem (opcional):</label>
            <input type="file" name="imagem" class="form-control">
        </div>
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo htmlspecialchars($registro['titulo']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Horários:</label>
            <input type="text" name="horarios" class="form-control" value="<?php echo htmlspecialchars($registro['horarios']); ?>">
        </div>
        <div class="mb-3">
            <label>Dia:</label>
            <input type="text" name="dia" class="form-control" value="<?php echo htmlspecialchars($registro['dia']); ?>">
        </div>
        <div class="mb-3">
            <label>Valor (R$):</label>
            <input type="text" name="valor" class="form-control" value="<?php echo number_format($registro['valor'], 2, ',', '.'); ?>">
        </div>
        <div class="mb-3">
            <label>Turma:</label>
            <input type="text" name="turma" class="form-control" value="<?php echo htmlspecialchars($registro['turma']); ?>">
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"><?php echo htmlspecialchars($registro['descricao']); ?></textarea>
        </div>
        <div class="mb-3">
            <label>Última atualização:</label>
            <p>
                <?php echo htmlspecialchars($registro['atualizado_por']); ?> em 
                <?php echo $registro['atualizado_em'] ? date('d/m/Y H:i', strtotime($registro['atualizado_em'])) : '-'; ?>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
